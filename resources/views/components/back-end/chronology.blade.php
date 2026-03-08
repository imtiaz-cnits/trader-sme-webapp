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
            <button class="btn btn-outline-secondary px-3" data-bs-toggle="modal" data-bs-target="#templateModal" style="font-size: 13px; border-radius: 8px;">+ Add Page From A Template</button>
            <button class="btn btn-outline-secondary px-3" data-bs-toggle="modal" data-bs-target="#createFolderModal" style="font-size: 13px; border-radius: 8px;">
              <i class="fa-solid fa-folder-plus"></i> Create Folder
            </button>
            <button class="btn btn-primary px-3" id="addPageBtn" style="background-color: #1D5053; border: none; font-size: 13px; border-radius: 8px;">+ Add A Page</button>
          </div>
        </div>

        <h5 class="mb-3" style="font-size: 16px; font-weight: 700; color: #111827;">Folders</h5>
        <div class="row g-3 mb-5">
          @forelse($folders as $folder)
          <div class="col-12 col-sm-6 col-md-4 col-xl-3">
            <div class="folder-card p-3 border rounded-3 h-100 d-flex align-items-center justify-content-between {{ isset($currentFolder) && $currentFolder->id == $folder->id ? 'border-primary shadow-sm' : '' }}"
              style="background: {{ isset($currentFolder) && $currentFolder->id == $folder->id ? '#f0fdf4' : '#ffffff' }}; cursor: pointer; transition: all 0.2s;"
              onclick="window.location.href='?folder_id={{ $folder->id }}'">

              <div class="d-flex align-items-center gap-3">
                <div style="width: 42px; height: 42px; background: #FEF3C7; color: #D97706; border-radius: 10px; display: flex; align-items: center; justify-content: center; font-size: 20px;">
                  <i class="{{ $folder->icon ?? 'fa-solid fa-folder' }}"></i>
                </div>
                <div>
                  <h6 class="m-0 fw-bold" style="font-size: 14px;">{{ $folder->name }}</h6>
                  <small class="text-muted" style="font-size: 12px;">{{ $folder->pages_count }} Pages</small>
                </div>
              </div>
              <div class="dropdown" onclick="event.stopPropagation()">
                <button class="btn btn-link text-muted p-0" data-bs-toggle="dropdown"><i class="fa-solid fa-ellipsis-vertical"></i></button>
                <ul class="dropdown-menu border-0 shadow-sm">
                  <li><a class="dropdown-item small" href="#" onclick="openRenameModal({{ $folder->id }}, '{{ $folder->name }}'); return false;">Rename</a></li>
                  <li><a class="dropdown-item small text-danger" href="#" onclick="deleteFolder({{ $folder->id }}); return false;">Delete</a></li>
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

        <div class="d-flex justify-content-between align-items-center mb-3 mt-4">
          <h5 class="m-0" style="font-size: 16px; font-weight: 700; color: #111827;">
            @if(isset($currentFolder))
            <i class="fa-solid fa-folder-open text-warning me-2"></i> {{ $currentFolder->name }} Files
            <a href="{{ route('admin.chronology') }}" class="btn btn-sm btn-light ms-3"><i class="fa-solid fa-arrow-left"></i> Back to All</a>
            @else
            Recent Files
            @endif
          </h5>
        </div>

        <div class="row g-3">
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
                      <li><a class="dropdown-item small text-danger" href="#" onclick="deletePage({{ $page->id }}); return false;">Delete</a></li>
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

<!-- Rename Folder Modal -->
<div class="modal fade" id="renameFolderModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm">
    <div class="modal-content border-0 shadow-lg">
      <div class="modal-header border-0 pb-0">
        <h6 class="modal-title fw-bold">Rename Folder</h6>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="font-size: 10px;"></button>
      </div>
      <form id="renameFolderForm">
        @csrf
        <input type="hidden" id="rename_folder_id">
        <div class="modal-body">
          <input type="text" id="rename_folder_name" name="name" class="form-control" required style="font-size: 14px;">
        </div>
        <div class="modal-footer border-0 pt-0">
          <button type="submit" class="btn btn-primary w-100" style="background: #1D5053; border: none; font-size: 14px;">Save Changes</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Template Selection Modal -->
