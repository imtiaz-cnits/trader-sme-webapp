@extends('layout.dashboard-sidenav')
@section('title', $page->title)

@section('content')
<script src="https://cdn.jsdelivr.net/npm/@editorjs/editorjs@latest"></script>
<script src="https://cdn.jsdelivr.net/npm/@editorjs/header@latest"></script>
<script src="https://cdn.jsdelivr.net/npm/@editorjs/list@latest"></script>

<main class="container-fluid px-md-5">
    <div class="page-editor-container mt-4" style="max-width: 800px; margin: auto;">

        <div class="cover-image-wrapper mb-4 position-relative" style="height: 250px; background: #f3f4f6; border-radius: 12px; overflow: hidden;">
            @if($page->cover_image)
            <img src="{{ asset($page->cover_image) }}" id="cover-preview" style="width: 100%; height: 100%; object-fit: cover;">
            @endif
            <div class="position-absolute bottom-0 start-0 p-3 w-100" style="background: linear-gradient(transparent, rgba(0,0,0,0.5));">
                <button class="btn btn-sm btn-light" onclick="document.getElementById('cover-input').click()">
                    <i class="fa-regular fa-image me-1"></i> Add Cover
                </button>
                <input type="file" id="cover-input" class="d-none" accept="image/*">
            </div>
        </div>

        <div class="page-header mb-4">
            <input type="text" id="page-title" class="form-control border-0 fw-bold shadow-none"
                value="{{ $page->title }}"
                style="font-size: 40px; background: transparent; padding: 0;" placeholder="Untitled">
            <div class="text-muted mt-2 d-flex gap-3" style="font-size: 14px;">
                <span><i class="fa-regular fa-comment me-1"></i> Add comment</span>
            </div>
        </div>

        <hr class="my-4" style="opacity: 0.1;">

        <div id="editorjs" style="min-height: 400px;"></div>

        <div class="save-status position-fixed bottom-0 end-0 m-4 p-2 bg-white shadow-sm border rounded" style="font-size: 12px; z-index: 1000;">
            <span id="status-text" class="text-muted">All changes saved</span>
        </div>
    </div>
</main>

<script>
    const editor = new EditorJS({
        holder: 'editorjs',
        placeholder: 'Press "/" for commands...',
        tools: {
            header: Header,
            list: List
        },
        data: {
            !!$page - > content ?? '{}'!!
        },
        onChange: () => {
            savePageData();
        }
    });

    // Auto-save function
    async function savePageData() {
        document.getElementById('status-text').innerText = 'Saving...';
        const savedData = await editor.save();
        const title = document.getElementById('page-title').value;

        try {
            await axios.post("{{ route('pages.update', $page->id) }}", {
                title: title,
                content: JSON.stringify(savedData),
                _token: "{{ csrf_token() }}"
            });
            document.getElementById('status-text').innerText = 'All changes saved';
        } catch (error) {
            document.getElementById('status-text').innerText = 'Error saving';
        }
    }

    // Title change listener
    document.getElementById('page-title').addEventListener('input', savePageData);
</script>

<style>
    /* Notion Like Typography */
    .ce-block__content,
    .ce-toolbar__content {
        max-width: 100% !important;
    }

    .codex-editor--empty .ce-block:first-child .ce-paragraph:before {
        color: #cbd5e1 !important;
    }

    #page-title:focus {
        outline: none;
    }
</style>
@endsection