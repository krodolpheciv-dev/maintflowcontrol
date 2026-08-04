<!doctype html>
<html lang="en">
  <!-- [Head] start -->
  @include('style.style')
  <!-- [Head] end -->
  
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
                  <div class="d-flex align-items-center gap-3">
                    <h5 class="mb-0" id="viewTitle">
                      <i class="ti ti-list me-2"></i>Validation des Requêtes
                    </h5>
                    <span class="badge bg-light-primary" id="pendingCount">0</span>
                  </div>
                  <div>
                    <div class="btn-group" role="group">
                      <button class="btn btn-primary active" id="btnValidationView">
                        <i class="ti ti-checkbox me-1"></i> Validation
                      </button>
                      <button class="btn btn-outline-primary" id="btnHistoryView">
                        <i class="ti ti-history me-1"></i> Historique
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-body card-table pt-3">
                
                <!-- Tableau des validations -->
                <div id="validationTableContainer">
                  <div class="table-responsive">
                    <table class="table table-hover" id="validationTable" width="100%">
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

                <!-- Tableau de l'historique des validations -->
                <div id="historyTableContainer" style="display: none;">
                  <div class="table-responsive">
                    <table class="table table-hover" id="historyTable" width="100%">
                      <thead class="bg-light-alt text-muted small text-uppercase">
                        <tr>
                          <th>N° Demande</th>
                          <th>Décision</th>
                          <th>Validé par</th>
                          <th>Commentaire</th>
                          <th>Date</th>
                          <th class="text-end">Détails</th>
                        </tr>
                      </thead>
                      <tbody></tbody>
                    </table>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
        <!-- [ Main Content ] end -->

        <!-- ============================================ -->
        <!-- MODAL VOIR REQUÊTE -->
        <!-- ============================================ -->
        <div class="modal fade" id="viewCmRequestModal" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog modal-xl">
            <div class="modal-content border-0 shadow">
              <!-- HEADER -->
              <div class="modal-header bg-primary text-white">
                <div class="d-flex align-items-center">
                  <div class="rounded-circle bg-white text-primary d-flex align-items-center justify-content-center" style="width:55px;height:55px;">
                    <i class="ti ti-file-description fs-3"></i>
                  </div>
                  <div class="ms-3">
                    <h4 class="mb-1 fw-bold" id="view_ticket">-</h4>
                    <small class="opacity-75">Détails de la demande corrective</small>
                  </div>
                </div>
                <div class="text-end">
                  <div id="view_priority_badge" class="mb-2"></div>
                  <div id="view_status_badge"></div>
                </div>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
              </div>

              <!-- BODY -->
              <div class="modal-body">
                <div class="row">
                  <div class="col-lg-4">
                    <div class="card shadow-sm border-0 mb-4">
                      <div class="card-header bg-light">
                        <h6 class="mb-0"><i class="ti ti-info-circle me-2"></i>Informations générales</h6>
                      </div>
                      <div class="card-body">
                        <div class="info-row"><label>Projet</label><div id="view_project"></div></div>
                        <div class="info-row"><label>Site</label><div id="view_site"></div></div>
                        <div class="info-row"><label>Incident</label><div id="view_incident"></div></div>
                        <div class="info-row"><label>Sous-type</label><div id="view_subincident"></div></div>
                        <div class="info-row"><label>Assigné à</label><div id="view_assigned"></div></div>
                        <div class="info-row"><label>Créé par</label><div id="view_creator"></div></div>
                        <div class="info-row mb-0"><label>Date création</label><div id="view_created_at"></div></div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-8">
                    <div class="card shadow-sm border-0 mb-4">
                      <div class="card-header bg-light">
                        <h6 class="mb-0"><i class="ti ti-align-left me-2"></i>Description</h6>
                      </div>
                      <div class="card-body">
                        <div id="view_description" class="description-box"></div>
                      </div>
                    </div>
                    <div class="card shadow-sm border-0 mb-4">
                      <div class="card-header bg-light">
                        <h6 class="mb-0"><i class="ti ti-paperclip me-2"></i>Pièce jointe</h6>
                      </div>
                      <div class="card-body">
                        <div id="view_attachment">
                          <div class="text-center text-muted py-5">
                            <i class="ti ti-photo fs-1"></i>
                            <p class="mt-3">Aucune pièce jointe</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card shadow-sm border-0">
                      <div class="card-header bg-light">
                        <h6 class="mb-0"><i class="ti ti-history me-2"></i>Historique des validations</h6>
                      </div>
                      <div class="card-body">
                        <div id="view_history">
                          <div class="text-center text-muted py-3">
                            <i class="ti ti-clock fs-3"></i>
                            <p class="mt-2">Aucun historique</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- FOOTER -->
              <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
              </div>
            </div>
          </div>
        </div>

        <!-- ============================================ -->
        <!-- MODAL VALIDER REQUÊTE -->
        <!-- ============================================ -->
        <div class="modal fade" id="validateRequestModal" tabindex="-1"
             data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
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
                    <p class="text-muted">Êtes-vous sûr de vouloir valider la requête ?</p>
                    <div class="bg-white rounded-3 p-3 text-start">
                      <div class="row">
                        <div class="col-6">
                          <label class="form-label small fw-semibold text-muted">N° Demande</label>
                          <p class="fw-semibold" id="validate_ticket"></p>
                        </div>
                        <div class="col-6">
                          <label class="form-label small fw-semibold text-muted">Site</label>
                          <p id="validate_site"></p>
                        </div>
                      </div>
                    </div>
                    <div class="mt-3 text-start">
                      <label class="form-label small fw-semibold">Commentaire (optionnel)</label>
                      <textarea class="form-control" id="validate_comment" rows="2" placeholder="Ajouter un commentaire..."></textarea>
                    </div>
                  </div>
                </div>
              </div>

              <div class="modal-footer border-0 px-3 py-2">
                <button type="button" class="btn btn-cancel rounded-pill px-4" data-bs-dismiss="modal">Annuler</button>
                <button type="button" class="btn btn-success rounded-pill px-4" id="confirmValidateBtn">
                  <i class="ti ti-check me-1"></i> Valider
                </button>
              </div>
            </div>
          </div>
        </div>

        <!-- ============================================ -->
        <!-- MODAL REFUSER REQUÊTE -->
        <!-- ============================================ -->
        <div class="modal fade" id="rejectRequestModal" tabindex="-1"
             data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
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
                    <p class="text-muted">Êtes-vous sûr de vouloir refuser cette requête ?</p>
                    <div class="bg-white rounded-3 p-3 text-start">
                      <div class="row">
                        <div class="col-6">
                          <label class="form-label small fw-semibold text-muted">N° Demande</label>
                          <p class="fw-semibold" id="reject_ticket"></p>
                        </div>
                        <div class="col-6">
                          <label class="form-label small fw-semibold text-muted">Site</label>
                          <p id="reject_site"></p>
                        </div>
                      </div>
                    </div>
                    <div class="mt-3 text-start">
                      <label class="form-label small fw-semibold text-danger">Motif du refus</label>
                      <textarea class="form-control" id="reject_comment" rows="2" placeholder="Expliquer la raison du refus..."></textarea>
                    </div>
                  </div>
                </div>
              </div>

              <div class="modal-footer border-0 px-3 py-2">
                <button type="button" class="btn btn-cancel rounded-pill px-4" data-bs-dismiss="modal">Annuler</button>
                <button type="button" class="btn btn-danger rounded-pill px-4" id="confirmRejectBtn">
                  <i class="ti ti-x me-1"></i> Refuser
                </button>
              </div>
            </div>
          </div>
        </div>

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

    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>

    

    <script>
      layout_change('light');
      change_box_container('false');
      layout_caption_change('true');
      layout_rtl_change('false');
      preset_change('preset-1');
      main_layout_change('vertical');
    </script>

    <script>
      $(function () {
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
      });

      var validationTable;
      var historyTable;
      var currentValidateId = null;
      var currentRejectId = null;

      function getPriorityBadge(priority) {
          var badges = {
              'Critique': '<span class="badge bg-danger">Critique</span>',
              'Elevée': '<span class="badge bg-warning text-dark">Élevée</span>',
              'Moyenne': '<span class="badge bg-info">Moyenne</span>',
              'Faible': '<span class="badge bg-secondary">Faible</span>'
          };
          return badges[priority] || '<span class="badge bg-secondary">' + priority + '</span>';
      }

      function getStatusBadge(status) {
          var badges = {
              'Ouverte': '<span class="badge bg-primary">Ouverte</span>',
              'Affectée': '<span class="badge bg-info">Affectée</span>',
              'En cours': '<span class="badge bg-warning text-dark">En cours</span>',
              'Suspendue': '<span class="badge bg-secondary">Suspendue</span>',
              'Terminée': '<span class="badge bg-success">Terminée</span>',
              'Annulée': '<span class="badge bg-danger">Annulée</span>',
              'Validée': '<span class="badge bg-success">Validée</span>',
              'Refusée': '<span class="badge bg-danger">Refusée</span>'
          };
          return badges[status] || '<span class="badge bg-secondary">' + status + '</span>';
      }

      $(document).ready(function () {

          
          // TABLEAU DES VALIDATIONS
          
          validationTable = $('#validationTable').DataTable({
              processing: true,
              serverSide: true,
              responsive: {
                  details: {
                      type: 'column',
                      target: 0
                  }
              },
              autoWidth: false,
              scrollX: false,
              ajax: {
                  url: "{{ route('cm_requests.validation.datatable') }}",
                  type: "GET",
                  dataSrc: function (json) {
                      $('#pendingCount').text(json.recordsTotal);
                      return json.data;
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
                  { data: 'site_code', name: 'site.site_code' },
                  { data: 'incident', name: 'incidentType.libelletypeincident' },
                  { data: 'assigne', name: 'assignedTo.name', orderable: false },
                  { data: 'priority', name: 'priority' },
                  { data: 'status', name: 'status' },
                  { data: 'created_at', name: 'created_at' },
                  {
                      data: 'action',
                      name: 'action',
                      orderable: false,
                      searchable: false,
                      className: 'text-end'
                  }
              ],
              order: [[7, 'desc']],
              language: {
                  url: "//cdn.datatables.net/plug-ins/1.13.8/i18n/fr-FR.json"
              }
          });

          
          // TABLEAU DE L'HISTORIQUE
          
          historyTable = $('#historyTable').DataTable({
              processing: true,
              serverSide: true,
              autoWidth: false,
              scrollX: false,
              ajax: {
                  url: "{{ route('cm_requests.history.datatable') }}",
                  type: "GET",
                  dataSrc: function (json) {
                      return json.data;
                  }
              },
              columns: [
                  { data: 'ticket', name: 'ticket' },
                  { data: 'validation_decision', name: 'validation_decision' }, 
                  { data: 'validated_by_email', name: 'validated_by_email', defaultContent: '-' },
                  { data: 'comment', name: 'comment', defaultContent: '-' },
                  { 
                      data: 'created_at', 
                      name: 'created_at',
                      render: function(data) {
                          return data ? new Date(data).toLocaleString('fr-FR') : '-';
                      }
                  },
                  {
                      data: 'cm_request_id',
                      name: 'cm_request_id',
                      orderable: false,
                      searchable: false,
                      className: 'text-end',
                      render: function(data) {
                          return '<button class="btn btn-sm btn-light-info btnViewHistory" data-id="' + data + '">' +
                                '<i class="ti ti-eye"></i> Voir</button>';
                      }
                  }
              ],
              order: [[4, 'desc']],
              language: {
                  url: "//cdn.datatables.net/plug-ins/1.13.8/i18n/fr-FR.json"
              }
          });

          
          // BASCULE ENTRE LES TABLEAUX
          
          $('#btnValidationView').on('click', function() {
              $(this).removeClass('btn-outline-primary').addClass('btn-primary');
              $('#btnHistoryView').removeClass('btn-primary').addClass('btn-outline-primary');
              $('#validationTableContainer').show();
              $('#historyTableContainer').hide();
              $('#viewTitle').html('<i class="ti ti-list me-2"></i>Validation des Requêtes');
              validationTable.columns.adjust().draw();
          });

          $('#btnHistoryView').on('click', function() {
              $(this).removeClass('btn-outline-primary').addClass('btn-primary');
              $('#btnValidationView').removeClass('btn-primary').addClass('btn-outline-primary');
              $('#validationTableContainer').hide();
              $('#historyTableContainer').show();
              $('#viewTitle').html('<i class="ti ti-history me-2"></i>Historique des Validations');
              historyTable.ajax.reload(null, false);
              historyTable.columns.adjust().draw();
          });

          
          // VOIR LA REQUÊTE (Validation)
         
          $('#validationTable').on('click', '.btnShow', function () {
              let id = $(this).data('id');
              loadRequestDetails(id);
          });

          
          // VOIR LA REQUÊTE (Historique)
          
          $('#historyTable').on('click', '.btnViewHistory', function () {
              let id = $(this).data('id');
              loadRequestDetails(id);
          });

         
          // CHARGER LES DÉTAILS D'UNE REQUÊTE
        
          function loadRequestDetails(id) {
              $.ajax({
                  url: "{{ url('cm-requests') }}/" + id,
                  type: 'GET',
                  success: function (data) {
                      $('#view_ticket').text(data.ticket || '-');
                      $('#view_project').text(data.project ? data.project.nom_projet : '-');
                      $('#view_site').text(data.site ? data.site.site_code : '-');
                      $('#view_incident').text(data.incident_type ? data.incident_type.libelletypeincident : '-');
                      $('#view_subincident').text(data.incident_sub_type ? data.incident_sub_type.libellesoustypeincident : '-');
                      $('#view_assigned').text(data.assigned_to ? data.assigned_to.name : 'Non affecté');
                      $('#view_creator').text(data.creator ? data.creator.name : '-');
                      $('#view_created_at').text(data.created_at ? new Date(data.created_at).toLocaleString('fr-FR') : '-');
                      $('#view_description').text(data.description || 'Aucune description');
                      
                      $('#view_priority_badge').html(getPriorityBadge(data.priority));
                      $('#view_status_badge').html(getStatusBadge(data.status));

                      if (data.attachment) {
                          $('#view_attachment').html(
                              '<a href="' + data.attachment_url + '" target="_blank" class="btn btn-sm btn-outline-primary">' +
                              '<i class="ti ti-file me-1"></i> Voir le fichier joint</a>'
                          );
                      } else {
                          $('#view_attachment').html('<div class="text-center text-muted py-3"><i class="ti ti-photo fs-1"></i><p class="mt-2">Aucune pièce jointe</p></div>');
                      }

                      // Charger l'historique des validations dans le modal
                      loadValidationHistoryInModal(id);

                      $('#viewCmRequestModal').modal('show');
                  },
                  error: function () {
                      alert('Impossible de charger les détails de la requête.');
                  }
              });
          }

        
          // CHARGER L'HISTORIQUE DANS LE MODAL
        
          function loadValidationHistoryInModal(requestId) {
              $('#view_history').html(`
                  <div class="text-center text-muted py-3">
                      <i class="ti ti-loader spinner-border fs-3"></i>
                      <p class="mt-2">Chargement de l'historique...</p>
                  </div>
              `);

              $.ajax({
                  url: "{{ url('cm-requests') }}/" + requestId + "/history",
                  type: 'GET',
                  success: function (response) {
                      if (response.status && response.data && response.data.length > 0) {
                          displayHistoryInModal(response.data);
                      } else {
                          displayEmptyHistoryInModal();
                      }
                  },
                  error: function () {
                      displayEmptyHistoryInModal();
                  }
              });
          }

          
          // AFFICHER L'HISTORIQUE DANS LE MODAL
        
          function displayHistoryInModal(history) {
              let html = '';
              
              history.forEach(function(item) {
                  const isValidee = item.validation_decision === 'validee';
                  const icon = isValidee ? 'ti ti-check-circle text-success' : 'ti ti-x-circle text-danger';
                  const badgeClass = isValidee ? 'validee' : 'refusee';
                  const badgeText = isValidee ? 'Validée' : 'Refusée';
                  const comment = item.comment ? `<p class="mb-0"><strong>Commentaire :</strong> ${item.comment}</p>` : '';
                  const validatedBy = item.validated_by_email || 'Utilisateur inconnu';
                  const date = item.created_at ? new Date(item.created_at).toLocaleString('fr-FR') : '-';

                  html += `
                      <div class="timeline-item">
                          <div class="timeline-header">
                              <div>
                                  <i class="${icon} me-2"></i>
                                  <strong>${badgeText}</strong>
                              </div>
                              <span class="timeline-badge ${badgeClass}">${badgeText}</span>
                          </div>
                          <div class="timeline-content">
                              ${comment}
                          </div>
                          <div class="timeline-footer">
                              <span><i class="ti ti-user me-1"></i> ${validatedBy}</span>
                              <span><i class="ti ti-calendar me-1"></i> ${date}</span>
                          </div>
                      </div>
                  `;
              });

              $('#view_history').html(html);
          }

         
          // HISTORIQUE VIDE DANS LE MODAL
         
          function displayEmptyHistoryInModal() {
              $('#view_history').html(`
                  <div class="text-center text-muted py-3">
                      <i class="ti ti-clock fs-3"></i>
                      <p class="mt-2">Aucun historique de validation</p>
                  </div>
              `);
          }

         
          // OUVRIR MODAL VALIDER
          
          $('#validationTable').on('click', '.btnValidateOpen', function () {
              currentValidateId = $(this).data('id');
              $('#validate_ticket').text($(this).data('ticket'));
              $('#validate_site').text($(this).data('site'));
              $('#validate_comment').val('');
              $('#validateRequestModal').modal('show');
          });

         
          // OUVRIR MODAL REFUSER
          
          $('#validationTable').on('click', '.btnRejectOpen', function () {
              currentRejectId = $(this).data('id');
              $('#reject_ticket').text($(this).data('ticket'));
              $('#reject_site').text($(this).data('site'));
              $('#reject_comment').val('');
              $('#rejectRequestModal').modal('show');
          });

          
          // CONFIRMER VALIDATION
          
          $('#confirmValidateBtn').on('click', function () {
              if (!currentValidateId) return;

              let btn = $(this);
              let comment = $('#validate_comment').val();

              btn.prop('disabled', true).html('<i class="ti ti-loader"></i> Validation...');

              $.ajax({
                  url: "{{ url('cm-requests') }}/" + currentValidateId + "/validate",
                  type: 'POST',
                  data: { comment: comment },
                  success: function (res) {
                      if (res.status) {
                          alert(res.message);
                          bootstrap.Modal.getInstance(document.getElementById('validateRequestModal')).hide();
                          validationTable.ajax.reload(null, false);
                          historyTable.ajax.reload(null, false);
                      } else {
                          alert(res.message || 'Erreur lors de la validation.');
                      }
                  },
                  error: function (xhr) {
                      let msg = (xhr.responseJSON && xhr.responseJSON.message)
                          ? xhr.responseJSON.message
                          : 'Erreur lors de la validation.';
                      alert(msg);
                  },
                  complete: function () {
                      btn.prop('disabled', false).html('<i class="ti ti-check me-1"></i> Valider');
                  }
              });
          });

          
          // CONFIRMER REFUS
          
          $('#confirmRejectBtn').on('click', function () {
              if (!currentRejectId) return;

              let comment = $('#reject_comment').val();

              if (!comment) {
                  alert('Veuillez indiquer un motif de refus.');
                  return;
              }

              let btn = $(this);
              btn.prop('disabled', true).html('<i class="ti ti-loader"></i> Refus...');

              $.ajax({
                  url: "{{ url('cm-requests') }}/" + currentRejectId + "/reject",
                  type: 'POST',
                  data: { comment: comment },
                  success: function (res) {
                      if (res.status) {
                          alert(res.message);
                          bootstrap.Modal.getInstance(document.getElementById('rejectRequestModal')).hide();
                          validationTable.ajax.reload(null, false);
                          historyTable.ajax.reload(null, false);
                      } else {
                          alert(res.message || 'Erreur lors du refus.');
                      }
                  },
                  error: function (xhr) {
                      let msg = (xhr.responseJSON && xhr.responseJSON.message)
                          ? xhr.responseJSON.message
                          : 'Erreur lors du refus.';
                      alert(msg);
                  },
                  complete: function () {
                      btn.prop('disabled', false).html('<i class="ti ti-x me-1"></i> Refuser');
                  }
              });
          });

      });
    </script>

  </body>
</html>