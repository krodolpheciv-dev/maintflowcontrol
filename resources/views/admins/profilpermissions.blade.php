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
        <!-- [ breadcrumb ] start -->
        @include('breadcrumb.breadcrumb')
        <!-- [ breadcrumb ] end -->


        <!-- [ Main Content ] start -->
        <div class="row">
      <div class="col-sm-12">
                <div class="card">
                  <div class="card-body pc-component">
                    <h5 class="mb-3">Gestion des profils d’accès, permissions</h5>
                    <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                      <li class="nav-item">
                        <a
                          class="nav-link active text-uppercase"
                          id="home-tab"
                          data-bs-toggle="tab"
                          href="#home"
                          role="tab"
                          aria-controls="home"
                          aria-selected="true"
                          >Roles</a
                        >
                      </li>
                      <li class="nav-item">
                        <a
                          class="nav-link text-uppercase"
                          id="profile-tab"
                          data-bs-toggle="tab"
                          href="#profile"
                          role="tab"
                          aria-controls="profile"
                          aria-selected="false"
                          >Permissions</a
                        >
                      </li>
                    
                    </ul>
                    <div class="tab-content" id="myTabContent">
                      <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
           

            <div class="d-flex justify-content-between mb-3">
                <h5>Liste des rôles</h5>
               
                    <a href="" class="btn btn-primary btn-sm" style="display:none;">
                        ➕ Nouveau rôle
                    </a>
                    <button type="button" class="btn btn-primary"   id="nouvrole" data-bs-toggle="modal" data-bs-target="#exampleModal">Nouveau Role</button>
              
            </div>
  <div class="table-responsive">
            <table class="table table-striped table-hover align-middle" id="pc-dt-simple-role">
                <thead class="table-light">
                    <tr>
                        <th>Rôle</th>
                        <th>Nbre Permissions</th>
                        <th>nbre Utilisateurs</th>
                        <th >Actions</th>
                    </tr>
                </thead>
                <tbody>
                   @foreach($roles as $role)
                        <tr>
                            <td>
                                <strong>{{ ucfirst($role->name) }}</strong>
                            </td>
                            <td>
                                <span class="badge bg-secondary">
                                    {{ $role->permissions->count() }}
                                </span>
                            </td>
                            <td>
                                <span class="badge bg-info">
                                    {{ $role->users_count ?? 0 }}
                                </span>
                            </td>
                            <td >
                                <!---->
                                <button
                                    class="btn btn-warning btn-sm editBtn"  data-id="{{ $role->id }}"
                data-name="{{ $role->name }}"
                data-permissions='@json($role->permissions->pluck("name")->toArray())'
                data-bs-toggle="modal"
                data-bs-target="#editRoleModal" >
                                    <i class="ti ti-edit f-20"></i>
                                </button> 
                             
                             <form action=""
                                          method="POST"
                                          class="d-inline"
                                          onsubmit="return confirm('Supprimer ce rôle ?')">
                                        @csrf
                                        @method('DELETE')
                                       <button class="btn btn-danger btn-sm">
                                            <i class="ti ti-trash f-20"></i>
                                        </button>
                                    </form>
                                 
                            </td>
                        </tr>
                    @endforeach
                 
                </tbody>
            </table>
            </div>
                      </div>
                      <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                         <div class="d-flex justify-content-between mb-3">
                <h5>Permissions disponibles</h5>
               
                    <a href="" class="btn btn-primary btn-sm" style="display:none;">
                        Nouvelle permission
                    </a>
                     <button type="button" class="btn btn-primary"   data-bs-toggle="modal" data-bs-target="#createPermissionModal">Nouvelle Permission</button>
               
            </div>

            <div class="row">
                    <!--<div class="col-md-4 mb-3">
                        <div class="card shadow-sm">
                            <div class="card-header bg-light fw-bold">
                              
                            </div>
                            <ul class="list-group list-group-flush">
                               
                                    <li class="list-group-item d-flex justify-content-between">
                                       
                                        <span class="text-muted small">action</span>
                                    </li>
                               
                            </ul>
                        </div>
                    </div> -->
 <div class="table-responsive">
                    <table class="table table-striped table-hover" id="pc-dt-simple" >
    <thead>
        <tr>
            <th>#</th>
            <th>Nom</th>
            <th>Module</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
        @foreach($permissions as $index => $permission)
            <tr>
                <td>  <strong>{{ $index + 1 }}</strong></td>
                <td><strong>{{ $permission->name }}</strong></td>
                <td>
                    <span class="badge bg-info">
                        {{ ucfirst($permission->module) }}
                    </span>
                </td>
                <td>
                    <!-- Bouton EDIT -->
                    <button class="btn btn-warning btn-sm editBtnPerms"
                            data-id="{{ $permission->id }}"
                            data-name="{{ $permission->name }}"
                            data-module="{{ $permission->module }}"
                            data-bs-toggle="modal"
                            data-bs-target="#editPermissionModal">
                          <i class="ti ti-edit f-20"></i>
                    </button>

                    <!-- Delete -->
                  
                          <form action="{{ route('permissions.destroy', $permission->id) }}"
                          method="POST"
                          class="d-inline"
                          onsubmit="return confirm('Supprimer cette permission ?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">
                              <i class="ti ti-trash f-20"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
  </div>
            
            </div>
                      </div>
                      <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                        <p class="mb-0"
                          >There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some
                          form, by injected humour, or words which don't look even slightly believable. If you are going to use a passage of
                          Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p
                        >
                      </div>
                    </div>
                  </div>
                </div>
              </div>
        </div>
        <!-- [ Main Content ] end -->

        <div class="modal fade"
                    id="exampleModal"
                    tabindex="-1"
                    role="dialog"
                    aria-labelledby="exampleModalLabel"
                    aria-hidden="true"
                  >
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel"
                            ><i data-feather="user" class="icon-svg-primary wid-20 me-2"></i>Ajout Role</h5
                          >
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                        </div>
                        <form action="{{ route('roles.store') }}" method="POST">
                             @csrf
                          <div class="modal-body">
                            <small id="emailHelp" class="form-text text-muted mb-2 mt-0"
                              style="display:none;" >We'll never share your email with anyone else.</small
                            >
                            <div class="mb-3">
                              <label class="form-label" for="name" >Nom du Role</label>
                              <input
                                type="text"
                                class="form-control"
                                id="name"
                                name="name"
                                aria-describedby="emailHelp"
                                placeholder="Saissir nom role"
                              />
                            </div>

                            <div class="mb-3">
                    <label class="form-label">Permissions associées</label>

                    <div class="row">
                       @forelse($permissions as $permission)
        <div class="col-md-4 mb-2">
                <div class="form-check">
            <input type="checkbox"
                   name="permissions[]"
                  
                  value="{{ trim($permission->name) }}"              

                   class="form-check-input"
                   id="perm_{{ $permission->id }}">

            <label class="form-check-label"
                   for="perm_{{ $permission->id }}">
                {{ $permission->name }}
            </label>
                 </div>
        </div>
          @empty
    <div class="alert alert-warning">
        Aucune permission disponible.
    </div>
              @endforelse
                    </div>
                            </div>
                            </div>
                         
                 
                          
                          <div class="modal-footer">
                            <button type="button" class="btn btn-light-danger" data-bs-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-light-primary">Enregistrer</button>
                          </div>
                        </form>
                      </div>
                    </div>
                </div>
      </div>
    </div>

    <!--<div class="modal fade" id="createPermissionModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <form action="" method="POST">
                @csrf

                <div >
                    <h5 class="modal-title">Créer une permission</h5>
                    <button type="button" class="btn-close"
                            data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <div class="mb-3">
                        <label>Nom</label>
                        <input type="text"
                               name="name"
                               class="form-control"
                               placeholder="ex: create user"
                               required>
                    </div>

                    <div class="mb-3">
                        <label>Module</label>
                        <input type="text"
                               name="module"
                               class="form-control"
                               placeholder="ex: utilisateurs"
                               required>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button"
                            class="btn btn-secondary"
                            data-bs-dismiss="modal">
                        Annuler
                    </button>

                    <button type="submit"
                            class="btn btn-success">
                        Enregistrer
                    </button>
                </div>

            </form>

        </div>
    </div>
