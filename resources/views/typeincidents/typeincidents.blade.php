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
        <!--
        <div class="page-header">
          <div class="page-block">
            <div class="row align-items-center">
              <div class="col-md-12">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="../dashboard/index.html">Home</a></li>
                  <li class="breadcrumb-item"><a href="javascript: void(0)">Online Courses</a></li>
                  <li class="breadcrumb-item" aria-current="page">Teacher List</li>
                </ul>
              </div>
              <div class="col-md-12">
                <div class="page-header-title">
                  <h2 class="mb-0">Teacher List</h2>
                </div>
              </div>
            </div>
          </div>
        </div>
        [ breadcrumb ] end -->


        <!-- [ Main Content ] start -->
        <div class="row">
          <div class="col-12">
            <div class="card table-card">
              <div class="card-header">
                <div class="d-sm-flex align-items-center justify-content-between">
                  <div>
                  <h5 class="mb-0 fw-bold">

Types Incidents

<span class="badge bg-light-primary ms-2" id="labelnmbretypeincid">

@if(isset($totalTypesIncident))
{{$totalTypesIncident}}
@endif

</span>

</h5>

  <small class="text-muted">
                    Retrouvez tous les types d'incidents enregistrés
                </small>
</div>
                  <div>

              <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAddIncidentType">
                   <i class="ti ti-plus me-1"></i>
                            Ajouter un Type d'Incident
              </button>
                  </div>
                </div>
              </div>
              <div class="card-body card-table pt-3">
                <div>
                 <table class="table align-middle" id="pc-dt-simpletypeincidents">

<thead>

<tr>


<th>Type incident</th>

<th>Description</th>

<th>Statut</th>

<th>Créé le</th>

<th class="text-end">

Actions

</th>

</tr>

</thead>

<tbody>

<!--<tr>


<td>

<span
class="badge bg-light-warning text-warning">

Énergie

</span>

</td>
<td>

Niveau carburant faible

</td>

<td>

<span
class="badge bg-light-success">

Actif

</span>

</td>

<td>

26/05/2026

</td>

<td>

<div class="actions">

<a>

<i class="ti ti-edit"></i>

</a>

<a>

<i class="ti ti-trash"></i>

</a>

</div>

</td>

</tr>

<tr>


<td>

<span
class="badge bg-light-warning">

Énergie

</span>

</td>

<td>

Groupe indisponible

</td>

<td>

<span
class="badge bg-light-success">

Actif

</span>

</td>

<td>

26/05/2026

</td>

<td>

<div class="actions">

<a>

<i class="ti ti-edit"></i>

</a>

<a>

<i class="ti ti-trash"></i>

</a>

</div>

</td>

</tr> -->

</tbody>

</table>
                </div>
              </div>
            </div>
          </div>

                    <div class="col-12">
            <div class="card table-card">
              <div class="card-header">
                <div class="d-sm-flex align-items-center justify-content-between">
                  <div>
                  <h5 class="mb-0 fw-bold">

Sous-Types Incidents

<span class="badge bg-light-primary ms-2" id="labelnmbresoustypeincid">

@if(isset($totalSousTypesIncident))
{{$totalSousTypesIncident}}
@endif
</span>

</h5>

  <small class="text-muted">
                    Retrouvez tous les sous-types d'incidents enregistrés
                </small>
</div>
                  <div>

              <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAddIncidentsousType">
                   <i class="ti ti-plus me-1"></i>
                            Ajouter Un Sous-Type
              </button>
                  </div>
                </div>
              </div>
              <div class="card-body card-table pt-3">
                <div>
                 <table class="table align-middle" id="pc-dt-simplesoustypeincident">

<thead>

<tr>

<th>Type Incident</th>

<th>Sous-type</th>

<th>Description</th>

<th>Statut</th>

<th>Créé le</th>

<th class="text-end">

Actions

</th>

</tr>

</thead>

<tbody>

</tbody>

</table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- [ Main Content ] end -->

<!-- ==========================================
     MODAL AJOUTER SOUS TYPE
