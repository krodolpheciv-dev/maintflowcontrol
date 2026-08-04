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
{{-- Header --}}
@include('header.header')
<div class="offcanvas pc-announcement-offcanvas offcanvas-end" tabindex="-1" id="announcement" aria-labelledby="announcementLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="announcementLabel">What's new announcement?</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <p class="text-span">Today</p>
    <div class="card mb-3">
      <div class="card-body">
        <div class="align-items-center d-flex flex-wrap gap-2 mb-3">
          <div class="badge bg-light-success f-12">Big News</div>
          <p class="mb-0 text-muted">2 min ago</p>
          <span class="badge dot bg-warning"></span>
        </div>
        <h5 class="mb-3">Able Pro is Redesigned</h5>
        <p class="text-muted">Able Pro is completely renowed with high aesthetics User Interface.</p>
        <img src="../assets/images/layout/img-announcement-1.png" alt="img" class="img-fluid mb-3" />
        <div class="row">
          <div class="col-12">
            <div class="d-grid"
              ><a class="btn btn-outline-secondary" href="https://1.envato.market/zNkqj6" target="_blank">Check Now</a></div
            >
          </div>
        </div>
      </div>
    </div>
    <div class="card mb-3">
      <div class="card-body">
        <div class="align-items-center d-flex flex-wrap gap-2 mb-3">
          <div class="badge bg-light-warning f-12">Offer</div>
          <p class="mb-0 text-muted">2 hour ago</p>
          <span class="badge dot bg-warning"></span>
        </div>
        <h5 class="mb-3">Able Pro is in best offer price</h5>
        <p class="text-muted">Download Able Pro exclusive on themeforest with best price. </p>
        <a href="https://1.envato.market/zNkqj6" target="_blank"
          ><img src="../assets/images/layout/img-announcement-2.png" alt="img" class="img-fluid"
        /></a>
      </div>
    </div>

    <p class="text-span mt-4">Yesterday</p>
    <div class="card mb-3">
      <div class="card-body">
        <div class="align-items-center d-flex flex-wrap gap-2 mb-3">
          <div class="badge bg-light-primary f-12">Blog</div>
          <p class="mb-0 text-muted">12 hour ago</p>
          <span class="badge dot bg-warning"></span>
        </div>
        <h5 class="mb-3">Featured Dashboard Template</h5>
        <p class="text-muted">Do you know Able Pro is one of the featured dashboard template selected by Themeforest team.?</p>
        <img src="../assets/images/layout/img-announcement-3.png" alt="img" class="img-fluid" />
      </div>
    </div>
    <div class="card mb-3">
      <div class="card-body">
        <div class="align-items-center d-flex flex-wrap gap-2 mb-3">
          <div class="badge bg-light-primary f-12">Announcement</div>
          <p class="mb-0 text-muted">12 hour ago</p>
          <span class="badge dot bg-warning"></span>
        </div>
        <h5 class="mb-3">Buy Once - Get Free Updated lifetime</h5>
        <p class="text-muted">Get the lifetime free updates once you purchase the Able Pro.</p>
        <img src="../assets/images/layout/img-announcement-4.png" alt="img" class="img-fluid" />
      </div>
    </div>
  </div>
