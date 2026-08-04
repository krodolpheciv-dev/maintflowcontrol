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
                  <h5 class="mb-3 mb-sm-0">
                    Validation des Requêtes
                    <span class="badge bg-light-primary ms-2">3</span>
                  </h5>
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
                  <table class="table table-hover" id="pc-dt-simple">
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

                      {{-- L1 - En attente (à valider) --}}
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
                          <span class="badge bg-light-secondary text-secondary px-2 py-1" style="border: 1px solid hsl(0, 0%, 33%);">En attente</span>
                        </td>
                        <td class="text-muted">23/05/2024 14:30</td>
                        <td class="text-end pe-4">
                          <!-- Voir -->
                          <a href="#" class="avtar avtar-xs btn-link-secondary" data-bs-toggle="modal" data-bs-target="#viewRequestModal">
                            <i class="ti ti-eye f-20"></i>
                          </a>
                          <!-- Valider -->
                          <a href="#" class="avtar avtar-xs btn-link-success" data-bs-toggle="modal" data-bs-target="#validateRequestModal" data-id="CM-2024-0128" data-site="Site AC01" data-incident="Panne d'énergie">
                            <i class="ti ti-check f-20"></i>
                          </a>
                          <!-- Refuser -->
                          <a href="#" class="avtar avtar-xs btn-link-danger" data-bs-toggle="modal" data-bs-target="#rejectRequestModal" data-id="CM-2024-0128" data-site="Site AC01" data-incident="Panne d'énergie">
                            <i class="ti ti-x f-20"></i>
                          </a>
                          <!-- Supprimer -->
                          <a href="#" class="avtar avtar-xs btn-link-secondary">
                            <i class="ti ti-trash f-20"></i>
                          </a>
                        </td>
                      </tr>

                      {{-- L2 - En attente (à valider) --}}
                      <tr>
                        <td class="ps-4 fw-semibold">CM-2024-0127</td>
                        <td class="text-muted">Site AC02</td>
                        <td>Panne d'énergie</td>
                        <td>
                          <span class="badge bg-light-warning text-warning border border-warning-subtle px-2 py-1">Moyen</span>
                        </td>
                        <td>
                          <span class="badge bg-light-info text-info border border-info-subtle px-2 py-1">
                            Faible
                          </span>
                        </td>
                        <td>
                          <span class="badge bg-light-secondary text-secondary px-2 py-1" style="border: 1px solid hsl(0, 0%, 33%);">En attente</span>
                        </td>
                        <td class="text-muted">22/05/2024 09:15</td>
                        
                        <td class="text-end pe-4">
                          <!-- Voir -->
                          <a href="#" class="avtar avtar-xs btn-link-secondary" data-bs-toggle="modal" data-bs-target="#viewRequestModal">
                            <i class="ti ti-eye f-20"></i>
                          </a>
                          <!-- Valider -->
                          <a href="#" class="avtar avtar-xs btn-link-success" data-bs-toggle="modal" data-bs-target="#validateRequestModal" data-id="CM-2024-0127" data-site="Site AC02" data-incident="Panne d'énergie">
                            <i class="ti ti-check f-20"></i>
                          </a>
                          <!-- Refuser -->
                          <a href="#" class="avtar avtar-xs btn-link-danger" data-bs-toggle="modal" data-bs-target="#rejectRequestModal" data-id="CM-2024-0127" data-site="Site AC02" data-incident="Panne d'énergie">
                            <i class="ti ti-x f-20"></i>
                          </a>
                          <!-- Supprimer -->
                          <a href="#" class="avtar avtar-xs btn-link-secondary">
                            <i class="ti ti-trash f-20"></i>
                          </a>
                        </td>
                      </tr>

                      {{-- L3 - Déjà validée (ne peut plus être modifiée) --}}
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
                          <span class="badge bg-light-success text-success px-2 py-1" style="border: 1px solid hsl(118, 100%, 30%);">Validée</span>
                        </td>
                        <td class="text-muted">21/05/2024 16:45</td>
                        <td class="text-end pe-4">
                          <a href="#" class="avtar avtar-xs btn-link-secondary" data-bs-toggle="modal" data-bs-target="#viewRequestModal">
                            <i class="ti ti-eye f-20"></i>
                          </a>
                          <!-- Boutons désactivés pour une requête déjà validée -->
                          <a href="#" class="avtar avtar-xs btn-link-secondary disabled" style="opacity:0.4;pointer-events:none;">
                            <i class="ti ti-check f-20"></i>
                          </a>
                          <a href="#" class="avtar avtar-xs btn-link-secondary disabled" style="opacity:0.4;pointer-events:none;">
                            <i class="ti ti-x f-20"></i>
                          </a>
                          <a href="#" class="avtar avtar-xs btn-link-secondary">
                            <i class="ti ti-trash f-20"></i>
                          </a>
                        </td>
                      </tr>

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- [ Main Content ] end -->

        <!-- ============================================ -->
        <!-- MODAL AJOUTER REQUÊTE (inchangé) -->
        <!-- ============================================ -->

        <!-- Modal Ajouter Requête -->
        <div class="modal fade" id="addRequestModal" tabindex="-1"
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
                    <h5 class="fw-bold mb-0">Nouvelle Requête CM</h5>
                    <small class="text-muted">Création d'une demande corrective</small>
                  </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>

              <!-- BODY -->
              <div class="modal-body px-3 py-2">
                <form>
                  <!-- SECTION INFORMATIONS -->
                  <div class="card border-0 bg-light rounded-4 mb-2">
                    <div class="card-body card p-3">
                      <h6 class="fw-semibold small mb-2">
                        <i class="ti ti-info-circle me-1 text-primary"></i>
                        Informations générales
                      </h6>
                      <div class="row g-2">
                        <div class="col-md-6">
                          <label class="form-label small fw-semibold">N° Ticket</label>
                          <div class="input-group">
                            <span class="input-group-text bg-white">
                              <i class="ti ti-hash"></i>
                            </span>
                            <input type="text" class="form-control" value="CM-2026-0001" readonly>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <label class="form-label small fw-semibold">Site</label>
                          <select class="form-select">
                            <option>Sélectionner</option>
                            <option>Site AC01</option>
                            <option>Site AC02</option>
                          </select>
                        </div>
                        <div class="col-md-6">
                          <label class="form-label small fw-semibold">Type incident</label>
                          <select id="type_incident" class="form-select">
                            <option value="">Choisir</option>
                            <option value="energie">Énergie</option>
                            <option value="transmission">Transmission</option>
                            <option value="carburant">Carburant</option>
                            <option value="securite">Sécurité</option>
                            <option value="climatisation">Climatisation</option>
                          </select>
                        </div>
                        <div class="col-md-6">
                          <label class="form-label small fw-semibold">Sous-type</label>
                          <select id="sous_type" class="form-select">
                            <option>Sélectionner d'abord un type</option>
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
                        <div class="col-md-6">
                          <label class="form-label small fw-semibold">Niveau urgence</label>
                          <select class="form-select">
                            <option>Faible</option>
                            <option>Moyen</option>
                            <option>Élevé</option>
                          </select>
                        </div>
                        <div class="col-md-6">
                          <label class="form-label small fw-semibold">Impact</label>
                          <select class="form-select">
                            <option>Faible</option>
                            <option>Moyen</option>
                            <option>Critique</option>
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
                      <textarea class="form-control border-0 shadow-sm" rows="3" placeholder="Décrire le problème..."></textarea>
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
                        <p class="small text-muted mb-2">PNG, JPG jusqu'à 10MB</p>
                        <input type="file" class="form-control">
                      </div>
                    </div>
                  </div>
                </form>
              </div>

              <!-- FOOTER -->
              <div class="modal-footer border-0 px-3 py-2">
                <button type="button" class="btn btn-cancel rounded-pill px-4" data-bs-dismiss="modal">
                  Annuler
                </button>
                <button type="button" class="btn btn-primary rounded-pill px-4">
                  <i class="ti ti-device-floppy me-1"></i>
                  Enregistrer
                </button>
              </div>
            </div>
          </div>
        </div>

        <!-- ============================================ -->
        <!-- MODAL VOIR REQUÊTE -->
        <!-- ============================================ -->

        <div class="modal fade" id="viewRequestModal" tabindex="-1"
             data-bs-backdrop="static"
             data-bs-keyboard="false"
             aria-hidden="true">

          <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content border-0 shadow rounded-4 overflow-hidden">

              <div class="modal-header border-0 px-3 pt-3 pb-1">
                <div class="d-flex align-items-center">
                  <div class="bg-primary bg-opacity-10 rounded-3 p-2 me-2">
                    <i class="ti ti-file-text text-primary fs-5"></i>
                  </div>
                  <div>
                    <h5 class="fw-bold mb-0">Détails de la requête</h5>
                    <small class="text-muted">Informations complètes</small>
                  </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>

              <div class="modal-body px-3 py-2">
                <div class="card border-0 bg-light rounded-4 mb-2">
                  <div class="card-body card p-3">
                    <div class="row g-3">
                      <div class="col-md-4">
                        <label class="form-label small fw-semibold text-muted">N° Demande</label>
                        <p class="fw-semibold">CM-2024-0128</p>
                      </div>
                      <div class="col-md-4">
                        <label class="form-label small fw-semibold text-muted">Site</label>
                        <p>Site AC01</p>
                      </div>
                      <div class="col-md-4">
                        <label class="form-label small fw-semibold text-muted">Type incident</label>
                        <p>Énergie</p>
                      </div>
                      <div class="col-md-4">
                        <label class="form-label small fw-semibold text-muted">Sous-type</label>
                        <p>Panne GE</p>
                      </div>
                      <div class="col-md-4">
                        <label class="form-label small fw-semibold text-muted">Niveau urgence</label>
                        <p><span class="badge bg-light-danger text-danger border border-danger-subtle px-2 py-1">Élevé</span></p>
                      </div>
                      <div class="col-md-4">
                        <label class="form-label small fw-semibold text-muted">Impact</label>
                        <p><span class="badge bg-light-purple text-purple px-2 py-1" style="border: 1px solid hsl(262, 97%, 72%);">Critique</span></p>
                      </div>
                      <div class="col-md-12">
                        <label class="form-label small fw-semibold text-muted">Statut</label>
                        <p><span class="badge bg-light-secondary text-secondary px-2 py-1" style="border: 1px solid hsl(0, 0%, 33%);">En attente</span></p>
                      </div>
                      <div class="col-12">
                        <label class="form-label small fw-semibold text-muted">Description</label>
                        <p class="text-muted">Panne d'énergie sur le site AC01, GE en défaut</p>
                      </div>
                      <div class="col-12">
                        <label class="form-label small fw-semibold text-muted">Pièce jointe</label>
                        <p><a href="#" class="btn btn-sm btn-outline-primary"><i class="ti ti-file me-1"></i> image_incident.jpg</a></p>
                      </div>
                      <div class="col-12">
                        <label class="form-label small fw-semibold text-muted">Créé le</label>
                        <p class="text-muted">23/05/2024 14:30</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="modal-footer border-0 px-3 py-2">
                <button type="button" class="btn btn-cancel rounded-pill px-4" data-bs-dismiss="modal">
                  Fermer
                </button>
              </div>
            </div>
          </div>
        </div>

        <!-- ============================================ -->
        <!-- MODAL VALIDER REQUÊTE -->
        <!-- ============================================ -->

        <div class="modal fade" id="validateRequestModal" tabindex="-1"
             data-bs-backdrop="static"
             data-bs-keyboard="false"
             aria-hidden="true">

          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow rounded-4 overflow-hidden">

              <div class="modal-header border-0 px-3 pt-3 pb-1">
                <div class="d-flex align-items-center">
                  <div class="bg-success bg-opacity-10 rounded-3 p-2 me-2">
                    <i class="ti ti-check text-success fs-5"></i>
                  </div>
                  <div>
                    <h5 class="fw-bold mb-0">Valider la requête</h5>
                    <small class="text-muted">Confirmation de validation</small>
                  </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>

              <div class="modal-body px-3 py-2">
                <div class="card border-0 bg-light rounded-4">
                  <div class="card-body p-3 text-center">
                    <i class="ti ti-alert-circle text-warning" style="font-size:48px;"></i>
                    <h5 class="mt-3">Confirmation de validation</h5>
                    <p class="text-muted">
                      Êtes-vous sûr de vouloir valider la requête ?
                    </p>
                    <div class="bg-white rounded-3 p-3 text-start">
                      <div class="row">
                        <div class="col-6">
                          <label class="form-label small fw-semibold text-muted">N° Demande</label>
                          <p class="fw-semibold" id="validate_ticket">CM-2024-0128</p>
                        </div>
                        <div class="col-6">
                          <label class="form-label small fw-semibold text-muted">Site</label>
                          <p id="validate_site">Site AC01</p>
                        </div>
                      </div>
                    </div>
                    <div class="mt-3">
                      <label class="form-label small fw-semibold">Commentaire (optionnel)</label>
                      <textarea class="form-control" rows="2" placeholder="Ajouter un commentaire..."></textarea>
                    </div>
                  </div>
                </div>
              </div>

              <div class="modal-footer border-0 px-3 py-2">
                <button type="button" class="btn btn-cancel rounded-pill px-4" data-bs-dismiss="modal">
                  Annuler
                </button>
                <button type="button" class="btn btn-success rounded-pill px-4" id="confirmValidateBtn">
                  <i class="ti ti-check me-1"></i>
                  Valider
                </button>
              </div>
            </div>
          </div>
        </div>

        <!-- ============================================ -->
        <!-- MODAL REFUSER REQUÊTE -->
        <!-- ============================================ -->

        <div class="modal fade" id="rejectRequestModal" tabindex="-1"
             data-bs-backdrop="static"
             data-bs-keyboard="false"
             aria-hidden="true">

          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow rounded-4 overflow-hidden">

              <div class="modal-header border-0 px-3 pt-3 pb-1">
                <div class="d-flex align-items-center">
                  <div class="bg-danger bg-opacity-10 rounded-3 p-2 me-2">
                    <i class="ti ti-x text-danger fs-5"></i>
                  </div>
                  <div>
                    <h5 class="fw-bold mb-0">Refuser la requête</h5>
                    <small class="text-muted">Confirmation de refus</small>
                  </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>

              <div class="modal-body px-3 py-2">
                <div class="card border-0 bg-light rounded-4">
                  <div class="card-body p-3 text-center">
                    <i class="ti ti-alert-triangle text-danger" style="font-size:48px;"></i>
                    <h5 class="mt-3">Confirmation de refus</h5>
                    <p class="text-muted">
                      Êtes-vous sûr de vouloir refuser cette requête ?
                    </p>
                    <div class="bg-white rounded-3 p-3 text-start">
                      <div class="row">
                        <div class="col-6">
                          <label class="form-label small fw-semibold text-muted">N° Demande</label>
                          <p class="fw-semibold" id="reject_ticket">CM-2024-0128</p>
                        </div>
                        <div class="col-6">
                          <label class="form-label small fw-semibold text-muted">Site</label>
                          <p id="reject_site">Site AC01</p>
                        </div>
                      </div>
                    </div>
                    <div class="mt-3">
                      <label class="form-label small fw-semibold text-danger">Motif du refus</label>
                      <textarea class="form-control" rows="2" placeholder="Expliquer la raison du refus..."></textarea>
                    </div>
                  </div>
                </div>
              </div>

              <div class="modal-footer border-0 px-3 py-2">
                <button type="button" class="btn btn-cancel rounded-pill px-4" data-bs-dismiss="modal">
                  Annuler
                </button>
                <button type="button" class="btn btn-danger rounded-pill px-4" id="confirmRejectBtn">
                  <i class="ti ti-x me-1"></i>
                  Refuser
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

    <script>
    const sousTypes = {
        energie: ["Panne GE", "Batterie HS", "Chargeur défectueux"],
        transmission: ["Lien coupé", "Signal faible", "Équipement HS"],
        carburant: ["Manque carburant", "Vol carburant", "Fuite réservoir"],
        securite: ["Intrusion", "Vol équipement"],
        climatisation: ["Clim HS", "Température élevée"]
    };

    document.getElementById('type_incident')
    .addEventListener('change', function () {
        let type = this.value;
        let sousType = document.getElementById('sous_type');
        sousType.innerHTML = '<option>Choisir</option>';
        if (sousTypes[type]) {
            sousTypes[type].forEach(function(item) {
                let option = document.createElement('option');
                option.value = item;
                option.text = item;
                sousType.appendChild(option);
            });
        }
    });
    </script>

    <script>
    // Script pour les modales de validation et refus
    document.addEventListener('DOMContentLoaded', function() {
        
        // Remplir le modal de validation
        document.querySelectorAll('[data-bs-target="#validateRequestModal"]').forEach(btn => {
            btn.addEventListener('click', function(e) {
                const id = this.dataset.id;
                const site = this.dataset.site;
                const incident = this.dataset.incident;
                
                document.getElementById('validate_ticket').textContent = id;
                document.getElementById('validate_site').textContent = site;
            });
        });
        
        // Remplir le modal de refus
        document.querySelectorAll('[data-bs-target="#rejectRequestModal"]').forEach(btn => {
            btn.addEventListener('click', function(e) {
                const id = this.dataset.id;
                const site = this.dataset.site;
                const incident = this.dataset.incident;
                
                document.getElementById('reject_ticket').textContent = id;
                document.getElementById('reject_site').textContent = site;
            });
        });
        
        // Confirmation de validation
        document.getElementById('confirmValidateBtn')?.addEventListener('click', function() {
            // Simulation de validation
            alert('Requête validée avec succès !');
            const modal = bootstrap.Modal.getInstance(document.getElementById('validateRequestModal'));
            if (modal) modal.hide();
            // location.reload();
        });
        
        // Confirmation de refus
        document.getElementById('confirmRejectBtn')?.addEventListener('click', function() {
            // Simulation de refus
            alert('Requête refusée !');
            const modal = bootstrap.Modal.getInstance(document.getElementById('rejectRequestModal'));
            if (modal) modal.hide();
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

  </body>
  <!-- [Body] end -->
</html>