<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Folder;
use App\Models\Page;
use Illuminate\Support\Facades\Auth;

class ChronologyController extends Controller
{
    // 1. Chronology Page View (Updated for Folder Navigation)
    public function index(Request $request)
    {
        $userId = Auth::id();

        $folders = Folder::where('user_id', $userId)
            ->withCount(['pages' => function ($query) {
                $query->where('is_template', false);
            }])->get();

        $templates = Page::where('user_id', $userId)->where('is_template', true)->get();

        // folder filtering logic
        $query = Page::where('user_id', $userId)->where('is_template', false);
        $currentFolder = null;

        if ($request->has('folder_id') && $request->folder_id != '') {
            $query->where('folder_id', $request->folder_id);
            $currentFolder = Folder::where('id', $request->folder_id)->where('user_id', $userId)->first();
        }

        $pages = $query->orderBy('updated_at', 'desc')->get();

        return view('components.back-end.chronology', compact('folders', 'pages', 'templates', 'currentFolder'));
    }

    // 2. New Folder Creation
    public function storeFolder(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Folder::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'icon' => 'fa-regular fa-folder',
        ]);

        return response()->json(['success' => true, 'message' => 'Folder created successfully!']);
    }

    // 4. New Page Creation (Updated to support specific folder)
    public function storePage(Request $request)
    {
        $page = Page::create([
            'user_id' => Auth::id(),
            'folder_id' => $request->folder_id ?? null, // Associate with folder if provided
            'title' => 'Untitled Page',
            'is_template' => false,
            'content' => null,
        ]);

        return response()->json([
            'success' => true,
            'page_id' => $page->id,
            'redirect_url' => route('pages.edit', $page->id)
        ]);
    }

    // 5. Edit Page View (Updated to load Sidebar Data)
    public function editPage($id)
    {
        $userId = Auth::id();
        $page = Page::where('id', $id)->where('user_id', $userId)->firstOrFail();

        $folders = Folder::where('user_id', $userId)
            ->withCount(['pages' => function ($query) {
                $query->where('is_template', false);
            }])->get();

        $templates = Page::where('user_id', $userId)->where('is_template', true)->get();
        $pages = Page::where('user_id', $userId)->where('is_template', false)->orderBy('updated_at', 'desc')->get();

        return view('components.back-end.page-editor', compact('page', 'folders', 'templates', 'pages'));
    }

    // 6. Update Page (Auto-save for Title, Editor.js Content, and Cover Image)
    public function updatePage(Request $request, $id)
    {
        $page = Page::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        // If cover image is uploaded, handle the file upload
        if ($request->hasFile('cover_image')) {
            $file = $request->file('cover_image');
            $filename = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());

            // public/uploads/covers folder will store the image
            $file->move(public_path('uploads/covers'), $filename);

            $page->cover_image = 'uploads/covers/' . $filename;
            $page->save();

            return response()->json([
                'success' => true,
                'cover_image' => asset($page->cover_image),
                'message' => 'Cover image updated!'
            ]);
        }

        // For general text or editor data saving
        $page->update([
            'title' => $request->title ?? $page->title,
            'content' => $request->content, // Editor.js JSON string
        ]);

        return response()->json(['success' => true, 'message' => 'Page updated!']);
    }

    // 8. Delete Page
    public function deletePage($id)
    {
        $page = Page::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        if (method_exists($page, 'forceDelete')) {
            $page->forceDelete();
        } else {
            $page->delete();
        }

        return response()->json(['success' => true, 'message' => 'Page deleted successfully!']);
    }

    // 9. Rename Folder
    public function updateFolder(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $folder = Folder::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $folder->update([
            'name' => $request->name
        ]);

        return response()->json(['success' => true, 'message' => 'Folder renamed successfully!']);
    }

    // 10. Delete Folder
    public function destroyFolder($id)
    {
        $folder = Folder::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $folder->delete();

        return response()->json(['success' => true, 'message' => 'Folder deleted successfully!']);
    }

    // 11. Create Page from Template
    public function storeFromTemplate(Request $request)
    {
        $request->validate([
            'template_id' => 'required|exists:pages,id',
            'title' => 'nullable|string|max:255'
        ]);

        // Get the selected template
        $template = Page::where('id', $request->template_id)
            ->where('user_id', Auth::id())
            ->where('is_template', true)
            ->firstOrFail();

        // Create a new page copying the template's content
        $page = Page::create([
            'user_id' => Auth::id(),
            'folder_id' => $request->folder_id ?: null,
            'title' => $request->title ? $request->title : $template->title . ' (Copy)',
            'is_template' => false,
            'content' => $template->content,
        ]);

        return response()->json([
            'success' => true,
            'page_id' => $page->id,
            'redirect_url' => route('pages.edit', $page->id)
        ]);
    }
}