=========================================== -->
<div class="modal fade"
     id="modalAddIncidentsousType"
     tabindex="-1"
     data-bs-backdrop="static"
     data-bs-keyboard="false">

    <div class="modal-dialog modal-lg modal-dialog-centered">

        <div class="modal-content border-0 rounded-4 shadow">

            <!-- Header -->
            <div class="modal-header border-0 pb-2">

                <div class="d-flex align-items-center">

                    <div class="rounded-circle bg-warning bg-opacity-10 p-3 me-3">

                        <i class="ti ti-alert-triangle text-warning fs-3"></i>

                    </div>

                    <div>

                        <h4 class="mb-1 fw-bold" id="h4soustype">
                            Ajouter un sous-type d'incident
                        </h4>

                        <small class="text-muted">
                            Créer une nouvelle catégorie d'incident
                        </small>

                    </div>

                </div>

                <button class="btn-close"
                        data-bs-dismiss="modal">
                </button>

            </div>

              <form id="formIncidentsousType">
            <!-- Body -->
            <div class="modal-body pt-2">

              

                <input type="hidden" id="soustype_incident_id" name="soustype_incident_id">
                    <div class="row g-3">

                        <!-- Nom -->
                        <div class="col-md-12">

                            <label class="form-label fw-semibold">
                               Selectionner un type incident <span class="text-danger">*</span>
                            </label>

                            <select class="form-select" name="subtype_incident" id="subtype_incident" required>
                            </select>

                        </div>

                       <!-- Nom -->
                        <div class="col-md-12">

                            <label class="form-label fw-semibold">
                                Sous-type <span class="text-danger">*</span>
                            </label>

                            <input
                                type="text"
                                class="form-control" name="sous_type" id="sous_type"
                                placeholder="Ex : Energie" required >

                        </div>  
                        <!-- Description -->
                        <div class="col-12">

                            <label class="form-label fw-semibold">
                                Description
                            </label>

                            <textarea
                                class="form-control"
                                rows="3"
                                name="description" id="description"
                                placeholder="Décrire le sous-type d'incident..."></textarea>

                        </div>

                    </div>

                    <!-- Aperçu -->
                   

              

            </div>

            <!-- Footer -->
            <div class="modal-footer border-0">

                <button
                type="button"
                    class="btn btn-light px-4"
                    data-bs-dismiss="modal" style="background-color: #d3d4d5;
  color: white;" >

                    <i class="ti ti-x me-1"></i>

                    Annuler

                </button>

                <button type="submit"
                  id="btnSaveIncidentsousType"
                    class="btn btn-primary px-4">

                    <i class="ti ti-device-floppy me-1"></i>

                    Enregistrer

                </button>

            </div>
  </form>
        </div>

    </div>

</div>



<!-- ==========================================
     MODAL AJOUTER TYPE INCIDENT
=========================================== -->
<div class="modal fade"
     id="modalAddIncidentType"
     tabindex="-1"
     data-bs-backdrop="static"
     data-bs-keyboard="false">

    <div class="modal-dialog modal-lg modal-dialog-centered">

        <div class="modal-content border-0 rounded-4 shadow">

            <!-- Header -->
            <div class="modal-header border-0 pb-2">

                <div class="d-flex align-items-center">

                    <div class="rounded-circle bg-warning bg-opacity-10 p-3 me-3">

                        <i class="ti ti-alert-triangle text-warning fs-3"></i>

                    </div>

                    <div>

                        <h4 class="mb-1 fw-bold">
                            Ajouter un type d'incident
                        </h4>

                        <small class="text-muted">
                            Créer une nouvelle catégorie d'incident
                        </small>

                    </div>

                </div>

                <button class="btn-close"
                        data-bs-dismiss="modal">
                </button>

            </div>
 <form id="formIncidentType" >
            <!-- Body -->
            <div class="modal-body pt-2">

               
