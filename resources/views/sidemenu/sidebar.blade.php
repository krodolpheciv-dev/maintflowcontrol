@php
function isActive($routes) {
    return request()->routeIs($routes) ? 'active' : '';
}

function isOpen($routes) {
    return request()->routeIs($routes) ? 'pc-trigger' : '';
}
@endphp


<nav class="pc-sidebar">
  <div class="navbar-wrapper">
    <div class="m-header">
      <a href="../dashboard/index.html" class="b-brand text-primary">
        <img src="{{ asset('assets/images/gestiot.svg') }}" class="img-fluid" alt="logo" />
        <span class="badge bg-light-success rounded-pill ms-2 theme-version">v1.0.0</span>
      </a>
    </div>
    <div class="navbar-content">
      <div class="card pc-user-card">
        <div class="card-body">
          <div class="d-flex align-items-center">
            <div class="flex-shrink-0">
              <img src="{{ asset('assets/images/user/avatar-1.jpg') }}" alt="user-image" class="user-avtar wid-45 rounded-circle" />
            </div>
            <div class="flex-grow-1 ms-3 me-2">
              <h6 class="mb-0" style="color:white;">App Gestion</h6>
              <small style="color:white;">Administrateur</small>
            </div>
            <a class="btn btn-icon btn-link-secondary avtar" data-bs-toggle="collapse" href="#pc_sidebar_userlink" style="background: white;">
              <svg class="pc-icon">
                <use xlink:href="#custom-sort-outline"></use>
              </svg>
            </a>
          </div>
          <div class="collapse pc-user-links" id="pc_sidebar_userlink">
            <div class="pt-3">
              <a href="#!"><i class="ti ti-user"></i><span>Mon Compte</span></a>
              <a href="#!"><i class="ti ti-settings"></i><span>Paramètres</span></a>
              <a href="#!"><i class="ti ti-power"></i><span>Se déconnecter</span></a>
            </div>
          </div>
        </div>
      </div>

      <ul class="pc-navbar sidebar-ui">

        <!-- TABLEAU DE BORD -->
        <li class="menu-title">Tableau de bord</li>
        <li class="pc-item {{ isActive('dashboard') }}">
          <a href="{{ route('dashboard') }}" class="pc-link">
            <span class="pc-micon"><i class="ti ti-home-2"></i></span>
            <span class="pc-mtext">Tableau de bord</span>
          </a>
        </li>

        <!-- MAINTENANCE CORRECTIVE -->
        <li class="menu-title">Maintenance corrective</li>
        <li class="pc-item pc-hasmenu {{ isOpen(['demandes*','interventions*','validation*']) }}">
          <a href="#" class="pc-link">
            <span class="pc-micon"><i class="ti ti-calendar-event"></i></span>
            <span class="pc-mtext">Maintenances</span>
            <span class="pc-arrow"><i class="ti ti-chevron-right"></i></span>
          </a>
          <ul class="pc-submenu">
            <li class="pc-item {{ isActive('demandes*') }}">
              <a href="{{ route('requetescm') }}" class="pc-link">
                <span class="pc-sicon"><i class="ti ti-file-text"></i></span>
                <span class="pc-mtext">Requête CM</span>
              </a>
            </li>
            <li class="pc-item {{ isActive('interventions*') }}">
              <a href="{{ route('interventioncm') }}" class="pc-link">
                <span class="pc-sicon"><i class="ti ti-tool"></i></span>
                <span class="pc-mtext">Interventions</span>
              </a>
            </li>
            <li class="pc-item {{ isActive('validation*') }}">
              <a href="{{ route('validationscm') }}" class="pc-link">
                <span class="pc-sicon"><i class="ti ti-shield-check"></i></span>
                <span class="pc-mtext">Validation</span>
              </a>
            </li>
          </ul>
        </li>

        <!-- FINANCES -->
        <li class="menu-title">Finances</li>
        <li class="pc-item pc-hasmenu {{ isOpen(['finance','flux.*']) }}">
          <a href="#" class="pc-link">
            <span class="pc-micon"><i class="ti ti-chart-bar"></i></span>
            <span class="pc-mtext">Finances</span>
            <span class="pc-arrow"><i class="ti ti-chevron-right"></i></span>
          </a>
          <ul class="pc-submenu">
            <li class="pc-item {{ isActive('flux.entrants') }}">
              <a href="#" class="pc-link">
                <span class="pc-sicon"><i class="ti ti-trending-up" style="color:#16a34a;"></i></span>
                <span class="pc-mtext">Flux entrants</span>
              </a>
            </li>
            <li class="pc-item {{ isActive('flux.sortants') }}">
              <a href="#" class="pc-link">
                <span class="pc-sicon"><i class="ti ti-trending-down" style="color:#dc2626;"></i></span>
                <span class="pc-mtext">Flux sortants</span>
              </a>
            </li>
            <li class="pc-item {{ isActive('charges.support') }}">
              <a href="#" class="pc-link">
                <span class="pc-sicon"><i class="ti ti-wallet"></i></span>
                <span class="pc-mtext">Charges support</span>
              </a>
            </li>
            <li class="pc-item {{ isActive('fournisseurs') }}">
              <a href="#" class="pc-link">
                <span class="pc-sicon"><i class="ti ti-users"></i></span>
                <span class="pc-mtext">Fournisseurs</span>
              </a>
            </li>
          </ul>
        </li>

        <!-- ANALYSE & RAPPORTS -->
        <li class="menu-title">Analyse &amp; Rapports</li>
        <li class="pc-item pc-hasmenu {{ isOpen(['rapports.*']) }}">
          <a href="#" class="pc-link">
            <span class="pc-micon"><i class="ti ti-chart-pie"></i></span>
            <span class="pc-mtext">Rapports</span>
            <span class="pc-arrow"><i class="ti ti-chevron-right"></i></span>
          </a>
          <ul class="pc-submenu">
            <li class="pc-item {{ isActive('rapports.tableaux') }}">
              <a href="#" class="pc-link">
                <span class="pc-sicon"><i class="ti ti-chart-bar"></i></span>
                <span class="pc-mtext">Tableaux de bord</span>
              </a>
            </li>
            <li class="pc-item {{ isActive('rapports.analyses') }}">
              <a href="#" class="pc-link">
                <span class="pc-sicon"><i class="ti ti-activity"></i></span>
                <span class="pc-mtext">Analyses &amp; rentabilité</span>
              </a>
            </li>
            <li class="pc-item {{ isActive('rapports.financiers') }}">
              <a href="#" class="pc-link">
                <span class="pc-sicon"><i class="ti ti-file-analytics"></i></span>
                <span class="pc-mtext">Rapports financiers</span>
              </a>
            </li>
          </ul>
        </li>

        <!-- RÉFÉRENTIELS -->
        <li class="menu-title">Référentiels</li>
        <li class="pc-item pc-hasmenu {{ isOpen(['sites.*','incidents.*','activites.*','depenses.*']) }}">
          <a href="#" class="pc-link">
            <span class="pc-micon"><i class="ti ti-database"></i></span>
            <span class="pc-mtext">Référentiels</span>
            <span class="pc-arrow"><i class="ti ti-chevron-right"></i></span>
          </a>
          <ul class="pc-submenu">
            <li class="pc-item {{ isActive('sites.*') }}">
              <a href="{{ route('sites') }}" class="pc-link">
                <span class="pc-sicon"><i class="ti ti-building-factory"></i></span>
                <span class="pc-mtext">Sites &amp; équipements</span>
              </a>
            </li>
            <li class="pc-item {{ isActive('incidents.*') }}">
              <a href="{{ route('typeincidents') }}" class="pc-link">
                <span class="pc-sicon"><i class="ti ti-alert-triangle"></i></span>
                <span class="pc-mtext">Types d'incidents</span>
              </a>
            </li>
            <li class="pc-item {{ isActive('activites.*') }}">
              <a href="#" class="pc-link">
                <span class="pc-sicon"><i class="ti ti-menu-2"></i></span>
                <span class="pc-mtext">Types d'activités</span>
              </a>
            </li>
            <li class="pc-item {{ isActive('depenses.*') }}">
              <a href="#" class="pc-link">
                <span class="pc-sicon"><i class="ti ti-credit-card"></i></span>
                <span class="pc-mtext">Types de dépenses</span>
              </a>
            </li>
          </ul>
        </li>

        <!-- JUSTIFICATIFS -->
        <li class="menu-title">Justificatifs</li>
        <li class="pc-item pc-hasmenu {{ isOpen(['justificatifs.*']) }}">
          <a href="#" class="pc-link">
            <span class="pc-micon"><i class="ti ti-paperclip"></i></span>
            <span class="pc-mtext">Justificatifs</span>
            <span class="pc-arrow"><i class="ti ti-chevron-right"></i></span>
          </a>
          <ul class="pc-submenu">
            <li class="pc-item {{ isActive('justificatifs.pieces') }}">
              <a href="#" class="pc-link">
                <span class="pc-sicon"><i class="ti ti-paperclip"></i></span>
                <span class="pc-mtext">Pièces jointes</span>
              </a>
            </li>
            <li class="pc-item {{ isActive('justificatifs.documents') }}">
              <a href="#" class="pc-link">
                <span class="pc-sicon"><i class="ti ti-file-text"></i></span>
                <span class="pc-mtext">Documents</span>
              </a>
            </li>
          </ul>
        </li>

        <!-- ADMINISTRATION -->
        <li class="menu-title">Administration</li>
        <li class="pc-item pc-hasmenu {{ isOpen(['utilisateur*','gestprofil','creationprojet','logs']) }}">
          <a href="#" class="pc-link">
            <span class="pc-micon"><i class="ti ti-settings"></i></span>
            <span class="pc-mtext">Configuration</span>
            <span class="pc-arrow"><i class="ti ti-chevron-right"></i></span>
          </a>
          <ul class="pc-submenu">
            <li class="pc-item pc-hasmenu {{ isOpen(['utilisateur*','gestprofil']) }}">
              <a href="#" class="pc-link">
                <span class="pc-sicon"><i class="ti ti-users"></i></span>
                <span class="pc-mtext">Utilisateurs &amp; rôles</span>
                <span class="pc-arrow"><i class="ti ti-chevron-right"></i></span>
              </a>
              <ul class="pc-submenu">
                <li class="pc-item {{ isActive('utilisateur*') }}">
                  <a class="pc-link" href="{{ route('utilisateur') }}">
                    <span class="pc-mtext">Créer utilisateurs</span>
                  </a>
                </li>
                <li class="pc-item {{ isActive('gestprofil') }}">
                  <a class="pc-link" href="{{ route('gestprofil') }}">
                    <span class="pc-mtext">Profils &amp; permissions</span>
                  </a>
                </li>
                <li class="pc-item {{ isActive('zones.sites') }}">
                  <a class="pc-link" href="{{ route('finance') }}">
                    <span class="pc-mtext">Affectation zones/sites</span>
                  </a>
                </li>
              </ul>
            </li>
            <li class="pc-item {{ isActive('creationprojet') }}">
              <a href="{{ route('creationprojet') }}" class="pc-link">
                <span class="pc-sicon"><i class="ti ti-settings"></i></span>
                <span class="pc-mtext">Paramètres système</span>
              </a>
            </li>
            <li class="pc-item {{ isActive('logs') }}">
              <a href="#" class="pc-link">
                <span class="pc-sicon"><i class="ti ti-history"></i></span>
                <span class="pc-mtext">Journaux d'activité</span>
              </a>
            </li>
          </ul>
        </li>

        <!-- SUPPORT -->
        <li class="menu-title">Support</li>
        <li class="pc-item {{ isActive('support') }}">
          <a href="#" class="pc-link">
            <span class="pc-micon"><i class="ti ti-question-mark"></i></span>
            <span class="pc-mtext">Aide &amp; Support</span>
          </a>
        </li>

      </ul>
    </div>
  </div>
</nav>