</div>
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
                  <h5 class="mb-3 mb-sm-0">Liste Requetes</h5>
                  <div>

              <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addRequestModal">
                   <i class="ti ti-plus me-1"></i>
                            Ajouter Requête
              </button>
                  </div>
                </div>
              </div>
              <div class="card-body card-table pt-3">
                <div class="table-responsive">
                  <!--<table class="table table-hover" id="pc-dt-simple">
                  <thead class="bg-light-alt text-muted small text-uppercase">
                                    <tr>
                                        <th class="ps-4">N° Demande</th>
                                        <th>Site</th>
                                        <th>Incident</th>
                                        <th>Niveau urgence</th>
                                        <th>Niveau impact</th>
                                        <th>Statut</th>
                                        <th>Créé le</th>
                                        <th class="text-end pe-4">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="small">

                                    {{-- L1 - En cours (bouton intervenir désactivé) --}}
                                    <tr>
                                        <td class="ps-4 fw-semibold">CM-2024-0128</td>
                                        <td class="text-muted">Site AC01</td>
                                        <td>Panne d'énergie</td>
                                        <td>
                                            <span class="badge bg-light-danger text-danger border border-danger-subtle px-2 py-1">Élevé</span>
                                        </td>
                                         <td>
                                            <span class="badge bg-light-purple text-purple px-2 py-1" style="border: 1px solid hsl(262, 97%, 72%);">
                                                Critique
                                            </span>
                                        </td>
                                        <td>
                                            <span class="badge bg-light-primary text-primary px-2 py-1" style="border: 1px solid hsl(207, 99%, 40%); ">En cours</span>
                                        </td>
                                        <td class="text-muted">23/05/2024 14:30</td>
                                        <td class="text-end pe-4">
                                            <a href="#" class="avtar avtar-xs btn-link-secondary">
                                                <i class="ti ti-eye f-20"></i>
                                            </a>
                                            <a href="#" class="avtar avtar-xs btn-link-secondary">
                                                <i class="ti ti-edit f-20"></i>
                                            </a>
                                            <a href="#" 
                                               class="avtar avtar-xs btn-link-secondary intervene-btn disabled" 
                                               style="opacity: 0.4; pointer-events: none; cursor: not-allowed;"
                                               data-bs-toggle="modal" 
                                               data-bs-target="#interventionModal"
                                               data-id="CM-2024-0128"
                                               data-site="Site AC01"
                                               data-incident="Panne d'énergie"
                                               data-status="En cours">
                                                <i class="ti ti-tool f-20"></i>
                                            </a>
                                            <a href="#" class="avtar avtar-xs btn-link-secondary">
                                                <i class="ti ti-trash f-20"></i>
                                            </a>
                                        </td>
                                    </tr>

                                    {{-- L2 - Validée (bouton intervenir ACTIF) --}}
                                    <tr>
                                        <td class="ps-4 fw-semibold">CM-2024-0127</td>
                                        <td class="text-muted">Site AC02</td>
                                        <td>Panne d'énergie</td>
                                        <td>
                                            <span class="badge bg-light-warning text-warning border border-warning-subtle px-2 py-1">Moyen</span>
                                        </td>
                                        <td>
                                            <span class="badge bg-light-info text-info border border-info-subtle px-2 py-1" >
                                                Faible
                                            </span>
                                        </td>
                                        <td>
                                            <span class="badge bg-light-success text-success px-2 py-1" style="border: 1px solid hsl(118, 100%, 30%); ">Validée</span>
                                        </td>
                                        <td class="text-muted">22/05/2024 09:15</td>
                                        <td class="text-end pe-4">
                                            <a href="#" class="avtar avtar-xs btn-link-secondary">
                                                <i class="ti ti-eye f-20"></i>
                                            </a>
                                            <a href="#" class="avtar avtar-xs btn-link-secondary">
                                                <i class="ti ti-edit f-20"></i>
                                            </a>
                                            <a href="#" 
                                               class="avtar avtar-xs btn-link-success intervene-btn" 
                                               data-bs-toggle="modal" 
                                               data-bs-target="#interventionModal"
                                               data-id="CM-2024-0127"
                                               data-site="Site AC02"
                                               data-incident="Panne d'énergie"
                                               data-status="Validée">
                                                <i class="ti ti-tool f-20"></i>
                                            </a>
                                            <a href="#" class="avtar avtar-xs btn-link-secondary">
                                                <i class="ti ti-trash f-20"></i>
                                            </a>
                                        </td>
                                    </tr>

                                    {{-- L3 - En attente (bouton intervenir désactivé) --}}
                                    <tr>
                                        <td class="ps-4 fw-semibold">CM-2024-0126</td>
                                        <td class="text-muted">Site AC03</td>
                                        <td>Panne d'énergie</td>
                                        <td>
                                            <span class="badge bg-light-danger text-danger border border-danger-subtle px-2 py-1">Élevé</span>
                                        </td>
                                        <td>
                                            <span class="badge bg-light-warning text-warning border border-warning-subtle px-2 py-1">
                                                Moyen
                                            </span>
                                        </td>
                                        <td>
                                            <span class="badge bg-light-secondary text-secondary px-2 py-1" style="border: 1px solid hsl(0, 0%, 33%); ">En attente</span>
                                        </td>
                                        <td class="text-muted">21/05/2024 16:45</td>
                                        <td class="text-end pe-4">
                                            <a href="#" class="avtar avtar-xs btn-link-secondary">
                                                <i class="ti ti-eye f-20"></i>
                                            </a>
                                            <a href="#" class="avtar avtar-xs btn-link-secondary">
                                                <i class="ti ti-edit f-20"></i>
                                            </a>
                                            <a href="#" 
                                               class="avtar avtar-xs btn-link-secondary intervene-btn disabled" 
                                               style="opacity: 0.4; pointer-events: none; cursor: not-allowed;"
                                               data-bs-toggle="modal" 
                                               data-bs-target="#interventionModal"
                                               data-id="CM-2024-0126"
                                               data-site="Site AC03"
                                               data-incident="Panne d'énergie"
                                               data-status="En attente">
                                                <i class="ti ti-tool f-20"></i>
                                            </a>
                                            <a href="#" class="avtar avtar-xs btn-link-secondary">
                                                <i class="ti ti-trash f-20"></i>
                                            </a>
                                        </td>
                                    </tr>

                                </tbody>
                  </table> -->

                  <table class="table table-hover" id="tablerequetecm" width="100%">
    <thead class="bg-light-alt text-muted small text-uppercase">
        <tr>
            <th></th>
            <th>N° Demande</th>
            <th>Site</th>
            <th>Incident</th>
            <th>Assigné à</th>
            <th>Urgence</th>
            <th>Statut</th>
            <th>Créé le</th>
            <th class="text-end">Actions</th>
        </tr>
    </thead>

    <tbody></tbody>

