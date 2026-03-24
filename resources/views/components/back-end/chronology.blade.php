@extends('layout.dashboard-sidenav')
@section('title', 'Chronology | Traders SME')

@section('content')
<style>
  /* Base Layout */
  .main-content {
    font-family: var(--primary-font);
  }

  /* 🌟 Sticky Sidebar CSS (Responsive) 🌟 */
  .chronology-sidebar {
    width: 100%;
    max-width: 250px;
    border-right: 1px solid var(--border);
    padding-right: 1rem;
    position: sticky;
    top: 80px;
    height: calc(100vh - 80px);
    overflow-y: auto;
    background-color: var(--bg-color);
  }

  .chronology-sidebar::-webkit-scrollbar {
    width: 4px;
  }

  .chronology-sidebar::-webkit-scrollbar-thumb {
    background: var(--border2);
    border-radius: 4px;
  }

  .chronology-sidebar ul li a {
    color: var(--text2) !important;
    transition: 0.2s;
  }

  .chronology-sidebar ul li a:hover {
    color: var(--text) !important;
    background: var(--accent2);
    border-radius: 6px;
  }

  /* Mobile Sidebar Styling */
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

  @media (max-width: 991.98px) {
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
  }

  /* Search Box */
  .search-box input {
    background: var(--accent2) !important;
    border: 1px solid var(--border) !important;
    color: var(--text) !important;
  }

  .search-box input::placeholder {
    color: var(--text3) !important;
  }

  /* Typography & Cards */
  .dashboard-title {
    color: var(--text);
  }

  .text-muted-custom {
    color: var(--text3) !important;
  }

  .folder-card,
  .file-card {
    background: var(--bg-color) !important;
    border: 1px solid var(--border) !important;
    transition: all 0.2s;
    cursor: pointer;
  }

  .folder-card:hover,
  .file-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);
    border-color: var(--border2) !important;
  }

  .folder-card.active-folder {
    background: var(--accent2) !important;
    border-color: var(--accent) !important;
  }

  .folder-card h6,
  .file-card h6 {
    color: var(--text) !important;
  }

  .folder-card small,
  .file-card small {
    color: var(--text3) !important;
  }

  .icon-wrapper-folder {
    background: var(--accent2) !important;
    color: var(--accent) !important;
    width: 42px;
    height: 42px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
  }

  .icon-wrapper-file {
    background: var(--accent2) !important;
    color: var(--text2) !important;
    width: 36px;
    height: 36px;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  /* Dropdowns & Modals */
  .dropdown-menu {
    background-color: var(--bg-color) !important;
    border: 1px solid var(--border) !important;
  }

  .dropdown-item {
    color: var(--text2) !important;
  }

  .dropdown-item:hover {
    background-color: var(--accent2) !important;
    color: var(--text) !important;
  }

  .modal-content {
    background-color: var(--bg-color) !important;
    border: 1px solid var(--border) !important;
    color: var(--text) !important;
  }

  .modal-header .modal-title,
  .modal-header h6 {
    color: var(--text) !important;
  }

  .modal-body label {
    color: var(--text2) !important;
  }

  .modal-body input,
  .modal-body select,
  .modal-body option,
  .form-control,
  .form-select {
    background-color: var(--bg-color) !important;
    border: 1px solid var(--border) !important;
    color: var(--text) !important;
  }

  .modal-body input::placeholder {
    color: var(--text3) !important;
  }

  .modal-body input:focus,
  .modal-body select:focus {
    border-color: var(--accent) !important;
    box-shadow: none !important;
  }

  [data-theme="dark"] .btn-close {
    filter: invert(1) grayscale(100%) brightness(200%);
  }

  /* Primary Buttons */
  .btn-primary-custom {
    background-color: var(--accent) !important;
    color: #ffffff !important;
    border: none;
    font-size: 13px;
    border-radius: 8px;
  }

  .btn-primary-custom:hover {
    opacity: 0.9;
  }

  .btn-outline-custom {
    background: transparent !important;
    border: 1px solid var(--border) !important;
    color: var(--text) !important;
    font-size: 13px;
    border-radius: 8px;
  }

  .btn-outline-custom:hover {
    background: var(--accent2) !important;
  }
</style>

<main class="container-fluid px-md-5">
  <div class="main-content pb-4">
    <div class="d-flex flex-column flex-lg-row gap-4 mt-4 align-items-start" id="chronology-wrapper" style="min-height: 80vh;">

      <div class="sidebar-overlay" id="sidebarOverlay"></div>

      <div class="chronology-sidebar" id="chronologySidebar">
        <div class="d-flex justify-content-between align-items-center d-lg-none mb-4">
          <h5 class="m-0 fw-bold dashboard-title">Menu</h5>
          <button class="btn-close shadow-none" id="mobileSidebarClose"></button>
        </div>

        <div class="search-box mb-4 position-relative">
          <input type="text" class="form-control shadow-none" placeholder="Search..." style="padding-left: 35px; font-size: 14px; border-radius: 8px;">
          <i class="fa-solid fa-magnifying-glass position-absolute text-muted-custom" style="top: 50%; left: 12px; transform: translateY(-50%); font-size: 12px;"></i>
        </div>

        <div class="sidebar-section mb-4">
          <h6 class="text-muted-custom text-uppercase mb-3" style="font-size: 11px; font-weight: 700; letter-spacing: 1px;">Pages</h6>
          <ul class="list-unstyled">
            @forelse($pages as $page)
            <li class="mb-1">
              <a href="{{ route('pages.edit', $page->id) }}" class="text-decoration-none d-flex align-items-center gap-2 py-2 px-2" style="font-size: 14px;">
                <i class="fa-regular fa-file-lines text-muted-custom"></i>
                <span class="text-truncate">{{ $page->title }}</span>
              </a>
            </li>
            @empty
            <li class="px-2 text-muted-custom small">No pages yet</li>
            @endforelse
          </ul>
        </div>

        <div class="sidebar-section">
          <h6 class="text-muted-custom text-uppercase mb-3" style="font-size: 11px; font-weight: 700; letter-spacing: 1px;">Templates</h6>
          <ul class="list-unstyled">
            @forelse($templates as $template)
            <li class="mb-1">
              <a href="#" class="text-decoration-none d-flex align-items-center gap-2 py-2 px-2" style="font-size: 14px;">
                <i class="fa-solid fa-layer-group text-muted-custom"></i> {{ $template->title }}
              </a>
            </li>
            @empty
            <li class="px-2 text-muted-custom small">No templates</li>
            @endforelse
          </ul>
        </div>
      </div>

      <div class="flex-grow-1">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3 mb-4">
          <div class="d-flex align-items-center gap-3">
            <button class="btn btn-outline-custom shadow-none d-lg-none px-2 py-1" id="mobileSidebarToggle"><i class="fa-solid fa-bars"></i></button>
            <h2 class="dashboard-title m-0" style="font-size: 24px; font-weight: 700;">Chronology Page Manager</h2>
          </div>
          <div class="d-flex flex-wrap gap-2">
            <button class="btn btn-outline-custom px-3 shadow-none" data-bs-toggle="modal" data-bs-target="#templateModal">+ Add Page From Template</button>
            <button class="btn btn-outline-custom px-3 shadow-none" data-bs-toggle="modal" data-bs-target="#createFolderModal">
              <i class="fa-solid fa-folder-plus"></i> Create Folder
            </button>
            <button class="btn btn-primary-custom px-3 shadow-none" id="addPageBtn">+ Add A Page</button>
          </div>
        </div>

        <h5 class="mb-3 dashboard-title" style="font-size: 16px; font-weight: 700;">Folders</h5>
        <div class="row g-3 mb-5">
          @forelse($folders as $folder)
          <div class="col-12 col-sm-6 col-md-4 col-xl-3">
            <div class="folder-card p-3 rounded-3 h-100 d-flex align-items-center justify-content-between {{ isset($currentFolder) && $currentFolder->id == $folder->id ? 'active-folder' : '' }}"
              onclick="window.location.href='?folder_id={{ $folder->id }}'">
              <div class="d-flex align-items-center gap-3">
                <div class="icon-wrapper-folder"><i class="{{ $folder->icon ?? 'fa-solid fa-folder' }}"></i></div>
                <div>
                  <h6 class="m-0 fw-bold" style="font-size: 14px;">{{ $folder->name }}</h6>
                  <small style="font-size: 12px;">{{ $folder->pages_count }} Pages</small>
                </div>
              </div>
              <div class="dropdown" onclick="event.stopPropagation()">
                <button class="btn btn-link text-muted-custom p-0 shadow-none" data-bs-toggle="dropdown"><i class="fa-solid fa-ellipsis-vertical"></i></button>
                <ul class="dropdown-menu border-0 shadow-sm">
                  <li><a class="dropdown-item small" href="#" onclick="openRenameModal({{ $folder->id }}, '{{ $folder->name }}'); return false;">Rename</a></li>
                  <li><a class="dropdown-item small text-danger" href="#" onclick="deleteFolder({{ $folder->id }}); return false;">Delete</a></li>
                </ul>
              </div>
            </div>
          </div>
          @empty
          <div class="col-12">
            <p class="text-muted-custom small">No folders found.</p>
          </div>
          @endforelse
        </div>

        <div class="d-flex justify-content-between align-items-center mb-3 mt-4">
          <h5 class="m-0 dashboard-title" style="font-size: 16px; font-weight: 700;">
            @if(isset($currentFolder))
            <i class="fa-solid fa-folder-open text-warning me-2"></i> {{ $currentFolder->name }} Files
            <a href="{{ route('admin.chronology') }}" class="btn btn-sm ms-3" style="background: var(--accent2); color: var(--text); border-radius: 6px;"><i class="fa-solid fa-arrow-left"></i> Back to All</a>
            @else Recent Files @endif
          </h5>
        </div>

        <div class="row g-3">
          @forelse($pages as $page)
          <div class="col-12 col-sm-6 col-md-4 col-xl-3">
            <div class="file-card p-3 rounded-3 h-100 d-flex flex-column" onclick="window.location.href='{{ route('pages.edit', $page->id) }}'">
              <div class="d-flex justify-content-between align-items-start mb-3">
                <div class="icon-wrapper-file"><i class="fa-regular fa-file-lines"></i></div>
                <div class="dropdown" onclick="event.stopPropagation()">
                  <button class="btn btn-link text-muted-custom p-0 shadow-none" data-bs-toggle="dropdown"><i class="fa-solid fa-ellipsis-vertical"></i></button>
                  <ul class="dropdown-menu border-0 shadow-sm">
                    <li><a class="dropdown-item small" href="{{ route('pages.edit', $page->id) }}">Open Editor</a></li>
                    <li><a class="dropdown-item small text-danger" href="#" onclick="deletePage({{ $page->id }}); return false;">Delete</a></li>
                  </ul>
                </div>
              </div>
              <h6 class="m-0 fw-bold text-truncate" style="font-size: 14px;">{{ $page->title }}</h6>
              <small class="mt-3 text-muted-custom" style="font-size: 11px;">Updated {{ $page->updated_at->diffForHumans() }}</small>
            </div>
          </div>
          @empty
          <div class="col-12">
            <p class="text-muted-custom small">No recent files.</p>
          </div>
          @endforelse
        </div>
      </div>
    </div>
  </div>
</main>

<div class="modal fade" id="createFolderModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm">
    <div class="modal-content border-0 shadow-lg" style="border-radius: 12px;">
      <div class="modal-header border-0 pb-0">
        <h6 class="modal-title fw-bold">New Folder</h6>
        <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close" style="font-size: 10px;"></button>
      </div>
      <form id="createFolderForm">
        @csrf
        <div class="modal-body">
          <input type="text" name="name" class="form-control shadow-none" placeholder="Folder name" required style="font-size: 14px; border-radius: 8px;">
        </div>
        <div class="modal-footer border-0 pt-0">
          <button type="submit" class="btn btn-primary-custom w-100 py-2">Create</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="renameFolderModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm">
    <div class="modal-content border-0 shadow-lg" style="border-radius: 12px;">
      <div class="modal-header border-0 pb-0">
        <h6 class="modal-title fw-bold">Rename Folder</h6>
        <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close" style="font-size: 10px;"></button>
      </div>
      <form id="renameFolderForm">
        @csrf
        <input type="hidden" id="rename_folder_id">
        <div class="modal-body">
          <input type="text" id="rename_folder_name" name="name" class="form-control shadow-none" required style="font-size: 14px; border-radius: 8px;">
        </div>
        <div class="modal-footer border-0 pt-0">
          <button type="submit" class="btn btn-primary-custom w-100 py-2">Save Changes</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="templateModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-0 shadow-lg" style="border-radius: 12px;">
      <div class="modal-header border-0 pb-0 pt-4 px-4">
        <h5 class="modal-title fw-bold" style="font-size: 18px;">Add a Page From Template</h5>
        <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body px-4 py-4">
        <form id="templateForm">

          <div class="mb-4">
            <label class="form-label fw-bold" style="font-size: 13px;">Choose a Template</label>
            <select class="form-select shadow-none" id="selected_template_id" required style="border-radius: 8px; font-size: 14px; padding: 10px 15px;">
              <option value="" selected disabled>Select a Template...</option>
              @foreach($templates as $template)
              <option value="{{ $template->id }}">{{ $template->title }}</option>
              @endforeach
            </select>
          </div>

          <div class="mb-4">
            <label class="form-label fw-bold" style="font-size: 13px;">Choose a Page Name</label>
            <input type="text" class="form-control shadow-none" id="custom_page_name" placeholder="Type Name here..." required style="border-radius: 8px; font-size: 14px; padding: 10px 15px;">
          </div>

          <div class="mb-4">
            <label class="form-label fw-bold" style="font-size: 13px;">Select Page Collection (Optional)</label>
            <select class="form-select shadow-none" id="selected_collection_id" style="border-radius: 8px; font-size: 14px; padding: 10px 15px;">
              <option value="">Select the collection...</option>
              @foreach($folders as $folder)
              <option value="{{ $folder->id }}">{{ $folder->name }}</option>
              @endforeach
            </select>
          </div>

          <div class="d-flex justify-content-end gap-2 mt-4 pt-2">
            <button type="button" class="btn btn-outline-custom px-4 py-2" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary-custom px-4 py-2" id="submitTemplateBtn">Submit</button>
          </div>

        </form>
      </div>

    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
  // 🌟 Mobile Sidebar Script 🌟
  const sidebar = document.getElementById('chronologySidebar');
  const overlay = document.getElementById('sidebarOverlay');
  const toggleBtn = document.getElementById('mobileSidebarToggle');
  const closeBtn = document.getElementById('mobileSidebarClose');

  if (toggleBtn && closeBtn && sidebar && overlay) {
    const openSidebar = () => {
      sidebar.classList.add('show-mobile');
      overlay.classList.add('show');
      document.body.style.overflow = 'hidden';
    };
    const closeSidebar = () => {
      sidebar.classList.remove('show-mobile');
      overlay.classList.remove('show');
      document.body.style.overflow = '';
    };

    toggleBtn.addEventListener('click', openSidebar);
    closeBtn.addEventListener('click', closeSidebar);
    overlay.addEventListener('click', closeSidebar);
  }

  // 1. Folder creation AJAX logic
  document.getElementById('createFolderForm')?.addEventListener('submit', async function(e) {
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
  document.getElementById('addPageBtn')?.addEventListener('click', async function() {
    const btn = this;
    btn.innerText = 'Creating...';
    btn.disabled = true;

    const urlParams = new URLSearchParams(window.location.search);
    const folderId = urlParams.get('folder_id');

    try {
      const response = await axios.post("{{ route('pages.store') }}", {
        folder_id: folderId,
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

  // 3. Opening Rename Modal
  function openRenameModal(id, currentName) {
    document.getElementById('rename_folder_id').value = id;
    document.getElementById('rename_folder_name').value = currentName;
    new bootstrap.Modal(document.getElementById('renameFolderModal')).show();
  }

  // 4. Handling Rename Folder Form Submission
  document.getElementById('renameFolderForm')?.addEventListener('submit', async function(e) {
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
        const response = await axios.post(`/folders/${id}`, {
          _method: 'DELETE',
          _token: "{{ csrf_token() }}"
        });
        if (response.data.success) location.reload();
      } catch (error) {
        alert('Error: ' + (error.response?.data?.message || 'Could not delete folder.'));
      }
    }
  }

  // 6. Delete Page
  async function deletePage(id) {
    if (confirm('Are you sure you want to delete this file?')) {
      try {
        const response = await axios.post(`/pages/${id}`, {
          _method: 'DELETE',
          _token: "{{ csrf_token() }}"
        });
        if (response.data.success) {
          window.location.href = window.location.pathname + window.location.search;
        }
      } catch (error) {
        alert('Error: ' + (error.response?.data?.message || 'Could not delete file.'));
      }
    }
  }

  // 7. Add Page From Template Logic
  document.getElementById('templateForm')?.addEventListener('submit', async function(e) {
    e.preventDefault();

    const templateId = document.getElementById('selected_template_id').value;
    const pageName = document.getElementById('custom_page_name').value;
    const folderId = document.getElementById('selected_collection_id').value;
    const submitBtn = document.getElementById('submitTemplateBtn');

    if (!templateId || !pageName) return;

    submitBtn.disabled = true;
    submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2" role="status"></span> Submitting...';

    try {
      const response = await axios.post("{{ route('pages.storeFromTemplate') }}", {
        template_id: templateId,
        title: pageName,
        folder_id: folderId,
        _token: "{{ csrf_token() }}"
      });

      if (response.data.success) {
        window.location.href = response.data.redirect_url;
      }
    } catch (error) {
      alert('Error: Could not create page from template.');
      submitBtn.disabled = false;
      submitBtn.innerHTML = 'Submit';
    }
  });
</script>
@endsection