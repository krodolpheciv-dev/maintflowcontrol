<!doctype html>
<html lang="en" class="preset-1" data-pc-sidebar-caption="true" data-pc-layout="vertical" data-pc-direction="ltr" dir="ltr" data-pc-theme_contrast="" data-pc-theme="light">
  <!-- [Head] start -->
  <head>
    <title>Mon Profil - GestIOT</title>
    <!-- [Meta] -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Able Pro is trending dashboard template" />
    <meta name="keywords" content="Bootstrap admin template, Dashboard UI Kit" />
    <meta name="author" content="Phoenixcoded" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- [Favicon] icon -->
    <link rel="icon" href="{{ asset('assets/images/favicon.svg') }}" type="image/x-icon" />

    <!-- [Font] Family -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/inter/inter.css') }}" id="main-font-link" />
    <link rel="stylesheet" href="{{ asset('assets/fonts/phosphor/duotone/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/fonts/tabler-icons.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/fonts/feather.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/fonts/material.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" id="main-style-link" />
    <link rel="stylesheet" href="{{ asset('assets/css/profile.css') }}" />

    
  </head>

  <body>
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
      <div class="loader-track">
        <div class="loader-fill"></div>
      </div>
    </div>
    <!-- [ Pre-loader ] End -->

    <!-- [ Sidebar Menu ] start -->
    @include('sidemenu.sidebar')
    <!-- [ Sidebar Menu ] end -->

    <!-- [ Header Topbar ] start -->
    @include('header.header')
    <!-- [ Header ] end -->

    <!-- [ Main Content ] start -->
    <div class="pc-container">
      <div class="pc-content">
        <!-- [ breadcrumb ] start -->
        @include('breadcrumb.breadcrumb')
        <!-- [ breadcrumb ] end -->

        @php
          $user = Auth::user();
          $role = $user->getRoleNames()->first() ?? 'Aucun rôle';
          $projets = $user->projets()->get();
          $projetNames = $projets->pluck('nom_projet')->implode(', ');

          // Détermine quel onglet contient les champs en erreur
          $errorTab = null;
          if ($errors->hasAny(['nom', 'prenom', 'email', 'contact', 'avatar'])) {
              $errorTab = 'profile-2';
          } elseif ($errors->hasAny(['current_password', 'new_password', 'new_password_confirmation'])) {
              $errorTab = 'profile-4';
          }
        @endphp

        <!-- Messages flash -->
        @if(session('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="ti ti-circle-check me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
        @if(session('error'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="ti ti-alert-circle me-2"></i>{{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
        @if(session('info'))
          <div class="alert alert-info alert-dismissible fade show" role="alert">
            <i class="ti ti-info-circle me-2"></i>{{ session('info') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif

        <!-- [ Main Content ] start -->
        <div class="row">
          <div class="col-12">
           <!-- Onglets  -->
            <div class="card card-modern">
            <div class="card-body">
                <ul class="nav nav-pills profile-tabs flex-wrap" id="profileTabs">
                <li class="nav-item">
                    <a href="#profile-1" class="nav-link active" data-tab="profile-1">
                    <i class="ti ti-user me-1"></i> Profil
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#profile-2" class="nav-link" data-tab="profile-2">
                    <i class="ti ti-file-text me-1"></i> Infos
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#profile-3" class="nav-link" data-tab="profile-3">
                    <i class="ti ti-id me-1"></i> Compte
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#profile-4" class="nav-link" data-tab="profile-4">
                    <i class="ti ti-lock me-1"></i> Mot de passe
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#profile-5" class="nav-link" data-tab="profile-5">
                    <i class="ti ti-users me-1"></i> Rôles
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#profile-6" class="nav-link" data-tab="profile-6">
                    <i class="ti ti-settings me-1"></i> Paramètres
                    </a>
                </li>
                </ul>
            </div>
            </div>

            <div class="tab-content">
              <!--  TAB 1 - PROFIL  -->
              <div class="tab-pane active" id="profile-1">
                <div class="row">
                  <!-- Colonne de gauche -->
                  <div class="col-lg-4 col-xl-3">
                    <!-- Carte de profil -->
                    <div class="card profile-card card-modern">
                      <div class="card-body text-center">
                        <div class="profile-avatar-wrapper">
                          @if($user->avatar)
                            <img class="profile-avatar" src="{{ asset('storage/' . $user->avatar) }}" alt="Avatar" />
                          @else
                            <img class="profile-avatar" src="{{ asset('assets/images/user/avatar-5.jpg') }}" alt="Avatar" />
                          @endif
                          <span class="status-dot {{ $user->etat_utilisateur == 'actif' ? 'online' : 'offline' }}"></span>
                        </div>

                        <div class="profile-name">{{ $user->prenom }} {{ $user->nom }}</div>
                        <div class="profile-role">{{ $role }}</div>

                        <hr class="profile-divider" />

                        <div class="profile-stats">
                          <div class="stat-item">
                            <div class="stat-number">{{ $projets->count() }}</div>
                            <div class="stat-label">Projets</div>
                          </div>
                          <div class="stat-item">
                            <div class="stat-number">{{ $user->getRoleNames()->count() }}</div>
                            <div class="stat-label">Rôles</div>
                          </div>
                          <div class="stat-item">
                            <div class="stat-number">
                              @if($user->etat_utilisateur == 'actif')
                                <i class="ti ti-circle-check text-success"></i>
                              @else
                                <i class="ti ti-circle-x text-danger"></i>
                              @endif
                            </div>
                            <div class="stat-label">Statut</div>
                          </div>
                        </div>

                        <hr class="profile-divider" />

                        <div class="profile-info-grid">
                          <div class="profile-info-item">
                            <div class="info-icon"><i class="ti ti-mail"></i></div>
                            <div class="text-start">
                              <div class="info-label">Email</div>
                              <div class="info-value">{{ $user->email }}</div>
                            </div>
                          </div>
                          <div class="profile-info-item">
                            <div class="info-icon"><i class="ti ti-phone"></i></div>
                            <div class="text-start">
                              <div class="info-label">Contact</div>
                              <div class="info-value">{{ $user->contact ?? 'Non renseigné' }}</div>
                            </div>
                          </div>
                          <div class="profile-info-item">
                            <div class="info-icon"><i class="ti ti-building"></i></div>
                            <div class="text-start">
                              <div class="info-label">Projets</div>
                              <div class="info-value">{{ $projetNames ?: 'Aucun' }}</div>
                            </div>
                          </div>
                          <div class="profile-info-item">
                            <div class="info-icon"><i class="ti ti-shield"></i></div>
                            <div class="text-start">
                              <div class="info-label">Statut</div>
                              <div class="info-value">
                                <span class="badge badge-soft {{ $user->etat_utilisateur == 'actif' ? 'badge-soft-success' : 'badge-soft-danger' }}">
                                  {{ ucfirst($user->etat_utilisateur ?? 'Inconnu') }}
                                </span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- Informations du compte -->
                    <div class="card card-modern">
                      <div class="card-header">
                        <h5>Informations du compte</h5>
                      </div>
                      <div class="card-body">
                        <div class="profile-info-grid">
                          <div class="profile-info-item">
                            <div class="info-icon"><i class="ti ti-calendar-plus"></i></div>
                            <div class="text-start">
                              <div class="info-label">Membre depuis</div>
                              <div class="info-value">{{ $user->created_at?->format('d/m/Y') ?? 'Non renseigné' }}</div>
                            </div>
                          </div>
                          <div class="profile-info-item">
                            <div class="info-icon"><i class="ti ti-refresh"></i></div>
                            <div class="text-start">
                              <div class="info-label">Dernière mise à jour</div>
                              <div class="info-value">{{ $user->updated_at?->format('d/m/Y H:i') ?? 'Non renseigné' }}</div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- Colonne de droite -->
                  <div class="col-lg-8 col-xl-9">
                    <div class="card card-modern">
                      <div class="card-header">
                        <h5>À propos de moi</h5>
                      </div>
                      <div class="card-body">
                        <p>Je suis <strong>{{ $user->prenom }} {{ $user->nom }}</strong>, {{ $role }} sur la plateforme GestIOT. Je suis impliqué dans {{ $projets->count() }} projet(s) : <strong>{{ $projetNames ?: 'Aucun' }}</strong>.</p>
                      </div>
                    </div>

                    <div class="card card-modern">
                      <div class="card-header">
                        <h5>Détails personnels</h5>
                      </div>
                      <div class="card-body">
                        <ul class="detail-list">
                          <li class="detail-item">
                            <div class="row">
                              <div class="col-md-6">
                                <div class="detail-label">Nom complet</div>
                                <div class="detail-value">{{ $user->nom }} {{ $user->prenom }}</div>
                              </div>
                              <div class="col-md-6">
                                <div class="detail-label">Email</div>
                                <div class="detail-value">{{ $user->email }}</div>
                              </div>
                            </div>
                          </li>
                          <li class="detail-item">
                            <div class="row">
                              <div class="col-md-6">
                                <div class="detail-label">Contact</div>
                                <div class="detail-value">{{ $user->contact ?? 'Non renseigné' }}</div>
                              </div>
                              <div class="col-md-6">
                                <div class="detail-label">Statut</div>
                                <div class="detail-value">
                                  <span class="badge badge-soft {{ $user->etat_utilisateur == 'actif' ? 'badge-soft-success' : 'badge-soft-danger' }}">
                                    {{ ucfirst($user->etat_utilisateur ?? 'Inconnu') }}
                                  </span>
                                </div>
                              </div>
                            </div>
                          </li>
                          <li class="detail-item">
                            <div class="row">
                              <div class="col-md-6">
                                <div class="detail-label">Rôle global</div>
                                <div class="detail-value"><span class="badge badge-soft-primary">{{ $role }}</span></div>
                              </div>
                              <div class="col-md-6">
                                <div class="detail-label">Projets</div>
                                <div class="detail-value">
                                  @forelse($projets as $projet)
                                    <span class="badge badge-soft-info me-1">{{ $projet->nom_projet }}</span>
                                  @empty
                                    <span class="text-muted fst-italic">Aucun projet</span>
                                  @endforelse
                                </div>
                              </div>
                            </div>
                          </li>
                          <li class="detail-item border-0">
                            <div class="detail-label">Permissions</div>
                            <div>
                              @forelse($user->getAllPermissions() as $permission)
                                <span class="badge badge-soft-success me-1">{{ $permission->name }}</span>
                              @empty
                                <span class="text-muted fst-italic">Aucune permission spécifique</span>
                              @endforelse
                            </div>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- TAB 2 - INFORMATIONS PERSONNELLES  -->
              <div class="tab-pane" id="profile-2">
                <div class="row">
                  <div class="col-lg-8 col-xl-6 mx-auto">
                    <div class="card card-modern">
                      <div class="card-header">
                        <h5>Informations personnelles</h5>
                      </div>
                      <div class="card-body">
                        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                          @csrf
                          @method('PUT')

                          <div class="text-center mb-4">
                            <div class="avatar-upload">
                              <label for="avatar">
                                @if($user->avatar)
                                  <img class="avatar-preview" src="{{ asset('storage/' . $user->avatar) }}" alt="Avatar" />
                                @else
                                  <img class="avatar-preview" src="{{ asset('assets/images/user/avatar-4.jpg') }}" alt="Avatar" />
                                @endif
                                <div class="avatar-upload-overlay">
                                  <i class="ti ti-camera"></i>
                                  <span>Changer</span>
                                </div>
                              </label>
                              <input type="file" id="avatar" name="avatar" class="d-none" accept="image/*" />
                            </div>
                            @error('avatar')
                              <div class="text-danger small mt-2">{{ $message }}</div>
                            @enderror
                          </div>

                          <div class="mb-3">
                            <label class="form-label">Nom</label>
                            <input type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ old('nom', $user->nom) }}" required />
                            @error('nom')
                              <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                          </div>

                          <div class="mb-3">
                            <label class="form-label">Prénom</label>
                            <input type="text" class="form-control @error('prenom') is-invalid @enderror" name="prenom" value="{{ old('prenom', $user->prenom) }}" required />
                            @error('prenom')
                              <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                          </div>

                          <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email) }}" required />
                            @error('email')
                              <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                          </div>

                          <div class="mb-3">
                            <label class="form-label">Contact</label>
                            <input type="text" class="form-control @error('contact') is-invalid @enderror" name="contact" value="{{ old('contact', $user->contact) }}" />
                            @error('contact')
                              <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                          </div>

                          <button type="submit" class="btn btn-primary w-100">Mettre à jour</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!--  TAB 3 - MON COMPTE  -->
              <div class="tab-pane" id="profile-3">
                <div class="row">
                  <div class="col-lg-8 col-xl-6 mx-auto">
                    <div class="card card-modern">
                      <div class="card-header">
                        <h5>Paramètres généraux</h5>
                      </div>
                      <div class="card-body">
                        <form action="{{ route('profile.account.update') }}" method="POST">
                          @csrf
                          @method('PUT')
                          <div class="mb-3">
                            <label class="form-label">Nom d'utilisateur</label>
                            <input type="text" class="form-control" name="username" value="{{ $user->email }}" readonly />
                            <small class="text-muted">Votre nom d'utilisateur est votre email</small>
                          </div>

                          <div class="mb-3">
                            <label class="form-label">Email du compte</label>
                            <input type="text" class="form-control" name="account_email" value="{{ $user->email }}" readonly />
                          </div>

                          <button type="submit" class="btn btn-primary w-100">Mettre à jour</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

             <!-- TAB 4 - CHANGER MOT DE PASSE -->
            <div class="tab-pane" id="profile-4">
              <div class="row">
                <div class="col-lg-8 col-xl-6 mx-auto">
                  <div class="card card-modern">
                    <div class="card-header">
                      <h5>Changer le mot de passe</h5>
                    </div>
                    <div class="card-body">
                      <form action="{{ route('profile.password.update') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                          <label class="form-label">Ancien mot de passe</label>
                          <div class="password-wrapper">
                            <input type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" id="current_password" required />
                            <button type="button" class="toggle-password-btn" onclick="togglePassword('current_password')" aria-label="Afficher/Masquer le mot de passe">
                              <i class="ti ti-eye" id="icon-current_password"></i>
                            </button>
                            @error('current_password')
                              <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div>
                        </div>

                        <div class="mb-3">
                          <label class="form-label">Nouveau mot de passe</label>
                          <div class="password-wrapper">
                            <input type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" id="new_password" required />
                            <button type="button" class="toggle-password-btn" onclick="togglePassword('new_password')" aria-label="Afficher/Masquer le mot de passe">
                              <i class="ti ti-eye" id="icon-new_password"></i>
                            </button>
                            @error('new_password')
                              <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div>
                        </div>

                        <div class="mb-3">
                          <label class="form-label">Confirmer le mot de passe</label>
                          <div class="password-wrapper">
                            <input type="password" class="form-control" name="new_password_confirmation" id="new_password_confirmation" required />
                            <button type="button" class="toggle-password-btn" onclick="togglePassword('new_password_confirmation')" aria-label="Afficher/Masquer le mot de passe">
                              <i class="ti ti-eye" id="icon-new_password_confirmation"></i>
                            </button>
                          </div>
                        </div>

                        <div class="mb-4 p-3 bg-light rounded-3">
                          <h6 class="mb-2">Le nouveau mot de passe doit contenir :</h6>
                          <ul class="list-unstyled mb-0 small">
                            <li class="mb-1"><i class="ti ti-check text-success me-2"></i> Au moins 8 caractères</li>
                            <li class="mb-1"><i class="ti ti-check text-success me-2"></i> Au moins 1 lettre minuscule (a-z)</li>
                            <li class="mb-1"><i class="ti ti-check text-success me-2"></i> Au moins 1 lettre majuscule (A-Z)</li>
                            <li class="mb-1"><i class="ti ti-check text-success me-2"></i> Au moins 1 chiffre (0-9)</li>
                            <li><i class="ti ti-check text-success me-2"></i> Au moins 1 caractère spécial</li>
                          </ul>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Mettre à jour</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>

              <!--  TAB 5 - RÔLES & PROJETS  -->
              <div class="tab-pane" id="profile-5">
                <div class="card card-modern">
                  <div class="card-header">
                    <h5>Mes Rôles et Projets</h5>
                  </div>
                  <div class="card-body">
                    <div class="row mb-4">
                      <div class="col-md-6">
                        <div class="p-3 bg-light rounded-3 text-center">
                          <div class="text-muted small text-uppercase">Rôle global</div>
                          <span class="badge badge-soft-primary fs-6 px-4 py-2 mt-1">{{ $role }}</span>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="p-3 bg-light rounded-3 text-center">
                          <div class="text-muted small text-uppercase">Statut</div>
                          <span class="badge badge-soft {{ $user->etat_utilisateur == 'actif' ? 'badge-soft-success' : 'badge-soft-danger' }} fs-6 px-4 py-2 mt-1">
                            {{ ucfirst($user->etat_utilisateur ?? 'Inconnu') }}
                          </span>
                        </div>
                      </div>
                    </div>

                    <h5 class="mb-3">Mes Projets</h5>
                    <div class="table-responsive">
                      <table class="table table-hover">
                        <thead class="bg-light-alt text-muted small text-uppercase">
                          <tr>
                            <th class="ps-4">Projet</th>
                            <th>Rôle dans le projet</th>
                          </tr>
                        </thead>
                        <tbody class="small">
                          @forelse($projets as $projet)
                            <tr>
                              <td class="ps-4"><i class="ti ti-building me-2 text-primary"></i>{{ $projet->nom_projet }}</td>
                              <td>
                                @php
                                  $projetRole = $projet->pivot->role_id ? \Spatie\Permission\Models\Role::find($projet->pivot->role_id) : null;
                                @endphp
                                <span class="badge badge-soft-info">{{ $projetRole ? $projetRole->name : 'Non défini' }}</span>
                              </td>
                            </tr>
                          @empty
                            <tr>
                              <td colspan="2" class="text-center text-muted py-4">Aucun projet assigné</td>
                            </tr>
                          @endforelse
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>

              <!--  TAB 6 - PARAMÈTRES  -->
              <div class="tab-pane" id="profile-6">
                <div class="row">
                  <div class="col-lg-8 col-xl-6 mx-auto">
                    <div class="card card-modern">
                      <div class="card-header">
                        <h5>Préférences de notification</h5>
                      </div>
                      <div class="card-body">
                        <div class="alert alert-info">
                          <i class="ti ti-info-circle me-2"></i>
                          Les préférences de notification seront bientôt disponibles.
                        </div>
                        <div class="d-flex align-items-center justify-content-between py-2 border-bottom">
                          <div>
                            <p class="mb-0 fw-medium">Notifications par email</p>
                            <small class="text-muted">Recevoir des notifications par email</small>
                          </div>
                          <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" checked disabled />
                          </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-between py-2">
                          <div>
                            <p class="mb-0 fw-medium">Notifications push</p>
                            <small class="text-muted">Recevoir des notifications push</small>
                          </div>
                          <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" disabled />
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- [ Main Content ] end -->
      </div>
    </div>
    <!-- [ Main Content ] end -->

    <!-- Footer -->
    @include('footer.footer')

    <!-- Required Js -->
    <script src="{{ asset('assets/js/plugins/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/i18next.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/i18nextHttpBackend.min.js') }}"></script>
    <script src="{{ asset('assets/js/icon/custom-font.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script src="{{ asset('assets/js/theme.js') }}"></script>
    <script src="{{ asset('assets/js/multi-lang.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/feather.min.js') }}"></script>


    <script>
  function togglePassword(fieldId) {
    const input = document.getElementById(fieldId);
    const icon = document.getElementById('icon-' + fieldId);
    const btn = document.querySelector(`[onclick="togglePassword('${fieldId}')"]`);
    
    if (input.type === 'password') {
      input.type = 'text';
      icon.classList.remove('ti-eye');
      icon.classList.add('ti-eye-off');
      btn.classList.add('active');
    } else {
      input.type = 'password';
      icon.classList.remove('ti-eye-off');
      icon.classList.add('ti-eye');
      btn.classList.remove('active');
    }
  }

  document.addEventListener('DOMContentLoaded', function() {
    
    var tabLinks = document.querySelectorAll('#profileTabs .nav-link');
    var tabPanes = document.querySelectorAll('.tab-pane');

    function activateTab(tabId) {
      tabLinks.forEach(function(link) {
        link.classList.remove('active');
      });
      tabPanes.forEach(function(pane) {
        pane.classList.remove('active');
      });

      var activeLink = document.querySelector('#profileTabs .nav-link[data-tab="' + tabId + '"]');
      if (activeLink) {
        activeLink.classList.add('active');
      }

      var activePane = document.getElementById(tabId);
      if (activePane) {
        activePane.classList.add('active');
      }
    }

    tabLinks.forEach(function(link) {
      link.addEventListener('click', function(e) {
        e.preventDefault();
        var tabId = this.getAttribute('data-tab');
        activateTab(tabId);
        history.pushState(null, null, '#' + tabId);
      });
    });

    var errorTab = @json($errorTab);
    if (errorTab) {
      activateTab(errorTab);
    } else if (window.location.hash) {
      var hash = window.location.hash.substring(1);
      if (hash.startsWith('profile-')) {
        activateTab(hash);
      }
    }

    var avatarInput = document.getElementById('avatar');
    if (avatarInput) {
      avatarInput.addEventListener('change', function() {
        var file = this.files[0];
        if (file) {
          var reader = new FileReader();
          reader.onload = function(e) {
            var img = document.querySelector('.avatar-preview');
            if (img) {
              img.src = e.target.result;
            }
          };
          reader.readAsDataURL(file);
        }
      });
    }
  });
</script>

<script>
  layout_change('light');
  change_box_container('false');
  layout_caption_change('true');
  layout_rtl_change('false');
  preset_change('preset-1');
  main_layout_change('vertical');
</script>



  </body>
</html>