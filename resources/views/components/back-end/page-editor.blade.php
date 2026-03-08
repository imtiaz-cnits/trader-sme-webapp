@extends('layout.dashboard-sidenav')
@section('title', $page->title)

@section('content')
<script src="https://cdn.jsdelivr.net/npm/@editorjs/editorjs@latest"></script>
<script src="https://cdn.jsdelivr.net/npm/@editorjs/header@latest"></script>
<script src="https://cdn.jsdelivr.net/npm/@editorjs/list@latest"></script>
<script src="https://cdn.jsdelivr.net/npm/@editorjs/checklist@latest"></script>
<script src="https://cdn.jsdelivr.net/npm/@editorjs/table@latest"></script>
<script src="https://cdn.jsdelivr.net/npm/@editorjs/quote@latest"></script>
<script src="https://cdn.jsdelivr.net/npm/@editorjs/code@latest"></script>
<script src="https://cdn.jsdelivr.net/npm/@editorjs/simple-image@latest"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<main class="container-fluid px-md-5">
    <div class="page-editor-container mt-4" style="max-width: 800px; margin: auto; padding-bottom: 100px;">

        <div class="cover-image-wrapper mb-4 position-relative" style="height: 250px; background: #f3f4f6; border-radius: 12px; overflow: hidden; display: flex; align-items: center; justify-content: center;">
            @if($page->cover_image)
            <img src="{{ asset($page->cover_image) }}" id="cover-preview" style="width: 100%; height: 100%; object-fit: cover;">
            @else
            <i class="fa-regular fa-image text-muted" style="font-size: 3rem; opacity: 0.2;"></i>
            @endif
            <div class="position-absolute bottom-0 start-0 p-3 w-100" style="background: linear-gradient(transparent, rgba(0,0,0,0.5));">
                <button class="btn btn-sm btn-light" onclick="document.getElementById('cover-input').click()">
                    <i class="fa-regular fa-image me-1"></i> Add / Change Cover
                </button>
                <input type="file" id="cover-input" class="d-none" accept="image/*">
            </div>
        </div>

        <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
            <input type="text" id="page-title" class="form-control border-0 px-0 fw-bold"
                value="{{ $page->title }}"
                style="font-size: 32px; box-shadow: none; background: transparent;"
                placeholder="Untitled Page">

            <span id="status-text" class="text-muted small px-3 py-1 bg-light rounded-pill">Saved</span>
        </div>

        <div id="editorjs" class="mt-3" style="min-height: 50vh; font-size: 16px;"></div>
    </div>
</main>

<script>
    // 1. Bulletproof Data Parsing (Prevents VS Code formatting errors)
    let editorData = {};
    const rawData = <?php echo json_encode($page->content); ?>;

    if (rawData) {
        try {
            editorData = JSON.parse(rawData);
        } catch (e) {
            console.error("Editor data parsing error:", e);
        }
    }

    // 2. Initialize Editor.js
    const editor = new EditorJS({
        holder: 'editorjs',
        placeholder: 'Press "/" or click "+" for commands...',
        data: editorData,
        tools: {
            header: {
                class: Header,
                inlineToolbar: true,
                config: {
                    placeholder: 'Enter a heading',
                    levels: [1, 2, 3, 4],
                    defaultLevel: 2
                }
            },
            list: {
                class: EditorjsList, // <--- FIXED HERE (Changed from List to EditorjsList)
                inlineToolbar: true,
            },
            checklist: {
                class: Checklist,
                inlineToolbar: true,
            },
            table: {
                class: Table,
                inlineToolbar: true,
            },
            quote: {
                class: Quote,
                inlineToolbar: true,
                config: {
                    quotePlaceholder: 'Enter a quote',
                    captionPlaceholder: 'Author',
                },
            },
            code: CodeTool,
            image: SimpleImage,
        },
        onChange: () => {
            savePageData();
        }
    });

    // 3. Auto-save Function
    async function savePageData() {
        document.getElementById('status-text').innerText = 'Saving...';
        document.getElementById('status-text').className = 'text-warning small px-3 py-1 bg-light rounded-pill';

        try {
            const savedData = await editor.save();
            const title = document.getElementById('page-title').value;

            const response = await axios.post("{{ route('pages.update', $page->id) }}", {
                title: title,
                content: JSON.stringify(savedData),
                _token: "{{ csrf_token() }}"
            });

            if (response.data.success) {
                document.getElementById('status-text').innerText = 'All changes saved';
                document.getElementById('status-text').className = 'text-success small px-3 py-1 bg-light rounded-pill';
            }
        } catch (error) {
            document.getElementById('status-text').innerText = 'Error saving';
            document.getElementById('status-text').className = 'text-danger small px-3 py-1 bg-light rounded-pill';
        }
    }

    // 4. Trigger auto-save when title is changed
    let titleSaveTimeout;
    document.getElementById('page-title').addEventListener('input', () => {
        document.getElementById('status-text').innerText = 'Saving...';
        document.getElementById('status-text').className = 'text-warning small px-3 py-1 bg-light rounded-pill';

        clearTimeout(titleSaveTimeout);
        titleSaveTimeout = setTimeout(() => {
            savePageData();
        }, 1000);
    });

    // 5. Cover Image Upload Logic
    document.getElementById('cover-input').addEventListener('change', async function() {
        if (!this.files || this.files.length === 0) return;

        const file = this.files[0];
        const formData = new FormData();
        formData.append('cover_image', file);
        formData.append('_token', "{{ csrf_token() }}");

        document.getElementById('status-text').innerText = 'Uploading Cover...';
        document.getElementById('status-text').className = 'text-warning small px-3 py-1 bg-light rounded-pill';

        try {
            const response = await axios.post("{{ route('pages.update', $page->id) }}", formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            });

            if (response.data.success) {
                // DOM Manipulation to Update Cover Image Instantly
                let coverWrapper = document.querySelector('.cover-image-wrapper');
                let existingImg = document.getElementById('cover-preview');

                if (existingImg) {
                    existingImg.src = response.data.cover_image;
                } else {
                    const icon = coverWrapper.querySelector('.fa-image.text-muted');
                    if (icon) icon.remove();

                    const newImg = document.createElement('img');
                    newImg.id = 'cover-preview';
                    newImg.src = response.data.cover_image;
                    newImg.style.width = '100%';
                    newImg.style.height = '100%';
                    newImg.style.objectFit = 'cover';

                    coverWrapper.insertBefore(newImg, coverWrapper.firstChild);
                }

                document.getElementById('status-text').innerText = 'Cover updated';
                document.getElementById('status-text').className = 'text-success small px-3 py-1 bg-light rounded-pill';
            }
        } catch (error) {
            document.getElementById('status-text').innerText = 'Upload failed';
            document.getElementById('status-text').className = 'text-danger small px-3 py-1 bg-light rounded-pill';
        }
    });
</script>

<style>
    /* Notion Like Typography & Editor Fixes */
    .ce-block__content,
    .ce-toolbar__content {
        max-width: 100% !important;
        /* Forces editor to use full width of container */
    }

    .codex-editor--empty .ce-block::before {
        color: #9ca3af;
    }

    /* Custom styling for checklist */
    .cdx-checklist__item--checked .cdx-checklist__item-text {
        text-decoration: line-through;
        color: #6b7280;
    }
</style>
@endsection