</table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- [ Main Content ] end -->

<!-- Modal Ajouter Requête -->
<!-- Modal Ajouter Requête -->
<div class="modal fade" id="addRequestModal"   tabindex="-1"
     data-bs-backdrop="static"
     data-bs-keyboard="false"
     aria-hidden="true">

    <div class="modal-dialog modal-lg modal-dialog-centered">

        <div class="modal-content border-0 shadow rounded-4 overflow-hidden">

            <!-- HEADER -->
            <div class="modal-header border-0 px-3 pt-3 pb-1">

                <div class="d-flex align-items-center">

                    <div class="bg-primary bg-opacity-10 rounded-3 p-2 me-2">
                        <i class="ti ti-file-text text-primary fs-5"></i>
                    </div>

                    <div>
                        <h5 class="fw-bold mb-0">
                            Nouvelle Requête CM
                        </h5>

                        <small class="text-muted">
                            Création d'une Requete corrective
                        </small>
                    </div>

                </div>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal">
                </button>

            </div>

            <!-- BODY -->
            <div class="modal-body px-3 py-2">
<div id="modalLoading" class="modal-loading d-none">
    <div class="text-center">
        <div class="spinner-border text-primary mb-3"></div>
        <h6>Création de la requête...</h6>
        <small>Veuillez patienter</small>
    </div>