</div> -->


        <div class="modal fade"
                    id="createPermissionModal"
                    tabindex="-1"
                    role="dialog"
                    aria-labelledby="exampleModalLabel"
                    aria-hidden="true"
                  >
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel"
                            ><i data-feather="user" class="icon-svg-primary wid-20 me-2"></i>Creer une permission</h5
                          >
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                        </div>
                        <form action="{{ route('permissions.store') }}" method="POST">
                             @csrf
                          <div class="modal-body">
                            <small id="emailHelp" class="form-text text-muted mb-2 mt-0"
                              style="display:none;" >We'll never share your email with anyone else.</small
                            >
                            <div class="mb-3">
                             
                              <label class="form-label" for="nom" >Nom</label>
                        <input type="text"
                               name="name"
                               class="form-control"
                               placeholder="ex: create user"
                               required>

                            </div>

                            <div class="mb-3">
                    <label class="form-label">Module</label>
                              <input type="text"
                               name="module"
                               class="form-control"
                               placeholder="ex: utilisateurs"
                               required>
                   
                            </div>
                            </div>
                         
                 
                          
                          <div class="modal-footer">
                            <button type="button" class="btn btn-light-danger" data-bs-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-light-primary">Enregistrer</button>
                          </div>
                        </form>
                      </div>
                    </div>
                </div>

    <div class="modal fade" id="editRoleModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <form id="editRoleForm" method="POST">
                @csrf
                @method('PUT')

                <div class="modal-header">
                    <h5 class="modal-title">Modifier le Role</h5>
                    <button type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <!-- Nom rôle -->
                    <div class="mb-3">
                        <label class="form-label">Nom du Role</label>
                        <input type="text"
                               class="form-control"
                               name="name"
                               id="edit_role_name"
                               required>
                    </div>

                    <!-- Permissions -->
                    <div class="mb-3">
                        <label class="form-label">Permissions</label>

                        <div class="row">
                            @foreach($permissions as $permission)
                                <div class="col-md-4 mb-2">
                                    <div class="form-check">
                                        <input type="checkbox"
                                               class="form-check-input edit-permission"
                                               name="permissions[]"
                                               value="{{ $permission->name }}"
                                               id="perm_edit_{{ $permission->id }}">

                                        <label class="form-check-label"
                                               for="perm_edit_{{ $permission->id }}">
                                            {{ $permission->name }}
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button"
                            class="btn btn-light-danger"
                            data-bs-dismiss="modal">
                        Fermer
                    </button>

                    <button type="submit"
                            class="btn btn-light-primary">
                        Mettre à jour
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>


