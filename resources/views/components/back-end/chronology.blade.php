@extends('layout.dashboard-sidenav')
@section('title', 'Chronology | Traders SME')

@section('content')
<link rel="stylesheet" href="{{ asset('back-end/assets/css/chronology.css?v=1.1') }}">

<main class="container-fluid px-md-4 editor-wrapper">
  <div class="d-flex flex-column flex-xl-row align-items-start w-100" id="chronology-wrapper">

    @include('layout.sidebar')

    <div class="flex-grow-1 chronology-main-area pt-4">
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
          <div class="file-card p-3 rounded-3 h-100 d-flex align-items-center justify-content-between"
            onclick="window.location.href='{{ route('pages.edit', $page->id) }}'">

            <div class="d-flex align-items-center gap-3" style="min-width: 0;">
              <div class="icon-wrapper-file flex-shrink-0"><i class="fa-regular fa-file-lines"></i></div>

              <div style="min-width: 0;">
                <h6 class="m-0 fw-bold text-truncate" style="font-size: 14px;">{{ $page->title }}</h6>
                <small class="mt-2 text-muted-custom text-truncate d-block" style="font-size: 12px;">Updated {{ $page->updated_at->diffForHumans() }}</small>
              </div>
            </div>

            <div class="dropdown flex-shrink-0" onclick="event.stopPropagation()">
              <button class="btn btn-link text-muted-custom p-0 shadow-none" data-bs-toggle="dropdown"><i class="fa-solid fa-ellipsis-vertical"></i></button>

              <ul class="dropdown-menu dropdown-menu-end border-0 shadow-sm" style="background-color: var(--bg-color); border: 1px solid var(--border) !important; border-radius: 8px; min-width: 180px;">
                <li>
                  <h6 class="dropdown-header text-muted" style="font-size: 11px; text-transform: uppercase;">Page Actions</h6>
                </li>

                <li><a class="dropdown-item d-flex align-items-center gap-2 py-2" href="{{ route('pages.edit', $page->id) }}" style="color: var(--text); font-size: 13px;"><i class="fa-solid fa-pen-to-square text-muted"></i> Open Editor</a></li>

                <li><a class="dropdown-item d-flex align-items-center gap-2 py-2" href="#" onclick="toggleFavoriteFromList({{ $page->id }}, this); return false;" style="color: var(--text); font-size: 13px;"><i class="{{ $page->is_favorite ? 'fa-solid text-warning' : 'fa-regular text-muted' }} fa-star"></i> {{ $page->is_favorite ? 'Remove Favorite' : 'Add to Favorite' }}</a></li>

                <li><a class="dropdown-item d-flex align-items-center gap-2 py-2" href="#" onclick="openMoveModal({{ $page->id }}, '{{ $page->folder_id }}'); return false;" style="color: var(--text); font-size: 13px;"><i class="fa-solid fa-folder-tree text-muted"></i> Move to...</a></li>

                <li><a class="dropdown-item d-flex align-items-center gap-2 py-2" href="#" onclick="openListTemplateModal({{ $page->id }}, '{{ addslashes($page->title) }}'); return false;" style="color: var(--text); font-size: 13px;"><i class="fa-solid fa-layer-group text-muted"></i> Save as Template</a></li>

                <li>
                  <hr class="dropdown-divider" style="border-color: var(--border);">
                </li>

                <li><a class="dropdown-item d-flex align-items-center gap-2 py-2 text-danger" href="#" onclick="deletePage({{ $page->id }}); return false;" style="font-size: 13px;"><i class="fa-regular fa-trash-can"></i> Delete Page</a></li>
              </ul>
            </div>

          </div>
        </div>
        @empty
        <div class="col-12">
          <p class="text-muted-custom small">No recent files.</p>
        </div>
        @endforelse
      </div>

      <div class="d-flex justify-content-between align-items-center mb-3 mt-5">
        <h5 class="m-0 dashboard-title" style="font-size: 16px; font-weight: 700;">
          My Templates
        </h5>
      </div>

      <div class="row g-3 mb-5">
        @forelse($templates as $template)
        <div class="col-12 col-sm-6 col-md-4 col-xl-3">
          <div class="file-card p-3 rounded-3 h-100 d-flex align-items-center justify-content-between"
            onclick="window.location.href='{{ route('pages.edit', $template->id) }}'">

            <div class="d-flex align-items-center gap-3" style="min-width: 0;">
              <div class="icon-wrapper-file flex-shrink-0" style="color: var(--accent); background: var(--accent2);">
                <i class="fa-solid fa-layer-group"></i>
              </div>

              <div style="min-width: 0;">
                <h6 class="m-0 fw-bold text-truncate" style="font-size: 14px;">{{ trim(str_replace('(Template)', '', $template->title)) }}</h6>
                <small class="mt-2 text-muted-custom text-truncate d-block" style="font-size: 12px;">Updated {{ $template->updated_at->diffForHumans() }}</small>
              </div>
            </div>

            <div class="dropdown flex-shrink-0" onclick="event.stopPropagation()">
              <button class="btn btn-link text-muted-custom p-0 shadow-none" data-bs-toggle="dropdown"><i class="fa-solid fa-ellipsis-vertical"></i></button>
              <ul class="dropdown-menu dropdown-menu-end border-0 shadow-sm">
                <li><a class="dropdown-item small" href="{{ route('pages.edit', $template->id) }}">Edit Template</a></li>
                <li><a class="dropdown-item small text-danger" href="#" onclick="deletePage({{ $template->id }}); return false;">Delete Template</a></li>
              </ul>
            </div>

          </div>
        </div>
        @empty
        <div class="col-12">
          <p class="text-muted-custom small">No templates found. Create one from the page editor!</p>
        </div>
        @endforelse
      </div>

    </div>
  </div>
  </div>


  <!-- Create Folder Modal Start -->
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
  <!-- Create Folder Modal End -->

  <!-- Rename Folder Modal Start -->
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
  <!-- Rename Folder Modal End -->

  <!-- Template Modal Start -->
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
  <!-- Template Modal End -->

  <!-- Move Page Modal Start -->
  <div class="modal fade" id="movePageModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
      <div class="modal-content border-0 shadow-lg" style="border-radius: 12px; background-color: var(--bg-color);">
        <div class="modal-header border-0 pb-0">
          <h6 class="modal-title fw-bold" style="color: var(--text);"><i class="fa-solid fa-folder-tree me-2 text-muted"></i>Move Page</h6>
          <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close" style="filter: var(--invert-icon); font-size: 10px;"></button>
        </div>
        <form id="movePageForm">
          <input type="hidden" id="move_page_id">
          <div class="modal-body px-4 py-4">
            <label class="form-label" style="font-size: 12px; color: var(--text3); font-weight: bold; text-transform: uppercase;">Select Destination</label>
            <select class="form-select shadow-none" id="moveFolderSelect" style="background-color: var(--bg-color); border: 1px solid var(--border); color: var(--text); font-size: 14px; border-radius: 8px; cursor: pointer;">
              <option value="">📁 No Folder (Root)</option>
              @foreach($folders as $folder)
              <option value="{{ $folder->id }}">📁 {{ $folder->name }}</option>
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
  <!-- Move Page Modal End -->

  <!-- Save List Template Modal Start -->
  <div class="modal fade" id="saveListTemplateModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
      <div class="modal-content border-0 shadow-lg" style="border-radius: 12px; background-color: var(--bg-color);">
        <div class="modal-header border-0 pb-0">
          <h6 class="modal-title fw-bold" style="color: var(--text);"><i class="fa-solid fa-layer-group me-2 text-muted"></i>Save as Template</h6>
          <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close" style="filter: var(--invert-icon); font-size: 10px;"></button>
        </div>
        <form id="saveListTemplateForm">
          <input type="hidden" id="template_source_page_id">
          <div class="modal-body px-4 py-4">
            <div class="mb-2">
              <label class="form-label" style="font-size: 12px; color: var(--text3); font-weight: bold; text-transform: uppercase;">Template Name</label>
              <input type="text" class="form-control shadow-none" id="listTemplateNameInput" required style="background-color: var(--bg-color); border: 1px solid var(--border); color: var(--text); font-size: 14px; border-radius: 8px;">
            </div>
          </div>
          <div class="modal-footer border-0 pt-0 pb-3">
            <button type="submit" class="btn w-100 fw-bold" style="background: var(--accent); color: #fff; font-size: 14px; border-radius: 8px; transition: 0.2s;">Save Template</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Save List Template Modal End -->