</div>
                <form id="cmRequestForm" enctype="multipart/form-data">

                    <!-- SECTION INFORMATIONS -->
                    <div class="card border-0 bg-light rounded-4 mb-2">

                        <div class="card-body card p-3">

                            <h6 class="fw-semibold small mb-2">

                                <i class="ti ti-info-circle me-1 text-primary"></i>

                                Informations générales

                            </h6>

                            <div class="row g-2">
     <div class="col-md-6">

                                    <label class="form-label small fw-semibold">
                                        Projets
                                    </label>

                               
                                    <select class="form-select"  name="project_id" id="projets">

                                        <option value="">Sélectionner un projet</option>
                                        @if(isset($projects))
                                            @foreach($projects as $project)
                                                <option value="{{ $project->id }}">{{ $project->nom_projet }}</option>
                                            @endforeach
                                        @endif

                                    </select>
                                </div>
                               <!-- Site -->
                                <div class="col-md-6">

                                    <label class="form-label small fw-semibold">
                                        Site
                                    </label>

                                    <select class="form-select" name="site_id" id="site">

                                        <option>Sélectionner</option>
                                        <option>Site AC01</option>
                                        <option>Site AC02</option>

                                    </select>

                                </div>
                                <!-- Ticket -->
                           

                             

                                <!-- Type incident -->
                                <div class="col-md-6">

                                    <label class="form-label small fw-semibold">
                                        Type incident
                                    </label>

                                    <select id="type_incident"  name="incident_type_id"
                                            class="form-select">

                                        <option value="">Choisir</option>
                                    @if(isset($typesincident))
                                        @foreach($typesincident as $type)
                                            <option value="{{ $type->id }}">{{ $type->libelletypeincident  }}</option>
                                        @endforeach
                                    @endif
                                    </select>

                                </div>

                                <!-- Sous Type -->
                                <div class="col-md-6">

                                    <label class="form-label small fw-semibold">
                                        Sous-type
                                    </label>

                                    <select id="sous_type" name="incident_sub_type_id"
                                            class="form-select">

                                        <option>
                                            Sélectionner d'abord un type
                                        </option>

                                    </select>

                                </div>

                            </div>

                        </div>

                    </div>

                    <!-- PRIORITE -->
                    <div class="card border-0 bg-light rounded-4 mb-2">

                        <div class="card-body p-3">

                            <h6 class="fw-semibold small mb-2">

                                <i class="ti ti-alert-triangle me-1 text-danger"></i>

                                Priorité & Impact

                            </h6>

                            <div class="row g-2">

                                <!-- Urgence -->
                                <div class="col-md-6">

                                    <label class="form-label small fw-semibold">
                                        Niveau urgence
                                    </label>

                                    <select class="form-select" name="priority">

                                        <option>Faible</option>
                                        <option>Moyenne</option>
                                        <option>Élevée</option>

                                    </select>

                                </div>

                                <!-- Impact -->
                                <div class="col-md-6">

                                    <label class="form-label small fw-semibold">
                                        Impact
                                    </label>

                                    <select class="form-select" name="impact">

                                        <option>Faible</option>
                                        <option>Moyen</option>
                                        <option>Critique</option>

                                    </select>

                                </div>

                            </div>

                        </div>

                    </div>


                     <!-- PRIORITE -->
                    <div class="card border-0 bg-light rounded-4 mb-2">

                        <div class="card-body p-3">

                            <h6 class="fw-semibold small mb-2">

                                <i class="ti ti-alert-triangle me-1 text-danger"></i>

                                Assignation Requete CM

                            </h6>

                            <div class="row g-2">

                                <!-- Urgence -->
                                <div class="col-md-12">

                                    <label class="form-label small fw-semibold">
                                       Assigné à
                                    </label>

                                     <select class="form-select" name="assigned_to" id="assigned_to">

        <option value="{{ Auth::id() }}">
            Moi
        </option>
    @if(isset($techniciens))
        @foreach($techniciens as $technicien)
            @if($technicien->id != Auth::id())
                <option value="{{ $technicien->id }}">
                    {{ $technicien->name }}
                </option>
            @endif
        @endforeach
     @endif
    </select>

                                </div>

                              

                            </div>

                        </div>

                    </div>
  

                    <!-- DESCRIPTION -->
                    <div class="card border-0 bg-light rounded-4 mb-2">

                        <div class="card-body p-3">

                            <h6 class="fw-semibold small mb-2">

                                <i class="ti ti-message-2 me-1 text-success"></i>

                                Description

                            </h6>

                            <textarea name="description" class="form-control border-0 shadow-sm"
                                      rows="3"
                                      placeholder="Décrire le problème..."></textarea>

                        </div>

                    </div>

                    <!-- IMAGE -->
                    <div class="card border-0 bg-light rounded-4">

                        <div class="card-body p-3">

                            <h6 class="fw-semibold small mb-2">

                                <i class="ti ti-photo me-1 text-warning"></i>

                                Pièce jointe

                            </h6>

                            <div class="border border-2 border-dashed rounded-4 p-3 text-center bg-white">

                                <i class="ti ti-upload text-primary fs-3 mb-2"></i>

                                <p class="small text-muted mb-2">
                                    PNG, JPG jusqu'à 10MB
                                </p>

                                <input type="file" name="attachment"
                                       class="form-control">

                            </div>

                        </div>

                    </div>

             

            </div>

            <!-- FOOTER -->
            <div class="modal-footer border-0 px-3 py-2">

                <button type="button"
        class="btn btn-cancel"
                        data-bs-dismiss="modal">

                    Annuler

                </button>

                <button type="submit" bt="btenregrequete"
                        class="btn btn-primary">

                    <i class="ti ti-device-floppy me-1"></i>

                    Enregistrer

                </button>

            </div>
   </form>
        </div>

    </div>

</div>