<input type="hidden" id="incident_id" name="incident_id">
                    <div class="row g-3">

                        <!-- Nom -->
                        <div class="col-md-12">

                            <label class="form-label fw-semibold">
                                Nom du type <span class="text-danger">*</span>
                            </label>

                            <input
                                type="text"
                                name="type_incident" id="type_incident"
                                class="form-control"
                                placeholder="Ex : Energie" required >

                        </div>

                   

                     

                  

                     

                        <!-- Priorité -->
                      

                        <!-- Description -->
                        <div class="col-12">

                            <label class="form-label fw-semibold">
                                Description
                            </label>

                            <textarea
                                class="form-control"
                                rows="3"
                                name="description" id="description"
                                placeholder="Décrire le type d'incident..."></textarea>

                        </div>

                    </div>

                    <!-- Aperçu -->
                    <div class="card bg-light border-0 rounded-4 mt-4" style='display:none;'>

                        <div class="card-body">

                            <small class="text-muted d-block mb-2">

                                Aperçu

                            </small>

                            <span class="badge bg-warning fs-6 px-3 py-2">

                                <i class="ti ti-bolt me-2"></i>

                                Energie

                            </span>

                        </div>

                    </div>

               

            </div>

            <!-- Footer -->
            <div class="modal-footer border-0">

                <button
                    class="btn btn-light px-4"
                    data-bs-dismiss="modal" style="background-color: #d3d4d5;
  color: white;" >

                    <i class="ti ti-x me-1"></i>

                    Annuler

                </button>

                <button
                   type="submit"
                id="btnSaveIncidentType"
                    class="btn btn-primary px-4">

                    <i class="ti ti-device-floppy me-1"></i>

                    Enregistrer

                </button>

            </div>
 </form>
        </div>

    </div>

</div>




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
                            Nouveau site
                        </h5>

                        <small class="text-muted">
                            Création d'un nouveau site
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

                <form style="margin-left: 20px;margin-right: 20px;">

<div class="row g-3">

<!-- ========================= -->
<!-- INFOS GENERALES -->
<!-- ========================= -->

<div class="col-12">

<div class="section-card">

<div class="section-title">

<i class="ti ti-building text-primary"></i>

Informations générales

</div>

<div class="row g-2" style="margin-top:10px;">

<div class="col-md-3">

<label class="form-label">
Code Site
</label>

<input
class="form-control"
value="AC001"
>

</div>

<div class="col-md-5">

<label class="form-label">
Nom Site
</label>

<input
class="form-control"
placeholder="Ex : Riviera 1">

</div>

<div class="col-md-4">

<label class="form-label">
Projet
</label>

<select class="form-select">

<option>MOOV</option>

<option>Orange</option>

<option>MTN</option>

</select>

</div>

<div class="col-md-6">

<label class="form-label">

Type Site

</label>

<select class="form-select">

<option>Macro</option>

<option>Rooftop</option>

<option>Indoor</option>

</select>

</div>

<div class="col-md-6">

<label class="form-label">

Statut

</label>

<select class="form-select">

<option>Actif</option>

<option>Maintenance</option>

<option>Construction</option>

</select>

</div>

</div>

</div>

</div>

<!-- ========================= -->
<!-- LOCALISATION -->
<!-- ========================= -->

<div class="col-12">

<div class="section-card">

<div class="section-title">

<i class="ti ti-map-pin text-success"></i>

Localisation

</div>

<div class="row g-2" style="margin-top:10px;">

<div class="col-md-3">
<label class="form-label">
Pays
</label>
<select
class="form-control"
placeholder="Pays" id="country">
</select>

</div>

<div class="col-md-3">
<label class="form-label">
Ville
</label>
<select
class="form-control"
placeholder="Ville" id="city">
</select>

</div>

<div class="col-md-3">
<label class="form-label">
Longitude
</label>
<input
class="form-control"
placeholder="Longitude">

</div>

<div class="col-md-3">
<label class="form-label">
Latitude
</label>
<input
class="form-control"
placeholder="Latitude">

</div>

<div class="col-12" style="display:none;">

<input
class="form-control"
placeholder="Adresse">

</div>

</div>

</div>

</div>

<!-- ========================= -->
<!-- INFRASTRUCTURE -->
<!-- ========================= -->

<div class="col-12">

<div class="section-card">

<div class="section-title">

<i class="ti ti-bolt text-warning"></i>

Infrastructure

</div>

<div class="row g-2" style="margin-top:10px;">

<div class="col-md-3">

<label>

GE

</label>

<select class="form-select">

<option>Oui</option>

<option>Non</option>

</select>

</div>

<div class="col-md-3">

<label>

Nb GE

</label>

<input
class="form-control">

</div>

<div class="col-md-3">

<label>

Tank

</label>

<select class="form-select">

<option>Oui</option>

<option>Non</option>

</select>

</div>

<div class="col-md-3">

<label>

Capacité

</label>

<input
class="form-control">

</div>
<div class="col-md-6">

<label class="form-label">

Présence solaire

</label>

<select class="form-select">

<option>OUI</option>

<option>NON</option>

</select>



</div>

<div class="col-md-6">

<label class="form-label">

Nombre batteries

</label>

<input type="number" class="form-control" min="0" value="0">

