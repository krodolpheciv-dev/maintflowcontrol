<!doctype html>
<html lang="en">

@include('style.style')

{{--BODY--}}
<body
    data-pc-preset="preset-1"
    data-pc-sidebar-caption="true"
    data-pc-layout="vertical"
    data-pc-direction="ltr"
    data-pc-theme_contrast=""
    data-pc-theme="light"
>

{{-- Preloader --}}
<div class="loader-bg">
    <div class="loader-track">
        <div class="loader-fill"></div>
    </div>
</div>

{{-- Sidebar --}}
@include('sidemenu.sidebar')

{{-- Header --}}
@include('header.header')

{{--  MAIN CONTENT --}}
<div class="pc-container">
    <div class="pc-content">
        <div class="row row0">

            {{-- Banner --}}
            @include('banner.banner')

            {{-- KPI CARD --}}
            <div class="col-12">
                <div class="row g-3 mb-0">

                    {{-- Demandes CM --}}
                    <div class="col-12 col-sm-6 col-xl">
                        <div class="card kpi-card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="avtar avtar-s avatarfont bg-light-primary me-3">
                                        <i class="ti ti-clipboard text-primary"></i>
                                    </div>
                                    <h6 class="mb-0">Demandes CM</h6>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mt-3">
                                    <div>
                                        <h3 class="mb-1">128</h3>
                                        <small class="text-muted">En cours : 37</small>
                                    </div>
                                    <a href="#" class="circle-arrow">
                                        <i class="ti ti-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Interventions --}}
                    <div class="col-12 col-sm-6 col-xl">
                        <div class="card kpi-card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="avtar avtar-s avatarfont bg-light-warning me-3">
                                        <i class="ti ti-tool text-warning"></i>
                                    </div>
                                    <h6 class="mb-0">Interventions</h6>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mt-3">
                                    <div>
                                        <h3 class="mb-1">85</h3>
                                        <small class="text-muted">En cours : 23</small>
                                    </div>
                                    <a href="#" class="circle-arrow">
                                        <i class="ti ti-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Flux entrants --}}
                    <div class="col-12 col-sm-6 col-xl">
                        <div class="card kpi-card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="avtar avtar-s avatarfont bg-light-success me-3">
                                        <i class="ti ti-trending-up text-success"></i>
                                    </div>
                                    <h6 class="mb-0">Flux entrants</h6>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mt-3">
                                    <div>
                                        <h3 class="mb-1">125 450 000</h3>
                                        <small class="text-muted">FCFA ce mois</small>
                                    </div>
                                    <a href="#" class="circle-arrow">
                                        <i class="ti ti-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{--  Flux sortants --}}
                    <div class="col-12 col-sm-6 col-xl">
                        <div class="card kpi-card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="avtar avtar-s avatarfont bg-light-danger me-3">
                                        <i class="ti ti-trending-down text-danger"></i>
                                    </div>
                                    <h6 class="mb-0">Flux sortants</h6>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mt-3">
                                    <div>
                                        <h3 class="mb-1">78 320 000</h3>
                                        <small class="text-muted">FCFA ce mois</small>
                                    </div>
                                    <a href="#" class="circle-arrow">
                                        <i class="ti ti-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Rentabilité --}}
                    <div class="col-12 col-sm-6 col-xl">
                        <div class="card kpi-card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="avtar avtar-s avatarfont bg-light-success me-3">
                                        <i class="ti ti-chart-pie text-success"></i>
                                    </div>
                                    <h6 class="mb-0">Rentabilité</h6>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mt-3">
                                    <div>
                                        <h3 class="mb-1">47 130 000</h3>
                                        <small class="text-muted">FCFA ce mois</small>
                                    </div>
                                    <a href="#" class="circle-arrow">
                                        <i class="ti ti-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            {{-- FIN KPI CARDS --}}


            {{--  GRAPHIQUES Area Chart et Donut --}}
           <!--<div class="row g-2 align-items-stretch mt-0">-->
           <div class="col-12">