<div class="modal fade"
     id="editPermissionModal"
     tabindex="-1"
     aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">

            <form id="editPermissionForm" method="POST">
                @csrf
                @method('PUT')

                <div class="modal-header">
                    <h5 class="modal-title">
                        Modifier la permission
                    </h5>
                    <button type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <div class="mb-3">
                        <label class="form-label">Nom</label>
                        <input type="text"
                               name="name"
                               id="edit_permission_name"
                               class="form-control"
                               required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Module</label>
                        <input type="text"
                               name="module"
                               id="edit_permission_module"
                               class="form-control"
                               required>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button"
                             class="btn btn-light-danger"
                            data-bs-dismiss="modal">
                        Fermer
                    </button>

                    <button type="submit"
                            class="btn btn-light-primary" >
                        Mettre à jour
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>


    <!-- [ Main Content ] end -->
   <!-- [ Footer ] start -->
@include('footer.footer')
<!-- [ Footer ] End -->

 <!-- Customizer start -->
@include('customizer.customizer')
<!-- Customizer end -->

   <!-- [ Footer Script ] start  -->
 @include('footerscript.footerscript')


 <script>
document.addEventListener('DOMContentLoaded', function () {

    document.querySelectorAll('.editBtn').forEach(function(button) {

        button.addEventListener('click', function () {

            // récupérer données
            let roleId = this.getAttribute('data-id');
            let roleName = this.getAttribute('data-name');
            let permissionsData = this.getAttribute('data-permissions');

            // convertir en tableau JS
            let rolePermissions = [];

            try {
                rolePermissions = JSON.parse(permissionsData);
            } catch (e) {
                console.log("Erreur JSON:", permissionsData);
            }

            // remplir nom
            document.getElementById('edit_role_name').value = roleName;

            // décocher tout
            document.querySelectorAll('.edit-permission').forEach(function(cb) {
                cb.checked = false;
            });

            // cocher permissions existantes
            document.querySelectorAll('.edit-permission').forEach(function(cb) {

                if (rolePermissions.includes(cb.value)) {
                    cb.checked = true;
                }

            });

            // changer action du formulaire
            document.getElementById('editRoleForm').action =
                "{{ url('roles') }}/" + roleId;

        });

    });

    

    document.querySelectorAll('.editBtnPerms').forEach(function(button) {

        button.addEventListener('click', function () {

            let id = this.dataset.id;
            let name = this.dataset.name;
            let module = this.dataset.module;

            // Remplir les champs
            document.getElementById('edit_permission_name').value = name;
            document.getElementById('edit_permission_module').value = module;

            // Modifier l'action du formulaire
            document.getElementById('editPermissionForm').action =
                "{{ url('permissions') }}/" + id;

        });

    });

});
</script>

 <!-- Required Js -->