<div class="modal fade" id="viewCmRequestModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content border-0 shadow">

            <!-- HEADER -->
            <div class="modal-header bg-primary text-white">

                <div class="d-flex align-items-center">

                    <div class="rounded-circle bg-white text-primary d-flex align-items-center justify-content-center"
                         style="width:55px;height:55px;">

                        <i class="ti ti-file-description fs-3"></i>

                    </div>

                    <div class="ms-3">

                        <h4 class="mb-1 fw-bold" id="view_ticket">
                            CM-2026-00001
                        </h4>

                        <small class="opacity-75">
                            Détails de la demande corrective
                        </small>

                    </div>

                </div>

                <div class="text-end">

                    <div id="view_priority_badge" class="mb-2"></div>

                    <div id="view_status_badge"></div>

                </div>

            </div>

            <!-- BODY -->
            <div class="modal-body">

                <div class="row">

                    <!-- COLONNE GAUCHE -->
                    <div class="col-lg-4">

                        <div class="card shadow-sm border-0 mb-4">

                            <div class="card-header bg-light">

                                <h6 class="mb-0">
                                    <i class="ti ti-info-circle me-2"></i>
                                    Informations générales
                                </h6>

                            </div>

                            <div class="card-body">

                                <div class="info-row">
                                    <label>Projet</label>
                                    <div id="view_project"></div>
                                </div>

                                <div class="info-row">
                                    <label>Site</label>
                                    <div id="view_site"></div>
                                </div>

                                <div class="info-row">
                                    <label>Incident</label>
                                    <div id="view_incident"></div>
                                </div>

                                <div class="info-row">
                                    <label>Sous-type</label>
                                    <div id="view_subincident"></div>
                                </div>

                                <div class="info-row">
                                    <label>Assigné à</label>
                                    <div id="view_assigned"></div>
                                </div>

                                <div class="info-row">
                                    <label>Créé par</label>
                                    <div id="view_creator"></div>
                                </div>

                                <div class="info-row mb-0">
                                    <label>Date création</label>
                                    <div id="view_created_at"></div>
                                </div>

                            </div>

                        </div>

                    </div>

                    <!-- COLONNE DROITE -->
                    <div class="col-lg-8">

                        <!-- DESCRIPTION -->
                        <div class="card shadow-sm border-0 mb-4">

                            <div class="card-header bg-light">

                                <h6 class="mb-0">
                                    <i class="ti ti-align-left me-2"></i>
                                    Description
                                </h6>

                            </div>

                            <div class="card-body">

                                <div id="view_description"
                                     class="description-box">
                                </div>

                            </div>

                        </div>

                        <!-- PIECE JOINTE -->
                        <div class="card shadow-sm border-0 mb-4">

                            <div class="card-header bg-light">

                                <h6 class="mb-0">
                                    <i class="ti ti-paperclip me-2"></i>
                                    Pièce jointe
                                </h6>

                            </div>

                            <div class="card-body">

                                <div id="view_attachment">

                                    <div class="text-center text-muted py-5">

                                        <i class="ti ti-photo fs-1"></i>

                                        <p class="mt-3">
                                            Aucune pièce jointe
                                        </p>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <!-- HISTORIQUE -->
                        <div class="card shadow-sm border-0">

                            <div class="card-header bg-light">

                                <h6 class="mb-0">

                                    <i class="ti ti-history me-2"></i>

                                    Historique

                                </h6>

                            </div>

                            <div class="card-body">

                                <div id="view_history">

                                    <!-- Timeline -->

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <!-- FOOTER -->

            <div class="modal-footer">

                <button class="btn btn-warning" id="btnEdit">

                    <i class="ti ti-edit"></i>

                    Modifier

                </button>

                <button class="btn btn-primary" id="btnAssign">

                    <i class="ti ti-user-check"></i>

                    Affecter

                </button>

                <button class="btn btn-success" id="btnValidate">

                    <i class="ti ti-circle-check"></i>

                    Valider

                </button>

                <button class="btn btn-secondary"
                        data-bs-dismiss="modal">

                    Fermer

                </button>

            </div>

        </div>
    </div>
</div>

