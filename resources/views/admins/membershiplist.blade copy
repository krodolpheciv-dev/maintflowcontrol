<!doctype html>
<html lang="en">
  <!-- [Head] start -->

  <head>
    <title>Gestio</title>
    <!-- [Meta] -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="description"
      content="Able Pro is trending dashboard template made using Bootstrap 5 design framework. Able Pro is available in Bootstrap, React, CodeIgniter, Angular,  and .net Technologies."
    />
    <meta
      name="keywords"
      content="Bootstrap admin template, Dashboard UI Kit, Dashboard Template, Backend Panel, react dashboard, angular dashboard"
    />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="Phoenixcoded" />

    <!-- [Favicon] icon -->
    <link rel="icon" href="{{ asset('assets/images/favicon.svg') }}" type="image/x-icon" />

    <link rel="stylesheet" href="{{ asset('assets/css/plugins/style.css') }}" />
    <!-- [Font] Family -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/inter/inter.css') }}" id="main-font-link" />
    <!-- [phosphor Icons] https://phosphoricons.com/ -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/phosphor/duotone/style.css') }}" />
    <!-- [Tabler Icons] https://tablericons.com -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/tabler-icons.min.css') }}" />
    <!-- [Feather Icons] https://feathericons.com -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/feather.css') }}" />
    <!-- [Font Awesome Icons] https://fontawesome.com/icons -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome.css') }}" />
    <!-- [Material Icons] https://fonts.google.com/icons -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/material.css') }}" />
    <!-- [Template CSS Files] -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" id="main-style-link" />
    <script src="{{ asset('assets/js/tech-stack.js')}}"></script>
    <script async src="https://www.googletagmanager.com/gtag/js?id="></script>
    <script>window.dataLayer = window.dataLayer || []; function gtag() { dataLayer.push(arguments); } gtag('js', new Date()); gtag('config', ''); </script>
    <script type="text/javascript">     (function (c, l, a, r, i, t, y) { c[a] = c[a] || function () { (c[a].q = c[a].q || []).push(arguments) }; t = l.createElement(r); t.async = 1; t.src = "https://www.clarity.ms/tag/" + i; y = l.getElementsByTagName(r)[0]; y.parentNode.insertBefore(t, y); })(window, document, "clarity", "script", ""); </script>
    <script defer src="https://phpstack-207002-5085356.cloudwaysapps.com/pixel/"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/style-preset.css') }}" />
  </head>
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
          <div class="col-12">
            <div class="card table-card">
              <div class="card-header">
                <div class="d-sm-flex align-items-center justify-content-between">
                  <h5>Liste Des Utilisateurs</h5>
                <div>
                    <a href="../admins/course-teacher-apply.html" class="btn btn-outline-secondary" style="display:none;" >Apply Teacher List</a>
                    <button type="button" class="btn btn-primary"   data-bs-toggle="modal" data-bs-target="#exampleModal">Ajouter Utilisateur</button>
                  </div>
                </div>
              </div>
              <div class="card-body pt-3">
                <div class="table-responsive">
                  <table class="table table-hover" id="pc-dt-simple">
                    <thead>
                      <tr>
                        <th>Nom Technicien</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>Type Utilisateur</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>

                    @foreach($users as $user)
                      <tr>
                        <td>
                          <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                              <img src="{{ asset('assets/images/user/avatar-1.jpg') }}" alt="user image" class="img-radius wid-40" />
                            </div>
                            <div class="flex-grow-1 ms-3">
                              <h6 class="mb-0">{{ $user->nom }} {{ $user->prenom }}</h6>
                            </div>
                          </div></td>
                          <td>{{ $user->email }}</td>
                          <td>{{ $user->contact }}</td>
                          <td>
        @foreach($user->projets as $projet)
            <span class="badge bg-primary">
                {{ $projet->nom_projet }} 
                ({{ \Spatie\Permission\Models\Role::find($projet->pivot->role_id)->name }})
            </span>
        @endforeach
    </td>
<td class="{{ $user->etat_utilisateur == 'actif' ? 'text-success' : 'text-secondary' }}">
    <i class="fas fa-circle f-10 m-r-10"></i>
    {{ $user->etat_utilisateur == 'actif' ? 'Actif' : 'Inactif' }}