<script src="{{ asset('assets/js/plugins/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/fonts/custom-font.js') }}"></script>
<script src="{{ asset('assets/js/pcoded.js') }}"></script>
<script src="{{ asset('assets/js/plugins/feather.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/datepicker-full.min.js') }}"></script>
    <script src="build/js/intlTelInputWithUtils.js"></script>

<script>
      // minimum setup
      (function () {
        const d_week = new Datepicker(document.querySelector('#pc-datepicker-1'), {
          buttonClass: 'btn'
        });
      })();

        (function () {
        const d_week = new Datepicker(document.querySelector('#pc-datepicker-2'), {
          buttonClass: 'btn'
        });
      })();
    </script>
   


<script>
  layout_change('light');
</script>
  
<script>
  change_box_container('false');
</script>
 
<script>
  layout_caption_change('true');
</script>
 
<script>
  layout_rtl_change('false');
</script>
 
<script>
  preset_change('preset-1');
</script>
 
<script>
  main_layout_change('vertical');
</script>

<!--
<script src="{{ asset('assets/Datatablesimport/jquery.dataTables.min.js') }}"></script>


<script src="{{ asset('assets/Datatablesimport/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/Datatablesimport/dataTables.buttons.min.js') }}"></script>


<script src="{{ asset('assets/Datatablesimport/jszip.min.js') }}"></script>


<script src="{{ asset('assets/Datatablesimport/buttons.html5.min.js') }}"></script> -->


<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.bootstrap5.min.css">

<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/searchbuilder/1.6.0/css/searchBuilder.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.4.1/css/dataTables.dateTime.min.css">
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.colVis.min.js"></script>


  <!-- JSZip (nécessaire pour Excel) -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdn.datatables.net/searchbuilder/1.6.0/js/dataTables.searchBuilder.min.js"></script>
<script src="https://cdn.datatables.net/datetime/1.4.1/js/dataTables.dateTime.min.js"></script>

<script type="module">
      /*import { DataTable } from '/assets/js/plugins/module.js';
      window.dt = new DataTable('#permissionsTable'); */
    </script>
 

  <script>  

 </script> 
 <script>  
 $(document).ready(function(){  
      $('#pc-dt-simple').DataTable({
    pageLength: 3
});  

      $("#pc-dt-simple-role").DataTable({
    pageLength: 3
});
 });  
 </script> 

  </body>
  <!-- [Body] end -->
</html>