<!-- Modal Intervention -->
<div class="modal fade" id="interventionModal" 
     tabindex="-1"
     data-bs-backdrop="static"
     data-bs-keyboard="false"
     aria-hidden="true">
    
    <div class="modal-dialog modal-lg modal-dialog-centered">
        
        <div class="modal-content border-0 shadow rounded-4 overflow-hidden">
            
            <!-- HEADER -->
            <div class="modal-header border-0 px-3 pt-3 pb-1">
                <div class="d-flex align-items-center">
                    <div class="bg-success bg-opacity-10 rounded-3 p-2 me-2">
                        <i class="ti ti-tool text-success fs-5"></i>
                    </div>
                    <div>
                        <h5 class="fw-bold mb-0">Intervention</h5>
                        <small class="text-muted">Détails de la requête sélectionnée</small>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            
            <!-- BODY -->
            <div class="modal-body px-3 py-2">
                
                <form id="interventionForm">
                    
                    <!-- SECTION INFORMATIONS REQUÊTE -->
                    <div class="card border-0 bg-light rounded-4 mb-2">
                        <div class="card-body p-3">
                            <h6 class="fw-semibold small mb-2">
                                <i class="ti ti-file-text me-1 text-primary"></i>
                                Informations de la requête
                            </h6>
                            
                            <div class="row g-2">
                                <!-- N Demande (readonly) -->
                                <div class="col-md-4">
                                    <label class="form-label small fw-semibold">N° Demande</label>
                                    <input type="text" class="form-control" id="interv_ticket" readonly>
                                </div>
                                
                                <!-- Site (readonly) -->
                                <div class="col-md-4">
                                    <label class="form-label small fw-semibold">Site</label>
                                    <input type="text" class="form-control" id="interv_site" readonly>
                                </div>
                                
                                <!-- Incident (readonly) -->
                                <div class="col-md-4">
                                    <label class="form-label small fw-semibold">Incident</label>
                                    <input type="text" class="form-control" id="interv_incident" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- SECTION DATE INTERVENTION -->
                    <div class="card border-0 bg-light rounded-4 mb-2">
                        <div class="card-body p-3">
                            <h6 class="fw-semibold small mb-2">
                                <i class="ti ti-calendar me-1 text-warning"></i>
                                Planning intervention
                            </h6>
                            
                            <div class="row g-2">
                                <!-- Date début -->
                                <div class="col-md-6">
                                    <label class="form-label small fw-semibold">Début intervention</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-white">
                                            <i class="ti ti-calendar-event"></i>
                                        </span>
                                        <input type="datetime-local" class="form-control" id="interv_date_debut" required>
                                    </div>
                                </div>
                                
                                <!-- Date fin -->
                                <div class="col-md-6">
                                    <label class="form-label small fw-semibold">Fin intervention</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-white">
                                            <i class="ti ti-calendar-event"></i>
                                        </span>
                                        <input type="datetime-local" class="form-control" id="interv_date_fin" required>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Validation date fin > date début -->
                            <div class="mt-2">
                                <small class="text-muted" id="date_validation_msg">
                                    <i class="ti ti-info-circle"></i> La date de fin doit être postérieure à la date de début
                                </small>
                            </div>
                        </div>
                    </div>
                    
                    <!-- SECTION RAPPORT -->
                    <div class="card border-0 bg-light rounded-4 mb-2">
                        <div class="card-body p-3">
                            <h6 class="fw-semibold small mb-2">
                                <i class="ti ti-file-upload me-1 text-info"></i>
                                Rapport d'intervention
                            </h6>
                            
                            <div class="border border-2 border-dashed rounded-4 p-3 text-center bg-white">
                                <i class="ti ti-upload text-primary fs-3 mb-2"></i>
                                <p class="small text-muted mb-2">
                                    PDF, PNG, JPG jusqu'à 20MB
                                </p>
                                <input type="file" class="form-control" id="interv_rapport" accept=".pdf,.png,.jpg,.jpeg">
                            </div>
                            
                            <!-- Aperçu du fichier -->
                            <div id="file_preview" class="mt-2 d-none">
                                <div class="alert alert-success d-flex align-items-center">
                                    <i class="ti ti-file-check me-2"></i>
                                    <span id="file_name"></span>
                                    <button type="button" class="btn-close ms-auto" id="remove_file"></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- SECTION COMMENTAIRE -->
                    <div class="card border-0 bg-light rounded-4">
                        <div class="card-body p-3">
                            <h6 class="fw-semibold small mb-2">
                                <i class="ti ti-message-2 me-1 text-success"></i>
                                Commentaire
                            </h6>
                            <textarea class="form-control border-0 shadow-sm" 
                                      rows="3"
                                      id="interv_commentaire"
                                      placeholder="Ajoutez un commentaire sur l'intervention..."></textarea>
                        </div>
                    </div>
                    
                </form>
                
            </div>
            
            <!-- FOOTER -->
            <div class="modal-footer border-0 px-3 py-2">
                <button type="button" class="btn btn-cancel rounded-pill px-4" data-bs-dismiss="modal">
                    Annuler
                </button>
                <button type="button" class="btn btn-success rounded-pill px-4" id="saveInterventionBtn">
                    <i class="ti ti-device-floppy me-1"></i>
                    Valider l'intervention
                </button>
            </div>
            
        </div>
        
    </div>
    
</div>

        <!---fin modal -->
      </div>
    </div>
    <!-- [ Main Content ] end -->
   {{-- Footer --}}
@include('footer.footer')
 <!-- Required Js -->
<script src="../assets/js/plugins/popper.min.js"></script>
<script src="../assets/js/plugins/simplebar.min.js"></script>
<script src="../assets/js/plugins/bootstrap.min.js"></script>

<script src="../assets/js/plugins/i18next.min.js"></script>
<script src="../assets/js/plugins/i18nextHttpBackend.min.js"></script>

<script src="../assets/js/icon/custom-font.js"></script>
<script src="../assets/js/script.js"></script>
<script src="../assets/js/theme.js"></script>
<script src="../assets/js/multi-lang.js"></script>
<script src="../assets/js/plugins/feather.min.js"></script>

<link rel="stylesheet"
href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css">

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet"
href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css">

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>

<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">

<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>

