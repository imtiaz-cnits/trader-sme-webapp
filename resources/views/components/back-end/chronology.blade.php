@extends('layout.dashboard-sidenav')
@section('title', 'Chronology | Traders SME')

@section('content')
<style>
  .folder-card:hover,
  .file-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);
  }

  .chronology-sidebar ul li a:hover {
    color: #1D5053 !important;
    background: rgba(29, 80, 83, 0.05);
    border-radius: 4px;
  }
</style>

<main class="container-fluid px-md-5">
  <div class="main-content pb-4">
    <div class="d-flex flex-column flex-lg-row gap-4 mt-4" id="chronology-wrapper" style="min-height: 80vh;">

      <div class="chronology-sidebar" style="width: 100%; max-width: 250px; border-right: 1px solid #e5e7eb; padding-right: 1rem;">
        <div class="search-box mb-4 position-relative">
          <input type="text" class="form-control" placeholder="Search..." style="background: #F9FAFB; border: 1px solid #E5E7EB; padding-left: 35px; font-size: 14px;">
          <i class="fa-solid fa-magnifying-glass position-absolute text-muted" style="top: 50%; left: 12px; transform: translateY(-50%); font-size: 12px;"></i>
        </div>

        <div class="sidebar-section mb-4">
          <h6 class="text-muted text-uppercase mb-3" style="font-size: 11px; font-weight: 700; letter-spacing: 1px;">Pages</h6>
          <ul class="list-unstyled">
            @forelse($pages as $page)
            <li class="mb-1">
              <a href="{{ route('pages.edit', $page->id) }}" class="text-decoration-none d-flex align-items-center gap-2 py-2 px-2" style="color: #4B5563; font-size: 14px;">
                <i class="fa-regular fa-file-lines text-muted"></i>
                <span class="text-truncate">{{ $page->title }}</span>
              </a>
            </li>
            @empty
            <li class="px-2 text-muted small">No pages yet</li>
            @endforelse
          </ul>
        </div>

        <div class="sidebar-section">
          <h6 class="text-muted text-uppercase mb-3" style="font-size: 11px; font-weight: 700; letter-spacing: 1px;">Templates</h6>
          <ul class="list-unstyled">
            @forelse($templates as $template)
            <li class="mb-1">
              <a href="#" class="text-decoration-none d-flex align-items-center gap-2 py-2 px-2" style="color: #4B5563; font-size: 14px;">
                <i class="fa-solid fa-layer-group text-muted"></i> {{ $template->title }}
              </a>
            </li>
            @empty
            <li class="px-2 text-muted small">No templates</li>
            @endforelse
          </ul>
        </div>
      </div>

      <div class="flex-grow-1">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3 mb-4">
          <div>
            <h2 class="dashboard-title m-0" style="font-size: 24px; font-weight: 700;">Chronology Page Manager</h2>
          </div>
          <div class="d-flex flex-wrap gap-2">
            <button class="btn btn-outline-secondary px-3" style="font-size: 13px; border-radius: 8px;">+ Add Page From A Template</button>
            <button class="btn btn-outline-secondary px-3" data-bs-toggle="modal" data-bs-target="#createFolderModal" style="font-size: 13px; border-radius: 8px;">
              <i class="fa-solid fa-folder-plus"></i>
            </button>
            <button class="btn btn-primary px-3" id="addPageBtn" style="background-color: #1D5053; border: none; font-size: 13px; border-radius: 8px;">+ Add A Page</button>
          </div>
        </div>

        <h5 class="mb-3" style="font-size: 16px; font-weight: 700; color: #111827;">Folders</h5>
        <div class="row g-3 mb-5">
          @forelse($folders as $folder)
          <div class="col-12 col-sm-6 col-md-4 col-xl-3">
            <div class="folder-card p-3 border rounded-3 h-100 d-flex align-items-center justify-content-between" style="background: #ffffff; cursor: pointer; transition: all 0.2s;">
              <div class="d-flex align-items-center gap-3">
                <div style="width: 42px; height: 42px; background: #FEF3C7; color: #D97706; border-radius: 10px; display: flex; align-items: center; justify-content: center; font-size: 20px;">
                  <i class="{{ $folder->icon ?? 'fa-solid fa-folder' }}"></i>
                </div>
                <div>
                  <h6 class="m-0 fw-bold" style="font-size: 14px;">{{ $folder->name }}</h6>
                  <small class="text-muted" style="font-size: 12px;">{{ $folder->pages_count }} Pages</small>
                </div>
              </div>
              <div class="dropdown">
                <button class="btn btn-link text-muted p-0" data-bs-toggle="dropdown"><i class="fa-solid fa-ellipsis-vertical"></i></button>
                <ul class="dropdown-menu border-0 shadow-sm">
                  <li><a class="dropdown-item small" href="#">Rename</a></li>
                  <li><a class="dropdown-item small text-danger" href="#">Delete</a></li>
                </ul>
              </div>
            </div>
          </div>
          @empty
          <div class="col-12">
            <p class="text-muted small">No folders found.</p>
          </div>
          @endforelse
        </div>

        <h5 class="mb-3" style="font-size: 16px; font-weight: 700; color: #111827;">Files</h5>
        <div class="row g-3">
          @forelse($pages as $page)
          <div class="col-12 col-sm-6 col-md-4 col-xl-3">
            <div class="file-card p-3 border rounded-3 h-100 d-flex flex-column" style="background: #ffffff; transition: all 0.2s; cursor: pointer;" onclick="window.location.href='{{ route('pages.edit', $page->id) }}'">
              <div class="d-flex justify-content-between align-items-start mb-3">
                <div style="width: 36px; height: 36px; background: #F3F4F6; border-radius: 8px; display: flex; align-items: center; justify-content: center; color: #6B7280;">
                  <i class="fa-regular fa-file-lines"></i>
                </div>
                <div class="dropdown" onclick="event.stopPropagation()">
                  <button class="btn btn-link text-muted p-0" data-bs-toggle="dropdown"><i class="fa-solid fa-ellipsis-vertical"></i></button>
                  <ul class="dropdown-menu border-0 shadow-sm">
                    <li><a class="dropdown-item small" href="{{ route('pages.edit', $page->id) }}">Open Editor</a></li>
                    <li><a class="dropdown-item small text-danger" href="#">Delete</a></li>
                  </ul>
                </div>
              </div>
              <h6 class="m-0 fw-bold text-truncate" style="font-size: 14px; color: #111827;">{{ $page->title }}</h6>
              <small class="text-muted mt-3" style="font-size: 11px;">Updated {{ $page->updated_at->diffForHumans() }}</small>
            </div>
          </div>
          @empty
          <div class="col-12">
            <p class="text-muted small">No recent files.</p>
          </div>
          @endforelse
        </div>
      </div>
    </div>
  </div>