<div class="row row0 align-items-stretch mt-0">
                {{-- Graphique : Évolution des flux financiers --}}
                <div class="col-12 col-lg-7 d-flex" >
                    <div class="card shadow-sm border-0 rounded-4 overflow-hidden w-100">
                        <div class="card-body p-3 d-flex flex-column">

                            {{-- Header --}}
                            <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-2 mb-3">
                                
                                <div>
                                    <h6 class="mb-1 fw-bold">
                                        Évolution des flux
                                    </h6>

                                    <small class="text-muted">
                                        12 derniers mois
                                    </small>
                                </div>

                                <div class="dropdown">
                                    <button
                                        class="btn btn-sm btn-light border dropdown-toggle"
                                        type="button"
                                        data-bs-toggle="dropdown"
                                        aria-expanded="false"
                                    >
                                        <i class="ti ti-calendar me-1"></i>
                                        12 mois
                                    </button>

                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li>
                                            <a class="dropdown-item chart-filter" data-period="12m" href="#">
                                                12 derniers mois
                                            </a>
                                        </li>

                                        <li>
                                            <a class="dropdown-item chart-filter" data-period="6m" href="#">
                                                6 derniers mois
                                            </a>
                                        </li>

                                        <li>
                                            <a class="dropdown-item chart-filter" data-period="ytd" href="#">
                                                Année en cours
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                            </div>

                            {{-- Stats --}}
                            <div class="d-flex flex-wrap gap-3 mb-3">

                                <div class="d-flex align-items-center">
                                    <span class="badge bg-light-success text-success p-1 rounded-circle me-2">
                                        <i class="ti ti-arrow-up-right f-16"></i>
                                    </span>

                                    <div>
                                        <p class="text-muted mb-0" style="font-size:11px;">
                                            Flux entrants
                                        </p>

                                        <h6 class="mb-0 fw-semibold" id="total-entrants-display" style="font-size:14px;">
                                            1,240,000 FCFA
                                        </h6>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center">
                                    <span class="badge bg-light-danger text-danger p-1 rounded-circle me-2">
                                        <i class="ti ti-arrow-down-right f-16"></i>
                                    </span>

                                    <div>
                                        <p class="text-muted mb-0" style="font-size:11px;">
                                            Flux sortants
                                        </p>

                                        <h6 class="mb-0 fw-semibold" id="total-sortants-display" style="font-size:14px;">
                                            850,000 FCFA
                                        </h6>
                                    </div>
                                </div>

                            </div>

                            {{-- Chart Zone --}}
                            <div
                                id="financial-flux-graph"
                                data-api-endpoint="/api/finances/flux-stats"
                                class="flex-grow-1"
                                style="min-height:200px;"
                            >
                                <div
                                    class="d-flex justify-content-center align-items-center"
                                    style="height:240px;"
                                >
                                    <div class="spinner-border spinner-border-sm text-primary" role="status">
                                        <span class="visually-hidden">Chargement...</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                {{-- Fin Area Chart --}}

                {{-- Donut Répartition des dépenses --}}
                <div class="col-12 col-lg-5 d-flex">

                    <div class="card shadow-sm border-0 rounded-4 w-100">
                        <div class="card-body p-3 d-flex flex-column">

                            {{-- Header --}}
                            <div class="d-flex align-items-center justify-content-between mb-3">

                                <div>
                                    <h6 class="mb-1 fw-bold">
                                        Répartition des dépenses
                                    </h6>

                                    <small class="text-muted">
                                        Ce mois
                                    </small>
                                </div>

                                <div class="dropdown">
                                    <button
                                        class="btn btn-sm btn-light border dropdown-toggle"
                                        type="button"
                                        data-bs-toggle="dropdown"
                                    >
                                        Ce mois
                                    </button>

                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item expense-filter" data-period="this_month" href="#">
                                            Ce mois
                                        </a>

                                        <a class="dropdown-item expense-filter" data-period="last_month" href="#">
                                            Mois dernier
                                        </a>
                                    </div>
                                </div>

                            </div>

                            {{-- Donut + Légende --}}
                            <div class="row align-items-center flex-grow-1 g-2 gx-0">

                                {{-- Donut --}}
                                <div class="col-12 col-sm-6">
                                    <div
                                        id="expense-donut-chart"
                                        style="min-height:180px;max-width:200px;"
                                    ></div>
                                </div>

                                {{-- Légende --}}
                                <div class="col-12 col-sm-6">

                                    <div id="expense-legend-list">

                                        {{-- Item --}}
                                        <div class="d-flex align-items-center justify-content-between mb-2">

                                            <div class="d-flex align-items-center">
                                                <span
                                                    class="rounded-circle me-2 d-inline-block flex-shrink-0"
                                                    style="background-color:#1e5bb9;width:8px;height:8px;"
                                                ></span>

                                                <span class="text-muted fw-medium" style="font-size:12px;">
                                                    Carburant
                                                </span>
                                            </div>

                                            <div class="text-end">
                                                <span class="fw-bold d-block" style="font-size:12px;">
                                                    28 450 000
                                                </span>

                                                <span class="text-primary" style="font-size:11px;">
                                                    36%
                                                </span>
                                            </div>

                                        </div>

                                        {{-- Item --}}
                                        <div class="d-flex align-items-center justify-content-between mb-2">

                                            <div class="d-flex align-items-center">
                                                <span
                                                    class="rounded-circle me-2 d-inline-block flex-shrink-0"
                                                    style="background-color:#2d89ef;width:8px;height:8px;"
                                                ></span>

                                                <span class="text-muted fw-medium" style="font-size:12px;">
                                                    Matériel
                                                </span>
                                            </div>

                                            <div class="text-end">
                                                <span class="fw-bold d-block" style="font-size:12px;">
                                                    22 180 000
                                                </span>

                                                <span class="text-primary" style="font-size:11px;">
                                                    28%
                                                </span>
                                            </div>

                                        </div>

                                        {{-- Item --}}
                                        <div class="d-flex align-items-center justify-content-between mb-2">

                                            <div class="d-flex align-items-center">
                                                <span
                                                    class="rounded-circle me-2 d-inline-block flex-shrink-0"
                                                    style="background-color:#ffb22b;width:8px;height:8px;"
                                                ></span>

                                                <span class="text-muted fw-medium" style="font-size:12px;">
                                                    Transport
                                                </span>
                                            </div>

                                            <div class="text-end">
                                                <span class="fw-bold d-block" style="font-size:12px;">
                                                    10 250 000
                                                </span>

                                                <span class="text-primary" style="font-size:11px;">
                                                    13%
                                                </span>
                                            </div>

                                        </div>

                                        {{-- Item --}}
                                        <div class="d-flex align-items-center justify-content-between mb-2">

                                            <div class="d-flex align-items-center">
                                                <span
                                                    class="rounded-circle me-2 d-inline-block flex-shrink-0"
                                                    style="background-color:#20c997;width:8px;height:8px;"
                                                ></span>

                                                <span class="text-muted fw-medium" style="font-size:12px;">
                                                    Main-d'œuvre
                                                </span>
                                            </div>

                                            <div class="text-end">
                                                <span class="fw-bold d-block" style="font-size:12px;">
                                                    7 800 000
                                                </span>

                                                <span class="text-primary" style="font-size:11px;">
                                                    10%
                                                </span>
                                            </div>

                                        </div>

                                        {{-- Item --}}
                                        <div class="d-flex align-items-center justify-content-between">

                                            <div class="d-flex align-items-center">
                                                <span
                                                    class="rounded-circle me-2 d-inline-block flex-shrink-0"
                                                    style="background-color:#6f42c1;width:8px;height:8px;"
                                                ></span>

                                                <span class="text-muted fw-medium" style="font-size:12px;">
                                                    Charges support
                                                </span>
                                            </div>

                                            <div class="text-end">
                                                <span class="fw-bold d-block" style="font-size:12px;">
                                                    9 640 000
                                                </span>

                                                <span class="text-primary" style="font-size:11px;">
                                                    12%
                                                </span>
                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>

                </div>
                {{-- Fin Donut --}}
            </div>
			   </div>
            {{-- FIN GRAPHIQUES --}}


            {{-- TABLE Dernières demandes CM--}}
            <div class="col-12 mt-1">
                <div class="card shadow-sm border-0 rounded-4">

                    <div class="card-header bg-white border-0 py-3 d-flex align-items-center justify-content-between">
                        <h5 class="mb-0 fw-bold">Dernières demandes CM</h5>
                        <a href="#" class="btn btn-sm btn-light-primary fw-semibold px-3">
                            Voir toutes
                        </a>
                    </div>

                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="bg-light-alt text-muted small text-uppercase">
                                    <tr>
                                        <th class="ps-4">N° Demande</th>
                                        <th>Site</th>
                                        <th>Incident</th>
                                        <th>Niveau urgence</th>
                                        <th>Statut</th>
                                        <th>Créé le</th>
                                        <th class="text-end pe-4">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="small">

                                    {{-- L1 --}}
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
                                        <td class="text-muted">23/05/2024 14:30</td>
                                        <td class="text-end pe-4">
                                            <a href="#" class="btn btn-sm btn-light border avtar avtar-xs">
                                                <i class="ti ti-eye f-18"></i>
                                            </a>
                                        </td>
                                    </tr>

                                    {{-- L2 --}}
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
                                        <td class="text-muted">22/05/2024 09:15</td>
                                        <td class="text-end pe-4">
                                            <a href="#" class="btn btn-sm btn-light border avtar avtar-xs">
                                                <i class="ti ti-eye f-18"></i>
                                            </a>
                                        </td>
                                    </tr>

                                    {{-- L3 --}}
                                    <tr>
                                        <td class="ps-4 fw-semibold">CM-2024-0126</td>
                                        <td class="text-muted">Site AC03</td>
                                        <td>Panne d'énergie</td>
                                        <td>
                                            <span class="badge bg-light-danger text-danger border border-danger-subtle px-2 py-1">Élevé</span>
                                        </td>
                                        <td>
                                            <span class="badge bg-light-secondary text-secondary px-2 py-1">En attente</span>
                                        </td>
                                        <td class="text-muted">21/05/2024 16:45</td>
                                        <td class="text-end pe-4">
                                            <a href="#" class="btn btn-sm btn-light border avtar avtar-xs">
                                                <i class="ti ti-eye f-18"></i>
                                            </a>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
            {{-- FIN TABLE --}}

        </div>
    </div>
