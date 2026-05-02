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
                  <h5>Liste Projets</h5>
                <div>
                    <a href="../admins/course-teacher-apply.html" class="btn btn-outline-secondary" style="display:none;" >Apply Teacher List</a>
                    <button type="button" class="btn btn-primary"   data-bs-toggle="modal" data-bs-target="#exampleModal">Ajouter Projet</button>
                  </div>
                </div>
              </div>
              <div class="card-body pt-3">
                <div class="table-responsive">
                  <table class="table table-hover" id="pc-dt-simple">
                    <thead>
                      <tr>
                        <th>Intitule Projet</th>
                        <th style="text-align:center;" >Date debut Projet</th>
                        <th style="text-align:center;" >Date Fin Projet</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>


                    @foreach($projects as $project)
                          <tr>
                        <td>
                          <div class="d-flex align-items-center">
                            <div class="flex-shrink-0" style="display:none;">
                              <img src="{{ asset('assets/images/user/avatar-1.jpg') }}" alt="user image" class="img-radius wid-40" />
                            </div>
                            <div class="flex-grow-1 ms-3">
                              <h6 class="mb-0">{{ $project->nom_projet }}</h6>
                            </div>
                          </div>
                        </td>
                        <td style="text-align:center;" >{{ $project->date_debut }}</td>
                        <td style="text-align:center;" >{{ $project->date_fin  ?? '-' }}</td>
                        <td class="{{ $project->is_active ? 'text-success' : 'text-secondary' }}">
    
                          
                        @if($project->is_active)
                    <i class="fas fa-circle f-10 m-r-10"></i> Active</td>
                @else
                     <i class="fas fa-circle f-10 m-r-10"></i> InActive</td>
                @endif
                        
                        
                      
</td>
<td>
                            <div class="d-flex align-items-center">
                            <div class="flex-shrink-0" style="display:non;">
                               @if($project->contrat)
                          <a href="{{ asset('storage/'.$project->contrat) }}" target="_blank" class="avtar avtar-xs btn-link-secondary">
                            
                           <button class="btn btn-warning btn-sm">
                          <i class="ti ti-eye f-20"></i>
                          </button>
                          </a>
                          @else
                          
         <a href="javascript:void(0);" target="_blank" class="avtar avtar-xs btn-link-secondary">
           <button class="btn btn-success btn-sm">
                            <i class="ti ti-eye f-20"></i>
                            </button>
                          </a>
    @endif
                          <a href="#" class="avtar avtar-xs btn-link-secondary" data-bs-toggle="modal" 
        data-bs-target="#editModal{{ $project->id }}">
         <button class="btn btn-success btn-sm">
                            <i class="ti ti-edit f-20"></i>
                            </button>
                          </a>
                           </div>
                           <div class="flex-grow-1 ms-1">
                          <form action="{{ route('projects.destroy', $project->id) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment désactiver ce projet ?')">
                            @csrf
                            @method('DELETE')
                          <button class="btn btn-danger btn-sm">
                            <i class="ti ti-trash f-20"></i>
                          </button>
                            </form>
</div>
</div>
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
                            ><i data-feather="user" class="icon-svg-primary wid-20 me-2"></i>Ajout Projet</h5
                          >
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                        </div>
                        <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                          <div class="modal-body">
                            <small id="emailHelp" class="form-text text-muted mb-2 mt-0"
                              style="display:none;" >We'll never share your email with anyone else.</small
                            >
                            <div class="mb-3">
                              <label class="form-label" for="nomprojet" >Intitule Projet</label>
                              <input
                                type="text"
                                class="form-control"
                                id="nomprojet"
                                name="nomprojet"
                                aria-describedby="emailHelp"
                                placeholder="Saissir l\'intitule du projet"
                              />
                            </div>
                            <div class="mb-3">
                              <label class="form-label" for="prenom" >Date Debut projet</label>
                              <input
                                type="date"
                                class="form-control"
                                id="datedebut"
                                name="datedebut"
                                aria-describedby="emailHelp"
                                placeholder="Saissir date debut"
                              />
                            </div>
                             <div class="mb-3">
                              <label class="form-label" for="" >Date Fin projet</label>
                              <input
                                type="date"
                                class="form-control"
                                id="datefin"
                                name="datefin"
                                aria-describedby="emailHelp"
                                placeholder="Saissir date debut"
                              />
                            </div>
                            <div class="mb-3">
                             <label class="form-label" for="telephone">Joindre le Contrat</label>
                           <div class="input-group mb-3">
                             
                      <input type="file" class="form-control" id="contrat" name="contrat">
                      <label class="input-group-text" for="contrat">Upload</label>
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

  <div class="modal fade" id="editModal{{ $project->id ?? '' }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            
            <div class="modal-header">
                <h5 class="modal-title">
                    Modifier Projet
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form action="{{ route('projects.update',  $project->id ?? '') }}" 
                  method="POST" 
                  enctype="multipart/form-data"
                  onsubmit="return confirm('Confirmer la modification ?')">
                  
                @csrf
                @method('PUT')

                <div class="modal-body">

                    <div class="mb-3">
                        <label class="form-label">Intitulé Projet</label>
                        <input type="text"
                               name="nomprojet"
                               class="form-control"
                               value="{{ $project->nom_projet  ?? ''}}"
                               required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Date Début</label>
                        <input type="date"
                               name="datedebut"
                               class="form-control"
                               value="{{ $project->date_debut ?? ''  }}"
                               required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Date Fin</label>
                        <input type="date"
                               name="datefin"
                               class="form-control"
                               value="{{ $project->date_fin ?? '' }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Contrat</label>
                        <input type="file"
                               name="contrat"
                               class="form-control">

                        @if(!empty($project->contrat))

<div class="d-flex align-items-center gap-2 mt-2">

    <!-- Badge fichier -->
    <span class="badge bg-light-primary text-primary">
        <i class="ti ti-file-description me-1"></i>
        Contrat disponible
    </span>

    <!-- Voir -->
    <a href="{{ asset('storage/'.$project->contrat) }}" 
       target="_blank"
       class="btn btn-sm btn-outline-primary">
        <i class="ti ti-eye me-1"></i>
        Voir
    </a>

    <!-- Télécharger -->
    <a href="{{ asset('storage/'.$project->contrat) }}" 
       download
       class="btn btn-sm btn-outline-success">
        <i class="ti ti-download me-1"></i>
        Télécharger
    </a>

</div>

@else

<div class="text-muted small mt-2">
    <i class="ti ti-file-off me-1"></i>
    Aucun contrat joint
</div>

@endif

                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" 
                            class="btn btn-light-danger"
                            data-bs-dismiss="modal">
                        Annuler
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
 @include('footer.footer')
 <!-- Required Js -->
@include('footerscriptrequired.footerscriptrequired')




    <script type="module">
      import { DataTable } from '/assets/js/plugins/module.js';
      window.dt = new DataTable('#pc-dt-simple');
    </script>
    <!-- Customizer start -->
@include('customizer.customizer')
<!-- Customizer end -->

  </body>
  <!-- [Body] end -->
</html>
