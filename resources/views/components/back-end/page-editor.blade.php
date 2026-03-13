@extends('layout.dashboard-sidenav')
@section('title', $page->title ?? 'Draft Page')

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
<script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
<link href="https://unpkg.com/tabulator-tables@5.5.2/dist/css/tabulator.min.css" rel="stylesheet">
<script src="https://unpkg.com/tabulator-tables@5.5.2/dist/js/tabulator.min.js"></script>

<style>
    /* CSS Variables from your style.css will automatically handle Dark/Light mode */
    .editor-wrapper {
        font-family: var(--primary-font, 'Inter', sans-serif);
        background-color: var(--bg-color);
        color: var(--text);
        min-height: 100vh;
    }

    /* Sidebar Styling */
    .chronology-sidebar {
        width: 260px;
        border-right: 1px solid var(--border);
        height: calc(100vh - 80px);
        overflow-y: auto;
        padding-right: 20px;
    }

    .chronology-sidebar::-webkit-scrollbar {
        width: 4px;
    }

    .chronology-sidebar::-webkit-scrollbar-thumb {
        background: var(--border2);
        border-radius: 4px;
    }

    .sidebar-menu-item {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 10px 12px;
        border-radius: 6px;
        color: var(--text2);
        font-size: 14px;
        text-decoration: none;
        transition: 0.2s;
    }

    .sidebar-menu-item:hover,
    .sidebar-menu-item.active {
        background: var(--accent2);
        color: var(--text);
        font-weight: 500;
    }

    /* Topbar & Breadcrumb Styling */
    .editor-topbar {
        padding-bottom: 12px;
        margin-bottom: 24px;
        border-bottom: 1px solid var(--border);
    }

    .breadcrumb-text {
        font-size: 14px;
        color: var(--text3);
        font-weight: 500;
    }

    .breadcrumb-text.active {
        color: var(--text);
        font-weight: 600;
    }

    /* Floating Footer Navigation */
    .floating-footer {
        position: fixed;
        bottom: 0;
        right: 0;
        width: 100%;
        background: var(--bg-color);
        border-top: 1px solid var(--border);
        padding: 12px 30px;
        display: flex;
        justify-content: center;
        /* Centered the font tools */
        align-items: center;
        z-index: 1050;
        box-shadow: 0 -4px 20px rgba(0, 0, 0, 0.02);
        transition: width 0.3s ease;
    }

    @media (min-width: 992px) {
        .floating-footer {
            width: calc(100% - 290px);
            /* Adjusts for sidebar width */
        }
    }

    /* Action Buttons */
    .action-btn {
        background: transparent;
        border: 1px solid var(--border);
        color: var(--text2);
        padding: 6px 12px;
        border-radius: 6px;
        font-size: 14px;
        font-weight: 500;
        transition: 0.2s;
    }

    .action-btn:hover {
        background: var(--accent2);
        color: var(--text);
    }

    .action-btn-icon {
        background: transparent;
        border: none;
        color: var(--text2);
        padding: 6px 10px;
        border-radius: 6px;
        font-size: 16px;
        transition: 0.2s;
    }

    .action-btn-icon:hover {
        background: var(--accent2);
        color: var(--text);
    }

    /* Cover & Title */
    .cover-image-wrapper {
        border: 1px dashed var(--border2);
        background-color: var(--bg-color);
    }

    #page-title {
        color: var(--text);
        transition: font-family 0.3s;
    }

    #page-title::placeholder {
        color: var(--text3);
    }

    .font-selector-box select {
        color: var(--text);
    }

    /* Full Width Editor Adjustments */
    .editor-main-area {
        width: 100%;
        padding-bottom: 100px;
        margin-left: 80px;
        margin-right: 80px;
    }

    .ce-block__content,
    .ce-toolbar__content {
        max-width: 100% !important;
    }

    .codex-editor--empty .ce-block::before {
        color: var(--text3);
    }

    /* Checklist Custom Styling */
    .cdx-checklist__item--checked .cdx-checklist__item-text {
        text-decoration: line-through;
        color: var(--text3);
    }

    /* Kanban Board Modern UI Styles */
    .kanban-board-wrapper {
        display: flex;
        gap: 20px;
        overflow-x: auto;
        padding-bottom: 20px;
        margin-top: 20px;
        align-items: flex-start;
    }

    .kanban-board-wrapper::-webkit-scrollbar {
        height: 6px;
    }

    .kanban-board-wrapper::-webkit-scrollbar-thumb {
        background: var(--border2);
        border-radius: 10px;
    }

    .kanban-column {
        background-color: var(--accent2);
        border: 1px solid var(--border);
        border-radius: 10px;
        min-width: 300px;
        max-width: 300px;
        padding: 15px;
        flex-shrink: 0;
    }

    .kanban-column-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 15px;
    }

    .kanban-column-header .column-title {
        font-size: 15px;
        color: var(--text);
        outline: none;
    }

    .add-card-btn {
        background: transparent;
        border: none;
        color: var(--text3);
        font-size: 16px;
        cursor: pointer;
        transition: 0.2s;
    }

    .add-card-btn:hover {
        color: var(--text);
    }

    .kanban-cards-container {
        min-height: 50px;
    }

    .kanban-card {
        background: var(--bg-color);
        border: 1px solid var(--border);
        border-radius: 8px;
        padding: 15px;
        margin-bottom: 12px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.02);
        cursor: grab;
        transition: box-shadow 0.2s;
    }

    .kanban-card:active {
        cursor: grabbing;
    }

    .kanban-card:hover {
        border-color: var(--border2);
    }

    .card-tag {
        display: inline-block;
        font-size: 11px;
        font-weight: 600;
        padding: 3px 8px;
        border-radius: 4px;
        outline: none;
        margin-bottom: 5px;
    }

    .card-text {
        font-size: 14px;
        color: var(--text);
        outline: none;
        line-height: 1.5;
    }

    .kanban-ghost {
        opacity: 0.4;
        background: var(--accent2);
        border: 2px dashed var(--border2);
    }

    /* Database Table Modern UI Styles */
    .database-tool-wrapper .tabulator {
        background-color: transparent;
        border: 1px solid var(--border);
        border-radius: 8px;
        overflow: hidden;
    }

    .database-tool-wrapper .tabulator-header {
        background-color: var(--accent2);
        border-bottom: 1px solid var(--border);
        color: var(--text2);
        font-weight: 600;
        font-size: 13px;
    }

    .database-tool-wrapper .tabulator-row {
        background-color: transparent;
        border-bottom: 1px solid var(--border);
    }

    .database-tool-wrapper .tabulator-row:hover {
        background-color: var(--accent2) !important;
    }

    .database-tool-wrapper .tabulator-cell {
        padding: 12px 10px;
        font-size: 14px;
        color: var(--text);
    }

    .database-tool-wrapper .tabulator-cell input {
        padding: 4px;
        border: 1px solid var(--border);
        border-radius: 4px;
        width: 100%;
        background: var(--bg-color);
        color: var(--text);
    }