</div>
{{-- FIN MAIN CONTENT --}}

{{-- Footer --}}
@include('footer.footer')

{{-- Customizer --}}
@include('customizer.customizer')

{{-- Footer Scripts --}}
@include('footerscript.footerscript')

</body>


{{--SCRIPTS APEXCHARTS--}}
<script>
 
// Area Chart Évolution des flux financiers

document.addEventListener('DOMContentLoaded', function () {
    const chartElement = document.querySelector('#financial-flux-graph');

    if (!chartElement || typeof ApexCharts === 'undefined') return;

    const fluxOptions = {
        series: [
            {
                name: 'Flux entrants (FCFA)',
                data: [80, 100, 95, 105, 85, 109, 100, 125, 80, 95, 110, 100]
            },
            {
                name: 'Flux sortants (FCFA)',
                data: [35, 50, 40, 45, 38, 52, 41, 60, 40, 50, 45, 35]
            }
        ],
        chart: {
            type: 'area',
            height: '200',
            toolbar: { show: false },
            fontFamily: 'Public Sans, sans-serif',
            sparkline: { enabled: false }
        },
        colors: ['#2ecc71', '#e74c3c'], 
        dataLabels: { enabled: false },
        stroke: { curve: 'smooth', width: 2 },
        
      
        markers: {
            size: 6,               
            strokeColors: '#fff',   
            strokeWidth: 2,
            hover: {
                size: 5,            
            }
        },
        

        fill: {
            type: 'gradient',
            gradient: {
                shadeIntensity: 1,
                opacityFrom: 0.3,
                opacityTo: 0.03,
                stops: [0, 100]
            }
        },
        xaxis: {
            categories: ['Juin','Juil','Août','Sept','Oct','Nov','Déc','Janv','Fév','Mars','Avr','Mai'],
            axisBorder: { show: false },
            axisTicks: { show: false }
        },
        yaxis: {
            labels: { formatter: val => val + 'M' }
        },
        legend: { show: false }, 
        grid: {
            borderColor: '#f1f1f1',
            strokeDashArray: 4
        }
    };

    window.financialChart = new ApexCharts(chartElement, fluxOptions);
    window.financialChart.render().then(() => {
        const loader = chartElement.querySelector('.spinner-border');
        if (loader) {
           
            loader.parentElement.remove();
        }
    });
});


// Donut Chart Répartition des dépenses
var donutOptions = {
    series: [36, 28, 13, 10, 12],
    chart: {
        type: 'donut',
        height: 240
    },
    colors: ['#1e5bb9', '#2d89ef', '#ffb22b', '#20c997', '#6f42c1'],
    labels: ['Carburant', 'Matériel', 'Transport', "Main-d'œuvre", 'Charges support'],
    dataLabels: { enabled: false },
    plotOptions: {
        pie: {
           offsetX: -10, // 🔥 clé principale
            donut: {
                size: '75%',
                labels: {
                    show: true,
                    total: {
                        show: true,
                        label: 'FCFA',
                        formatter: () => '78 320 000',
                        color: '#6c757d',
                        fontSize: '12px',
                        fontWeight: '600'
                    },
                    value: {
                        show: true,
                        fontSize: '16px',
                        fontWeight: 'bold',
                        offsetY: -8
                    }
                }
            }
        }
    },
    legend: { show: false }
};

var expenseChart = new ApexCharts(document.querySelector('#expense-donut-chart'), donutOptions);
expenseChart.render();
</script>

</html>