</div>

</div>

</div>

</div>

<!-- ========================= -->
<!-- EXPLOITATION -->
<!-- ========================= -->

<div class="col-12">

<div class="section-card">

<div class="section-title">

<i class="ti ti-user text-info"></i>

Exploitation

</div>

<div class="row g-2" style="margin-top:10px;">

<div class="col-md-6">

<label>

Responsable

</label>

<input
class="form-control">

</div>

<div class="col-md-6">

<label>

Date mise en service

</label>

<input
type="date"
class="form-control">

</div>

<div class="col-12" STYLE="margin-top:20px;">

<label>

Observation

</label>

<textarea
class="form-control"
rows="2">

</textarea>

</div>

</div>

</div>

</div>

</div>

</form>

            </div>

            <!-- FOOTER -->
            <div class="modal-footer border-0 px-3 py-2">

                <button type="button"
        class="btn btn-cancel rounded-pill px-4"
                        data-bs-dismiss="modal">

                    Annuler

                </button>

                <button type="submit"
                        class="btn btn-primary rounded-pill px-4">

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

/*document.getElementById('type_incident')
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

});*/
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


<script>
  $(function () {

  $.ajaxSetup({

        headers:{
            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        }

    });

});

 var table;

     /*
    |----------------------------------------------------------------------
    | Routes pour la gestion des types d'incidents
    |----------------------------------------------------------------------
    */
  $(function () {



   table =$('#pc-dt-simpletypeincidents').DataTable({

        processing: true,

        serverSide: true,

        ajax: "{{ route('incident-types.data') }}",

        columns: [

            {
                data: 'libelletypeincident',
                name: 'libelletypeincident'
            },

            {
                data: 'description',
                name: 'description'
            },

            {
                data: 'status',
                name: 'status'
            },

            {
                data: 'created_at',
                name: 'created_at'
            },

            {
                data: 'actions',
                name: 'actions',
                orderable:false,
                searchable:false,
                className:'text-end'
            }

        ],

        language:{
            url:"//cdn.datatables.net/plug-ins/1.13.7/i18n/fr-FR.json"
        }

    });



    $(document).on('click','.editType',function(){

     let row = table.row($(this).closest('tr')).data();

      console.log(row.id);
    console.log(row.libelletypeincident);

    var id=row.id;

    $.get('/incident-typeshow/' + id, function (data) {

        // Remplir le formulaire
        $('#incident_id').val(data.id);
        $('#type_incident').val(data.libelletypeincident);
        $('#description').val(data.description);

        // Modifier le titre
        $('.modal-header h4').text("Modifier un type d'incident");
        $('.modal-header small').text("Modifier cette catégorie d'incident");

        // Modifier le texte du bouton
        $('#btnSaveIncidentType').html(
            '<i class="ti ti-device-floppy me-1"></i> Modifier'
        );

        // Ouvrir le même modal
        $('#modalAddIncidentType').modal('show');

    });

    //let id=$(this).data('id');

    // ouvrir le modal de modification

});

$(document).on('click','.deleteType',function(){

 let row = table.row($(this).closest('tr')).data();

      console.log(row.id);
    console.log(row.libelletypeincident);
    var id=row.id;

     let info = table.page.info();

          console.log(info.recordsTotal);

        //  alert(info.recordsTotal);

    if(confirm("Voulez-vous supprimer ce type d'incident ?")){

        $.ajax({

            url:'/incident-types/'+id,

            type:'GET',

            success:function(response){

           // let info = table.page.info();

         // console.log(info.recordsTotal);

         // $("#labelnmbretypeincid").html(info.recordsTotal);

                table.ajax.reload(function(){

        let info = table.page.info();

        $("#labelnmbretypeincid").html(info.recordsTotal);

        chargerTypesIncident();

    },false);

                alert(response.message);

            }

        });

    }

   // let id=$(this).data('id');

    // suppression AJAX

});




});

$(document).on('click', '.changeStatusType', function () {

    let row = table.row($(this).closest('tr')).data();

    $.ajax({

        url: '/updateincident-types/status/' + row.id,
        type: 'GET',

        success: function (response) {

            table.ajax.reload(function(){

        let info = table.page.info();


        $("#labelnmbretypeincid").html(info.recordsTotal);

       // chargerTypesIncident();

    }, false);

            alert(response.message);

        },

        error: function () {

            alert("Erreur lors de la modification du statut.");

        }

    });

});

