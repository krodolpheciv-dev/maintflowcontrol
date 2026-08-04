<!doctype html>
<html lang="en">
  <!-- [Head] start -->
  @include('style.style')
  <!-- [Head] end -->
  
  <!-- [Body] Start -->
  <body data-pc-preset="preset-1" data-pc-sidebar-caption="true" data-pc-layout="vertical" data-pc-direction="ltr" data-pc-theme_contrast="" data-pc-theme="light">
    
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
        <!-- [ breadcrumb ] -->
        @include('breadcrumb.breadcrumb')

        <!-- [ Main Content ] start -->
        <div class="row">
          <div class="col-12">
            <div class="card table-card">
              <div class="card-header">
                <div class="d-sm-flex align-items-center justify-content-between">
                  <h5 class="mb-3 mb-sm-0">Liste Des Utilisateurs</h5>
                  <div>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                      <i class="ti ti-plus me-1"></i>
                      Ajouter Utilisateur
                    </button>
                  </div>
                </div>
              </div>
              <div class="card-body card-table pt-3">
                <div class="table-responsive">
                  <table class="table table-hover" id="pc-dt-simple">
                    <thead class="bg-light-alt text-muted small text-uppercase">
                      <tr>
                        <th class="ps-4">Nom Technicien</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>Type Utilisateur</th>
                        <th>Status</th>
                        <th class="text-end pe-4">Action</th>
                      </tr>
                    </thead>
                    <tbody class="small">
                      @foreach($users as $user)
                      <tr>
                        <td class="ps-4">
                          <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                              <img src="{{ asset('assets/images/user/avatar-1.jpg') }}" alt="user image" class="img-radius wid-40" />
                            </div>
                            <div class="flex-grow-1 ms-3">
                              <h6 class="mb-0 fw-semibold">{{ $user->nom }} {{ $user->prenom }}</h6>
                            </div>
                          </div>
                        </td>
                        <td class="text-muted">{{ $user->email }}</td>
                        <td class="text-muted">{{ $user->contact }}</td>
                        <td>
                          @foreach($user->projets as $projet)
                            <span class="badge bg-light-primary text-primary border border-primary-subtle px-2 py-1 mb-1">
                              {{ $projet->nom_projet }}
                              ({{ \Spatie\Permission\Models\Role::find($projet->pivot->role_id)->name }})
                            </span>
                          @endforeach
                        </td>
                        <td>
                          @if($user->etat_utilisateur == 'actif')
                            <span class="badge bg-light-success text-success px-2 py-1">
                              <i class="ti ti-circle-check me-1"></i>Actif
                            </span>
                          @else
                            <span class="badge bg-light-secondary text-secondary px-2 py-1">
                              <i class="ti ti-circle-x me-1"></i>Inactif
                            </span>
                          @endif
                        </td>
                        <td class="text-end pe-4">
                          <a href="#" class="avtar avtar-xs btn-link-secondary btn-view-user" data-id="{{ $user->id }}">
                            <i class="ti ti-eye f-20"></i>
                          </a>
                          <a href="#" class="avtar avtar-xs btn-link-secondary btn-edit-user" data-id="{{ $user->id }}">
                            <i class="ti ti-edit f-20"></i>
                          </a>
                          <a href="#" class="avtar avtar-xs btn-link-secondary btn-delete-user" data-id="{{ $user->id }}" data-bs-toggle="modal" data-bs-target="#modalDeleteUser">
                            <i class="ti ti-trash f-20"></i>
                          </a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- [ Main Content ] end -->

       
        <!-- MODAL AJOUT UTILISATEUR -->
       
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
             data-bs-backdrop="static" data-bs-keyboard="false"
             aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content border-0 shadow rounded-4 overflow-hidden">
              <div class="modal-header border-0 px-3 pt-3 pb-1">
                <div class="d-flex align-items-center">
                  <div class="bg-primary bg-opacity-10 rounded-3 p-2 me-2">
                    <i class="ti ti-user text-primary fs-5"></i>
                  </div>
                  <div>
                    <h5 class="fw-bold mb-0">Nouvel Utilisateur</h5>
                    <small class="text-muted">Créer un compte et l'affecter à un ou plusieurs projets</small>
                  </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>

              <div class="modal-body px-3 py-2">
                @if ($errors->any() && old('_token'))
                  <div class="alert alert-danger">
                    <ul class="mb-0">
                      @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                  </div>
                @endif

                <form id="formUtilisateur" method="POST" action="{{ route('users.store') }}">
                  @csrf

                  <div class="card border-0 bg-light rounded-4 mb-2">
                    <div class="card-body p-3">
                      <h6 class="fw-semibold small mb-2">
                        <i class="ti ti-id-badge-2 me-1 text-primary"></i>
                        Identité
                      </h6>
                      <div class="row g-2">
                        <div class="col-md-6">
                          <label class="form-label small fw-semibold" for="nom">Nom</label>
                          <input type="text" class="form-control @error('nom') is-invalid @enderror" 
                                 id="nom" name="nom" value="{{ old('nom') }}" placeholder="Saisir Nom" required />
                          @error('nom')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-6">
                          <label class="form-label small fw-semibold" for="prenom">Prénom</label>
                          <input type="text" class="form-control @error('prenom') is-invalid @enderror" 
                                 id="prenom" name="prenom" value="{{ old('prenom') }}" placeholder="Saisir Prénom" required />
                          @error('prenom')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="card border-0 bg-light rounded-4 mb-2">
                    <div class="card-body p-3">
                      <h6 class="fw-semibold small mb-2">
                        <i class="ti ti-address-book me-1 text-info"></i>
                        Coordonnées
                      </h6>
                      <div class="row g-2">
                        <div class="col-md-6">
                          <label class="form-label small fw-semibold" for="email">Adresse mail</label>
                          <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                 id="email" name="email" value="{{ old('email') }}" placeholder="Saisir l'adresse mail" required />
                          @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-6">
                          <label class="form-label small fw-semibold" for="contact">Numéro Téléphone</label>
                          <input type="text" class="form-control @error('contact') is-invalid @enderror" 
                                 id="contact" name="contact" value="{{ old('contact') }}" placeholder="Saisir Numéro Téléphone" required />
                          @error('contact')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="card border-0 bg-light rounded-4 mb-2">
                    <div class="card-body p-3">
                      <h6 class="fw-semibold small mb-2">
                        <i class="ti ti-users-group me-1 text-success"></i>
                        Rôle et projets
                      </h6>
                      <div class="row g-2">
                        <div class="col-md-12">
                          <label for="role_global" class="form-label small fw-semibold">Rôle global</label>
                          <select name="role_global" id="role_global" class="form-select @error('role_global') is-invalid @enderror" required>
                            <option value="" disabled {{ old('role_global') ? '' : 'selected' }}>-- Sélectionner le rôle global --</option>
                            @foreach($roles as $role)
                              <option value="{{ $role->name }}" {{ old('role_global') == $role->name ? 'selected' : '' }}>
                                {{ $role->name }}
                              </option>
                            @endforeach
                          </select>
                          @error('role_global')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-12">
                          <label class="form-label small fw-semibold" for="projects">Projets</label>
                          <select class="form-select @error('projects') is-invalid @enderror" 
                                  id="projects" name="projects[]" multiple style="min-height: 100px;">
                            @foreach($projects as $project)
                              <option value="{{ $project->id }}" 
                                      {{ (is_array(old('projects')) && in_array($project->id, old('projects'))) ? 'selected' : '' }}>
                                {{ $project->nom_projet }}
                              </option>
                            @endforeach
                          </select>
                          <small class="text-muted">Maintenez Ctrl pour sélectionner plusieurs projets</small>
                          @error('projects')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-12" id="projetRolesContainer"></div>
                      </div>
                    </div>
                  </div>

                  <div class="modal-footer border-0 px-0 py-2">
                    <button type="button" class="btn btn-cancel rounded-pill px-4" data-bs-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary rounded-pill px-4">
                      <i class="ti ti-device-floppy me-1"></i>Enregistrer
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

        
        <!-- MODAL MODIFIER UTILISATEUR -->
       
        <div class="modal fade" id="modalUtilisateur" tabindex="-1"
             data-bs-backdrop="static" data-bs-keyboard="false"
             aria-labelledby="modalTitle" aria-hidden="true">
          <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content border-0 shadow rounded-4 overflow-hidden">
              <div class="modal-header border-0 px-3 pt-3 pb-1">
                <div class="d-flex align-items-center">
                  <div class="bg-warning bg-opacity-10 rounded-3 p-2 me-2">
                    <i class="ti ti-edit text-warning fs-5"></i>
                  </div>
                  <div>
                    <h5 class="fw-bold mb-0">Modifier Utilisateur</h5>
                    <small class="text-muted">Mettre à jour les informations du compte</small>
                  </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>

              <div class="modal-body px-3 py-2">
                <div id="editErrors" class="alert alert-danger" style="display:none;"></div>

                <form id="formUtilisateurmodif" method="POST" action="">
                  @csrf
                  @method('PUT')
                  <input type="hidden" id="userId" name="user_id" value="">

                  <div class="card border-0 bg-light rounded-4 mb-2">
                    <div class="card-body p-3">
                      <h6 class="fw-semibold small mb-2">
                        <i class="ti ti-id-badge-2 me-1 text-primary"></i>
                        Identité
                      </h6>
                      <div class="row g-2">
                        <div class="col-md-6">
                          <label class="form-label small fw-semibold" for="nommodif">Nom</label>
                          <input type="text" class="form-control" id="nommodif" name="nom" placeholder="Saisir Nom" required />
                        </div>
                        <div class="col-md-6">
                          <label class="form-label small fw-semibold" for="prenommodif">Prénom</label>
                          <input type="text" class="form-control" id="prenommodif" name="prenom" placeholder="Saisir Prénom" required />
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="card border-0 bg-light rounded-4 mb-2">
                    <div class="card-body p-3">
                      <h6 class="fw-semibold small mb-2">
                        <i class="ti ti-address-book me-1 text-info"></i>
                        Coordonnées
                      </h6>
                      <div class="row g-2">
                        <div class="col-md-6">
                          <label class="form-label small fw-semibold" for="emailmodif">Adresse mail</label>
                          <input type="email" class="form-control" id="emailmodif" name="email" placeholder="Saisir l'adresse mail" required />
                        </div>
                        <div class="col-md-6">
                          <label class="form-label small fw-semibold" for="contactmodif">Numéro Téléphone</label>
                          <input type="text" class="form-control" id="contactmodif" name="contact" placeholder="Saisir Numéro Téléphone" required />
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="card border-0 bg-light rounded-4 mb-2">
                    <div class="card-body p-3">
                      <h6 class="fw-semibold small mb-2">
                        <i class="ti ti-users-group me-1 text-success"></i>
                        Rôle et projets
                      </h6>
                      <div class="row g-2">
                        <div class="col-md-12">
                          <label for="role_globalmodif" class="form-label small fw-semibold">Rôle global</label>
                          <select name="role_global" id="role_globalmodif" class="form-select" required>
                            <option value="" disabled>-- Sélectionner le rôle global --</option>
                            @foreach($roles as $role)
                              <option value="{{ $role->name }}">{{ $role->name }}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="col-md-12">
                          <label class="form-label small fw-semibold" for="projectsmodif">Projets</label>
                          <select class="form-select" id="projectsmodif" name="projects[]" multiple style="min-height: 100px;">
                            @foreach($projects as $project)
                              <option value="{{ $project->id }}">{{ $project->nom_projet }}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="col-12" id="projetRolesContainermodif"></div>
                      </div>
                    </div>
                  </div>

                  <div class="modal-footer border-0 px-0 py-2">
                    <button type="button" class="btn btn-cancel rounded-pill px-4" data-bs-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary rounded-pill px-4" id="submitEditBtn">
                      <i class="ti ti-device-floppy me-1"></i>Enregistrer
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

       
        <!-- MODAL SUPPRIMER UTILISATEUR -->
      
        <div class="modal fade" id="modalDeleteUser" tabindex="-1"
             data-bs-backdrop="static" data-bs-keyboard="false"
             aria-labelledby="deleteModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow rounded-4">
              <div class="modal-header border-0">
                <h5 class="modal-title fw-bold">Confirmer la suppression</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <p>Êtes-vous sûr de vouloir supprimer cet utilisateur ?</p>
                <p class="text-muted small">Cette action est irréversible.</p>
                <form id="formDeleteUser" method="POST" action="">
                  @csrf
                  @method('DELETE')
                  <input type="hidden" id="deleteUserId" name="user_id" value="">
                </form>
              </div>
              <div class="modal-footer border-0">
                <button type="button" class="btn btn-cancel rounded-pill px-4" data-bs-dismiss="modal">Annuler</button>
                <button type="submit" form="formDeleteUser" class="btn btn-danger rounded-pill px-4">
                  <i class="ti ti-trash me-1"></i> Supprimer
                </button>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
    <!-- [ Main Content ] end -->

    @include('footer.footer')
    
    <!-- Required Js -->
    @include('footerscriptrequired.footerscriptrequired')

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script type="module">
      import { DataTable } from '/assets/js/plugins/module.js';
      window.dt = new DataTable('#pc-dt-simple');
    </script>

    @include('customizer.customizer')

    <script>
      $(document).ready(function() {
        let roles = @json($roles);

        
        // 1. GÉNÉRATION DES RÔLES POUR PROJETS - AJOUT
        
        $('#projects').on('change', function() {
          let container = $('#projetRolesContainer');
          container.html('');

          let selectedOptions = $(this).find('option:selected');
          
          if (selectedOptions.length === 0) {
            container.html('<p class="text-muted small mt-2">Aucun projet sélectionné</p>');
            return;
          }

          selectedOptions.each(function() {
            let projetId = $(this).val();
            let projetName = $(this).text();
            
            let div = $('<div>', { class: 'mb-2 mt-2' });
            div.append($('<label>', {
              class: 'form-label small fw-semibold',
              text: projetName + ' - Rôle'
            }));
            
            let select = $('<select>', {
              class: 'form-select',
              name: 'projets[' + projetId + ']',
              required: true
            });
            
            roles.forEach(function(role) {
              select.append($('<option>', {
                value: role.id,
                text: role.name
              }));
            });
            
            div.append(select);
            container.append(div);
          });
        });

        
        // 2. OUVERTURE MODAL ÉDITION AVEC CHARGEMENT DES DONNÉES
        
        $('.btn-edit-user').on('click', function(e) {
          e.preventDefault();
          
          let userId = $(this).data('id');
          console.log('Chargement utilisateur ID:', userId);
          
          // Afficher un indicateur de chargement sur l'icône
          let icon = $(this).find('i');
          let originalClass = icon.attr('class');
          icon.attr('class', 'ti ti-loader f-20 spinner-border spinner-border-sm');

          $.ajax({
            url: '/utilisateur/' + userId + '/edit',
            type: 'GET',
            timeout: 10000,
            success: function(user) {
              console.log('Données reçues:', user);
              populateEditForm(user);
              $('#modalUtilisateur').modal('show');
              icon.attr('class', originalClass);
            },
            error: function(xhr) {
              console.error('Erreur:', xhr);
              alert('Impossible de charger les données de l\'utilisateur');
              icon.attr('class', originalClass);
            }
          });
        });

       
        // 3. REMPLISSAGE DU FORMULAIRE D'ÉDITION
        
        function populateEditForm(user) {
          // Mettre à jour l'action du formulaire
          $('#formUtilisateurmodif').attr('action', '/utilisateur/' + user.id);
          
          // Remplir les champs
          $('#userId').val(user.id);
          $('#nommodif').val(user.nom || '');
          $('#prenommodif').val(user.prenom || '');
          $('#emailmodif').val(user.email || '');
          $('#contactmodif').val(user.contact || '');
          
          // Rôle global
          if (user.role_global) {
            $('#role_globalmodif').val(user.role_global);
          }
          
          // Projets sélectionnés
          let selectedProjects = user.projets ? user.projets.map(p => p.id) : [];
          $('#projectsmodif').val(selectedProjects);
          
          // Générer les rôles par projet
          generateEditProjectRoles(user.projets || []);
          
          // Cacher les erreurs
          $('#editErrors').hide();
        }

        
        // 4. GÉNÉRATION DES RÔLES POUR PROJETS - ÉDITION
       
        function generateEditProjectRoles(projets) {
          let container = $('#projetRolesContainermodif');
          container.html('');

          if (!projets || projets.length === 0) {
            container.html('<p class="text-muted small mt-2">Aucun projet sélectionné</p>');
            return;
          }

          projets.forEach(function(p) {
            let div = $('<div>', { class: 'mb-2 mt-2' });
            
            div.append($('<label>', {
              class: 'form-label small fw-semibold',
              text: 'Rôle pour ' + (p.nom_projet || 'Projet')
            }));
            
            let select = $('<select>', {
              class: 'form-select',
              name: 'projets[' + p.id + ']',
              required: true
            });
            
            roles.forEach(function(role) {
              let option = $('<option>', {
                value: role.id,
                text: role.name
              });
              if (p.role_id == role.id) {
                option.prop('selected', true);
              }
              select.append(option);
            });
            
            div.append(select);
            container.append(div);
          });
        }

      
        // 5. GESTION DES PROJETS DANS L'ÉDITION
        
        $('#projectsmodif').on('change', function() {
          let container = $('#projetRolesContainermodif');
          container.html('');

          let selectedOptions = $(this).find('option:selected');
          
          if (selectedOptions.length === 0) {
            container.html('<p class="text-muted small mt-2">Aucun projet sélectionné</p>');
            return;
          }

          selectedOptions.each(function() {
            let projetId = $(this).val();
            let projetName = $(this).text();
            
            let div = $('<div>', { class: 'mb-2 mt-2' });
            div.append($('<label>', {
              class: 'form-label small fw-semibold',
              text: projetName + ' - Rôle'
            }));
            
            let select = $('<select>', {
              class: 'form-select',
              name: 'projets[' + projetId + ']',
              required: true
            });
            
            roles.forEach(function(role) {
              select.append($('<option>', {
                value: role.id,
                text: role.name
              }));
            });
            
            div.append(select);
            container.append(div);
          });
        });

        
        // 6. SOUMISSION FORMULAIRE D'ÉDITION 
       
        $('#formUtilisateurmodif').on('submit', function(e) {
          e.preventDefault();
          
          let form = $(this);
          let url = form.attr('action');
          let submitBtn = $('#submitEditBtn');
          
          // Désactiver le bouton
          submitBtn.prop('disabled', true).html('<span class="spinner-border spinner-border-sm me-2"></span>Envoi...');

          $.ajax({
            type: 'POST',
            url: url,
            data: form.serialize(),
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            timeout: 15000,
            success: function(response) {
              console.log('Succès:', response);
              alert(response.success || 'Utilisateur modifié avec succès!');
              $('#modalUtilisateur').modal('hide');
              setTimeout(function() {
                location.reload();
              }, 1000);
            },
            error: function(xhr) {
              console.error('Erreur:', xhr);
              let errorHtml = '';
              if (xhr.responseJSON && xhr.responseJSON.errors) {
                let errors = xhr.responseJSON.errors;
                $.each(errors, function(key, messages) {
                  errorHtml += '<strong>' + key + ':</strong> ' + messages.join(', ') + '<br>';
                });
              } else if (xhr.responseJSON && xhr.responseJSON.message) {
                errorHtml = xhr.responseJSON.message;
              } else {
                errorHtml = 'Une erreur est survenue. Veuillez réessayer.';
              }
              $('#editErrors').html(errorHtml).show();
              submitBtn.prop('disabled', false).html('<i class="ti ti-device-floppy me-1"></i>Enregistrer');
            }
          });
        });

       
        // 7. SUPPRESSION UTILISATEUR
       
        $('.btn-delete-user').on('click', function(e) {
          let userId = $(this).data('id');
          $('#deleteUserId').val(userId);
          $('#formDeleteUser').attr('action', '/utilisateur/' + userId);
        });

        
        // 8. SOUMISSION FORMULAIRE SUPPRESSION 
       
        $('#formDeleteUser').on('submit', function(e) {
          e.preventDefault();
          
          let form = $(this);
          let url = form.attr('action');
          let submitBtn = $(this).find('button[type="submit"]');
          
          submitBtn.prop('disabled', true).html('<span class="spinner-border spinner-border-sm me-2"></span>Suppression...');

          $.ajax({
            type: 'POST',
            url: url,
            data: form.serialize(),
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
              console.log('Succès:', response);
              alert(response.success || 'Utilisateur supprimé avec succès!');
              $('#modalDeleteUser').modal('hide');
              setTimeout(function() {
                location.reload();
              }, 1000);
            },
            error: function(xhr) {
              console.error('Erreur:', xhr);
              let errorMsg = xhr.responseJSON?.message || 'Une erreur est survenue lors de la suppression.';
              alert(errorMsg);
              submitBtn.prop('disabled', false).html('<i class="ti ti-trash me-1"></i> Supprimer');
            }
          });
        });

        
        // 9. RÉINITIALISATION À LA FERMETURE
        
        $('#modalUtilisateur').on('hidden.bs.modal', function() {
          $('#editErrors').hide();
          $('#submitEditBtn').prop('disabled', false).html('<i class="ti ti-device-floppy me-1"></i>Enregistrer');
        });

        $('#modalDeleteUser').on('hidden.bs.modal', function() {
          $(this).find('button[type="submit"]').prop('disabled', false).html('<i class="ti ti-trash me-1"></i> Supprimer');
        });

        console.log('Scripts chargés avec succès');
      });
    </script>

  </body>
  <!-- [Body] end -->
</html>