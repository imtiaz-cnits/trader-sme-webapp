@extends('layout.dashboard-sidenav')
@section('title', $page->title ?? 'Draft Page')

@section('content')
<link rel="stylesheet" href="{{ asset('back-end/assets/css/page-editor.css?v=1.0') }}">

<script src="https://cdn.jsdelivr.net/npm/@editorjs/editorjs@latest"></script>
<script src="https://cdn.jsdelivr.net/npm/@editorjs/header@latest"></script>
<script src="https://cdn.jsdelivr.net/npm/@editorjs/list@latest"></script>
<script src="https://cdn.jsdelivr.net/npm/@editorjs/checklist@latest"></script>
<script src="https://cdn.jsdelivr.net/npm/@editorjs/table@latest"></script>
<script src="https://cdn.jsdelivr.net/npm/@editorjs/quote@latest"></script>
<script src="https://cdn.jsdelivr.net/npm/@editorjs/code@latest"></script>
<script src="https://cdn.jsdelivr.net/npm/@editorjs/simple-image@latest"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
<link href="https://unpkg.com/tabulator-tables@5.5.2/dist/css/tabulator.min.css" rel="stylesheet">
<script src="https://unpkg.com/tabulator-tables@5.5.2/dist/js/tabulator.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>


<main class="container-fluid px-md-4 editor-wrapper">
    <div class="d-flex flex-column flex-xl-row align-items-start w-100">

        @include('layout.sidebar')

        <div class="flex-grow-1 editor-main-area pt-4">

            <div class="editor-topbar d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3">

                <div class="d-flex align-items-center flex-nowrap">
                    <button class="btn btn-sm border shadow-none px-2 py-1 me-3 flex-shrink-0" id="sidebarToggle" style="background: var(--bg-color); color: var(--text);">
                        <i class="fa-solid fa-bars"></i>
                    </button>

                    <a href="{{ route('admin.chronology') }}" class="text-decoration-none breadcrumb-text d-flex align-items-center me-2">
                        <i class="fa-solid fa-book-open me-1" style="color: var(--accent);"></i> Chronology
                    </a>
                    <span style="color: var(--text3);" class="me-2"><i class="fa-solid fa-chevron-right" style="font-size: 10px;"></i></span>
                    <span class="breadcrumb-text active d-flex align-items-center">
                        <i class="fa-regular fa-file-lines me-1"></i> <span class="text-truncate" style="max-width: 150px;">{{ $page->title ?? 'Draft Page' }}</span>
                    </span>
                </div>

                <div class="top-actions d-flex align-items-center flex-nowrap gap-2 w-100 w-md-auto justify-content-start justify-content-md-end mt-md-0 hide-scrollbar">

                    <span id="status-indicator" class="small px-3 py-1 rounded-pill flex-shrink-0 d-flex align-items-center gap-1" style="color: var(--text3); background: var(--accent2); font-weight: 500; transition: all 0.3s ease;">
                        <i class="fa-solid fa-check text-success" id="status-icon"></i>
                        <span id="status-text">Saved</span>
                    </span>

                    <button class="action-btn flex-shrink-0" data-bs-toggle="modal" data-bs-target="#shareModal">Share</button>

                    <button class="action-btn-icon flex-shrink-0" id="btn-favorite" title="Favorite" data-favorited="{{ $page->is_favorite ?? false ? 'true' : 'false' }}">
                        <i class="{{ $page->is_favorite ?? false ? 'fa-solid text-warning' : 'fa-regular' }} fa-star" style="transition: color 0.2s, transform 0.2s;"></i>
                    </button>

                    <div class="dropdown d-inline-block flex-shrink-0">
                        <button class="action-btn-icon" type="button" data-bs-toggle="dropdown" aria-expanded="false" title="Menu">
                            <i class="fa-solid fa-ellipsis"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end border-0 shadow-sm" style="background-color: var(--bg-color); border: 1px solid var(--border) !important; border-radius: 8px; min-width: 200px;">
                            <li>
                                <h6 class="dropdown-header text-muted" style="font-size: 11px; text-transform: uppercase;">Page Actions</h6>
                            </li>

                            <li><a class="dropdown-item d-flex align-items-center gap-2 py-2" href="#" data-bs-toggle="modal" data-bs-target="#pageDetailsModal" style="color: var(--text); font-size: 14px;"><i class="fa-solid fa-circle-info text-muted"></i> Page Details</a></li>

                            <li><a class="dropdown-item d-flex align-items-center gap-2 py-2" href="#" data-bs-toggle="modal" data-bs-target="#moveToModal" style="color: var(--text); font-size: 14px;"><i class="fa-solid fa-folder-tree text-muted"></i> Move to...</a></li>

                            <li><a class="dropdown-item d-flex align-items-center gap-2 py-2" href="#" data-bs-toggle="modal" data-bs-target="#saveTemplateModal" style="color: var(--text); font-size: 14px;"><i class="fa-solid fa-layer-group text-muted"></i> Save as Template</a></li>

                            <li><a class="dropdown-item d-flex align-items-center gap-2 py-2" href="#" id="exportPdfBtn" style="color: var(--text); font-size: 14px;"><i class="fa-solid fa-file-export text-muted"></i> Export as PDF</a></li>

                            <li>
                                <hr class="dropdown-divider" style="border-color: var(--border);">
                            </li>

                            <li><a class="dropdown-item d-flex align-items-center gap-2 py-2 text-danger" href="#" onclick="deletePage({{ $page->id }}); return false;" style="font-size: 14px;"><i class="fa-regular fa-trash-can"></i> Delete Page</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div id="printableArea" class="w-100 p-2">

                <div class="cover-image-wrapper mb-4 position-relative" style="height: 220px; border-radius: 12px; overflow: hidden; display: flex; align-items: center; justify-content: center;">
                    @if($page->cover_image)
                    <img src="{{ asset($page->cover_image) }}" id="cover-preview" style="width: 100%; height: 100%; object-fit: cover;">
                    @else
                    <i class="fa-regular fa-image" style="font-size: 3rem; color: var(--text3); opacity: 0.3;"></i>
                    @endif
                    <div class="position-absolute bottom-0 start-0 p-3 w-100" data-html2canvas-ignore="true" style="background: linear-gradient(transparent, rgba(0,0,0,0.6));">
                        <button class="btn btn-sm" onclick="document.getElementById('cover-input').click()" style="background: var(--bg-color); color: var(--text); font-weight: 500; border-radius: 6px;">
                            <i class="fa-regular fa-image me-1"></i> Add cover
                        </button>
                        <button class="btn btn-sm ms-2" style="background: var(--bg-color); color: var(--text); font-weight: 500; border-radius: 6px;">
                            <i class="fa-regular fa-comment me-1"></i> Add comment
                        </button>
                        <input type="file" id="cover-input" class="d-none" accept="image/*">
                    </div>
                </div>

                <div class="mb-4 border-bottom pb-3" style="border-color: var(--border) !important;">
                    <input type="text" id="page-title" class="form-control border-0 px-0 fw-bold"
                        value="{{ $page->title }}"
                        style="font-size: clamp(24px, 5vw, 38px); box-shadow: none; background: transparent;"
                        placeholder="Untitled Page">
                </div>

                <div id="editorjs" class="mt-3" style="min-height: 50vh; font-size: 16px; transition: all 0.3s ease; line-height: 1.6;"></div>

            </div>

        </div>
    </div>

    <div class="floating-footer">
        <div class="quick-tools d-flex align-items-center w-md-auto">
            <span class="text-muted fw-bold me-2" style="font-size: 12px; text-transform: uppercase;">Quick Insert:</span>
            <button class="btn btn-sm" id="btn-add-board" style="background: var(--bg-color); border: 1px solid var(--border); color: var(--text); font-weight: 500; border-radius: 6px; margin-right: 8px;">
                <i class="fa-solid fa-table-columns text-primary me-1"></i> Board
            </button>
            <button class="btn btn-sm" id="btn-add-table" style="background: var(--bg-color); border: 1px solid var(--border); color: var(--text); font-weight: 500; border-radius: 6px; margin-right: 8px;">
                <i class="fa-solid fa-table text-success me-1"></i> Database
            </button>
            <button class="btn btn-sm" id="btn-add-checklist" style="background: var(--bg-color); border: 1px solid var(--border); color: var(--text); font-weight: 500; border-radius: 6px;">
                <i class="fa-solid fa-list-check text-warning me-1"></i> Checklist
            </button>
        </div>

        <div class="bottom-actions d-flex align-items-center gap-2">
            <button class="action-btn-icon" id="btn-focus-mode" title="Toggle Focus Mode">
                <i class="fa-solid fa-expand"></i>
            </button>
            <div style="width: 1px; height: 16px; background: var(--border); margin: 0 5px;"></div>
            <button class="btn btn-sm text-danger" onclick="deletePage({{ $page->id }})" style="background: transparent; border: 1px solid #ef444450; font-weight: 500; border-radius: 6px;">
                <i class="fa-regular fa-trash-can me-1"></i> Delete Page
            </button>
        </div>
    </div>

    <!-- Share Modal Start -->
    <div class="modal fade" id="shareModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg" style="border-radius: 12px; background-color: var(--bg-color);">
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title fw-bold" style="color: var(--text); font-size: 18px;">Share Page</h5>
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close" style="filter: var(--invert-icon);"></button>
                </div>
                <div class="modal-body px-4 py-4">

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div>
                            <h6 class="mb-1 fw-bold" style="color: var(--text); font-size: 15px;">Publish to Web</h6>
                            <small style="color: var(--text3); font-size: 13px;">Anyone with the link will be able to view this page.</small>
                        </div>
                        <div class="form-check form-switch" style="font-size: 22px;">
                            <input class="form-check-input shadow-none" type="checkbox" id="publishToggle" style="cursor: pointer;" {{ $page->is_published ?? false ? 'checked' : '' }}>
                        </div>
                    </div>

                    <div id="shareLinkContainer" style="opacity: {{ $page->is_published ?? false ? '1' : '0.4' }}; pointer-events: {{ $page->is_published ?? false ? 'auto' : 'none' }}; transition: 0.3s ease;">
                        <label class="form-label fw-bold" style="color: var(--text); font-size: 12px; text-transform: uppercase;">Public Link</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control shadow-none" id="publicLinkInput" value="{{ url('/p/' . ($page->slug ?? uniqid())) }}" readonly style="background-color: var(--accent2); border: 1px solid var(--border); color: var(--text); font-size: 14px;">
                            <button class="btn shadow-none" type="button" id="copyLinkBtn" style="border: 1px solid var(--border); color: var(--text); background: var(--bg-color); font-weight: 500;">
                                <i class="fa-regular fa-copy"></i> Copy
                            </button>
                        </div>
                        <small class="text-success d-none" id="copySuccessText" style="font-size: 12px; font-weight: 500;"><i class="fa-solid fa-check"></i> Link copied to clipboard!</small>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Share Modal End -->

    <!-- Page Details Modal Start -->
    <div class="modal fade" id="pageDetailsModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content border-0 shadow-lg" style="border-radius: 12px; background-color: var(--bg-color);">
                <div class="modal-header border-0 pb-0">
                    <h6 class="modal-title fw-bold" style="color: var(--text);"><i class="fa-solid fa-circle-info me-2 text-muted"></i>Page Details</h6>
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close" style="filter: var(--invert-icon); font-size: 10px;"></button>
                </div>
                <div class="modal-body px-4 py-4">
                    @php
                    $currentFolderName = 'No Folder (Root)';
                    foreach($folders as $folder) {
                    if($folder->id == $page->folder_id) {
                    $currentFolderName = $folder->name;
                    break;
                    }
                    }
                    @endphp
                    <ul class="list-unstyled mb-0" style="font-size: 13px; color: var(--text2);">
                        <li class="mb-3 d-flex justify-content-between border-bottom pb-2" style="border-color: var(--border) !important;"><strong>Created:</strong> <span>{{ $page->created_at->format('M d, Y') }}</span></li>
                        <li class="mb-3 d-flex justify-content-between border-bottom pb-2" style="border-color: var(--border) !important;"><strong>Last Updated:</strong> <span>{{ $page->updated_at->format('M d, Y') }}</span></li>
                        <li class="mb-3 d-flex justify-content-between border-bottom pb-2" style="border-color: var(--border) !important;"><strong>Location:</strong> <span class="badge bg-secondary">{{ $currentFolderName }}</span></li>
                        <li class="d-flex justify-content-between text-success"><strong>Word Count:</strong> <span id="word-count-display"><i class="fa-solid fa-spinner fa-spin"></i></span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Details Modal End -->

    <!-- Page Move Modal Start -->
    <div class="modal fade" id="moveToModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content border-0 shadow-lg" style="border-radius: 12px; background-color: var(--bg-color);">
                <div class="modal-header border-0 pb-0">
                    <h6 class="modal-title fw-bold" style="color: var(--text);"><i class="fa-solid fa-folder-tree me-2 text-muted"></i>Move Page</h6>
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close" style="filter: var(--invert-icon); font-size: 10px;"></button>
                </div>
                <form id="moveToForm">
                    <div class="modal-body px-4 py-4">
                        <label class="form-label" style="font-size: 12px; color: var(--text3); font-weight: bold; text-transform: uppercase;">Select Destination</label>
                        <select class="form-select shadow-none" id="moveFolderSelect" style="background-color: var(--bg-color); border: 1px solid var(--border); color: var(--text); font-size: 14px; border-radius: 8px; cursor: pointer;">
                            <option value="">📁 No Folder (Root)</option>
                            @foreach($folders as $folder)
                            <option value="{{ $folder->id }}" {{ $page->folder_id == $folder->id ? 'selected' : '' }}>📁 {{ $folder->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="modal-footer border-0 pt-0 pb-3">
                        <button type="submit" class="btn w-100 fw-bold" style="background: var(--accent); color: #fff; font-size: 14px; border-radius: 8px; transition: 0.2s;">Confirm Move</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Page Move Modal End -->

    <!-- Save Template Modal Start -->
    <div class="modal fade" id="saveTemplateModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content border-0 shadow-lg" style="border-radius: 12px; background-color: var(--bg-color);">
                <div class="modal-header border-0 pb-0">
                    <h6 class="modal-title fw-bold" style="color: var(--text);"><i class="fa-solid fa-layer-group me-2 text-muted"></i>Save as Template</h6>
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close" style="filter: var(--invert-icon); font-size: 10px;"></button>
                </div>
                <form id="saveTemplateForm">
                    <div class="modal-body px-4 py-4">
                        <div class="mb-3">
                            <label class="form-label" style="font-size: 12px; color: var(--text3); font-weight: bold; text-transform: uppercase;">Template Name</label>
                            <input type="text" class="form-control shadow-none" id="templateNameInput" value="{{ $page->title }} (Template)" required style="background-color: var(--bg-color); border: 1px solid var(--border); color: var(--text); font-size: 14px; border-radius: 8px;">
                        </div>
                        <div>
                            <label class="form-label" style="font-size: 12px; color: var(--text3); font-weight: bold; text-transform: uppercase;">Note / Info (Optional)</label>
                            <textarea class="form-control shadow-none" id="templateDescInput" rows="2" placeholder="e.g. Use this for weekly reports..." style="background-color: var(--bg-color); border: 1px solid var(--border); color: var(--text); font-size: 14px; border-radius: 8px;"></textarea>
                            <small style="font-size: 11px; color: var(--text3);">*Notes will be saved inside the template content.</small>
                        </div>
                    </div>
                    <div class="modal-footer border-0 pt-0 pb-3">
                        <button type="submit" class="btn w-100 fw-bold" style="background: var(--accent); color: #fff; font-size: 14px; border-radius: 8px; transition: 0.2s;">Save Template</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Save Template Modal End -->

</main>

<script>
    // ==========================================
    // 1. Data Parsing
    // ==========================================
    let editorData = {};
    const rawData = <?php echo json_encode($page->content); ?>;
    if (rawData) {
        try {
            editorData = JSON.parse(rawData);
        } catch (e) {
            console.error("Editor data parsing error:", e);
        }
    }

    // ==========================================
    // 2. Custom Tool: Kanban Board
    // ==========================================
    class KanbanTool {
        static get toolbox() {
            return {
                title: 'Board',
                icon: '<svg width="18" height="18" viewBox="0 0 24 24"><path fill="currentColor" d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zM9 17H7V7h2v10zm4-5h-2V7h2v5zm4 3h-2V7h2v8z"/></svg>'
            };
        }

        constructor({
            data,
            api
        }) {
            this.api = api;
            this.data = data && data.columns ? data : {
                columns: [{
                        title: 'To Do',
                        cards: [{
                            title: 'New Task',
                            desc: 'Type description...',
                            tag: 'High',
                            progress: 0,
                            date: 'Today'
                        }]
                    },
                    {
                        title: 'In Progress',
                        cards: []
                    },
                    {
                        title: 'Done',
                        cards: []
                    }
                ]
            };
            this.wrapper = undefined;
        }

        render() {
            this.wrapper = document.createElement('div');
            this.wrapper.classList.add('kanban-board-wrapper');

            this.data.columns.forEach((column) => {
                const colEl = document.createElement('div');
                colEl.classList.add('kanban-column');

                let dotColor = '#cbd5e1';
                let colName = column.title.toLowerCase();
                if (colName.includes('progress')) dotColor = '#3b82f6';
                if (colName.includes('done')) dotColor = '#10b981';

                const header = document.createElement('div');
                header.classList.add('kanban-column-header');
                header.innerHTML = `
                    <div class="d-flex align-items-center">
                        <div style="width: 8px; height: 8px; border-radius: 50%; background: ${dotColor}; margin-right: 8px;"></div>
                        <span class="column-title" contenteditable="true">${column.title}</span>
                        <span class="card-count">${column.cards.length}</span>
                    </div>
                    <button class="add-card-btn" title="Add Task"><i class="fa-solid fa-plus"></i></button>
                `;
                colEl.appendChild(header);

                const cardsContainer = document.createElement('div');
                cardsContainer.classList.add('kanban-cards-container');

                column.cards.forEach(card => {
                    cardsContainer.appendChild(this.createCard(card.title, card.desc, card.tag, card.progress, card.date));
                });

                colEl.appendChild(cardsContainer);
                this.wrapper.appendChild(colEl);

                new Sortable(cardsContainer, {
                    group: 'kanban',
                    animation: 150,
                    ghostClass: 'kanban-ghost',
                    onEnd: () => {
                        this.updateCounts();
                        savePageData();
                    }
                });

                header.querySelector('.add-card-btn').addEventListener('click', () => {
                    const newCard = this.createCard('New Task', 'Description...', 'Low', 0, 'Today');
                    cardsContainer.prepend(newCard);
                    this.updateCounts();
                    savePageData();
                });
            });

            return this.wrapper;
        }

        createCard(title, desc = '', tag = 'Low', progress = 0, date = 'Today') {
            const card = document.createElement('div');
            card.classList.add('kanban-card');

            let tagBg = 'var(--accent2)',
                tagColor = 'var(--text)';
            if (tag.toLowerCase() === 'high') {
                tagBg = '#ef444420';
                tagColor = '#ef4444';
            } else if (tag.toLowerCase() === 'medium') {
                tagBg = '#f59e0b20';
                tagColor = '#f59e0b';
            } else if (tag.toLowerCase() === 'low') {
                tagBg = '#10b98120';
                tagColor = '#10b981';
            }

            let progressColor = '#ef4444';
            if (progress === 100) progressColor = '#10b981';
            else if (progress >= 70) progressColor = '#3b82f6';
            else if (progress >= 40) progressColor = '#f59e0b';

            card.innerHTML = `
                <div class="d-flex justify-content-between align-items-start mb-2">
                    <div class="card-tag" style="background:${tagBg}; color:${tagColor}; cursor: pointer; user-select: none;">${tag}</div>
                    <i class="fa-solid fa-trash-can delete-card" title="Delete Task"></i>
                </div>
                <div class="card-title" contenteditable="true">${title}</div>
                <div class="card-desc" contenteditable="true">${desc}</div>
                <div class="card-progress-wrapper">
                    <div class="card-progress-text"><span>Progress</span><span class="progress-val" contenteditable="true">${progress}%</span></div>
                    <div class="card-progress-bar"><div class="card-progress-fill" style="width: ${progress}%; background: ${progressColor};"></div></div>
                </div>
                <div class="card-footer-meta">
                    <div class="card-date" contenteditable="true"><i class="fa-regular fa-calendar"></i> ${date}</div>
                    <div class="card-avatars"><div class="card-avatar" style="z-index: 2; margin-left: 0;">IA</div><div class="card-avatar" style="z-index: 1;">+2</div></div>
                </div>
            `;

            card.querySelector('.delete-card').addEventListener('click', (e) => {
                e.target.closest('.kanban-card').remove();
                this.updateCounts();
                savePageData();
            });

            card.querySelector('.card-tag').addEventListener('click', (e) => {
                let currentTag = e.target.innerText.trim().toLowerCase();
                let newTag, newBg, newColor;
                if (currentTag === 'low') {
                    newTag = 'Medium';
                    newBg = '#f59e0b20';
                    newColor = '#f59e0b';
                } else if (currentTag === 'medium') {
                    newTag = 'High';
                    newBg = '#ef444420';
                    newColor = '#ef4444';
                } else {
                    newTag = 'Low';
                    newBg = '#10b98120';
                    newColor = '#10b981';
                }
                e.target.innerText = newTag;
                e.target.style.background = newBg;
                e.target.style.color = newColor;
                savePageData();
            });

            const progressVal = card.querySelector('.progress-val');
            const progressFill = card.querySelector('.card-progress-fill');
            progressVal.addEventListener('input', (e) => {
                let val = parseInt(e.target.innerText.replace('%', ''));
                if (!isNaN(val)) {
                    if (val > 100) val = 100;
                    if (val < 0) val = 0;
                    progressFill.style.width = val + '%';
                    if (val === 100) progressFill.style.background = '#10b981';
                    else if (val >= 70) progressFill.style.background = '#3b82f6';
                    else if (val >= 40) progressFill.style.background = '#f59e0b';
                    else progressFill.style.background = '#ef4444';
                }
            });

            card.addEventListener('input', () => {
                clearTimeout(window.cardSaveTimeout);
                window.cardSaveTimeout = setTimeout(() => savePageData(), 1000);
            });

            return card;
        }

        updateCounts() {
            this.wrapper.querySelectorAll('.kanban-column').forEach(col => {
                col.querySelector('.card-count').innerText = col.querySelectorAll('.kanban-card').length;
            });
        }

        save(blockContent) {
            const columns = [];
            blockContent.querySelectorAll('.kanban-column').forEach(colEl => {
                const title = colEl.querySelector('.column-title').innerText;
                const cards = [];
                colEl.querySelectorAll('.kanban-card').forEach(cardEl => {
                    cards.push({
                        title: cardEl.querySelector('.card-title').innerText,
                        desc: cardEl.querySelector('.card-desc').innerText,
                        tag: cardEl.querySelector('.card-tag').innerText,
                        progress: parseInt(cardEl.querySelector('.progress-val').innerText.replace('%', '')) || 0,
                        date: cardEl.querySelector('.card-date').innerText.trim()
                    });
                });
                columns.push({
                    title,
                    cards
                });
            });
            return {
                columns
            };
        }
    }

    // ==========================================
    // 3. Custom Tool: Database Table
    // ==========================================
    class DatabaseTool {
        static get toolbox() {
            return {
                title: 'Database',
                icon: '<svg width="18" height="18" viewBox="0 0 24 24"><path fill="currentColor" d="M4 4h16v2H4zm0 4h16v12H4zM2 4c0-1.1.9-2 2-2h16c1.1 0 2 .9 2 2v16c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V4zm4 6v2h12v-2H6zm0 4v4h12v-4H6z"/></svg>'
            };
        }

        constructor({
            data,
            api
        }) {
            this.api = api;
            this.tableData = data && data.tableData && data.tableData.length > 0 ? data.tableData : [{
                id: 1,
                task: "TASK-1001",
                title: "New Database Task",
                status: "To Do",
                priority: "Medium"
            }];
            this.wrapper = undefined;
            this.table = undefined;
        }

        render() {
            this.wrapper = document.createElement('div');
            this.wrapper.classList.add('database-tool-wrapper', 'mt-4', 'mb-4');

            const header = document.createElement('div');
            header.classList.add('d-flex', 'justify-content-between', 'align-items-center', 'mb-2');
            header.innerHTML = `<div class="fw-bold text-muted" style="font-size: 14px;"><i class="fa-solid fa-table me-2"></i> Table View</div><div><button class="btn btn-sm btn-light add-row-btn" style="font-size: 12px; font-weight: 600;">+ New</button></div>`;
            this.wrapper.appendChild(header);

            const tableContainer = document.createElement('div');
            this.wrapper.appendChild(tableContainer);

            setTimeout(() => {
                this.table = new Tabulator(tableContainer, {
                    data: this.tableData,
                    layout: "fitColumns",
                    responsiveLayout: "hide",
                    history: true,
                    columns: [{
                            title: "Task ID",
                            field: "task",
                            editor: "input",
                            width: 120,
                            cssClass: "fw-bold text-primary"
                        },
                        {
                            title: "Title",
                            field: "title",
                            editor: "input"
                        },
                        {
                            title: "Status",
                            field: "status",
                            width: 150,
                            editor: "list",
                            editorParams: {
                                values: ["To Do", "In Progress", "Done", "Blocked", "Backlog"]
                            },
                            formatter: this.statusFormatter
                        },
                        {
                            title: "Priority",
                            field: "priority",
                            width: 130,
                            editor: "list",
                            editorParams: {
                                values: ["High", "Medium", "Low"]
                            },
                            formatter: this.priorityFormatter
                        },
                        {
                            title: "",
                            formatter: "buttonCross",
                            width: 40,
                            align: "center",
                            headerSort: false,
                            cellClick: (e, cell) => {
                                cell.getRow().delete();
                                savePageData();
                            }
                        }
                    ],
                });
                this.table.on("cellEdited", () => {
                    savePageData();
                });
            }, 100);

            header.querySelector('.add-row-btn').addEventListener('click', () => {
                const newId = this.table.getData().length + 1;
                this.table.addRow({
                    id: newId,
                    task: "TASK-100" + newId,
                    title: "",
                    status: "To Do",
                    priority: "Low"
                }, true);
                savePageData();
            });

            return this.wrapper;
        }

        statusFormatter(cell) {
            let value = cell.getValue();
            let color = value === 'Done' ? '#10b981' : (value === 'In Progress' ? '#3b82f6' : '#64748b');
            return `<span style="color: ${color}; font-weight: 600; font-size: 13px;">${value || ''}</span>`;
        }

        priorityFormatter(cell) {
            let value = cell.getValue();
            let icon = value === 'High' ? '↑' : (value === 'Medium' ? '→' : '↓');
            let color = value === 'High' ? '#ef4444' : (value === 'Medium' ? '#f59e0b' : '#3b82f6');
            return `<span style="color: ${color}; font-weight: 600; font-size: 13px;">${icon} ${value || ''}</span>`;
        }

        save() {
            return {
                tableData: this.table ? this.table.getData() : this.tableData
            };
        }
    }

    // ==========================================
    // 4. Initialize Editor.js
    // ==========================================
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
                class: EditorjsList,
                inlineToolbar: true
            },
            checklist: {
                class: Checklist,
                inlineToolbar: true
            },
            table: {
                class: Table,
                inlineToolbar: true
            },
            board: {
                class: KanbanTool
            },
            database: {
                class: DatabaseTool
            },
            quote: {
                class: Quote,
                inlineToolbar: true,
                config: {
                    quotePlaceholder: 'Enter a quote',
                    captionPlaceholder: 'Author'
                }
            },
            code: CodeTool,
            image: SimpleImage,
        },
        onChange: () => {
            savePageData();
        }
    });

    // ==========================================
    // 5. Auto-Save & API Logic (Dynamic Status)
    // ==========================================
    const statusText = document.getElementById('status-text');
    const statusIcon = document.getElementById('status-icon');
    const statusIndicator = document.getElementById('status-indicator');

    function setStatus(state) {
        if (state === 'saving') {
            statusText.innerText = 'Saving...';
            statusIcon.className = 'fa-solid fa-spinner fa-spin text-muted';
            statusIndicator.style.background = 'var(--accent2)';
        } else if (state === 'saved') {
            statusText.innerText = 'Saved';
            statusIcon.className = 'fa-solid fa-check text-success';
            statusIndicator.style.background = 'var(--accent2)';
        } else if (state === 'error') {
            statusText.innerText = 'Save Failed';
            statusIcon.className = 'fa-solid fa-circle-exclamation text-danger';
            statusIndicator.style.background = '#ef444420';
        }
    }

    async function savePageData() {
        setStatus('saving');
        try {
            const savedData = await editor.save();
            const title = document.getElementById('page-title').value;
            const response = await axios.post("{{ route('pages.update', $page->id) }}", {
                title: title,
                content: JSON.stringify(savedData),
                _token: "{{ csrf_token() }}"
            });
            if (response.data.success) {
                setTimeout(() => setStatus('saved'), 500);
            }
        } catch (error) {
            setStatus('error');
        }
    }

    // ==========================================
    // 🔥 1. Auto-Save & Title Sync Logic 🔥
    // ==========================================
    let titleSaveTimeout;
    document.getElementById('page-title')?.addEventListener('input', function() {

        const activeSidebarItems = document.querySelectorAll('.sidebar-menu-item.active .text-truncate');
        activeSidebarItems.forEach(item => {
            item.innerText = this.value || 'Untitled Page';
        });

        setStatus('saving');
        clearTimeout(titleSaveTimeout);
        titleSaveTimeout = setTimeout(() => {
            savePageData();
        }, 1000);
    });

    // ==========================================
    // 🔥 Dynamic Favorite & Real-Time Sidebar Logic 🔥
    // ==========================================
    document.getElementById('btn-favorite')?.addEventListener('click', async function() {
        const icon = this.querySelector('i');
        const isFavorited = this.getAttribute('data-favorited') === 'true';

        const pageId = "{{ $page->id }}";
        const pageTitle = document.getElementById('page-title').value || 'Untitled Page';
        const editRoute = "{{ route('pages.edit', $page->id) }}";

        const favList = document.getElementById('sidebar-favorites-list');
        let noFavText = document.getElementById('no-favorites-text');

        if (isFavorited) {
            icon.classList.remove('fa-solid', 'text-warning');
            icon.classList.add('fa-regular');
            icon.style.transform = 'scale(1)';
            this.setAttribute('data-favorited', 'false');

            const existingItem = document.querySelector(`.sidebar-menu-item[data-fav-id="${pageId}"]`);
            if (existingItem) existingItem.remove();

            if (favList && favList.children.length === 0) {
                favList.innerHTML = '<div class="ps-3 text-muted" id="no-favorites-text" style="font-size: 12px;">No favorites yet</div>';
            }

        } else {
            icon.classList.remove('fa-regular');
            icon.classList.add('fa-solid', 'text-warning');
            icon.style.transform = 'scale(1.2)';
            setTimeout(() => icon.style.transform = 'scale(1)', 200);
            this.setAttribute('data-favorited', 'true');

            if (noFavText) noFavText.remove();

            if (favList && !document.querySelector(`.sidebar-menu-item[data-fav-id="${pageId}"]`)) {
                const newItem = document.createElement('a');
                newItem.href = editRoute;
                newItem.className = 'sidebar-menu-item active';
                newItem.setAttribute('data-fav-id', pageId);
                newItem.innerHTML = `
                    <i class="fa-solid fa-star text-warning"></i>
                    <span class="text-truncate">${pageTitle}</span>
                `;
                favList.prepend(newItem);
            }
        }

        // 2. API Call to backend
        try {
            await axios.post("{{ route('pages.favorite', $page->id) }}", {
                is_favorite: !isFavorited,
                _token: "{{ csrf_token() }}"
            });
        } catch (error) {
            console.error('Favorite API failed. UI is out of sync.');
        }
    });


    document.getElementById('cover-input').addEventListener('change', async function() {
        if (!this.files || this.files.length === 0) return;
        const formData = new FormData();
        formData.append('cover_image', this.files[0]);
        formData.append('_token', "{{ csrf_token() }}");
        document.getElementById('status-text').innerText = 'Uploading Cover...';

        try {
            const response = await axios.post("{{ route('pages.update', $page->id) }}", formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            });
            if (response.data.success) {
                let coverWrapper = document.querySelector('.cover-image-wrapper');
                let existingImg = document.getElementById('cover-preview');
                if (existingImg) {
                    existingImg.src = response.data.cover_image;
                } else {
                    const icon = coverWrapper.querySelector('.fa-image');
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
            }
        } catch (error) {
            document.getElementById('status-text').innerText = 'Upload failed';
        }
    });

    // ==========================================
    // 6. Productivity Shortcuts Logic
    // ==========================================
    document.getElementById('btn-add-board').addEventListener('click', () => {
        editor.blocks.insert('board');
        window.scrollTo({
            top: document.body.scrollHeight,
            behavior: 'smooth'
        });
    });

    document.getElementById('btn-add-table').addEventListener('click', () => {
        editor.blocks.insert('database');
        window.scrollTo({
            top: document.body.scrollHeight,
            behavior: 'smooth'
        });
    });

    document.getElementById('btn-add-checklist').addEventListener('click', () => {
        editor.blocks.insert('checklist');
        window.scrollTo({
            top: document.body.scrollHeight,
            behavior: 'smooth'
        });
    });

    document.getElementById('btn-focus-mode').addEventListener('click', function() {
        document.body.classList.toggle('focus-mode');
        if (document.body.classList.contains('focus-mode')) {
            this.innerHTML = '<i class="fa-solid fa-compress"></i>';
            this.title = "Exit Focus Mode";
        } else {
            this.innerHTML = '<i class="fa-solid fa-expand"></i>';
            this.title = "Toggle Focus Mode";
        }
    });

    async function deletePage(id) {
        if (confirm('Are you sure you want to delete this page? This cannot be undone.')) {
            try {
                const response = await axios.post(`/pages/${id}`, {
                    _method: 'DELETE',
                    _token: "{{ csrf_token() }}"
                });
                if (response.data.success) window.location.href = "{{ route('admin.chronology') }}";
            } catch (error) {
                alert('Error deleting page.');
            }
        }
    }

    // ==========================================
    // 🌟 Universal Sidebar Toggle Script 🌟
    // ==========================================
    document.addEventListener("DOMContentLoaded", function() {
        const sidebar = document.getElementById('chronologySidebar');
        const overlay = document.getElementById('sidebarOverlay');
        const toggleBtn = document.getElementById('sidebarToggle');
        const closeBtn = document.getElementById('mobileSidebarClose');
        const floatingFooter = document.querySelector('.floating-footer');

        if (toggleBtn && sidebar && overlay) {

            const openMobileSidebar = () => {
                sidebar.classList.add('show-mobile');
                overlay.classList.add('show');
                document.body.style.overflow = 'hidden';
            };
            const closeMobileSidebar = () => {
                sidebar.classList.remove('show-mobile');
                overlay.classList.remove('show');
                document.body.style.overflow = '';
            };

            const toggleDesktopSidebar = () => {
                sidebar.classList.toggle('desktop-collapsed');
                if (floatingFooter) {
                    floatingFooter.classList.toggle('desktop-expanded');
                }

                // 🔥 Fix 2 & 3: Toggling width on the main area to remove right-side gap 🔥
                const editorMain = document.querySelector('.editor-main-area');
                if (editorMain) {
                    editorMain.classList.toggle('desktop-expanded');
                }
            };

            toggleBtn.addEventListener('click', () => {
                if (window.innerWidth < 1200) {
                    openMobileSidebar();
                } else {
                    toggleDesktopSidebar();
                }
            });

            if (closeBtn) closeBtn.addEventListener('click', closeMobileSidebar);
            overlay.addEventListener('click', closeMobileSidebar);

            window.addEventListener('resize', () => {
                if (window.innerWidth >= 1200) {
                    closeMobileSidebar();
                }
            });
        }
    });


    // ==========================================
    // 🔥 Share Modal & Copy Link Logic 🔥
    // ==========================================
    const publishToggle = document.getElementById('publishToggle');
    const shareLinkContainer = document.getElementById('shareLinkContainer');
    const copyLinkBtn = document.getElementById('copyLinkBtn');
    const publicLinkInput = document.getElementById('publicLinkInput');
    const copySuccessText = document.getElementById('copySuccessText');

    publishToggle?.addEventListener('change', async function() {
        const isPublished = this.checked;

        // UI Update
        if (isPublished) {
            shareLinkContainer.style.opacity = '1';
            shareLinkContainer.style.pointerEvents = 'auto';
        } else {
            shareLinkContainer.style.opacity = '0.4';
            shareLinkContainer.style.pointerEvents = 'none';
        }

        // Backend Update (ভবিষ্যতের জন্য API রেডি রাখা হলো)
        /*
        try {
            await axios.post("{{ route('pages.update', $page->id) }}", {
                is_published: isPublished,
                _token: "{{ csrf_token() }}"
            });
        } catch (error) {
            console.error('Failed to update publish status');
        }
        */
    });

    copyLinkBtn?.addEventListener('click', function() {
        // Copy to clipboard
        navigator.clipboard.writeText(publicLinkInput.value).then(() => {
            // Button Animation
            const originalHtml = this.innerHTML;
            this.innerHTML = '<i class="fa-solid fa-check text-success"></i> Copied';
            copySuccessText.classList.remove('d-none');

            setTimeout(() => {
                this.innerHTML = originalHtml;
                copySuccessText.classList.add('d-none');
            }, 2000);
        });
    });

    // ==========================================
    // 🔥 Export as PDF Logic (Ultimate Fix) 🔥
    // ==========================================
    document.getElementById('exportPdfBtn')?.addEventListener('click', function(e) {
        e.preventDefault();

        const btn = this;
        const originalHtml = btn.innerHTML;
        btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin text-muted"></i> Generating...';

        const element = document.getElementById('printableArea');
        const pageTitle = document.getElementById('page-title').value || 'Traders_SME_Document';

        document.body.classList.add('exporting-pdf');

        setTimeout(() => {
            const opt = {
                margin: [0.5, 0],
                filename: pageTitle + '.pdf',
                image: {
                    type: 'jpeg',
                    quality: 1
                },
                html2canvas: {
                    scale: 2,
                    useCORS: true,
                    windowWidth: 800,
                    x: 0,
                    y: 0,
                    scrollY: 0
                },
                jsPDF: {
                    unit: 'in',
                    format: 'a4',
                    orientation: 'portrait'
                }
            };

            html2pdf().set(opt).from(element).save().then(() => {
                document.body.classList.remove('exporting-pdf');
                btn.innerHTML = originalHtml;
            }).catch(err => {
                console.error("PDF Export Error:", err);
                alert("Something went wrong while exporting PDF.");
                document.body.classList.remove('exporting-pdf');
                btn.innerHTML = originalHtml;
            });

        }, 300);
    });

    // ==========================================
    // 🔥 Page Details & Word Count Logic 🔥
    // ==========================================
    const pageDetailsModal = document.getElementById('pageDetailsModal');
    if (pageDetailsModal) {
        pageDetailsModal.addEventListener('show.bs.modal', async function() {
            const wordCountDisplay = document.getElementById('word-count-display');
            wordCountDisplay.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i>';

            try {
                const savedData = await editor.save();
                let text = '';

                savedData.blocks.forEach(block => {
                    if (block.type === 'paragraph' || block.type === 'header' || block.type === 'quote') {
                        text += block.data.text + ' ';
                    } else if (block.type === 'list') {
                        text += block.data.items.join(' ') + ' ';
                    }
                });

                const cleanText = text.replace(/<[^>]*>?/gm, '').trim();
                const wordCount = cleanText ? cleanText.split(/\s+/).length : 0;

                wordCountDisplay.innerText = wordCount + ' Words';
            } catch (error) {
                wordCountDisplay.innerText = 'Error';
            }
        });
    }

    // ==========================================
    // 🔥 Move Page Logic 🔥
    // ==========================================
    document.getElementById('moveToForm')?.addEventListener('submit', async function(e) {
        e.preventDefault();

        const btn = this.querySelector('button[type="submit"]');
        const originalText = btn.innerText;
        btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Moving...';
        btn.disabled = true;

        const folderId = document.getElementById('moveFolderSelect').value;

        try {
            const response = await axios.post("{{ route('pages.move', $page->id) }}", {
                folder_id: folderId,
                _token: "{{ csrf_token() }}"
            });

            if (response.data.success) {
                window.location.reload();
            }
        } catch (error) {
            alert('Failed to move page. Please try again.');
            btn.innerText = originalText;
            btn.disabled = false;
        }
    });

    // ==========================================
    // 🔥 Save as Template Logic (Smart Modal) 🔥
    // ==========================================
    document.getElementById('saveTemplateForm')?.addEventListener('submit', async function(e) {
        e.preventDefault();

        const btn = this.querySelector('button[type="submit"]');
        const originalText = btn.innerText;

        btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Saving...';
        btn.disabled = true;

        const templateName = document.getElementById('templateNameInput').value;
        const templateNote = document.getElementById('templateDescInput').value;

        try {
            const savedData = await editor.save();

            if (templateNote.trim() !== '') {
                savedData.blocks.unshift({
                    type: "paragraph",
                    data: {
                        text: `<i><b>Template Note:</b> ${templateNote}</i>`
                    }
                });
            }

            const response = await axios.post("{{ route('pages.saveAsTemplate', $page->id) }}", {
                title: templateName,
                content: JSON.stringify(savedData),
                _token: "{{ csrf_token() }}"
            });

            if (response.data.success) {
                btn.innerHTML = '<i class="fa-solid fa-check"></i> Saved!';
                setTimeout(() => {
                    window.location.reload();
                }, 1000);
            }
        } catch (error) {
            alert('Failed to save template. Please try again.');
            btn.innerHTML = originalText;
            btn.disabled = false;
        }
    });
</script>
@endsection