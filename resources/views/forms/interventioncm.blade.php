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
                  <h5 class="mb-3 mb-sm-0">Liste Interventions</h5>
                  <div>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addInterventionModal">
                      <i class="ti ti-plus me-1"></i>
                      Ajouter Intervention
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
                        <th>Statut Requête</th>
                        <th>Statut Intervention</th>
                        <th>Technicien</th>
                        <th>Date Début</th>
                        <th>Date Fin</th>
                        <th>Rapport</th>
                        <th>Créé le</th>
                        <th class="text-end pe-4">Actions</th>
                      </tr>
                    </thead>
                    <tbody class="small">

                      {{-- Intervention 1 - Effectuée --}}
                      <tr>
                        <td class="ps-4 fw-semibold">CM-2024-0127</td>
                        <td class="text-muted">Site AC02</td>
                        <td>Panne d'énergie</td>
                        <td>
                          <span class="badge bg-light-warning text-warning border border-warning-subtle px-2 py-1">Moyen</span>
                        </td>
                        <td>
                          <span class="badge bg-light-success text-success px-2 py-1">Validée</span>
                        </td>
                        <td>
                          <span class="badge bg-light-success text-success px-2 py-1">
                            <i class="ti ti-check-circle me-1"></i>Effectuée
                          </span>
                        </td>
                        <td>
                          <div class="d-flex align-items-center">
                            <i class="ti ti-user text-primary me-1"></i>
                            <span>Yao A.</span>
                          </div>
                        </td>
                        <td>24/05/2024 09:00</td>
                        <td>24/05/2024 12:30</td>
                        <td>
                          <a href="#" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#viewReportModal">
                            <i class="ti ti-file-pdf me-1"></i> Voir
                          </a>
                        </td>
                        <td class="text-muted">23/05/2024</td>
                        <td class="text-end pe-4">
                          <a href="#" class="avtar avtar-xs btn-link-secondary" data-bs-toggle="modal" data-bs-target="#viewInterventionModal">
                            <i class="ti ti-eye f-20"></i>
                          </a>
                          <a href="#" class="avtar avtar-xs btn-link-secondary" data-bs-toggle="modal" data-bs-target="#editInterventionModal">
                            <i class="ti ti-edit f-20"></i>
                          </a>
                          <a href="#" class="avtar avtar-xs btn-link-secondary">
                            <i class="ti ti-download f-20"></i>
                          </a>
                          <a href="#" class="avtar avtar-xs btn-link-secondary">
                            <i class="ti ti-trash f-20"></i>
                          </a>
                        </td>
                      </tr>

                      {{-- Intervention 2 - Non effectuée --}}
                      <tr>
                        <td class="ps-4 fw-semibold">CM-2024-0128</td>
                        <td class="text-muted">Site AC01</td>
                        <td>Panne d'énergie</td>
                        <td>
                          <span class="badge bg-light-danger text-danger border border-danger-subtle px-2 py-1">Élevé</span>
                        </td>
                        <td>
                          <span class="badge bg-light-primary text-primary px-2 py-1">En cours</span>
                        </td>
                        <td>
                          <span class="badge bg-light-warning text-warning px-2 py-1">
                            <i class="ti ti-clock me-1"></i>Non effectuée
                          </span>
                        </td>
                        <td>
                          <div class="d-flex align-items-center">
                            <i class="ti ti-user text-primary me-1"></i>
                            <span>Non assigné</span>
                          </div>
                        </td>
                        <td>25/05/2024 14:00</td>
                        <td>25/05/2024 17:00</td>
                        <td>
                          <span class="text-muted fst-italic">Aucun</span>
                        </td>
                        <td class="text-muted">24/05/2024</td>
                        <td class="text-end pe-4">
                          <a href="#" class="avtar avtar-xs btn-link-secondary" data-bs-toggle="modal" data-bs-target="#viewInterventionModal">
                            <i class="ti ti-eye f-20"></i>
                          </a>
                          <a href="#" class="avtar avtar-xs btn-link-secondary" data-bs-toggle="modal" data-bs-target="#editInterventionModal">
                            <i class="ti ti-edit f-20"></i>
                          </a>
                          <a href="#" class="avtar avtar-xs btn-link-secondary disabled" style="opacity:0.4;pointer-events:none;">
                            <i class="ti ti-download f-20"></i>
                          </a>
                          <a href="#" class="avtar avtar-xs btn-link-secondary">
                            <i class="ti ti-trash f-20"></i>
                          </a>
                        </td>
                      </tr>

                      {{-- Intervention 3 - Effectuée avec plusieurs techniciens --}}
                      <tr>
                        <td class="ps-4 fw-semibold">CM-2024-0125</td>
                        <td class="text-muted">Site AC04</td>
                        <td>Transmission</td>
                        <td>
                          <span class="badge bg-light-danger text-danger border border-danger-subtle px-2 py-1">Élevé</span>
                        </td>
                        <td>
                          <span class="badge bg-light-success text-success px-2 py-1">Validée</span>
                        </td>
                        <td>
                          <span class="badge bg-light-success text-success px-2 py-1">
                            <i class="ti ti-check-circle me-1"></i>Effectuée
                          </span>
                        </td>
                        <td>
                          <div class="d-flex align-items-center">
                            <i class="ti ti-users text-primary me-1"></i>
                            <span>Yao B.</span>
                          </div>
                        </td>
                        <td>22/05/2024 08:00</td>
                        <td>22/05/2024 10:30</td>
                        <td>
                          <a href="#" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#viewReportModal">
                            <i class="ti ti-file-pdf me-1"></i> Voir
                          </a>
                        </td>
                        <td class="text-muted">21/05/2024</td>
                        <td class="text-end pe-4">
                          <a href="#" class="avtar avtar-xs btn-link-secondary" data-bs-toggle="modal" data-bs-target="#viewInterventionModal">
                            <i class="ti ti-eye f-20"></i>
                          </a>
                          <a href="#" class="avtar avtar-xs btn-link-secondary" data-bs-toggle="modal" data-bs-target="#editInterventionModal">
                            <i class="ti ti-edit f-20"></i>
                          </a>
                          <a href="#" class="avtar avtar-xs btn-link-secondary">
                            <i class="ti ti-download f-20"></i>
                          </a>
                          <a href="#" class="avtar avtar-xs btn-link-secondary">
                            <i class="ti ti-trash f-20"></i>
                          </a>
                        </td>
                      </tr>

                      {{-- Intervention 4 - Non effectuée --}}
                      <tr>
                        <td class="ps-4 fw-semibold">CM-2024-0126</td>
                        <td class="text-muted">Site AC03</td>
                        <td>Climatisation</td>
                        <td>
                          <span class="badge bg-light-warning text-warning border border-warning-subtle px-2 py-1">Moyen</span>
                        </td>
                        <td>
                          <span class="badge bg-light-secondary text-secondary px-2 py-1">En attente</span>
                        </td>
                        <td>
                          <span class="badge bg-light-warning text-warning px-2 py-1">
                            <i class="ti ti-clock me-1"></i>Non effectuée
                          </span>
                        </td>
                        <td>
                          <div class="d-flex align-items-center">
                            <i class="ti ti-user text-primary me-1"></i>
                            <span>Non assigné</span>
                          </div>
                        </td>
                        <td>-</td>
                        <td>-</td>
                        <td>
                          <span class="text-muted fst-italic">Aucun</span>
                        </td>
                        <td class="text-muted">21/05/2024</td>
                        <td class="text-end pe-4">
                          <a href="#" class="avtar avtar-xs btn-link-secondary" data-bs-toggle="modal" data-bs-target="#viewInterventionModal">
                            <i class="ti ti-eye f-20"></i>
                          </a>
                          <a href="#" class="avtar avtar-xs btn-link-secondary" data-bs-toggle="modal" data-bs-target="#editInterventionModal">
                            <i class="ti ti-edit f-20"></i>
                          </a>
                          <a href="#" class="avtar avtar-xs btn-link-secondary disabled" style="opacity:0.4;pointer-events:none;">
                            <i class="ti ti-download f-20"></i>
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

        <!-- Modal Ajouter Intervention -->
        <div class="modal fade" id="addInterventionModal" tabindex="-1"
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
                    <h5 class="fw-bold mb-0">Nouvelle Intervention</h5>
                    <small class="text-muted">Planifier une intervention sur une requête</small>
                  </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>

              <!-- BODY -->
              <div class="modal-body px-3 py-2">
                <form>
                  <!-- SECTION INFORMATIONS REQUÊTE -->
                  <div class="card border-0 bg-light rounded-4 mb-2">
                    <div class="card-body card p-3">
                      <h6 class="fw-semibold small mb-2">
                        <i class="ti ti-file-text me-1 text-primary"></i>
                        Informations de la requête
                      </h6>
                      <div class="row g-2">
                        <div class="col-md-4">
                          <label class="form-label small fw-semibold">N° Demande</label>
                          <select class="form-select">
                            <option>Sélectionner</option>
                            <option>CM-2024-0127</option>
                            <option>CM-2024-0128</option>
                            <option>CM-2024-0125</option>
                            <option>CM-2024-0126</option>
                          </select>
                        </div>
                        <div class="col-md-4">
                          <label class="form-label small fw-semibold">Site</label>
                          <input type="text" class="form-control" value="Site AC02" readonly>
                        </div>
                        <div class="col-md-4">
                          <label class="form-label small fw-semibold">Incident</label>
                          <input type="text" class="form-control" value="Panne d'énergie" readonly>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- SECTION TECHNICIENS -->
                  <div class="card border-0 bg-light rounded-4 mb-2">
                    <div class="card-body p-3">
                      <h6 class="fw-semibold small mb-2">
                        <i class="ti ti-users me-1 text-primary"></i>
                        Techniciens assignés
                      </h6>
                      <div class="row g-2">
                        <div class="col-12">
                          <label class="form-label small fw-semibold">Sélectionner les techniciens</label>
                          <select class="form-select" multiple style="min-height: 100px;">
                            <option value="1">Yao A.</option>
                            <option value="2">Yao B.</option>
                            <option value="3">Yao C.</option>
                            <option value="4">Yao D.</option>
                          </select>
                          <small class="text-muted">Maintenez Ctrl pour sélectionner plusieurs techniciens</small>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- SECTION PLANNING -->
                  <div class="card border-0 bg-light rounded-4 mb-2">
                    <div class="card-body p-3">
                      <h6 class="fw-semibold small mb-2">
                        <i class="ti ti-calendar me-1 text-warning"></i>
                        Planning intervention
                      </h6>
                      <div class="row g-2">
                        <div class="col-md-6">
                          <label class="form-label small fw-semibold">Date Début</label>
                          <div class="input-group">
                            <span class="input-group-text bg-white">
                              <i class="ti ti-calendar-event"></i>
                            </span>
                            <input type="datetime-local" class="form-control" required>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <label class="form-label small fw-semibold">Date Fin</label>
                          <div class="input-group">
                            <span class="input-group-text bg-white">
                              <i class="ti ti-calendar-event"></i>
                            </span>
                            <input type="datetime-local" class="form-control" required>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- SECTION STATUT -->
                  <div class="card border-0 bg-light rounded-4 mb-2">
                    <div class="card-body p-3">
                      <h6 class="fw-semibold small mb-2">
                        <i class="ti ti-toggle-left me-1 text-danger"></i>
                        Statut de l'intervention
                      </h6>
                      <div class="row g-2">
                        <div class="col-md-6">
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="statutIntervention" id="effectuee" value="effectuee" checked>
                            <label class="form-check-label" for="effectuee">
                              <span class="badge bg-light-success text-success">
                                <i class="ti ti-check-circle me-1"></i> Effectuée
                              </span>
                            </label>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="statutIntervention" id="nonEffectuee" value="non_effectuee">
                            <label class="form-check-label" for="nonEffectuee">
                              <span class="badge bg-light-warning text-warning">
                                <i class="ti ti-clock me-1"></i> Non effectuée
                              </span>
                            </label>
                          </div>
                        </div>
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
                        <input type="file" class="form-control" accept=".pdf,.png,.jpg,.jpeg">
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
                      <textarea class="form-control border-0 shadow-sm" rows="3" placeholder="Ajoutez un commentaire sur l'intervention..."></textarea>
                    </div>
                  </div>
                </form>
              </div>

              <!-- FOOTER -->
              <div class="modal-footer border-0 px-3 py-2">
                <button type="button" class="btn btn-cancel rounded-pill px-4" data-bs-dismiss="modal">
                  Annuler
                </button>
                <button type="button" class="btn btn-success rounded-pill px-4">
                  <i class="ti ti-device-floppy me-1"></i>
                  Enregistrer
                </button>
              </div>
            </div>
          </div>
        </div>

        <!-- Modal Voir Intervention (Détails) avec Techniciens -->
        <div class="modal fade" id="viewInterventionModal" tabindex="-1"
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
                    <h5 class="fw-bold mb-0">Détails de l'intervention</h5>
                    <small class="text-muted">Informations complètes</small>
                  </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>

              <!-- BODY -->
              <div class="modal-body px-3 py-2">
                <div class="card border-0 bg-light rounded-4 mb-2">
                  <div class="card-body card p-3">
                    <div class="row g-3">
                      <!-- Informations requête -->
                      <div class="col-md-4">
                        <label class="form-label small fw-semibold text-muted">N° Demande</label>
                        <p class="fw-semibold">CM-2024-0127</p>
                      </div>
                      <div class="col-md-4">
                        <label class="form-label small fw-semibold text-muted">Site</label>
                        <p>Site AC02</p>
                      </div>
                      <div class="col-md-4">
                        <label class="form-label small fw-semibold text-muted">Incident</label>
                        <p>Panne d'énergie</p>
                      </div>
                      <div class="col-md-4">
                        <label class="form-label small fw-semibold text-muted">Niveau urgence</label>
                        <p><span class="badge bg-light-warning text-warning border border-warning-subtle px-2 py-1">Moyen</span></p>
                      </div>
                      <div class="col-md-4">
                        <label class="form-label small fw-semibold text-muted">Statut Requête</label>
                        <p><span class="badge bg-light-success text-success px-2 py-1">Validée</span></p>
                      </div>
                      <div class="col-md-4">
                        <label class="form-label small fw-semibold text-muted">Statut Intervention</label>
                        <p><span class="badge bg-light-success text-success px-2 py-1"><i class="ti ti-check-circle me-1"></i>Effectuée</span></p>
                      </div>

                      <!-- Techniciens -->
                      <div class="col-12">
                        <label class="form-label small fw-semibold text-muted">Techniciens assignés</label>
                        <div class="d-flex flex-wrap gap-2">
                          <span class="badge bg-light-primary text-primary border border-primary-subtle px-3 py-2">
                            <i class="ti ti-user me-1"></i> Yao B.
                          </span>
                        </div>
                      </div>

                      <!-- Dates -->
                      <div class="col-md-6">
                        <label class="form-label small fw-semibold text-muted">Date Début</label>
                        <p>24/05/2024 09:00</p>
                      </div>
                      <div class="col-md-6">
                        <label class="form-label small fw-semibold text-muted">Date Fin</label>
                        <p>24/05/2024 12:30</p>
                      </div>

                      <!-- Rapport -->
                      <div class="col-12">
                        <label class="form-label small fw-semibold text-muted">Rapport</label>
                        <p><a href="#" class="btn btn-sm btn-outline-primary"><i class="ti ti-file-pdf me-1"></i> Rapport_CM-2024-0127.pdf</a></p>
                      </div>

                      <!-- Commentaire -->
                      <div class="col-12">
                        <label class="form-label small fw-semibold text-muted">Commentaire</label>
                        <p class="text-muted">GE remplacé avec succès</p>
                      </div>

                      <!-- Date création -->
                      <div class="col-12">
                        <label class="form-label small fw-semibold text-muted">Créé le</label>
                        <p class="text-muted">23/05/2024</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- FOOTER -->
              <div class="modal-footer border-0 px-3 py-2">
                <button type="button" class="btn btn-cancel rounded-pill px-4" data-bs-dismiss="modal">
                  Fermer
                </button>
              </div>
            </div>
          </div>
        </div>

        <!-- Modal Voir Rapport -->
        <div class="modal fade" id="viewReportModal" tabindex="-1"
             data-bs-backdrop="static"
             data-bs-keyboard="false"
             aria-hidden="true">

          <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content border-0 shadow rounded-4 overflow-hidden">

              <!-- HEADER -->
              <div class="modal-header border-0 px-3 pt-3 pb-1">
                <div class="d-flex align-items-center">
                  <div class="bg-info bg-opacity-10 rounded-3 p-2 me-2">
                    <i class="ti ti-file-pdf text-info fs-5"></i>
                  </div>
                  <div>
                    <h5 class="fw-bold mb-0">Rapport d'intervention</h5>
                    <small class="text-muted">Aperçu du document</small>
                  </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>

              <!-- BODY -->
              <div class="modal-body px-3 py-2 text-center">
                <div class="bg-light rounded-4 p-4">
                  <i class="ti ti-file-pdf text-danger" style="font-size:64px;"></i>
                  <h6 class="mt-3">Rapport_CM-2024-0127.pdf</h6>
                  <p class="text-muted">Taille: 2.4 MB</p>
                  <div class="border border-2 border-dashed rounded-4 p-4">
                    <i class="ti ti-file-text" style="font-size:48px;color:#6c757d;"></i>
                    <p class="text-muted mt-2">Aperçu du rapport</p>
                  </div>
                </div>
              </div>

              <!-- FOOTER -->
              <div class="modal-footer border-0 px-3 py-2">
                <button type="button" class="btn btn-cancel rounded-pill px-4" data-bs-dismiss="modal">
                  Fermer
                </button>
                <button type="button" class="btn btn-primary rounded-pill px-4">
                  <i class="ti ti-download me-1"></i>
                  Télécharger
                </button>
              </div>
            </div>
          </div>
        </div>

        <!-- Modal Modifier Intervention -->
        <div class="modal fade" id="editInterventionModal" tabindex="-1"
             data-bs-backdrop="static"
             data-bs-keyboard="false"
             aria-hidden="true">

          <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content border-0 shadow rounded-4 overflow-hidden">

              <!-- HEADER -->
              <div class="modal-header border-0 px-3 pt-3 pb-1">
                <div class="d-flex align-items-center">
                  <div class="bg-primary bg-opacity-10 rounded-3 p-2 me-2">
                    <i class="ti ti-edit text-primary fs-5"></i>
                  </div>
                  <div>
                    <h5 class="fw-bold mb-0">Modifier l'intervention</h5>
                    <small class="text-muted">Mettre à jour les informations</small>
                  </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>

              <!-- BODY -->
              <div class="modal-body px-3 py-2">
                <form>
                  <!-- SECTION INFORMATIONS REQUÊTE (readonly) -->
                  <div class="card border-0 bg-light rounded-4 mb-2">
                    <div class="card-body card p-3">
                      <h6 class="fw-semibold small mb-2">
                        <i class="ti ti-file-text me-1 text-primary"></i>
                        Informations de la requête
                      </h6>
                      <div class="row g-2">
                        <div class="col-md-4">
                          <label class="form-label small fw-semibold">N° Demande</label>
                          <input type="text" class="form-control" value="CM-2024-0127" readonly>
                        </div>
                        <div class="col-md-4">
                          <label class="form-label small fw-semibold">Site</label>
                          <input type="text" class="form-control" value="Site AC02" readonly>
                        </div>
                        <div class="col-md-4">
                          <label class="form-label small fw-semibold">Incident</label>
                          <input type="text" class="form-control" value="Panne d'énergie" readonly>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- SECTION TECHNICIENS -->
                  <div class="card border-0 bg-light rounded-4 mb-2">
                    <div class="card-body p-3">
                      <h6 class="fw-semibold small mb-2">
                        <i class="ti ti-users me-1 text-primary"></i>
                        Techniciens assignés
                      </h6>
                      <div class="row g-2">
                        <div class="col-12">
                          <label class="form-label small fw-semibold">Sélectionner les techniciens</label>
                          <select class="form-select" multiple style="min-height: 100px;">
                             <option value="1">Yao A.</option>
                            <option value="2">Yao B.</option>
                            <option value="3">Yao C.</option>
                            <option value="4">Yao D.</option>
                          </select>
                          <small class="text-muted">Maintenez Ctrl pour sélectionner plusieurs techniciens</small>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- SECTION PLANNING -->
                  <div class="card border-0 bg-light rounded-4 mb-2">
                    <div class="card-body p-3">
                      <h6 class="fw-semibold small mb-2">
                        <i class="ti ti-calendar me-1 text-warning"></i>
                        Planning intervention
                      </h6>
                      <div class="row g-2">
                        <div class="col-md-6">
                          <label class="form-label small fw-semibold">Date Début</label>
                          <div class="input-group">
                            <span class="input-group-text bg-white">
                              <i class="ti ti-calendar-event"></i>
                            </span>
                            <input type="datetime-local" class="form-control" value="2024-05-24T09:00" required>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <label class="form-label small fw-semibold">Date Fin</label>
                          <div class="input-group">
                            <span class="input-group-text bg-white">
                              <i class="ti ti-calendar-event"></i>
                            </span>
                            <input type="datetime-local" class="form-control" value="2024-05-24T12:30" required>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- SECTION STATUT -->
                  <div class="card border-0 bg-light rounded-4 mb-2">
                    <div class="card-body p-3">
                      <h6 class="fw-semibold small mb-2">
                        <i class="ti ti-toggle-left me-1 text-danger"></i>
                        Statut de l'intervention
                      </h6>
                      <div class="row g-2">
                        <div class="col-md-6">
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="editStatutIntervention" id="editEffectuee" value="effectuee" checked>
                            <label class="form-check-label" for="editEffectuee">
                              <span class="badge bg-light-success text-success">
                                <i class="ti ti-check-circle me-1"></i> Effectuée
                              </span>
                            </label>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="editStatutIntervention" id="editNonEffectuee" value="non_effectuee">
                            <label class="form-check-label" for="editNonEffectuee">
                              <span class="badge bg-light-warning text-warning">
                                <i class="ti ti-clock me-1"></i> Non effectuée
                              </span>
                            </label>
                          </div>
                        </div>
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
                      <div class="d-flex align-items-center gap-3 mb-2">
                        <i class="ti ti-file-pdf text-danger fs-3"></i>
                        <span>Rapport_CM-2024-0127.pdf</span>
                        <button type="button" class="btn btn-sm btn-outline-danger">Supprimer</button>
                      </div>
                      <div class="border border-2 border-dashed rounded-4 p-3 text-center bg-white">
                        <i class="ti ti-upload text-primary fs-3 mb-2"></i>
                        <p class="small text-muted mb-2">
                          Remplacer par un nouveau fichier (PDF, PNG, JPG)
                        </p>
                        <input type="file" class="form-control" accept=".pdf,.png,.jpg,.jpeg">
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
                      <textarea class="form-control border-0 shadow-sm" rows="3">GE remplacé avec succès</textarea>
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
                  Mettre à jour
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