</main>

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

  // ==========================================
  // 🔥 List View: Toggle Favorite 🔥
  // ==========================================
  async function toggleFavoriteFromList(pageId, element) {
    try {
      // Optimistic UI Update
      const isFavorited = element.innerText.includes('Remove');
      element.innerHTML = isFavorited ?
        `<i class="fa-regular fa-star text-muted"></i> Add to Favorite` :
        `<i class="fa-solid fa-star text-warning"></i> Remove Favorite`;

      const response = await axios.post(`/pages/${pageId}/favorite`, {
        is_favorite: !isFavorited,
        _token: "{{ csrf_token() }}"
      });

      if (response.data.success) {
        window.location.reload();
      }
    } catch (error) {
      alert("Failed to toggle favorite.");
    }
  }

  // ==========================================
  // 🔥 List View: Move Page Logic 🔥
  // ==========================================
  function openMoveModal(pageId, currentFolderId) {
    document.getElementById('move_page_id').value = pageId;
    document.getElementById('moveFolderSelect').value = currentFolderId || '';
    new bootstrap.Modal(document.getElementById('movePageModal')).show();
  }

  document.getElementById('movePageForm')?.addEventListener('submit', async function(e) {
    e.preventDefault();
    const pageId = document.getElementById('move_page_id').value;
    const folderId = document.getElementById('moveFolderSelect').value;
    const btn = this.querySelector('button[type="submit"]');

    btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Moving...';
    btn.disabled = true;

    try {
      const response = await axios.post(`/pages/${pageId}/move`, {
        folder_id: folderId,
        _token: "{{ csrf_token() }}"
      });
      if (response.data.success) window.location.reload();
    } catch (error) {
      alert('Failed to move page.');
      btn.innerText = 'Confirm Move';
      btn.disabled = false;
    }
  });

  // ==========================================
  // 🔥 List View: Save as Template Logic 🔥
  // ==========================================
  function openListTemplateModal(pageId, pageTitle) {
    document.getElementById('template_source_page_id').value = pageId;
    document.getElementById('listTemplateNameInput').value = pageTitle + ' (Template)';
    new bootstrap.Modal(document.getElementById('saveListTemplateModal')).show();
  }

  document.getElementById('saveListTemplateForm')?.addEventListener('submit', async function(e) {
    e.preventDefault();
    const pageId = document.getElementById('template_source_page_id').value;
    const title = document.getElementById('listTemplateNameInput').value;
    const btn = this.querySelector('button[type="submit"]');

    btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Saving...';
    btn.disabled = true;

    try {
      const response = await axios.post(`/pages/${pageId}/save-as-template`, {
        title: title,
        _token: "{{ csrf_token() }}"
      });
      if (response.data.success) window.location.reload();
    } catch (error) {
      alert('Failed to save template.');
      btn.innerText = 'Save Template';
      btn.disabled = false;
    }
  });
</script>
@endsection