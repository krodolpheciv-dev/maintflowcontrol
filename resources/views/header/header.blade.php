<header class="pc-header">
  <div class="header-wrapper">
    <!-- [Mobile Media Block] start -->
    <div class="me-auto pc-mob-drp">
      <ul class="list-unstyled">
        <!-- ======= Menu collapse Icon ===== -->
        <li class="pc-h-item pc-sidebar-collapse">
          <a href="#" class="pc-head-link ms-0" id="sidebar-hide">
            <i class="ti ti-menu-2"></i>
          </a>
        </li>
        <li class="pc-h-item pc-sidebar-popup">
          <a href="#" class="pc-head-link ms-0" id="mobile-collapse">
            <i class="ti ti-menu-2"></i>
          </a>
        </li>

        @if(request()->routeIs('dashboard'))
        <li class="pc-h-item d-none d-md-inline-flex" style="margin-left: 10px;">
          <form class="form-search">
            <i class="search-icon">
              <svg class="pc-icon">
                <use xlink:href="#custom-folder-open"></use>
              </svg>
            </i>
            <select class="form-select" style="text-align: center;height: 45px;width: 230px;" id="projectSelector">
              <option value="" disabled {{ !session('selected_project_id') ? 'selected' : '' }}>
                Sélectionner Projet
              </option>
              @forelse($projects ?? [] as $project)
                <option value="{{ $project->id }}" {{ session('selected_project_id') == $project->id ? 'selected' : '' }}>
                  {{ $project->nom_projet }}
                </option>
              @empty
                <option disabled>Aucun projet disponible</option>
              @endforelse
            </select>
          </form>
        </li>

        <li class="pc-h-item d-none d-md-inline-flex" style="width: 150px;margin-left: 10px;">
          <form class="form-search">
            <i class="search-icon">
              <svg class="pc-icon">
                <use xlink:href="#custom-calendar-1"></use>
              </svg>
            </i>
            <select class="form-select form-select-sm" style="text-align: center;height:45px; width:180px;">
              <option selected>Ce mois</option>
              <option>Mois dernier</option>
              <option>3 derniers mois</option>
              <option>6 derniers mois</option>
              <option>Cette année</option>
            </select>
            <input type="date" class="form-control" placeholder="Mois" style="display:none;"/>
          </form>
        </li>
        @else
        <li class="pc-h-item d-none d-md-inline-flex" style="margin-left: 10px;">
          <form class="form-search">
            <i class="search-icon">
              <svg class="pc-icon">
                <use xlink:href="#custom-menu"></use>
              </svg>
            </i>
            <select class="form-select" style="text-align: center;height: 45px;width: 230px;" id="projectSelector">
              <option value="" disabled {{ !session('selected_project_id') ? 'selected' : '' }}>
                Sélectionner Projet
              </option>
              @forelse($projects ?? [] as $project)
                <option value="{{ $project->id }}" {{ session('selected_project_id') == $project->id ? 'selected' : '' }}>
                  {{ $project->nom_projet }}
                </option>
              @empty
                <option disabled>Aucun projet disponible</option>
              @endforelse
            </select>
          </form>
        </li>
        @endif
      </ul>
    </div>
    <!-- [Mobile Media Block end] -->

    <div class="ms-auto">
      <ul class="list-unstyled">
        <li class="dropdown pc-h-item" style="display:none;">
          <a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
            <svg class="pc-icon"><use xlink:href="#custom-sun-1"></use></svg>
          </a>
          <div class="dropdown-menu dropdown-menu-end pc-h-dropdown">
            <a href="#!" class="dropdown-item" onclick="layout_change('dark')">
              <svg class="pc-icon"><use xlink:href="#custom-moon"></use></svg>
              <span>Dark</span>
            </a>
            <a href="#!" class="dropdown-item" onclick="layout_change('light')">
              <svg class="pc-icon"><use xlink:href="#custom-sun-1"></use></svg>
              <span>Light</span>
            </a>
            <a href="#!" class="dropdown-item" onclick="layout_change_default()">
              <svg class="pc-icon"><use xlink:href="#custom-setting-2"></use></svg>
              <span>Default</span>
            </a>
          </div>
        </li>

        <li class="dropdown pc-h-item">
          <a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
            <svg class="pc-icon"><use xlink:href="#custom-language"></use></svg>
          </a>
          <div class="dropdown-menu dropdown-menu-end pc-h-dropdown lng-dropdown">
            <a href="#!" class="dropdown-item" data-lng="en">
              <span>English <small>(UK)</small></span>
            </a>
            <a href="#!" class="dropdown-item" data-lng="fr">
              <span>français <small>(French)</small></span>
            </a>
            <a href="#!" class="dropdown-item" data-lng="ro">
              <span>Română <small>(Romanian)</small></span>
            </a>
            <a href="#!" class="dropdown-item" data-lng="cn">
              <span>中国人 <small>(Chinese)</small></span>
            </a>
          </div>
        </li>

        <li class="dropdown pc-h-item" style="display:none;">
          <a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
            <svg class="pc-icon"><use xlink:href="#custom-setting-2"></use></svg>
          </a>
          <div class="dropdown-menu dropdown-menu-end pc-h-dropdown">
            <a href="#!" class="dropdown-item"><i class="ti ti-user"></i><span>My Account</span></a>
            <a href="#!" class="dropdown-item"><i class="ti ti-settings"></i><span>Settings</span></a>
            <a href="#!" class="dropdown-item"><i class="ti ti-headset"></i><span>Support</span></a>
            <a href="#!" class="dropdown-item"><i class="ti ti-lock"></i><span>Lock Screen</span></a>
            <a href="#!" class="dropdown-item"><i class="ti ti-power"></i><span>Logout</span></a>
          </div>
        </li>

        <li class="pc-h-item" style="display:none;">
          <a href="#" class="pc-head-link me-0" data-bs-toggle="offcanvas" data-bs-target="#announcement" aria-controls="announcement">
            <svg class="pc-icon"><use xlink:href="#custom-flash"></use></svg>
          </a>
        </li>

        <li class="dropdown pc-h-item">
          <a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
            <svg class="pc-icon"><use xlink:href="#custom-notification"></use></svg>
            <span class="badge bg-success pc-h-badge">3</span>
          </a>
          <div class="dropdown-menu dropdown-notification dropdown-menu-end pc-h-dropdown" style="display:none;">
            <div class="dropdown-header d-flex align-items-center justify-content-between">
              <h5 class="m-0">Notifications</h5>
              <a href="#!" class="btn btn-link btn-sm">Mark all read</a>
            </div>
            <div class="dropdown-body text-wrap header-notification-scroll position-relative" style="max-height: calc(100vh - 215px)">
              <p class="text-span">Today</p>
              <div class="card mb-2">
                <div class="card-body">
                  <div class="d-flex">
                    <div class="flex-shrink-0">
                      <svg class="pc-icon text-primary"><use xlink:href="#custom-layer"></use></svg>
                    </div>
                    <div class="flex-grow-1 ms-3">
                      <span class="float-end text-sm text-muted">2 min ago</span>
                      <h5 class="text-body mb-2">UI/UX Design</h5>
                      <p class="mb-0">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s...</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="text-center py-2">
              <a href="#!" class="link-danger">Clear all Notifications</a>
            </div>
          </div>
        </li>

        <!-- ===== PROFIL UTILISATEUR ===== -->
        <li class="dropdown pc-h-item header-user-profile">
          <a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" data-bs-auto-close="outside" aria-expanded="false">
            @if(Auth::user()->avatar)
              <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="user-image" class="user-avtar" />
            @else
              <img src="{{ asset('assets/images/user/avatar-2.jpg') }}" alt="user-image" class="user-avtar" />
            @endif
          </a>
          <div class="dropdown-menu dropdown-user-profile dropdown-menu-end pc-h-dropdown">
            <div class="dropdown-header d-flex align-items-center justify-content-between">
              <h5 class="m-0">Profil</h5>
            </div>
            <div class="dropdown-body">
              <div class="profile-notification-scroll position-relative" style="max-height: calc(100vh - 225px)">
                <!-- Informations utilisateur -->
                <div class="d-flex mb-1">
                  <div class="flex-shrink-0">
                    @if(Auth::user()->avatar)
                      <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="user-image" class="user-avtar wid-35" />
                    @else
                      <img src="{{ asset('assets/images/user/avatar-2.jpg') }}" alt="user-image" class="user-avtar wid-35" />
                    @endif
                  </div>
                  <div class="flex-grow-1 ms-3">
                    <h6 class="mb-1">{{ Auth::user()->prenom ?? '' }} {{ Auth::user()->nom ?? 'Utilisateur' }} </h6>
                    <span>{{ Auth::user()->email ?? '' }}</span>
                  </div>
                </div>

                <hr class="border-secondary border-opacity-50" />

                <div class="card">
                  <div class="card-body py-3">
                    <div class="d-flex align-items-center justify-content-between">
                      <h5 class="mb-0 d-inline-flex align-items-center">
                        <svg class="pc-icon text-muted me-2"><use xlink:href="#custom-notification-outline"></use></svg>Notification
                      </h5>
                      <div class="form-check form-switch form-check-reverse m-0">
                        <input class="form-check-input f-18" type="checkbox" role="switch" />
                      </div>
                    </div>
                  </div>
                </div>

                <p class="text-span">Gestion</p>

                <a href="{{ route('profile.index') }}#profile-3" class="dropdown-item">
                    <span>
                        <i class="fas fa-cog text-muted me-2"></i>
                        <span>Paramètres du compte</span>
                    </span>
                </a>
  
                {{--<a href="{{ route('profile.index') }}#profile-4" class="dropdown-item">
                  <span>
                    <svg class="pc-icon text-muted me-2"><use xlink:href="#custom-lock-outline"></use></svg>
                    <span>Changer Mot de Passe</span>
                  </span>
                </a>--}}

                <!-- Affichage des rôles -->
                @if(Auth::user()->getRoleNames()->count() > 0)
                  <hr class="border-secondary border-opacity-50" />
                  <p class="text-span">Rôles</p>
                  @foreach(Auth::user()->getRoleNames() as $role)
                    <a href="#" class="dropdown-item" style="cursor: default;">
                      <span>
                        <i class="fas fa-user-tag text-muted me-2 "></i>
                        <span>{{ ucfirst($role) }}</span>
                      </span>
                    </a>
                  @endforeach
                @endif

                <!-- Projet sélectionné -->
                @if(session('selected_project_name'))
                  <hr class="border-secondary border-opacity-50" />
                  <p class="text-span">Projet actif</p>
                  <a href="#" class="dropdown-item" style="cursor: default;">
                    <span>
                      <i class="fas fa-folder-open text-muted me-2"></i>
                      <span>{{ session('selected_project_name') }}</span>
                    </span>
                  </a>
                @endif

                <hr class="border-secondary border-opacity-50" />

                <!-- ===== BOUTON DE DECONNEXION ===== -->
                <div class="d-grid mb-3">
                  <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary w-100">
                      <svg class="pc-icon me-2"><use xlink:href="#custom-logout-1-outline"></use></svg>
                      Se déconnecter
                    </button>
                  </form>
                </div>

                <div class="card border-0 shadow-none drp-upgrade-card mb-0" style="background-image: url(../assets/images/layout/img-profile-card.jpg);display:none;">
                  <div class="card-body">
                    <div class="user-group">
                      <img src="{{ asset('assets/images/user/avatar-1.jpg') }}" alt="user-image" class="avtar" />
                      <img src="{{ asset('assets/images/user/avatar-2.jpg') }}" alt="user-image" class="avtar" />
                      <img src="{{ asset('assets/images/user/avatar-3.jpg') }}" alt="user-image" class="avtar" />
                      <img src="{{ asset('assets/images/user/avatar-4.jpg') }}" alt="user-image" class="avtar" />
                      <img src="{{ asset('assets/images/user/avatar-5.jpg') }}" alt="user-image" class="avtar" />
                      <span class="avtar bg-light-primary text-primary">+20</span>
                    </div>
                    <h3 class="my-3 text-dark">245.3k <small class="text-muted">Followers</small></h3>
                    <a href="#" class="btn btn btn-warning buynowlinks">
                      <svg class="pc-icon me-2"><use xlink:href="#custom-logout-1-outline"></use></svg>
                      Upgrade to Business
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </li>
        <!-- ===== FIN PROFIL UTILISATEUR ===== -->
      </ul>
    </div>
  </div>
