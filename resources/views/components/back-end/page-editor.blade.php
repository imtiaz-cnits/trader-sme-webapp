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
    /* ==========================================
       Editor.js Dark Mode Overrides
       ========================================== */
    .ce-block__content,
    .ce-toolbar__content {
        color: var(--text);
    }

    .ce-header,
    .ce-paragraph {
        color: var(--text);
    }

    .cdx-input {
        background: var(--bg-color) !important;
        color: var(--text) !important;
        border-color: var(--border) !important;
    }

    .ce-inline-toolbar,
    .ce-popover,
    .ce-conversion-toolbar {
        background-color: var(--bg-color);
        border: 1px solid var(--border);
    }

    .ce-inline-toolbar__dropdown:hover,
    .ce-inline-tool:hover,
    .ce-popover-item:hover,
    .ce-conversion-tool:hover {
        background-color: var(--accent2) !important;
    }

    .ce-inline-tool,
    .ce-popover-item,
    .ce-conversion-tool {
        color: var(--text);
    }

    .ce-toolbar__settings-btn,
    .ce-toolbar__plus {
        color: var(--text2);
    }

    .ce-toolbar__settings-btn:hover,
    .ce-toolbar__plus:hover {
        color: var(--text);
        background: var(--accent2);
    }

    .ce-popover-item__icon,
    .ce-conversion-tool__icon {
        background-color: var(--accent2);
        color: var(--text);
        border-color: var(--border);
    }

    .cdx-checklist__item-text {
        color: var(--text);
    }

    .cdx-checklist__item-checkbox {
        border-color: var(--border);
        background: var(--bg-color);
    }

    .cdx-checklist__item--checked .cdx-checklist__item-checkbox {
        background: var(--accent);
        border-color: var(--accent);
    }

    .cdx-checklist__item--checked .cdx-checklist__item-text {
        text-decoration: line-through;
        color: var(--text3);
    }

    /* ==================================================
       🌟 1. Editor.js Basic Table Dark Mode Fix 🌟
       ================================================== */
    .editor-wrapper .tc-wrap,
    .editor-wrapper .tc-table,
    .editor-wrapper .tc-row,
    .editor-wrapper .tc-cell,
    .editor-wrapper .tc-toolbox {
        background-color: var(--bg-color) !important;
        color: var(--text) !important;
        border-color: var(--border) !important;
    }

    .editor-wrapper .tc-cell {
        border: 1px solid var(--border) !important;
    }

    .editor-wrapper .tc-toolbox:hover {
        background-color: var(--accent2) !important;
    }

    .tc-add-column,
    .tc-add-row {
        background-color: var(--bg-color) !important;
        transition: 0.2s;
    }

    .tc-add-column svg path,
    .tc-add-row svg path {
        stroke: var(--text) !important;
    }

    .tc-add-column:hover,
    .tc-add-row:hover {
        background-color: var(--accent2) !important;
    }

    [data-theme="dark"] .tc-add-column {
        background-color: #ffffff !important;
    }

    [data-theme="dark"] .tc-add-column svg path {
        stroke: #000 !important;
    }

    [data-theme="dark"] .tc-add-row svg path {
        stroke: #fff !important;
    }

    [data-theme="dark"] .tc-add-column:hover,
    [data-theme="dark"] .tc-add-row:hover {
        background-color: #e4e4e7 !important;
    }

    /* 🔥 Table Popover / Settings Menu Fix (100% Forceful) 🔥 */
    [data-theme="dark"] .tc-popover {
        background-color: var(--bg-color) !important;
        border: 1px solid var(--border) !important;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5) !important;
    }

    [data-theme="dark"] .tc-popover__item {
        background-color: var(--bg-color) !important;
        color: var(--text) !important;
    }

    [data-theme="dark"] .tc-popover__item:hover {
        background-color: var(--accent2) !important;
    }

    [data-theme="dark"] .tc-popover__item-icon {
        background-color: var(--accent2) !important;
        border-color: var(--border) !important;
        color: var(--text) !important;
    }

    [data-theme="dark"] .tc-popover__item-label {
        color: var(--text) !important;
    }

    /* ==========================================
       Global & Layout Styles
       ========================================== */
    .editor-wrapper {
        font-family: var(--primary-font, 'Inter', sans-serif);
        background-color: var(--bg-color);
        color: var(--text);
        min-height: 100vh;
        overflow: visible !important;
        overflow-x: clip !important;
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

    .editor-topbar {
        padding-bottom: 12px;
        margin-bottom: 24px;
        border-bottom: 1px solid var(--border);
    }

    .breadcrumb-text {
        font-size: 14px;
        color: var(--text3);
        font-weight: 500;
        white-space: nowrap;
    }

    .breadcrumb-text.active {
        color: var(--text);
        font-weight: 600;
    }

    .action-btn {
        background: transparent;
        border: 1px solid var(--border);
        color: var(--text2);
        padding: 6px 12px;
        border-radius: 6px;
        font-size: 14px;
        font-weight: 500;
        transition: 0.2s;
        white-space: nowrap;
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

    .ce-block__content,
    .ce-toolbar__content {
        max-width: 100% !important;
    }

    .codex-editor--empty .ce-block::before {
        color: var(--text3);
    }

    /* 🔥 Hide Scrollbar Utility (Fix 1) 🔥 */
    .hide-scrollbar::-webkit-scrollbar {
        display: none;
    }

    .hide-scrollbar {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }

    /* ==========================================
       🌟 Sidebar & Layout Animations (FIXED) 🌟
       ========================================== */
    .chronology-sidebar {
        background: var(--bg-color);
    }

    .chronology-sidebar::-webkit-scrollbar {
        width: 4px;
    }

    .chronology-sidebar::-webkit-scrollbar-thumb {
        background: var(--border2);
        border-radius: 4px;
    }

    .sidebar-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100vh;
        background: rgba(0, 0, 0, 0.5);
        z-index: 1055;
        display: none;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .sidebar-overlay.show {
        display: block;
        opacity: 1;
    }

    @media (min-width: 1200px) {
        .chronology-sidebar {
            width: 260px;
            min-width: 260px;
            border-right: 1px solid var(--border);
            height: calc(100vh - 80px);
            top: 80px;
            padding-right: 24px;
            z-index: 990;
            align-self: flex-start;
            margin-right: 24px;
            position: sticky !important;
            overflow-y: auto !important;

            transition: width 0.3s ease, min-width 0.3s ease, margin-right 0.3s ease, padding 0.3s ease, opacity 0.2s ease;
        }

        .chronology-sidebar::-webkit-scrollbar {
            width: 4px;
        }

        .chronology-sidebar::-webkit-scrollbar-thumb {
            background: var(--border2);
            border-radius: 4px;
        }

        .chronology-sidebar.desktop-collapsed {
            width: 0 !important;
            min-width: 0 !important;
            margin-right: 0 !important;
            padding-right: 0 !important;
            border-right: none !important;
            opacity: 0;
            pointer-events: none;
            overflow: hidden;
        }

        .editor-main-area {
            width: calc(100% - 284px);
            transition: width 0.3s ease;
            padding-bottom: 100px;
            padding-left: 60px;
            padding-right: 60px;
        }

        /* 🔥 Fixes right-side gap on desktop (Fix 2 & 3) 🔥 */
        .editor-main-area.desktop-expanded {
            width: 100% !important;
        }

        .floating-footer {
            width: calc(100% - 284px);
        }

        .floating-footer.desktop-expanded {
            width: 100% !important;
        }
    }

    @media (max-width: 1199.98px) {
        .chronology-sidebar {
            position: fixed;
            top: 0;
            left: -300px;
            height: 100vh;
            max-width: 280px;
            z-index: 1060;
            padding: 20px;
            transition: left 0.3s ease;
            box-shadow: 4px 0 15px rgba(0, 0, 0, 0.1);
        }

        .chronology-sidebar.show-mobile {
            left: 0;
        }

        .editor-main-area {
            width: 100%;
            padding-bottom: 100px;
        }

        .floating-footer {
            width: 100%;
        }
    }

    /* ==========================================
       Floating Footer & Focus Mode
       ========================================== */
    .floating-footer {
        position: fixed;
        bottom: 0;
        right: 0;
        background: var(--bg-color);
        border-top: 1px solid var(--border);
        padding: 12px 30px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        z-index: 1050;
        box-shadow: 0 -4px 20px rgba(0, 0, 0, 0.05);
        transition: width 0.3s ease;
    }

    @media (max-width: 767.98px) {
        .floating-footer {
            flex-direction: column;
            align-items: stretch;
            gap: 12px;
            padding: 12px 15px;
        }

        .quick-tools {
            display: flex;
            flex-wrap: nowrap !important;
            overflow-x: auto;
            padding-bottom: 5px;
            -webkit-overflow-scrolling: touch;
            justify-content: flex-start !important;
            width: 100%;
        }

        .quick-tools::-webkit-scrollbar {
            display: none;
        }

        .quick-tools>* {
            flex-shrink: 0;
        }

        .bottom-actions {
            width: 100%;
            justify-content: space-between;
            padding-top: 8px;
            border-top: 1px dashed var(--border);
        }

        .editor-main-area {
            padding-bottom: 140px;
        }
    }

    body.focus-mode .chronology-sidebar {
        display: none !important;
    }

    body.focus-mode .editor-topbar {
        display: none !important;
    }

    body.focus-mode .floating-footer {
        width: 100% !important;
    }

    body.focus-mode .editor-main-area {
        margin: 0 auto !important;
        max-width: 900px;
        padding-top: 30px;
    }

    /* ==========================================
       Kanban & Table Styles
       ========================================== */
    .kanban-board-wrapper {
        display: flex;
        gap: 20px;
        overflow-x: auto;
        padding-bottom: 20px;
        margin-top: 20px;
        align-items: flex-start;
        -webkit-overflow-scrolling: touch;
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
        border: 1px solid transparent;
        border-radius: 10px;
        min-width: 290px;
        max-width: 290px;
        padding: 14px;
        flex-shrink: 0;
    }

    .kanban-column-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 15px;
    }

    .kanban-column-header .column-title {
        font-size: 14px;
        font-weight: 600;
        color: var(--text);
        outline: none;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .kanban-column-header .card-count {
        background: var(--border);
        color: var(--text2);
        font-size: 11px;
        padding: 2px 8px;
        border-radius: 12px;
        margin-left: 8px;
        font-weight: 600;
    }

    .add-card-btn {
        background: transparent;
        border: none;
        color: var(--text3);
        font-size: 16px;
        cursor: pointer;
        transition: 0.2s;
        padding: 0;
    }

    .add-card-btn:hover {
        color: var(--text);
    }

    .kanban-cards-container {
        min-height: 50px;
        display: flex;
        flex-direction: column;
        gap: 12px;
    }

    .kanban-card {
        background: var(--bg-color);
        border: 1px solid var(--border);
        border-radius: 8px;
        padding: 16px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.02);
        cursor: grab;
        transition: box-shadow 0.2s, border-color 0.2s;
    }

    .kanban-card:active {
        cursor: grabbing;
    }

    .kanban-card:hover {
        border-color: var(--border2);
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
    }

    .card-tag {
        display: inline-block;
        font-size: 10px;
        font-weight: 700;
        padding: 4px 10px;
        border-radius: 4px;
        outline: none;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 12px;
    }

    .card-title {
        font-size: 14px;
        font-weight: 600;
        color: var(--text);
        outline: none;
        line-height: 1.4;
        margin-bottom: 6px;
    }

    .card-desc {
        font-size: 12px;
        color: var(--text3);
        outline: none;
        line-height: 1.5;
        margin-bottom: 16px;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .card-progress-wrapper {
        margin-bottom: 16px;
    }

    .card-progress-text {
        font-size: 11px;
        color: var(--text2);
        display: flex;
        justify-content: space-between;
        margin-bottom: 6px;
        font-weight: 500;
    }

    .card-progress-bar {
        height: 6px;
        background: var(--border);
        border-radius: 4px;
        overflow: hidden;
        width: 100%;
    }

    .card-progress-fill {
        height: 100%;
        border-radius: 4px;
        transition: width 0.3s ease;
    }

    .card-footer-meta {
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-top: 1px dashed var(--border);
        padding-top: 12px;
    }

    .card-date {
        font-size: 11px;
        color: var(--text3);
        display: flex;
        align-items: center;
        gap: 6px;
        font-weight: 500;
        outline: none;
    }

    .card-avatars {
        display: flex;
        align-items: center;
    }

    .card-avatar {
        width: 24px;
        height: 24px;
        border-radius: 50%;
        border: 2px solid var(--bg-color);
        background: var(--border2);
        color: #fff;
        font-size: 9px;
        display: flex;
        justify-content: center;
        align-items: center;
        font-weight: bold;
        margin-left: -8px;
    }

    .delete-card {
        color: var(--text3);
        cursor: pointer;
        transition: 0.2s;
        font-size: 13px;
    }

    .delete-card:hover {
        color: #ef4444;
    }

    .kanban-ghost {
        opacity: 0.4;
        background: var(--accent2);
        border: 2px dashed var(--border2);
    }

    .database-tool-wrapper .tabulator {
        background-color: var(--bg-color) !important;
        border: 1px solid var(--border) !important;
        border-radius: 8px;
        overflow: hidden;
    }

    .database-tool-wrapper .tabulator-header {
        background-color: var(--accent2) !important;
        border-bottom: 1px solid var(--border) !important;
        color: var(--text2) !important;
        font-weight: 600;
        font-size: 13px;
    }

    .database-tool-wrapper .tabulator-col {
        background-color: var(--accent2) !important;
        border-right: 1px solid var(--border) !important;
    }

    .database-tool-wrapper .tabulator-col-title {
        color: var(--text) !important;
    }

    .database-tool-wrapper .tabulator-row {
        background-color: var(--bg-color) !important;
        border-bottom: 1px solid var(--border) !important;
        color: var(--text) !important;
    }

    .database-tool-wrapper .tabulator-row.tabulator-row-even {
        background-color: var(--bg-color) !important;
    }

    .database-tool-wrapper .tabulator-row:hover {
        background-color: var(--accent2) !important;
    }

    .database-tool-wrapper .tabulator-cell {
        padding: 12px 10px;
        font-size: 14px;
        color: var(--text) !important;
        border-right: 1px solid var(--border) !important;
    }

    .database-tool-wrapper .tabulator-cell input {
        padding: 4px;
        border: 1px solid var(--border) !important;
        border-radius: 4px;
        width: 100%;
        background: var(--bg-color) !important;
        color: var(--text) !important;
    }

    .tabulator-menu {
        background-color: var(--bg-color) !important;
        border: 1px solid var(--border) !important;
    }

    .tabulator-menu-item {
        color: var(--text) !important;
    }

    .tabulator-menu-item:hover {
        background-color: var(--accent2) !important;
    }

    .tabulator-edit-list {
        background: var(--bg-color) !important;
        border: 1px solid var(--border) !important;
        color: var(--text) !important;
    }

    .tabulator-edit-list-item {
        color: var(--text) !important;
    }

    .tabulator-edit-list-item:hover {
        background: var(--accent2) !important;
    }
</style>

<main class="container-fluid px-md-4 editor-wrapper">
    <div class="d-flex flex-column flex-xl-row align-items-start w-100">

        <div class="sidebar-overlay" id="sidebarOverlay"></div>

        <div class="chronology-sidebar pt-4" id="chronologySidebar">

            <div class="d-flex justify-content-between align-items-center d-xl-none mb-4">
                <h5 class="m-0 fw-bold" style="color: var(--text);">Menu</h5>
                <button class="btn-close shadow-none" id="mobileSidebarClose" style="filter: var(--invert-icon);"></button>
            </div>

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

        <div class="flex-grow-1 editor-main-area pt-4">

            <div class="editor-topbar d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3">

                <div class="d-flex align-items-center flex-nowrap hide-scrollbar" style="overflow-x: auto; white-space: nowrap; max-width: 100%;">
                    <button class="btn btn-sm border shadow-none px-2 py-1 me-2 flex-shrink-0" id="sidebarToggle" style="background: var(--bg-color); color: var(--text);">
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

                <div class="top-actions d-flex align-items-center flex-nowrap gap-2 w-100 w-md-auto justify-content-start justify-content-md-end mt-2 mt-md-0 hide-scrollbar" style="overflow-x: auto;">
                    <span id="status-text" class="small px-3 py-1 rounded-pill flex-shrink-0" style="color: var(--text3); background: var(--accent2); font-weight: 500;">Saved</span>
                    <button class="action-btn flex-shrink-0">Share</button>
                    <button class="action-btn-icon flex-shrink-0" title="Favorite"><i class="fa-regular fa-star"></i></button>
                    <button class="action-btn-icon flex-shrink-0" title="Menu"><i class="fa-solid fa-ellipsis"></i></button>
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
                    style="font-size: clamp(24px, 5vw, 38px); box-shadow: none; background: transparent;"
                    placeholder="Untitled Page">
            </div>

            <div id="editorjs" class="mt-3" style="min-height: 50vh; font-size: 16px; transition: all 0.3s ease; line-height: 1.6;"></div>

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
    // 5. Auto-Save & API Logic
    // ==========================================
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
            if (response.data.success) document.getElementById('status-text').innerText = 'All changes saved';
        } catch (error) {
            document.getElementById('status-text').innerText = 'Error saving';
        }
    }

    let titleSaveTimeout;
    document.getElementById('page-title').addEventListener('input', () => {
        document.getElementById('status-text').innerText = 'Saving...';
        clearTimeout(titleSaveTimeout);
        titleSaveTimeout = setTimeout(() => {
            savePageData();
        }, 1000);
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
</script>
@endsection