</style>

<main class="container-fluid px-md-4 editor-wrapper">
    <div class="d-flex flex-column flex-lg-row gap-4 mt-4">

        <div class="chronology-sidebar d-none d-lg-block">
            <div class="search-box mb-4 position-relative">
                <input type="text" class="form-control border-0" placeholder="Search..." style="background: var(--accent2); color: var(--text); padding-left: 35px; font-size: 14px; border-radius: 8px;">
                <i class="fa-solid fa-magnifying-glass position-absolute" style="color: var(--text3); left: 12px; top: 12px; font-size: 12px;"></i>
            </div>

            <div class="mb-4">
                <h6 class="mb-2 ps-2" style="color: var(--text3); font-size: 12px; font-weight: 700; text-transform: uppercase;">Pages</h6>
                @foreach($pages->take(5) as $p)
                <a href="{{ route('pages.edit', $p->id) }}" class="sidebar-menu-item {{ $p->id == $page->id ? 'active' : '' }}">
                    <i class="fa-regular fa-file-lines"></i>
                    <span class="text-truncate">{{ $p->title ?? 'Draft Page' }}</span>
                </a>
                @endforeach
            </div>

            <div class="mb-4">
                <h6 class="mb-2 ps-2" style="color: var(--text3); font-size: 12px; font-weight: 700; text-transform: uppercase;">Templates</h6>
                @foreach($templates->take(5) as $t)
                <a href="#" class="sidebar-menu-item">
                    <i class="fa-solid fa-layer-group"></i>
                    <span class="text-truncate">{{ $t->title }}</span>
                </a>
                @endforeach
            </div>
        </div>

        <div class="flex-grow-1 editor-main-area">

            <div class="editor-topbar d-flex justify-content-between align-items-center">
                <div class="breadcrumbs d-flex align-items-center gap-2">
                    <a href="{{ route('admin.chronology') }}" class="text-decoration-none breadcrumb-text">
                        <i class="fa-solid fa-book-open me-1" style="color: var(--accent);"></i> Chronology
                    </a>
                    <span style="color: var(--text3);"><i class="fa-solid fa-chevron-right" style="font-size: 10px;"></i></span>
                    <span class="breadcrumb-text active">
                        <i class="fa-regular fa-file-lines me-1"></i> {{ $page->title ?? 'Draft Page' }}
                    </span>
                </div>

                <div class="top-actions d-flex align-items-center gap-2">
                    <span id="status-text" class="small px-3 py-1 rounded-pill me-2" style="color: var(--text3); background: var(--accent2); font-weight: 500;">Saved</span>
                    <button class="action-btn">Share</button>
                    <button class="action-btn-icon" title="Favorite"><i class="fa-regular fa-star"></i></button>
                    <button class="action-btn-icon" title="Menu"><i class="fa-solid fa-ellipsis"></i></button>
                </div>
            </div>

            <div class="cover-image-wrapper mb-4 position-relative" style="height: 220px; border-radius: 12px; overflow: hidden; display: flex; align-items: center; justify-content: center;">
                @if($page->cover_image)
                <img src="{{ asset($page->cover_image) }}" id="cover-preview" style="width: 100%; height: 100%; object-fit: cover;">
                @else
                <i class="fa-regular fa-image" style="font-size: 3rem; color: var(--text3); opacity: 0.3;"></i>
                @endif
                <div class="position-absolute bottom-0 start-0 p-3 w-100" style="background: linear-gradient(transparent, rgba(0,0,0,0.6));">
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
                    style="font-size: 38px; box-shadow: none; background: transparent;"
                    placeholder="Untitled Page">
            </div>

            <div id="editorjs" class="mt-3" style="min-height: 50vh; font-size: 16px; transition: all 0.3s ease; line-height: 1.6;"></div>

        </div>
    </div>

    <div class="floating-footer">
        <div class="font-selector-box d-flex gap-2 align-items-center">
            <select id="dynamic-font-family" class="form-select form-select-sm border-0 bg-transparent shadow-none" style="width: 100px; font-weight: 500; cursor: pointer;">
                <option value="var(--primary-font)">Roboto</option>
                <option value="var(--secondary-font)">Public Sans</option>
                <option value="'Courier New', Courier, monospace">Mono</option>
            </select>
            <div style="width: 1px; height: 16px; background: var(--border);"></div>
            <select id="dynamic-font-size" class="form-select form-select-sm border-0 bg-transparent shadow-none" style="width: 90px; font-weight: 500; cursor: pointer;">
                <option value="16px">Normal</option>
                <option value="20px">Heading</option>
                <option value="14px">Small</option>
            </select>
            <div style="width: 1px; height: 16px; background: var(--border);"></div>
            <button id="dynamic-line-height" class="btn btn-sm border-0 shadow-none" style="color: var(--text); font-weight: 500;" data-state="normal">x2</button>
        </div>
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

    // ---------------------------------------------------------
    // Custom Editor.js Tool: Interactive Kanban Board
    // ---------------------------------------------------------
    class KanbanTool {
        static get toolbox() {
            return {
                title: 'Board',
                icon: '<svg width="18" height="18" viewBox="0 0 24 24"><path fill="currentColor" d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zM9 17H7V7h2v10zm4-5h-2V7h2v5zm4 3h-2V7h2v8z"/></svg>'
            };
        }

        constructor({
            data,
            config,
            api
        }) {
            this.api = api;
            // Default columns if no data exists
            this.data = data && data.columns ? data : {
                columns: [{
                        title: 'To Do',
                        cards: [{
                            text: 'New Task',
                            tag: 'High'
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

                // Column Header
                const header = document.createElement('div');
                header.classList.add('kanban-column-header');
                header.innerHTML = `
                    <div class="d-flex align-items-center gap-2">
                        <span class="column-title fw-bold" contenteditable="true">${column.title}</span>
                        <span class="badge bg-secondary rounded-pill card-count">${column.cards.length}</span>
                    </div>
                    <button class="add-card-btn" title="Add Task"><i class="fa-solid fa-plus"></i></button>
                `;
                colEl.appendChild(header);

                // Cards Container
                const cardsContainer = document.createElement('div');
                cardsContainer.classList.add('kanban-cards-container');

                column.cards.forEach(card => {
                    cardsContainer.appendChild(this.createCard(card.text, card.tag));
                });

                colEl.appendChild(cardsContainer);
                this.wrapper.appendChild(colEl);

                // Initialize SortableJS for Drag & Drop
                new Sortable(cardsContainer, {
                    group: 'kanban', // Allows dragging between different columns
                    animation: 150,
                    ghostClass: 'kanban-ghost',
                    onEnd: () => {
                        this.updateCounts();
                        savePageData(); // Auto-save on drop
                    }
                });

                // Add Card Event Listener
                header.querySelector('.add-card-btn').addEventListener('click', () => {
                    const newCard = this.createCard('New Task', 'Tag');
                    cardsContainer.prepend(newCard); // Add to top
                    this.updateCounts();
                    savePageData();
                });
            });

            return this.wrapper;
        }

        createCard(text, tag = '') {
            const card = document.createElement('div');
            card.classList.add('kanban-card');

            // Randomly assign a tag color for modern UI feel
            let tagColor = 'var(--border)';
            let textColor = 'var(--text)';
            if (tag.toLowerCase() === 'high') {
                tagColor = 'var(--text-shade3)';
                textColor = '#fff';
            }
            if (tag.toLowerCase() === 'progress') {
                tagColor = 'var(--accent)';
                textColor = '#fff';
            }

            card.innerHTML = `
                <div class="card-tag" contenteditable="true" style="background:${tagColor}; color:${textColor};">${tag}</div>
                <div class="card-text mt-2" contenteditable="true">${text}</div>
                <div class="card-actions mt-3 d-flex justify-content-between text-muted" style="font-size: 11px;">
                    <span><i class="fa-regular fa-clock me-1"></i> Just now</span>
                    <i class="fa-solid fa-trash-can delete-card" style="cursor: pointer;" title="Delete"></i>
                </div>
            `;

            // Delete Card Logic
            card.querySelector('.delete-card').addEventListener('click', (e) => {
                e.target.closest('.kanban-card').remove();
                this.updateCounts();
                savePageData();
            });

            // Auto-save on text edit
            card.addEventListener('input', () => {
                clearTimeout(window.cardSaveTimeout);
                window.cardSaveTimeout = setTimeout(() => savePageData(), 1000);
            });

            return card;
        }

        updateCounts() {
            this.wrapper.querySelectorAll('.kanban-column').forEach(col => {
                const count = col.querySelectorAll('.kanban-card').length;
                col.querySelector('.card-count').innerText = count;
            });
        }

        save(blockContent) {
            const columns = [];
            blockContent.querySelectorAll('.kanban-column').forEach(colEl => {
                const title = colEl.querySelector('.column-title').innerText;
                const cards = [];
                colEl.querySelectorAll('.kanban-card').forEach(cardEl => {
                    const text = cardEl.querySelector('.card-text').innerText;
                    const tag = cardEl.querySelector('.card-tag').innerText;
                    cards.push({
                        text,
                        tag
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

    // ---------------------------------------------------------
    // Custom Editor.js Tool: Notion-like Database Table
    // ---------------------------------------------------------
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

            // Header with buttons
            const header = document.createElement('div');
            header.classList.add('d-flex', 'justify-content-between', 'align-items-center', 'mb-2');
            header.innerHTML = `
                <div class="fw-bold text-muted" style="font-size: 14px;"><i class="fa-solid fa-table me-2"></i> Table View</div>
                <div>
                    <button class="btn btn-sm btn-light add-row-btn" style="font-size: 12px; font-weight: 600;">+ New</button>
                </div>
            `;
            this.wrapper.appendChild(header);

            // Container for Tabulator
            const tableContainer = document.createElement('div');
            this.wrapper.appendChild(tableContainer);

            // Initialize Tabulator slightly after DOM injection
            setTimeout(() => {
                this.table = new Tabulator(tableContainer, {
                    data: this.tableData,
                    layout: "fitColumns",
                    responsiveLayout: "hide",
                    history: true, // Enable undo/redo
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

                // Auto-save when any cell is edited
                this.table.on("cellEdited", () => {
                    savePageData();
                });
            }, 100);

            // Add new row logic
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

        // Custom Formatters for Badges
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
                class: EditorjsList,
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
            board: {
                class: KanbanTool,
            },
            database: {
                class: DatabaseTool,
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
            }
        } catch (error) {
            document.getElementById('status-text').innerText = 'Error saving';
        }
    }

    // 4. Trigger auto-save when title is changed
    let titleSaveTimeout;
    document.getElementById('page-title').addEventListener('input', () => {
        document.getElementById('status-text').innerText = 'Saving...';

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
    // 6. DYNAMIC TYPOGRAPHY LOGIC
    // ==========================================
    const editorContainer = document.getElementById('editorjs');
    const titleInput = document.getElementById('page-title');

    // Font Family Change
    document.getElementById('dynamic-font-family').addEventListener('change', function() {
        editorContainer.style.fontFamily = this.value;
        titleInput.style.fontFamily = this.value;
    });

    // Font Size Change
    document.getElementById('dynamic-font-size').addEventListener('change', function() {
        editorContainer.style.fontSize = this.value;
    });

    // Line Spacing (x2 Button) Toggle
    document.getElementById('dynamic-line-height').addEventListener('click', function() {
        if (this.dataset.state === 'normal') {
            editorContainer.style.lineHeight = '2.5'; // Extra space
            this.dataset.state = 'x2';
            this.innerText = 'x1';
            this.style.background = 'var(--border)';
        } else {
            editorContainer.style.lineHeight = '1.6'; // Normal space
            this.dataset.state = 'normal';
            this.innerText = 'x2';
            this.style.background = 'transparent';
        }
    });
</script>
@endsection