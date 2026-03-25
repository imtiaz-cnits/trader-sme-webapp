<link rel="stylesheet" href="{{ asset('back-end/assets/css/sidebar.css?v=1.0') }}">

<div class="sidebar-overlay" id="sidebarOverlay"></div>

<div class="chronology-sidebar pt-4" id="chronologySidebar">

    <div class="d-flex justify-content-between align-items-center d-xl-none mb-4 px-2">
        <h5 class="m-0 fw-bold dashboard-title" style="color: var(--text);">Menu</h5>
        <button class="btn-close shadow-none" id="mobileSidebarClose" style="filter: var(--invert-icon);"></button>
    </div>

    <div class="mb-4">
        <h6 class="mb-2 ps-2" style="color: var(--text3); font-size: 12px; font-weight: 700; text-transform: uppercase;">Favorites</h6>

        <div id="sidebar-favorites-list">
            @forelse(collect($favorites ?? [])->take(5) as $fav)
            <a href="{{ route('pages.edit', $fav->id) }}" class="sidebar-menu-item {{ isset($page) && $page->id == $fav->id ? 'active' : '' }}" data-fav-id="{{ $fav->id }}">
                <i class="fa-solid fa-star text-warning"></i>
                <span class="text-truncate">{{ $fav->title }}</span>
            </a>
            @empty
            <div class="ps-3 text-muted" id="no-favorites-text" style="font-size: 12px;">No favorites yet</div>
            @endforelse
        </div>

        @if(collect($favorites ?? [])->count() > 5)
        <a href="{{ route('admin.chronology') }}" class="ms-3 mt-2 d-inline-block text-decoration-none fw-bold" style="font-size: 11px; color: var(--accent);">
            View All {{ collect($favorites)->count() }} Favorites &rarr;
        </a>
        @endif
    </div>

    <div class="mb-4">
        <h6 class="mb-2 ps-2" style="color: var(--text3); font-size: 12px; font-weight: 700; text-transform: uppercase;">Recent Pages</h6>

        @forelse($pages->take(5) as $p)
        <a href="{{ route('pages.edit', $p->id) }}" class="sidebar-menu-item {{ isset($page) && $page->id == $p->id ? 'active' : '' }}">
            <i class="fa-regular fa-file-lines"></i>
            <span class="text-truncate">{{ $p->title ?? 'Draft Page' }}</span>
        </a>
        @empty
        <div class="ps-3 text-muted" style="font-size: 12px;">No pages found</div>
        @endforelse

        @if($pages->count() > 5)
        <a href="{{ route('admin.chronology') }}" class="ms-3 mt-2 d-inline-block text-decoration-none fw-bold" style="font-size: 11px; color: var(--accent);">
            View All {{ $pages->count() }} Pages &rarr;
        </a>
        @endif
    </div>

    <div class="mb-4">
        <h6 class="mb-2 ps-2" style="color: var(--text3); font-size: 12px; font-weight: 700; text-transform: uppercase;">Templates</h6>

        @forelse($templates->take(5) as $t)
        <a href="#" class="sidebar-menu-item">
            <i class="fa-solid fa-layer-group"></i>
            <span class="text-truncate">{{ trim(str_replace('(Template)', '', $t->title)) }}</span>
        </a>
        @empty
        <div class="ps-3 text-muted" style="font-size: 12px;">No templates</div>
        @endforelse

        @if($templates->count() > 5)
        <a href="{{ route('admin.chronology') }}" class="ms-3 mt-2 d-inline-block text-decoration-none fw-bold" style="font-size: 11px; color: var(--accent);">
            View All {{ $templates->count() }} Templates &rarr;
        </a>
        @endif
    </div>
</div>