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
                  <h5 class="mb-3 mb-sm-0">
                    Liste Requêtes
                    <span class="badge bg-light-primary ms-2" id="requestCount">0</span>
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
        <div class="modal fade" id="addRequestModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
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
                    <small class="text-muted">Création d'une Requête corrective</small>
                  </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>

              <!-- BODY -->
              <div class="modal-body px-3 py-2 position-relative">
                <div id="modalLoading" class="modal-loading d-none">
                  <div class="text-center">
                    <div class="spinner-border text-primary mb-3"></div>
                    <h6>Création de la requête...</h6>
                    <small>Veuillez patienter</small>
                  </div>
                </div>
                
                <form id="cmRequestForm" enctype="multipart/form-data">
                  @csrf
                  <!-- SECTION INFORMATIONS -->
                  <div class="card border-0 bg-light rounded-4 mb-2">
                    <div class="card-body card p-3">
                      <h6 class="fw-semibold small mb-2">
                        <i class="ti ti-info-circle me-1 text-primary"></i>
                        Informations générales
                      </h6>
                      <div class="row g-2">
                        <div class="col-md-6">
                          <label class="form-label small fw-semibold">Projets <span class="text-danger">*</span></label>
                          <select class="form-select" name="project_id" id="projets" required>
                            <option value="">Sélectionner un projet</option>
                            @if(isset($projects))
                              @foreach($projects as $project)
                                <option value="{{ $project->id }}">{{ $project->nom_projet }}</option>
                              @endforeach
                            @endif
                          </select>
                        </div>
                        
                        <div class="col-md-6">
                          <label class="form-label small fw-semibold">Site <span class="text-danger">*</span></label>
                          <select class="form-select" name="site_id" id="site" required>
                            <option value="">Sélectionner un site</option>
                          </select>
                        </div>

                        <div class="col-md-6">
                          <label class="form-label small fw-semibold">Type incident <span class="text-danger">*</span></label>
                          <select id="type_incident" name="incident_type_id" class="form-select" required>
                            <option value="">Choisir</option>
                            @if(isset($typesincident))
                              @foreach($typesincident as $type)
                                <option value="{{ $type->id }}">{{ $type->libelletypeincident }}</option>
                              @endforeach
                            @endif
                          </select>
                        </div>

                        <div class="col-md-6">
                          <label class="form-label small fw-semibold">Sous-type <span class="text-danger">*</span></label>
                          <select id="sous_type" name="incident_sub_type_id" class="form-select" required>
                            <option value="">Sélectionner d'abord un type</option>
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
                          <label class="form-label small fw-semibold">Niveau urgence <span class="text-danger">*</span></label>
                          <select class="form-select" name="priority" required>
                            <option value="Faible">Faible</option>
                            <option value="Moyenne" selected>Moyenne</option>
                            <option value="Elevée">Élevée</option>
                            <option value="Critique">Critique</option>
                          </select>
                        </div>
                        <div class="col-md-6">
                          <label class="form-label small fw-semibold">Impact <span class="text-danger">*</span></label>
                          <select class="form-select" name="impact" required>
                            <option value="Faible">Faible</option>
                            <option value="Moyen" selected>Moyen</option>
                            <option value="Critique">Critique</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- ASSIGNATION -->
                  <div class="card border-0 bg-light rounded-4 mb-2">
                    <div class="card-body p-3">
                      <h6 class="fw-semibold small mb-2">
                        <i class="ti ti-user me-1 text-primary"></i>
                        Assignation Requête CM
                      </h6>
                      <div class="row g-2">
                        <div class="col-md-12">
                          <label class="form-label small fw-semibold">Assigné à</label>
                          <select class="form-select" name="assigned_to" id="assigned_to">
                            <option value="{{ Auth::id() }}">Moi ({{ Auth::user()->name ?? 'Utilisateur' }})</option>
                            @if(isset($techniciens))
                              @foreach($techniciens as $technicien)
                                @if($technicien->id != Auth::id())
                                  <option value="{{ $technicien->id }}">{{ $technicien->name }}</option>
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
                        Description <span class="text-danger">*</span>
                      </h6>
                      <textarea name="description" class="form-control border-0 shadow-sm" rows="3" placeholder="Décrire le problème..." required minlength="10"></textarea>
                    </div>
                  </div>

                  <!-- PIECE JOINTE -->
                  <div class="card border-0 bg-light rounded-4">
                    <div class="card-body p-3">
                      <h6 class="fw-semibold small mb-2">
                        <i class="ti ti-photo me-1 text-warning"></i>
                        Pièce jointe
                      </h6>
                      <div class="border border-2 border-dashed rounded-4 p-3 text-center bg-white">
                        <i class="ti ti-upload text-primary fs-3 mb-2"></i>
                        <p class="small text-muted mb-2">PNG, JPG jusqu'à 10MB</p>
                        <input type="file" name="attachment" class="form-control" accept="image/*">
                      </div>
                    </div>
                  </div>

                  <!-- FOOTER -->
                  <div class="modal-footer border-0 px-3 py-2">
                    <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" id="btenregrequete" class="btn btn-primary">
                      <i class="ti ti-device-floppy me-1"></i>
                      Enregistrer
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

        <!-- Modal Voir Requête -->
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
                        <h6 class="mb-0"><i class="ti ti-history me-2"></i>Historique</h6>
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
                <button class="btn btn-warning" id="btnEdit"><i class="ti ti-edit"></i> Modifier</button>
                <button class="btn btn-primary" id="btnAssign"><i class="ti ti-user-check"></i> Affecter</button>
                <button class="btn btn-success" id="btnValidate"><i class="ti ti-circle-check"></i> Valider</button>
                <button class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
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
    $(document).ready(function() {
      
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      
      // FONCTIONS POUR LES BADGES
     
      
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

      
      // INITIALISATION 
     
      
      var tablerequetecm = $('#tablerequetecm').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        autoWidth: false,
        scrollX: false,
        ajax: {
          url: "{{ route('cm.datatable') }}",
          type: "GET",
          error: function(xhr) {
            console.log('DataTable Error:', xhr.responseText);
          }
        },
        columns: [
          { className: 'dtr-control', orderable: false, data: null, defaultContent: '' },
          { data: 'ticket', name: 'ticket' },
          { data: 'site_code', name: 'site.site_code' },
          { data: 'incident', name: 'incidentType.libelletypeincident' },
          { data: 'assigne', name: 'assignedTo.name', orderable: false },
          { data: 'priority', name: 'priority' },
          { data: 'status', name: 'status' },
          { data: 'created_at', name: 'created_at' },
          { data: 'action', name: 'action', orderable: false, searchable: false, className: 'text-end' }
        ],
        order: [[7, 'desc']],
        language: {
          processing: "Traitement en cours...",
          search: "Rechercher :",
          lengthMenu: "Afficher _MENU_ entrées",
          info: "Affichage de _START_ à _END_ sur _TOTAL_ entrées",
          infoEmpty: "Aucune entrée disponible",
          infoFiltered: "(filtré sur _MAX_ entrées totales)",
          zeroRecords: "Aucune requête trouvée"
        },
        drawCallback: function(settings) {
          var info = this.api().page.info();
          $('#requestCount').text(info.recordsTotal);
        }
      });

     
      // FONCTIONS POUR L'HISTORIQUE
      
      
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
              error: function (xhr) {
                  console.error('Erreur chargement historique:', xhr);
                  displayEmptyHistoryInModal();
              }
          });
      }

      function displayHistoryInModal(history) {
          let html = '';
          
          history.forEach(function(item) {
              const isValidee = item.validation_decision === 'validee' || 
                               item.validation_decision === 'Validée' ||
                               (item.validation_decision && item.validation_decision.toLowerCase().trim() === 'validee');
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

      function displayEmptyHistoryInModal() {
          $('#view_history').html(`
              <div class="text-center text-muted py-3">
                  <i class="ti ti-clock fs-3"></i>
                  <p class="mt-2">Aucun historique de validation</p>
              </div>
          `);
      }

      
      // CHARGER LES DÉTAILS D'UNE REQUÊTE
     
      
      function loadRequestDetails(id) {
          // indicateur de chargement
          $('#view_history').html(`
              <div class="text-center text-muted py-3">
                  <i class="ti ti-loader spinner-border fs-3"></i>
                  <p class="mt-2">Chargement de l'historique...</p>
              </div>
          `);
          
          $.ajax({
              url: "{{ url('cm-requests') }}/" + id,
              type: 'GET',
              success: function (data) {
                  // Remplir les informations
                  $('#view_ticket').text(data.ticket || '-');
                  $('#view_project').text(data.project ? data.project.nom_projet : '-');
                  $('#view_site').text(data.site ? data.site.site_code : '-');
                  $('#view_incident').text(data.incident_type ? data.incident_type.libelletypeincident : '-');
                  $('#view_subincident').text(data.incident_sub_type ? data.incident_sub_type.libellesoustypeincident : '-');
                  $('#view_assigned').text(data.assigned_to ? data.assigned_to.name : 'Non affecté');
                  $('#view_creator').text(data.creator ? data.creator.name : '-');
                  $('#view_created_at').text(data.created_at ? new Date(data.created_at).toLocaleString('fr-FR') : '-');
                  $('#view_description').text(data.description || 'Aucune description');
                  
                  // Badges
                  $('#view_priority_badge').html(getPriorityBadge(data.priority));
                  $('#view_status_badge').html(getStatusBadge(data.status));

                  // Pièce jointe
                  if (data.attachment) {
                      $('#view_attachment').html(
                          '<a href="' + data.attachment_url + '" target="_blank" class="btn btn-sm btn-outline-primary">' +
                          '<i class="ti ti-file me-1"></i> Voir le fichier joint</a>'
                      );
                  } else {
                      $('#view_attachment').html('<div class="text-center text-muted py-3"><i class="ti ti-photo fs-1"></i><p class="mt-2">Aucune pièce jointe</p></div>');
                  }

                  // Charger l'historique de validations
                  loadValidationHistoryInModal(id);

                  // Afficher le modal
                  $('#viewCmRequestModal').modal('show');
              },
              error: function (xhr) {
                  console.error('Erreur chargement détails:', xhr);
                  alert('Impossible de charger les détails de la requête.');
              }
          });
      }

      
      // ÉVÉNEMENTS
      
      
      // Voir les détails
      $('#tablerequetecm').on('click', '.btnShow', function() {
          var id = $(this).data('id');
          loadRequestDetails(id);
      });

      // Boutons du modal
      $('#btnEdit').on('click', function() {
          var ticket = $('#view_ticket').text();
          alert('Fonctionnalité de modification à implémenter pour la requête ' + ticket);
      });

      $('#btnAssign').on('click', function() {
          var ticket = $('#view_ticket').text();
          alert('Fonctionnalité d\'affectation à implémenter pour la requête ' + ticket);
      });

      $('#btnValidate').on('click', function() {
          var ticket = $('#view_ticket').text();
          alert('Fonctionnalité de validation à implémenter pour la requête ' + ticket);
      });

      
      // CHARGEMENT DES SITES PAR PROJET
      
      
      $('#projets').on('change', function() {
        var projectId = $(this).val();
        var site = $('#site');
        site.empty().append('<option value="">Chargement...</option>');

        if (!projectId) {
          site.html('<option value="">Sélectionner d\'abord un projet</option>');
          return;
        }

        $.get('/siteslist/by-project/' + projectId, function(data) {
          site.empty().append('<option value="">Choisir</option>');
          $.each(data, function(index, item) {
            site.append('<option value="' + item.id + '">' + item.site_code + '</option>');
          });
        }).fail(function() {
          site.html('<option value="">Erreur de chargement</option>');
        });
      });

      
      // CHARGEMENT DES SOUS-TYPES PAR TYPE D'INCIDENT
     
      
      $('#type_incident').on('change', function() {
        var typeId = $(this).val();
        var sousType = $('#sous_type');
        sousType.empty().append('<option value="">Chargement...</option>');

        if (!typeId) {
          sousType.html('<option value="">Sélectionner d\'abord un type</option>');
          return;
        }

        $.get('/incident-soustypeslist/by-type/' + typeId, function(data) {
          sousType.empty().append('<option value="">Choisir</option>');
          $.each(data, function(index, item) {
            sousType.append('<option value="' + item.id + '">' + item.libellesoustype + '</option>');
          });
        }).fail(function() {
          sousType.html('<option value="">Erreur de chargement</option>');
        });
      });

     
      // SOUMISSION DU FORMULAIRE
      
      
      $('#cmRequestForm').on('submit', function(e) {
        e.preventDefault();
        
        // Vérifier que le formulaire est valide
        var form = this;
        if (!form.checkValidity()) {
          form.reportValidity();
          return;
        }
        
        var formData = new FormData(this);
        var $btn = $('#btenregrequete');

        // Afficher le loader
        $('#modalLoading').removeClass('d-none');

        // Désactiver le bouton
        $btn.prop('disabled', true).html('<i class="ti ti-loader"></i> Enregistrement...');

        $.ajax({
          url: "{{ route('cm_requests.store') }}",
          type: "POST",
          data: formData,
          processData: false,
          contentType: false,
          cache: false,
          success: function(response) {
            $('#modalLoading').addClass('d-none');
            $btn.prop('disabled', false).html('<i class="ti ti-device-floppy me-1"></i> Enregistrer');

            if (response.status) {
              // Réinitialiser le formulaire
              $('#cmRequestForm')[0].reset();
              // Réinitialiser les selects
              $('#site').html('<option value="">Sélectionner un site</option>');
              $('#sous_type').html('<option value="">Sélectionner d\'abord un type</option>');
              
              // Fermer le modal
              $('#addRequestModal').modal('hide');
              
              // Notification de succès
              alert(response.message || 'Requête enregistrée avec succès !');
              
              // Recharger le DataTable
              tablerequetecm.ajax.reload(null, false);
            }
          },
          error: function(xhr) {
            $('#modalLoading').addClass('d-none');
            $btn.prop('disabled', false).html('<i class="ti ti-device-floppy me-1"></i> Enregistrer');

            // Afficher les erreurs de validation
            if (xhr.status === 422) {
              var errors = xhr.responseJSON.errors;
              $('.invalid-feedback').remove();
              $('.is-invalid').removeClass('is-invalid');

              // Afficher chaque erreur sous le champ correspondant
              $.each(errors, function(key, value) {
                var $field = $('[name="' + key + '"]');
                if ($field.length) {
                  $field
                    .addClass('is-invalid')
                    .after('<div class="invalid-feedback">' + value[0] + '</div>');
                }
              });

              alert('Veuillez corriger les erreurs dans le formulaire.');
            } else {
              // Erreur serveur
              var message = xhr.responseJSON?.message || 'Une erreur est survenue lors de l\'enregistrement.';
              alert('Erreur: ' + message);
              console.error('Erreur complète:', xhr);
            }
          }
        });
      });

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