</main>

<div class="modal fade" id="createFolderModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm">
    <div class="modal-content border-0 shadow-lg">
      <div class="modal-header border-0 pb-0">
        <h6 class="modal-title fw-bold">New Folder</h6>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="font-size: 10px;"></button>
      </div>
      <form id="createFolderForm">
        @csrf
        <div class="modal-body">
          <input type="text" name="name" class="form-control" placeholder="Folder name" required style="font-size: 14px;">
        </div>
        <div class="modal-footer border-0 pt-0">
          <button type="submit" class="btn btn-primary w-100" style="background: #1D5053; border: none; font-size: 14px;">Create</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
  // ফোল্ডার তৈরির AJAX লজিক
  document.getElementById('createFolderForm').addEventListener('submit', async function(e) {
    e.preventDefault();
    const btn = this.querySelector('button[type="submit"]');
    btn.disabled = true;
    btn.innerText = 'Creating...';

    try {
      const response = await axios.post("{{ route('folders.store') }}", new FormData(this));
      if (response.data.success) location.reload();
    } catch (error) {
      alert('Error creating folder');
      btn.disabled = false;
      btn.innerText = 'Create';
    }
  });

  // পেইজ তৈরির AJAX লজিক
  document.getElementById('addPageBtn').addEventListener('click', async function() {
    this.disabled = true;
    this.innerText = 'Creating...';

    try {
      const response = await axios.post("{{ route('pages.store') }}", {
        _token: "{{ csrf_token() }}"
      });
      if (response.data.success) window.location.href = response.data.redirect_url;
    } catch (error) {
      alert('Error creating page');
      this.disabled = false;
      this.innerText = '+ Add A Page';
    }
  });
</script>
@endsection