<div class="modal fade" id="templateModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm">
    <div class="modal-content border-0 shadow-lg">
      <div class="modal-header border-0 pb-0">
        <h6 class="modal-title fw-bold">Choose a Template</h6>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="font-size: 10px;"></button>
      </div>
      <div class="modal-body pb-4">
        @if($templates->count() > 0)
        <div class="list-group">
          @foreach($templates as $template)
          <button type="button" class="list-group-item list-group-item-action d-flex align-items-center gap-3 py-2 border-0 rounded-3 mb-1 use-template-btn" data-template-id="{{ $template->id }}" style="background: #f9fafb;">
            <div style="width: 32px; height: 32px; background: rgba(29, 80, 83, 0.1); color: #1D5053; border-radius: 6px; display: flex; align-items: center; justify-content: center;">
              <i class="fa-solid fa-layer-group" style="font-size: 12px;"></i>
            </div>
            <div class="text-start">
              <h6 class="m-0 fw-bold" style="font-size: 13px; color: #374151;">{{ $template->title }}</h6>
            </div>
          </button>
          @endforeach
        </div>
        @else
        <div class="text-center py-4 text-muted">
          <i class="fa-solid fa-layer-group mb-2" style="font-size: 20px; opacity: 0.5;"></i>
          <p class="m-0" style="font-size: 13px;">No templates available yet.</p>
        </div>
        @endif
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
  // 1. Folder creation AJAX logic
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

  // 2. Page creation logic with AJAX
  document.getElementById('addPageBtn').addEventListener('click', async function() {
    const btn = this;
    btn.innerText = 'Creating...';
    btn.disabled = true;

    // Get current folder id from URL parameters
    const urlParams = new URLSearchParams(window.location.search);
    const folderId = urlParams.get('folder_id');

    try {
      const response = await axios.post("{{ route('pages.store') }}", {
        folder_id: folderId, // Send folder ID to associate page with it
        _token: "{{ csrf_token() }}"
      });
      if (response.data.success) {
        window.location.href = response.data.redirect_url;
      }
    } catch (error) {
      alert('Error: Could not create page.');
      btn.innerText = '+ Add A Page';
      btn.disabled = false;
    }
  });

  // 3. Opening Rename Modal with current folder name
  function openRenameModal(id, currentName) {
    document.getElementById('rename_folder_id').value = id;
    document.getElementById('rename_folder_name').value = currentName;
    new bootstrap.Modal(document.getElementById('renameFolderModal')).show();
  }

  // 4. Handling Rename Folder Form Submission
  document.getElementById('renameFolderForm').addEventListener('submit', async function(e) {
    e.preventDefault();
    const id = document.getElementById('rename_folder_id').value;
    const name = document.getElementById('rename_folder_name').value;
    const btn = this.querySelector('button[type="submit"]');
    btn.disabled = true;
    btn.innerText = 'Saving...';

    try {
      const response = await axios.post(`/folders/${id}/update`, {
        name: name,
        _token: "{{ csrf_token() }}"
      });
      if (response.data.success) location.reload();
    } catch (error) {
      alert('Error renaming folder.');
      btn.disabled = false;
      btn.innerText = 'Save Changes';
    }
  });

  // 5. Delete Folder
  async function deleteFolder(id) {
    if (confirm('Are you sure you want to delete this folder?')) {
      try {
        const response = await axios.delete(`/folders/${id}`, {
          data: {
            _token: "{{ csrf_token() }}"
          }
        });
        if (response.data.success) location.reload();
      } catch (error) {
        alert('Error deleting folder.');
      }
    }
  }

  // 6. Delete Page
  async function deletePage(id) {
    if (confirm('Are you sure you want to delete this file?')) {
      try {
        const response = await axios.delete(`/pages/${id}`, {
          data: {
            _token: "{{ csrf_token() }}"
          }
        });
        if (response.data.success) location.reload();
      } catch (error) {
        alert('Error deleting file.');
      }
    }
  }

  // 7. Add Page From Template Logic
  document.querySelectorAll('.use-template-btn').forEach(btn => {
    btn.addEventListener('click', async function() {
      const templateId = this.getAttribute('data-template-id');

      // Get current folder id from URL to save inside the folder
      const urlParams = new URLSearchParams(window.location.search);
      const folderId = urlParams.get('folder_id');

      this.disabled = true;
      this.innerHTML = '<span class="spinner-border spinner-border-sm text-primary me-2" role="status" aria-hidden="true"></span> Creating...';

      try {
        const response = await axios.post("{{ route('pages.storeFromTemplate') }}", {
          template_id: templateId,
          folder_id: folderId,
          _token: "{{ csrf_token() }}"
        });
        if (response.data.success) {
          window.location.href = response.data.redirect_url;
        }
      } catch (error) {
        alert('Error: Could not create page from template.');
        location.reload();
      }
    });
  });
</script>
@endsection