<script>
const sousTypes = {
    energie: [
        "Panne GE",
        "Batterie HS",
        "Chargeur défectueux"
    ],

    transmission: [
        "Lien coupé",
        "Signal faible",
        "Équipement HS"
    ],

    carburant: [
        "Manque carburant",
        "Vol carburant",
        "Fuite réservoir"
    ],

    securite: [
        "Intrusion",
        "Vol équipement"
    ],

    climatisation: [
        "Clim HS",
        "Température élevée"
    ]
};


</script>

<!---Script pour le modal Intervention --> 

<script>

document.addEventListener('DOMContentLoaded', function() {
    
    // Recuperation des donnees de la requete lors du clic sur le bouton Intervenir
    document.querySelectorAll('.intervene-btn:not(.disabled)').forEach(btn => {
        btn.addEventListener('click', function(e) {
            // Récupération des données
            const id = this.dataset.id;
            const site = this.dataset.site;
            const incident = this.dataset.incident;
            const status = this.dataset.status;
            
            // Remplissage du modal
            document.getElementById('interv_ticket').value = id;
            document.getElementById('interv_site').value = site;
            document.getElementById('interv_incident').value = incident;
            
            // Vider les champs precedents
            document.getElementById('interv_date_debut').value = '';
            document.getElementById('interv_date_fin').value = '';
            document.getElementById('interv_commentaire').value = '';
            document.getElementById('interv_rapport').value = '';
            document.getElementById('file_preview').classList.add('d-none');
            
            // Reinitialiser le message de validation
            const msg = document.getElementById('date_validation_msg');
            msg.innerHTML = '<i class="ti ti-info-circle"></i> La date de fin doit être postérieure à la date de début';
            msg.className = 'text-muted';
        });
    });
    
    // Validation des dates
    function validateDates() {
        const debut = document.getElementById('interv_date_debut').value;
        const fin = document.getElementById('interv_date_fin').value;
        const msg = document.getElementById('date_validation_msg');
        
        if (debut && fin) {
            if (new Date(fin) <= new Date(debut)) {
                msg.innerHTML = '<i class="ti ti-alert-circle text-danger"></i> La date de fin doit être postérieure à la date de début';
                msg.className = 'text-danger';
                return false;
            } else {
                msg.innerHTML = '<i class="ti ti-check-circle text-success"></i> Dates valides';
                msg.className = 'text-success';
                return true;
            }
        }
        return true;
    }
    
    document.getElementById('interv_date_debut').addEventListener('change', validateDates);
    document.getElementById('interv_date_fin').addEventListener('change', validateDates);
    
    // Aperçu du fichier
    document.getElementById('interv_rapport').addEventListener('change', function(e) {
        const file = this.files[0];
        if (file) {
            document.getElementById('file_name').textContent = file.name + ' (' + (file.size / 1024).toFixed(0) + ' KB)';
            document.getElementById('file_preview').classList.remove('d-none');
        }
    });
    
    document.getElementById('remove_file').addEventListener('click', function() {
        document.getElementById('interv_rapport').value = '';
        document.getElementById('file_preview').classList.add('d-none');
    });
    
    // Sauvegarde de l'intervention
    document.getElementById('saveInterventionBtn').addEventListener('click', function() {
        // Verification dates
        if (!validateDates()) {
            alert('Veuillez corriger les dates avant de valider.');
            return;
        }
        
        // Verification qu'1 date de debut est definie
        if (!document.getElementById('interv_date_debut').value) {
            alert('Veuillez définir une date de début d\'intervention.');
            return;
        }
        
        // Recuperation des datas
        const formData = {
            ticket: document.getElementById('interv_ticket').value,
            site: document.getElementById('interv_site').value,
            incident: document.getElementById('interv_incident').value,
            date_debut: document.getElementById('interv_date_debut').value,
            date_fin: document.getElementById('interv_date_fin').value,
            commentaire: document.getElementById('interv_commentaire').value,
            rapport: document.getElementById('interv_rapport').files[0] ? document.getElementById('interv_rapport').files[0].name : null
        };
        
        // Envois via AJAX
        console.log('Données d\'intervention:', formData);
        
        // Simulation succes
        alert('Intervention planifiée avec succès !');
        
        // Modal close
        const modal = bootstrap.Modal.getInstance(document.getElementById('interventionModal'));
        if (modal) {
            modal.hide();
        }
        
        // Ici vous pouvez recharger la page ou mettre à jour le tableau
        // location.reload();
    });
    
});
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


    <script type="module">
      import { DataTable } from '../assets/js/plugins/module.js';
      window.dt = new DataTable('#pc-dt-simple');
    </script>
<script>

      $(function () {

  $.ajaxSetup({

        headers:{
            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        }

    });

});

var tablerequetecm;

