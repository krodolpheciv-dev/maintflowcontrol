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
                    <a href="../admins/course-teacher-apply.html" class="btn btn-outline-secondary" style="display:none;">Apply Teacher List</a>
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
                          <a href="#" class="avtar avtar-xs btn-link-secondary">
                            <i class="ti ti-eye f-20"></i>
                          </a>
                          <a href="#" data-id="{{ $user->id }}" class="avtar avtar-xs btn-link-secondary btn-edit-user">
                            <i class="ti ti-edit f-20"></i>
                          </a>
                          <a href="#" class="avtar avtar-xs btn-link-secondary">
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

        <!-- Modal Ajouter Utilisateur -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
             data-bs-backdrop="static" data-bs-keyboard="false"
             aria-labelledby="exampleModalLabel" aria-hidden="true">

          <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content border-0 shadow rounded-4 overflow-hidden">

              <!-- HEADER -->
              <div class="modal-header border-0 px-3 pt-3 pb-1">
                <div class="d-flex align-items-center">
                  <div class="bg-primary bg-opacity-10 rounded-3 p-2 me-2">
                    <i class="ti ti-user text-primary fs-5"></i>
                  </div>
                  <div>
                    <h5 class="fw-bold mb-0" id="exampleModalLabel">Nouvel Utilisateur</h5>
                    <small class="text-muted">Créer un compte et l'affecter à un ou plusieurs projets</small>
                  </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>

              <!-- BODY -->
              <div class="modal-body px-3 py-2">
                <form id="formUtilisateur" method="POST" action="{{ route('users.store') }}">
                  @csrf

                  <div id="modalErrors" class="alert alert-danger" style="display:none;"></div>

                  <!-- SECTION IDENTITE -->
                  <div class="card border-0 bg-light rounded-4 mb-2">
                    <div class="card-body p-3">
                      <h6 class="fw-semibold small mb-2">
                        <i class="ti ti-id-badge-2 me-1 text-primary"></i>
                        Identité
                      </h6>
                      <div class="row g-2">
                        <div class="col-md-6">
                          <label class="form-label small fw-semibold" for="nom">Nom</label>
                          <input type="text" class="form-control" id="nom" name="nom" aria-describedby="emailHelp" placeholder="Saissir Nom" />
                        </div>
                        <div class="col-md-6">
                          <label class="form-label small fw-semibold" for="prenom">Prenom</label>
                          <input type="text" class="form-control" id="prenom" name="prenom" aria-describedby="emailHelp" placeholder="Saissir Prenom" />
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- SECTION CONTACT -->
                  <div class="card border-0 bg-light rounded-4 mb-2">
                    <div class="card-body p-3">
                      <h6 class="fw-semibold small mb-2">
                        <i class="ti ti-address-book me-1 text-info"></i>
                        Coordonnées
                      </h6>
                      <small id="emailHelp" class="form-text text-muted mb-2 mt-0" style="display:none;">We'll never share your email with anyone else.</small>
                      <div class="row g-2">
                        <div class="col-md-6">
                          <label class="form-label small fw-semibold" for="email">Adresse mail</label>
                          <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Saissir l'adresse mail" />
                        </div>
                        <div class="col-md-6">
                          <label class="form-label small fw-semibold" for="contact">Numero Telephone</label>
                          <input type="text" class="form-control" id="contact" name="contact" aria-describedby="emailHelp" placeholder="Saissir Numero Telephone" />
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- SECTION ROLE & PROJETS -->
                  <div class="card border-0 bg-light rounded-4 mb-2">
                    <div class="card-body p-3">
                      <h6 class="fw-semibold small mb-2">
                        <i class="ti ti-users-group me-1 text-success"></i>
                        Rôle et projets
                      </h6>
                      <div class="row g-2">
                        <div class="col-md-12">
                          <label for="role_global" class="form-label small fw-semibold">Rôle global</label>
                          <select name="role_global" id="role_global" class="form-select" required>
                            <option value="" disabled selected {{ old('role') ? '' : 'selected' }}>-- Sélectionner le rôle global --</option>
                            @foreach($roles as $role)
                              <option value="{{ $role->name }}">
                                {{ $role->name }}
                              </option>
                            @endforeach
                          </select>
                        </div>
                        <div class="col-md-12">
                          <label class="form-label small fw-semibold" for="project">Projet</label>
                          <select class="form-select" id="projects" multiple style="min-height: 100px;">
                            <option value="" disabled {{ old('project') ? '' : 'selected' }}>-- Sélectionner le projet --</option>
                            @foreach($projects as $project)
                              <option value="{{ $project->id }}">
                                {{ $project->nom_projet }}
                              </option>
                            @endforeach
                          </select>
                          <small class="text-muted">Maintenez Ctrl pour sélectionner plusieurs projets</small>
                        </div>
                        <div class="col-12" id="projetRolesContainer"></div>
                      </div>
                    </div>
                  </div>
                </form>
              </div>

              <!-- FOOTER -->
              <div class="modal-footer border-0 px-3 py-2">
                <button type="button" class="btn btn-cancel rounded-pill px-4" data-bs-dismiss="modal">
                  Fermer
                </button>
                <button type="submit" form="formUtilisateur" class="btn btn-primary rounded-pill px-4">
                  <i class="ti ti-device-floppy me-1"></i>
                  Enregistrer
                </button>
              </div>
            </div>
          </div>
        </div>

        <!-- Modal Modifier Utilisateur -->
        <div class="modal fade" id="modalUtilisateur" tabindex="-1"
             data-bs-backdrop="static" data-bs-keyboard="false"
             aria-labelledby="modalTitle" aria-hidden="true">

          <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content border-0 shadow rounded-4 overflow-hidden">

              <!-- HEADER -->
              <div class="modal-header border-0 px-3 pt-3 pb-1">
                <div class="d-flex align-items-center">
                  <div class="bg-warning bg-opacity-10 rounded-3 p-2 me-2">
                    <i class="ti ti-edit text-warning fs-5"></i>
                  </div>
                  <div>
                    <h5 class="fw-bold mb-0" id="modalTitle">
                      <span id="modalAction">Modifier Utilisateur</span>
                    </h5>
                    <small class="text-muted">Mettre à jour les informations du compte</small>
                  </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>

              <!-- BODY -->
              <div class="modal-body px-3 py-2">
                <form id="formUtilisateurmodif" method="POST">
                  @csrf
                  <input type="hidden" id="userId" name="user_id" value="">

                  <div id="modalErrorsmodif" class="alert alert-danger" style="display:none;"></div>

                  <!-- SECTION IDENTITE -->
                  <div class="card border-0 bg-light rounded-4 mb-2">
                    <div class="card-body p-3">
                      <h6 class="fw-semibold small mb-2">
                        <i class="ti ti-id-badge-2 me-1 text-primary"></i>
                        Identité
                      </h6>
                      <div class="row g-2">
                        <div class="col-md-6">
                          <label class="form-label small fw-semibold" for="nommodif">Nom</label>
                          <input type="text" class="form-control" id="nommodif" name="nom" placeholder="Saissir Nom" />
                        </div>
                        <div class="col-md-6">
                          <label class="form-label small fw-semibold" for="prenommodif">Prenom</label>
                          <input type="text" class="form-control" id="prenommodif" name="prenom" placeholder="Saissir Prenom" />
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- SECTION CONTACT -->
                  <div class="card border-0 bg-light rounded-4 mb-2">
                    <div class="card-body p-3">
                      <h6 class="fw-semibold small mb-2">
                        <i class="ti ti-address-book me-1 text-info"></i>
                        Coordonnées
                      </h6>
                      <div class="row g-2">
                        <div class="col-md-6">
                          <label class="form-label small fw-semibold" for="emailmodif">Adresse mail</label>
                          <input type="email" class="form-control" id="emailmodif" name="email" placeholder="Saissir l'adresse mail" />
                        </div>
                        <div class="col-md-6">
                          <label class="form-label small fw-semibold" for="contactmodif">Numero Telephone</label>
                          <input type="text" class="form-control" id="contactmodif" name="contact" placeholder="Saissir Numero Telephone" />
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- SECTION ROLE & PROJETS -->
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
                            <option value="" disabled selected>-- Sélectionner le rôle global --</option>
                            @foreach($roles as $role)
                              <option value="{{ $role->name }}">{{ $role->name }}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="col-md-12">
                          <label class="form-label small fw-semibold" for="projectsmodif">Projet</label>
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
                </form>
              </div>

              <!-- FOOTER -->
              <div class="modal-footer border-0 px-3 py-2">
                <button type="button" class="btn btn-cancel rounded-pill px-4" data-bs-dismiss="modal">
                  Fermer
                </button>
                <button type="submit" form="formUtilisateurmodif" class="btn btn-primary rounded-pill px-4" id="submitBtn">
                  <i class="ti ti-device-floppy me-1"></i>
                  Enregistrer
                </button>
              </div>
            </div>
          </div>
        </div>

        <!---fin modal -->
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
    <!-- Customizer start -->
    @include('customizer.customizer')
    <!-- Customizer end -->

    <script>
      document.getElementById('projects').addEventListener('change', function() {
        let container = document.getElementById('projetRolesContainer');
        container.innerHTML = '';

        Array.from(this.selectedOptions).forEach(option => {
          let projetId = option.value;
          let projetName = option.text;

          container.innerHTML += `
            <div class="mb-2">
              <label class="form-label small fw-semibold">${projetName} - Rôle</label>
              <select name="projets[${projetId}]" class="form-select" required>
                @foreach($roles as $role)
                  <option value="{{ $role->id }}">
                    {{ $role->name }}
                  </option>
                @endforeach
              </select>
            </div>
          `;
        });
      });

      document.getElementById('projectsmodif').addEventListener('change', function() {
        let container = document.getElementById('projetRolesContainermodif');
        container.innerHTML = '';

        Array.from(this.selectedOptions).forEach(option => {
          let projetId = option.value;
          let projetName = option.text;

          let selectHTML = '<div class="mb-2"><label class="form-label small fw-semibold">' + projetName + ' - Rôle</label><select name="projets['+projetId+']" class="form-select" required>';
          @foreach($roles as $role)
          selectHTML += '<option value="{{ $role->id }}">{{ $role->name }}</option>';
          @endforeach
          selectHTML += '</select></div>';

          container.innerHTML += selectHTML;
        });
      });
    </script>

    <script>
      $('#formUtilisateur').submit(function(e){
        e.preventDefault();
        let form = $(this);
        let url = form.attr('action');

        $.ajax({
          type: 'POST',
          url: url,
          data: form.serialize(),
          success: function(response){
            console.log(response);
            alert(response.success);
            $('#exampleModal').modal('hide');
            location.reload();
          },
          error: function(xhr){
            let errors = xhr.responseJSON.errors;
            let errorHtml = '';
            $.each(errors, function(key, messages){
              errorHtml += messages.join('<br>') + '<br>';
            });
            $('#modalErrors').html(errorHtml).show();
          }
        });
      });

      $('#formUtilisateurmodif').submit(function(e){
        e.preventDefault();
        let form = $(this);
        let url = form.attr('action');

        $.ajax({
          type: 'POST',
          url: url,
          data: form.serialize(),
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          success: function(response){
            console.log(response);
            alert(response.success);
            $('#modalUtilisateur').modal('hide');
            location.reload();
          },
          error: function(xhr){
            let errors = xhr.responseJSON.errors;
            console.log(errors);
            let errorHtml = '';
            $.each(errors, function(key, messages){
              errorHtml += messages.join('<br>') + '<br>';
            });
            $('#modalErrorsmodif').html(errorHtml).show();
          }
        });
      });

      // Ouvrir le modal en mode édition
      $('body').on('click', '.btn-edit-user', function() {
        let userId = $(this).data('id');

        $.ajax({
          url: '/utilisateur/' + userId + '/edit',
          type: 'GET',
          success: function(user){
            $('#modalAction').text('Modifier Utilisateur');
            let form = $('#formUtilisateurmodif');
            form.attr('action', '/utilisateur/' + user.id);

            if(!form.find('input[name="_method"]').length){
              form.append('<input type="hidden" name="_method" value="PUT">');
            }

            $('#userId').val(user.id);
            $('#nommodif').val(user.nom);
            $('#prenommodif').val(user.prenom);
            $('#emailmodif').val(user.email);
            $('#contactmodif').val(user.contact);
            $('#role_globalmodif').val(user.role_global);

            let selectedProjects = user.projets.map(p => p.id);
            $('#projectsmodif').val(selectedProjects);
            generateProjetRoles(user.projets);

            $('#modalErrorsmodif').hide();
            $('#modalUtilisateur').modal('show');
          },
          error: function(){
            alert('Impossible de récupérer les données de l’utilisateur.');
          }
        });
      });

      let roles = @json($roles);

      function generateProjetRoles(projets) {
        let container = $('#projetRolesContainermodif');
        container.html('');

        projets.forEach(function(p){
          let options = '';

          roles.forEach(function(role){
            let selected = p.role_id == role.id ? 'selected' : '';
            options += `<option value="${role.id}" ${selected}>${role.name}</option>`;
          });

          container.append(`
            <div class="mb-2">
              <label class="form-label small fw-semibold">Rôle pour ${p.nom_projet}</label>
              <select class="form-select" name="projets[${p.id}]">
                ${options}
              </select>
            </div>
          `);
        });
      }
    </script>

  </body>
  <!-- [Body] end -->
</html>