$('#formIncidentType').submit(function(e){

    e.preventDefault();


     var id=$('#incident_id').val();

     //alert(id);

     if(id){

      

    $.ajax({

        url:'/updateincident-types/'+id,

        type:'GET',

        data:$(this).serialize(),

        success:function(response){

          $('#formIncidentType')[0].reset();

          
        $('#incident_id').val("");
     

        // Modifier le titre
        $('.modal-header h4').text("Ajouter un type d'incident");
        $('.modal-header small').text("Créer une nouvelle catégorie d'incident");

        // Modifier le texte du bouton
        $('#btnSaveIncidentType').html(
            '<i class="ti ti-device-floppy me-1"></i> Enregistrer'
        );
        

            $('#modalAddIncidentType').modal('hide');

            table.ajax.reload(function(){

        let info = table.page.info();


        $("#labelnmbretypeincid").html(info.recordsTotal);

        chargerTypesIncident();

    },false);

            alert(response.message);

        },

        error:function(xhr){

            console.log(xhr.responseJSON);

        }

    });
}
else{

    $.ajax({

        url: "{{ route('incident-types.store') }}",

        type: "POST",

        data: $(this).serialize(),

        success:function(response){

            // Fermer le modal
           // $('#modalAddIncidentType').modal('hide');

            // Vider le formulaire
            $('#formIncidentType')[0].reset();

            // Rafraîchir uniquement le DataTable
            table.ajax.reload(function(){

        let info = table.page.info();

        $("#labelnmbretypeincid").html(info.recordsTotal);
        chargerTypesIncident();

    },false);

            alert(response.message);
            /*Swal.fire({
                icon:'success',
                title:'Succès',
                text:response.message,
                timer:2000,
                showConfirmButton:false
            });*/

        },

        error:function(xhr){

            console.log(xhr.responseJSON);

        }

    });

}

});




    /*
    |----------------------------------------------------------------------
    | Routes pour la gestion des sous types d'incidents
    |----------------------------------------------------------------------
    */


