<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Folder;
use App\Models\Page;
use Illuminate\Support\Facades\Auth;

class ChronologyController extends Controller
{
    // 1. Chronology Page View
    public function index()
    {
        $userId = Auth::id();

        $folders = Folder::where('user_id', $userId)->withCount('pages')->get();
        $pages = Page::where('user_id', $userId)->where('is_template', false)->get();
        $templates = Page::where('user_id', $userId)->where('is_template', true)->get();

        return view('components.back-end.chronology', compact('folders', 'pages', 'templates'));
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

    // 4. New Page Creation
    public function storePage(Request $request)
    {
        $page = Page::create([
            'user_id' => Auth::id(),
            'folder_id' => $request->folder_id ?? null,
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

    // 5. Page Edit View (Placeholder)
    public function editPage($id)
    {
        $page = Page::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        return view('components.back-end.page-editor', compact('page'));
    }

    // 6. Page Update (Auto-save for Title and Editor.js Content)
    public function updatePage(Request $request, $id)
    {
        $page = Page::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        $page->update([
            'title' => $request->title ?? $page->title,
            'content' => $request->content, // Editor.js JSON string
        ]);

        return response()->json(['success' => true, 'message' => 'Page updated!']);
    }

    // 7. Delete Page
    public function deletePage($id)
    {
        $page = Page::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $page->delete();

        return response()->json(['success' => true, 'message' => 'Page deleted!']);
    }
}