</td>
                        <td>
                         
                            <button class="btn btn-warning btn-sm">
                            <i class="ti ti-eye f-20"></i>
                           </button>
                          
                         
                             <button data-id="{{ $user->id }}" class="btn btn-success btn-sm btn-edit-user">
                            <i class="ti ti-edit f-20"></i>
                            </button>
                          
                          
                             <button class="btn btn-danger btn-sm">
                            <i class="ti ti-trash f-20"></i>
                            </button>
                          
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
      </div>
    </div>  

          <div
                    class="modal fade"
                    id="exampleModal"
                    tabindex="-1"
                    role="dialog"
                    aria-labelledby="exampleModalLabel"
                    aria-hidden="true"
                  >
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel"
                            ><i data-feather="user" class="icon-svg-primary wid-20 me-2"></i>Ajout Utilisateur</h5
                          >
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                        </div>
                        <form id="formUtilisateur" method="POST" action="{{ route('users.store') }}">
                              @csrf
                          <div class="modal-body">
                            <small id="emailHelp" class="form-text text-muted mb-2 mt-0"
                              style="display:none;" >We'll never share your email with anyone else.</small
                            >
                            <div class="mb-3">
                              <label class="form-label" for="nom" >Nom</label>
                              <input
                                type="text"
                                class="form-control"
                                id="nom"
                                name="nom"
                                aria-describedby="emailHelp"
                                placeholder="Saissir Nom"
                              />
                            </div>
                            <div class="mb-3">
                              <label class="form-label" for="prenom" >Prenom</label>
                              <input
                                type="text"
                                class="form-control"
                                id="prenom"
                                name="prenom"
                                aria-describedby="emailHelp"
                                placeholder="Saissir Prenom"
                              />
                            </div>
                            <div class="mb-3">
                              <label class="form-label" for="email">Adresse mail</label>
                              <input type="email" class="form-control" id="email" 
                                name="email" aria-describedby="emailHelp" placeholder="Saissir l'adresse mail" />
                            </div>

                            <div class="mb-3">
                              <label class="form-label" for="contact">Numero Telephone</label>
                              <input type="text" class="form-control" id="contact" 
                                name="contact" aria-describedby="emailHelp" placeholder="Saissir Numero Telephone" />
                            </div>
                  
<div class="mb-3">
    <label for="role_global" class="form-label">Rôle global</label>
    <select name="role_global" id="role_global" class="form-select" required>
       <option value="" disabled  selected {{ old('role') ? '' : 'selected' }} >-- Sélectionner le rôle global --</option>

        @foreach($roles as $role)
            <option value="{{ $role->name }}">
                {{ $role->name }}
            </option>
        @endforeach
    </select>