var  tablesub;
    $(function () {

chargerTypesIncident();

   tablesub =$('#pc-dt-simplesoustypeincident').DataTable({

        processing: true,

        serverSide: true,

        ajax: "{{ route('incident-soustypes.data') }}",

        columns: [

            {
                data: 'libelletypeincident',
                name: 'libelletypeincident'
            },

            {
                data: 'libellesoustype',
                name: 'libellesoustype'
            },

            {
                data: 'description',
                name: 'description'
            },

            {
                data: 'status',
                name: 'status'
            },

            {
                data: 'created_at',
                name: 'created_at'
            },

            {
                data: 'actions',
                name: 'actions',
                orderable:false,
                searchable:false,
                className:'text-end'
            }

        ],

        language:{
            url:"//cdn.datatables.net/plug-ins/1.13.7/i18n/fr-FR.json"
        }

    });




    $(document).on('click','.deleteTypesub',function(){

    

 let row =  tablesub.row($(this).closest('tr')).data();

      console.log(row.id);
    console.log(row.libelletypeincident);
    var id=row.id;

    if(confirm("Voulez-vous supprimer ce sous-type d'incident ?")){


    $.ajax({

            url: '/supprimerincident-soustypes/' + id,

            type: 'GET',

            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },

            success: function (response) {

                tablesub.ajax.reload(function () {

                    let info = tablesub.page.info();

                    $("#labelnmbresoustypeincid").html(info.recordsTotal);

                }, false);

                alert(response.message);

            },

            error: function (xhr) {

                if (xhr.responseJSON && xhr.responseJSON.message) {
                    alert(xhr.responseJSON.message);
                } else {
                    alert("Une erreur est survenue.");
                }

            }

        });


       /* $.ajax({

            url:'/incident-types/'+id,

            type:'GET',

            success:function(response){

                 tablesub.ajax.reload(null,false);

                alert(response.message);

            }

        });*/

    }

   // let id=$(this).data('id');

    // suppression AJAX

});

$(document).on('click','.changeStatusTypesub',function(){

 let row = tablesub.row($(this).closest('tr')).data();

      console.log(row.id);
    console.log(row.libelletypeincident);

    var id=row.id;

     $.ajax({

        url: '/updateincident-soustypes/status/' +id,
        type: 'GET',

        success: function (response) {

            tablesub.ajax.reload(function () {

                    let info = tablesub.page.info();

                    $("#labelnmbresoustypeincid").html(info.recordsTotal);

                }, false);

            alert(response.message);

        },

        error: function (xhr) {

            alert("Erreur lors de la modification du statut.");

        }

    });


});


    $(document).on('click','.editTypesub',function(){

     let row = tablesub.row($(this).closest('tr')).data();

      console.log(row.id);
    console.log(row.libelletypeincident);

    var id=row.id;

    $.get('/incident-soustypes/' + id, function (data) {

        // Remplir le formulaire
        $('#soustype_incident_id').val(data.id);
       // $('#type_incident').val(data.libelletypeincident);
        $('#description').val(data.description);
        $('#sous_type').val(data.libellesoustype);
        $('#subtype_incident').val(data.incident_type_id);

        // Modifier le titre
        //$('.modal-header h4').text("Modifier un type d'incident");
        $('.modal-header #h4soustype').text("Modifier un sous-type d'incident");
        $('.modal-header small').text("Modifier ce sous-type d'incident");

        // Modifier le texte du bouton
        $('#btnSaveIncidentsousType').html(
            '<i class="ti ti-device-floppy me-1"></i> Modifier'
        );

        // Ouvrir le même modal
        $('#modalAddIncidentsousType').modal('show');

    });

    //let id=$(this).data('id');

    // ouvrir le modal de modification

});

$('#formIncidentsousType').submit(function(e){

    e.preventDefault();


     var id=$('#soustype_incident_id').val();

     //alert(id);


     if(id){
        

//alert(id);

  // Modification
        $.ajax({

            url:'/updateincident-soustypes/'+id,

            type:'GET',

            data:$(this).serialize(),

            success:function(response){

             $('#soustype_incident_id').val("");

              $('#formIncidentsousType')[0].reset();
     

        // Modifier le titre

        $('.modal-header #h4soustype').text("Ajouter un sous-type d'incident");
        $('.modal-header small').text("Créer une nouvelle catégorie d'incident");



        // Modifier le texte du bouton
        $('#btnSaveIncidentsousType').html('<i class="ti ti-device-floppy me-1"></i>Enregistrer');

                $('#modalAddIncidentsousType').modal('hide');

    tablesub.ajax.reload( function(){
                       let info = tablesub.page.info();
                       $("#labelnmbresoustypeincid").html(info.recordsTotal);
                             }, false);

                alert(response.message);

            },

            error:function(xhr){

                alert(xhr.responseJSON.message);

            }

        });

     }
     else{

       $.ajax({

        url: "{{ route('incident-sub-types.store') }}",
        type: "POST",
        data: $(this).serialize(),

        success: function(response){

            $('#formIncidentsousType')[0].reset();

            tablesub.ajax.reload(function(){

        let info = tablesub.page.info();

        $("#labelnmbresoustypeincid").html(info.recordsTotal);
}
        , false);

           // $('#modalAddIncidentsousType').modal('hide');

            alert(response.message);

        },

        error: function(xhr){

            if(xhr.status === 422){
                alert(xhr.responseJSON.message);
            }

        }

    });

}



});

});

$(document).ready(function () {

chargerTypesIncident();

var table = $('#incidentTable').DataTable({

scrollX:false,

autoWidth:false,

responsive:false,

columnDefs:[

{
targets:0,
className:'dt-control',
orderable:false
},



],

language:{

search:"",

searchPlaceholder:"Rechercher...",

lengthMenu:"_MENU_ lignes",

info:"Affichage _START_ à _END_ sur _TOTAL_"

}

});



$('#incidentTable tbody').on('click','td.dt-control',

function(){

let tr=$(this).closest('tr');

let row=table.row(tr);

if(row.child.isShown()){

row.child.hide();

tr.removeClass('shown');

}
else{

row.child(
format(
row.data()
)

).show();

tr.addClass('shown');

}

});

});

</script>
<script>
function chargerTypesIncident() {

    $.get("{{ route('incident-types.list') }}", function(data) {

        let select = $('#subtype_incident');

        select.empty();

        select.append('<option value="">Sélectionner</option>');

        $.each(data, function(index, item) {

            select.append(
                `<option value="${item.id}">
                    ${item.libelletypeincident}
                </option>`
            );

        });

    });

}
</script>


   

  </body>
  <!-- [Body] end -->
</html>