$(document).ready(function() {
       
     $('#type_incident').prop('selectedIndex', 0);
     $("#projets").prop('selectedIndex', 0);
     $("#site").prop('selectedIndex', 0);
    //alert('Document ready!'); // Vérifie que le document est prêt



tablerequetecm = $('#tablerequetecm').DataTable({

    processing: true,
    serverSide: true,
    responsive: true,
    autoWidth: false,
scrollX: false,
    ajax: {
        url: "{{ route('cm.datatable') }}",
        type: "GET"
    },
    responsive: {
    details: {
        type: 'column',
        target: 0
    }
},

    columns: [
            {
        className: 'dtr-control',
        orderable: false,
        data: null,
        defaultContent: ''
    },

        { data: 'ticket', name: 'ticket' },

      //  { data: 'projet', name: 'project.nom_projet' },

       // { data: 'site', name: 'site.site_name' },
        { data: 'site_code', name: 'site.site_code' },

        { data: 'incident', name: 'incidentType.libelletypeincident' },

        { data: 'assigne', name: 'assignedTo.name', orderable: false },

        { data: 'priority', name: 'priority' },

      //  { data: 'impact', name: 'impact' },

        { data: 'status', name: 'status' },

      //  { data: 'createur', name: 'creator.name' },

        { data: 'created_at', name: 'created_at' },

        {
            data: 'action',
            name: 'action',
            orderable: false,
            searchable: false,
            className: 'text-end'
        }

    ],

    order: [[6, 'desc']],

    language: {
        url: "//cdn.datatables.net/plug-ins/1.13.8/i18n/fr-FR.json"
    }

});



$('#tablerequetecm').on('click', '.btnShow', function () {

$("#viewCmRequestModal").modal("show")

});

    $('#projets').on('change', function () {

    //alert('Projet sélectionné : ' + $(this).val()); // Vérifie la valeur sélectionnée
  
  let projectId = $(this).val();

    let site = $('#site');
     site.empty();

    site.append('<option value="">Chargement...</option>');

    if(projectId === ''){
        site.html('<option value="">Sélectionner d\'abord un projet</option>');
        return;
    }

    $.get('/siteslist/by-project/' + projectId, function(data){

        site.empty();

        site.append('<option value="">Choisir</option>');

        $.each(data, function(index, item){

            site.append(
                '<option value="'+item.id+'">'+
                    item.site_code+
                '</option>'
            );

        });

    });



});

    $('#type_incident').on('change', function () {
  let typeId = $(this).val();

   let sousType = $('#sous_type');
 sousType.empty();

    sousType.append('<option value="">Chargement...</option>');
    if(typeId === ''){
        sousType.html('<option value="">Sélectionner d\'abord un type</option>');
        return;
    }

    $.get('/incident-soustypeslist/by-type/' + typeId, function(data){

        sousType.empty();

        sousType.append('<option value="">Choisir</option>');

        $.each(data, function(index, item){

            sousType.append(
                '<option value="'+item.id+'">'+
                    item.libellesoustype+
                '</option>'
            );

        });

    });
});
    });






$('#cmRequestForm').submit(function(e){

    e.preventDefault();

    let formData = new FormData($('#cmRequestForm')[0]);

    $('#modalLoading').removeClass('d-none');

    $.ajax({

        url: "{{ route('cm_requests.store') }}",
        type: "POST",
        data: formData,

        processData: false,
        contentType: false,
        cache: false,

        beforeSend: function () {

            $('#btenregrequete')
                .prop('disabled', true)
                .html('<i class="ti ti-loader"></i> Enregistrement...');

        },

        success: function (response) {

        $('#modalLoading').addClass('d-none');

            $('#btenregrequete')
                .prop('disabled', false)
                .html('Enregistrer');

            if(response.status){

            

                $('#cmRequestForm')[0].reset();

               // $('#cmRequestModal').modal('hide');

               alert(response.message);

                tablerequetecm.ajax.reload(null, false);

            }

        },

        error: function (xhr) {

        $('#modalLoading').addClass('d-none');
            $('#btenregrequete')
                .prop('disabled', false)
                .html('Enregistrer');

            if(xhr.status == 422){

                let errors = xhr.responseJSON.errors;

                $('.invalid-feedback').remove();
                $('.is-invalid').removeClass('is-invalid');

                $.each(errors, function(key, value){

                    $('[name="'+key+'"]')
                        .addClass('is-invalid')
                        .after('<div class="invalid-feedback">'+value[0]+'</div>');

                });

            }else{


                alert(
                    'Erreur',
                    'Une erreur est survenue.',
                    'error'
                );

            }

        }

    });

});




    </script>
   
<script>
    
    </script>
  </body>
  <!-- [Body] end -->
</html>