</div>
                            <div class="mb-3">
                  <label class="form-label" for="project">Projet</label>
                  <select class="form-select" id="projects"  multiple>
  <option value="" disabled {{ old('project') ? '' : 'selected' }} >-- Sélectionner le projet --</option>
                   @foreach($projects as $project)
            <option value="{{ $project->id }}">
                {{ $project->nom_projet }}
            </option>
        @endforeach
                    <!--<option>Option 1</option>
                    <option>Option 2</option>
                    <option>Option 3</option>
                    <option>Option 4</option>-->
                  </select>
                </div>


                <div id="projetRolesContainer">

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

                <div class="modal fade" id="modalUtilisateur" tabindex="-1" aria-labelledby="modalTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTitle">
          <i data-feather="user" class="icon-svg-primary wid-20 me-2"></i>
          <span id="modalAction">Ajout Utilisateur</span>
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="formUtilisateurmodif" method="POST">
        @csrf
        <input type="hidden" id="userId" name="user_id" value="">
        <div class="modal-body">


          <div class="mb-3">
            <label class="form-label" for="nom">Nom</label>
            <input type="text" class="form-control" id="nommodif" name="nom" placeholder="Saissir Nom"/>
          </div>
          <div class="mb-3">
            <label class="form-label" for="prenom">Prenom</label>
            <input type="text" class="form-control" id="prenommodif" name="prenom" placeholder="Saissir Prenom"/>
          </div>
          <div class="mb-3">
            <label class="form-label" for="email">Adresse mail</label>
            <input type="email" class="form-control" id="emailmodif" name="email" placeholder="Saissir l'adresse mail"/>
          </div>
          <div class="mb-3">
            <label class="form-label" for="contact">Numero Telephone</label>
            <input type="text" class="form-control" id="contactmodif" name="contact" placeholder="Saissir Numero Telephone"/>
          </div>
          <div class="mb-3">
            <label for="role_globalmodif" class="form-label">Rôle global</label>
            <select name="role_global" id="role_globalmodif" class="form-select" required>
              <option value="" disabled selected>-- Sélectionner le rôle global --</option>
              @foreach($roles as $role)
                <option value="{{ $role->name }}">{{ $role->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label" for="projectsmodif">Projet</label>
            <select class="form-select" id="projectsmodif"  name="projects[]" multiple>
              @foreach($projects as $project)
                <option value="{{ $project->id }}">{{ $project->nom_projet }}</option>
              @endforeach
            </select>
          </div>
          <div id="projetRolesContainermodif"></div>
          
          <div id="modalErrorsmodif" class="alert alert-danger" style="display:none;"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light-danger" data-bs-dismiss="modal">Fermer</button>
          <button type="submit" class="btn btn-light-primary" id="submitBtn">Enregistrer</button>
        </div>
      </form>
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
            <div class="mb-3">
                <label>${projetName} - Rôle</label>
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

        let selectHTML = '<div class="mb-3"><label>' + projetName + ' - Rôle</label><select name="projets['+projetId+']" class="form-select" required>';
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
    e.preventDefault(); // empêche le submit classique
    let form = $(this);
    let url = form.attr('action');

    $.ajax({
        type: 'POST',
        url: url,
        data: form.serialize(),
        success: function(response){

          console.log(response);

            alert(response.success); // ou fermer le modal et rafraichir la table
            $('#exampleModal').modal('hide');
           location.reload(); // ou juste mettre à jour la table
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
    e.preventDefault(); // empêche le submit classique
    let form = $(this);
    let url = form.attr('action');
//alert(url);
    $.ajax({
        type: 'POST',
        url: url,
        data: form.serialize(),
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response){

          console.log(response);

            alert(response.success); // ou fermer le modal et rafraichir la table
            $('#modalUtilisateur').modal('hide');
           location.reload(); // ou juste mettre à jour la table
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
   //$('body').on('click', '.btn-edit-user').click(function(){

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

        //alert(user.nom);
                $('#userId').val(user.id);
                $('#nommodif').val(user.nom);
                $('#prenommodif').val(user.prenom);
                $('#emailmodif').val(user.email);
                $('#contactmodif').val(user.contact);
                $('#role_globalmodif').val(user.role_global);

                // Projets
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

  /*  function generateProjetRoles(projets) {
    let container = $('#projetRolesContainermodif');
    container.html('');
    projets.forEach(p => {
        container.append(`
            <div class="mb-3">
                <label class="form-label">Rôle pour ${p.nom_projet}</label>
                <select class="form-select" name="projets[${p.id}]">
                    <option value="1" ${p.role_id == 1 ? 'selected' : ''}>Admin</option>
                    <option value="2" ${p.role_id == 2 ? 'selected' : ''}>Utilisateur</option>
                </select>
            </div>
        `);
    });
}*/

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
            <div class="mb-3">
                <label class="form-label">Rôle pour ${p.nom_projet}</label>
                <select class="form-select" name="projets[${p.id}]">
                    ${options}
                </select>
            </div>
        `);

    });

}
</script>

    <script src="../assets/js/plugins/choices.min.js"></script>
    <script>
      document.addEventListener('DOMContentLoaded', function () {
        var genericExamples = document.querySelectorAll('[data-trigger]');
        for (i = 0; i < genericExamples.length; ++i) {
          var element = genericExamples[i];
          new Choices(element, {
            placeholderValue: 'This is a placeholder set in the config',
            searchPlaceholderValue: 'This is a search placeholder'
          });
        }

        var textRemove = new Choices(document.getElementById('choices-text-remove-button'), {
          delimiter: ',',
          editItems: true,
          maxItemCount: 5,
          removeItemButton: true
        });

        var text_Unique_Val = new Choices('#choices-text-unique-values', {
          paste: false,
          duplicateItemsAllowed: false,
          editItems: true
        });

        var text_i18n = new Choices('#choices-text-i18n', {
          paste: false,
          duplicateItemsAllowed: false,
          editItems: true,
          maxItemCount: 5,
          addItemText: function (value) {
            return 'Appuyez sur Entrée pour ajouter <b>"' + String(value) + '"</b>';
          },
          maxItemText: function (maxItemCount) {
            return String(maxItemCount) + 'valeurs peuvent être ajoutées';
          },
          uniqueItemText: 'Cette valeur est déjà présente'
        });

        var textEmailFilter = new Choices('#choices-text-email-filter', {
          editItems: true,
          addItemFilter: function (value) {
            if (!value) {
              return false;
            }

            const regex =
              /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            const expression = new RegExp(regex.source, 'i');
            return expression.test(value);
          }
        }).setValue(['joe@bloggs.com']);

        var textDisabled = new Choices('#choices-text-disabled', {
          addItems: false,
          removeItems: false
        }).disable();

        var textPrependAppendVal = new Choices('#choices-text-prepend-append-value', {
          prependValue: 'item-',
          appendValue: '-' + Date.now()
        }).removeActiveItems();

        var textPresetVal = new Choices('#choices-text-preset-values', {
          items: [
            'Josh Johnson',
            {
              value: 'joe@bloggs.co.uk',
              label: 'Joe Bloggs',
              customProperties: {
                description: 'Joe Blogg is such a generic name'
              }
            }
          ]
        });

        var multipleDefault = new Choices(document.getElementById('choices-multiple-groups'));

        var multipleFetch = new Choices('#choices-multiple-remote-fetch', {
          placeholder: true,
          placeholderValue: 'Pick an Strokes record',
          maxItemCount: 5
        }).setChoices(function () {
          return fetch('https://api.discogs.com/artists/55980/releases?token=QBRmstCkwXEvCjTclCpumbtNwvVkEzGAdELXyRyW')
            .then(function (response) {
              return response.json();
            })
            .then(function (data) {
              return data.releases.map(function (release) {
                return {
                  value: release.title,
                  label: release.title
                };
              });
            });
        });

        var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
          removeItemButton: true
        });

        /* Use label on event */
        var choicesSelect = new Choices('#choices-multiple-labels', {
          removeItemButton: true,
          choices: [
            {
              value: 'One',
              label: 'Label One'
            },
            {
              value: 'Two',
              label: 'Label Two',
              disabled: true
            },
            {
              value: 'Three',
              label: 'Label Three'
            }
          ]
        }).setChoices(
          [
            {
              value: 'Four',
              label: 'Label Four',
              disabled: true
            },
            {
              value: 'Five',
              label: 'Label Five'
            },
            {
              value: 'Six',
              label: 'Label Six',
              selected: true
            }
          ],
          'value',
          'label',
          false
        );

        choicesSelect.passedElement.element.addEventListener('addItem', function (event) {
          document.getElementById('message').innerHTML =
            '<span class="badge bg-light-primary"> You just added "' + event.detail.label + '"</span>';
        });
        choicesSelect.passedElement.element.addEventListener('removeItem', function (event) {
          document.getElementById('message').innerHTML =
            '<span class="badge bg-light-danger"> You just removed "' + event.detail.label + '"</span>';
        });

        var singleFetch = new Choices('#choices-single-remote-fetch', {
          searchPlaceholderValue: 'Search for an Arctic Monkeys record'
        })
          .setChoices(function () {
            return fetch('https://api.discogs.com/artists/391170/releases?token=QBRmstCkwXEvCjTclCpumbtNwvVkEzGAdELXyRyW')
              .then(function (response) {
                return response.json();
              })
              .then(function (data) {
                return data.releases.map(function (release) {
                  return {
                    label: release.title,
                    value: release.title
                  };
                });
              });
          })
          .then(function (instance) {
            instance.setChoiceByValue('Fake Tales Of San Francisco');
          });

        var singleXhrRemove = new Choices('#choices-single-remove-xhr', {
          removeItemButton: true,
          searchPlaceholderValue: "Search for a Smiths' record"
        }).setChoices(function (callback) {
          return fetch('https://api.discogs.com/artists/83080/releases?token=QBRmstCkwXEvCjTclCpumbtNwvVkEzGAdELXyRyW')
            .then(function (res) {
              return res.json();
            })
            .then(function (data) {
              return data.releases.map(function (release) {
                return {
                  label: release.title,
                  value: release.title
                };
              });
            });
        });

        var singleNoSearch = new Choices('#choices-single-no-search', {
          searchEnabled: false,
          removeItemButton: true,
          choices: [
            {
              value: 'One',
              label: 'Label One'
            },
            {
              value: 'Two',
              label: 'Label Two',
              disabled: true
            },
            {
              value: 'Three',
              label: 'Label Three'
            }
          ]
        }).setChoices(
          [
            {
              value: 'Four',
              label: 'Label Four',
              disabled: true
            },
            {
              value: 'Five',
              label: 'Label Five'
            },
            {
              value: 'Six',
              label: 'Label Six',
              selected: true
            }
          ],
          'value',
          'label',
          false
        );

        var singlePresetOpts = new Choices('#choices-single-preset-options', {
          placeholder: true
        }).setChoices(
          [
            {
              label: 'Group one',
              id: 1,
              disabled: false,
              choices: [
                {
                  value: 'Child One',
                  label: 'Child One',
                  selected: true
                },
                {
                  value: 'Child Two',
                  label: 'Child Two',
                  disabled: true
                },
                {
                  value: 'Child Three',
                  label: 'Child Three'
                }
              ]
            },
            {
              label: 'Group two',
              id: 2,
              disabled: false,
              choices: [
                {
                  value: 'Child Four',
                  label: 'Child Four',
                  disabled: true
                },
                {
                  value: 'Child Five',
                  label: 'Child Five'
                },
                {
                  value: 'Child Six',
                  label: 'Child Six'
                }
              ]
            }
          ],
          'value',
          'label'
        );

        var singleSelectedOpt = new Choices('#choices-single-selected-option', {
          searchFields: ['label', 'value', 'customProperties.description'],
          choices: [
            {
              value: 'One',
              label: 'Label One',
              selected: true
            },
            {
              value: 'Two',
              label: 'Label Two',
              disabled: true
            },
            {
              value: 'Three',
              label: 'Label Three',
              customProperties: {
                description: 'This option is fantastic'
              }
            }
          ]
        }).setChoiceByValue('Two');

        var customChoicesPropertiesViaDataAttributes = new Choices('#choices-with-custom-props-via-html', {
          searchFields: ['label', 'value', 'customProperties']
        });

        var singleNoSorting = new Choices('#choices-single-no-sorting', {
          shouldSort: false
        });

        var cities = new Choices(document.getElementById('cities'));
        var tubeStations = new Choices(document.getElementById('tube-stations')).disable();

        cities.passedElement.element.addEventListener('change', function (e) {
          if (e.detail.value === 'London') {
            tubeStations.enable();
          } else {
            tubeStations.disable();
          }
        });

        var customTemplates = new Choices(document.getElementById('choices-single-custom-templates'), {
          callbackOnCreateTemplates: function (strToEl) {
            var classNames = this.config.classNames;
            var itemSelectText = this.config.itemSelectText;
            return {
              item: function (classNames, data) {
                return strToEl(
                  '\
                                <div\
                                class="' +
                    String(classNames.item) +
                    ' ' +
                    String(data.highlighted ? classNames.highlightedState : classNames.itemSelectable) +
                    '"\
                                data-item\
                                data-id="' +
                    String(data.id) +
                    '"\
                                data-value="' +
                    String(data.value) +
                    '"\
                                ' +
                    String(data.active ? 'aria-selected="true"' : '') +
                    '\
                                ' +
                    String(data.disabled ? 'aria-disabled="true"' : '') +
                    '\
                                >\
                                <span style="margin-right:10px;">🎉</span> ' +
                    String(data.label) +
                    '\
                                </div>\
                                '
                );
              },
              choice: function (classNames, data) {
                return strToEl(
                  '\
                                <div\
                                class="' +
                    String(classNames.item) +
                    ' ' +
                    String(classNames.itemChoice) +
                    ' ' +
                    String(data.disabled ? classNames.itemDisabled : classNames.itemSelectable) +
                    '"\
                                data-select-text="' +
                    String(itemSelectText) +
                    '"\
                                data-choice \
                                ' +
                    String(data.disabled ? 'data-choice-disabled aria-disabled="true"' : 'data-choice-selectable') +
                    '\
                                data-id="' +
                    String(data.id) +
                    '"\
                                data-value="' +
                    String(data.value) +
                    '"\
                                ' +
                    String(data.groupId > 0 ? 'role="treeitem"' : 'role="option"') +
                    '\
                                >\
                                <span style="margin-right:10px;">👉🏽</span> ' +
                    String(data.label) +
                    '\
                                </div>\
                                '
                );
              }
            };
          }
        });

        var resetSimple = new Choices(document.getElementById('projectsmodifse'));

        var resetMultiple = new Choices('#projectsmodifse', {
          removeItemButton: true
        });
      });
    </script>

  </body>
  <!-- [Body] end -->
</html>