</header>

<!-- Offcanvas Announcement -->
<div class="offcanvas pc-announcement-offcanvas offcanvas-end" tabindex="-1" id="announcement" aria-labelledby="announcementLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="announcementLabel">What's new announcement?</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <!-- ... contenu de l'annonce ... -->
  </div>
</div>

<!-- JavaScript pour le changement de projet -->
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Gestion du changement de projet
    const projectSelector = document.getElementById('projectSelector');
    if (projectSelector) {
        projectSelector.addEventListener('change', function() {
            const projectId = this.value;
            if (projectId) {
                // Rediriger vers le changement de projet
                window.location.href = "{{ route('switch.project', '') }}/" + projectId;
            }
        });
    }

    // Si vous voulez afficher les notifications
    const notificationBtn = document.querySelector('[data-bs-toggle="dropdown"] .pc-h-badge');
    if (notificationBtn) {
        // Ici vous pouvez charger les notifications via AJAX
    }
});
</script>
@endpush

@push('styles')
<style>
/* Garder le style existant - rien à changer */
.pc-header .header-user-profile .dropdown-menu {
    min-width: 320px;
}
.pc-header .header-user-profile .user-avtar {
    width: 35px;
    height: 35px;
    border-radius: 50%;
    object-fit: cover;
}
.pc-header .header-user-profile .wid-35 {
    width: 35px;
    height: 35px;
    border-radius: 50%;
    object-fit: cover;
}
.pc-header .dropdown-user-profile .dropdown-item {
    cursor: pointer;
}
.pc-header .dropdown-user-profile .dropdown-item:hover {
    background-color: #f8f9fa;
}
</style>
@endpush