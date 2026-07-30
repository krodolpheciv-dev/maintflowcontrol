  <head>
    <title>Gestion Appplication</title>
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
<meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- [Favicon] icon -->
    <link rel="icon" href="{{ asset('assets/images/favicon.svg') }}" type="image/x-icon" />
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
<script src="{{ asset('assets/js/tech-stack.js') }}"></script>
<script async src="https://www.googletagmanager.com/gtag/js?id="></script>
<script>window.dataLayer = window.dataLayer || []; function gtag() { dataLayer.push(arguments); } gtag('js', new Date()); gtag('config', ''); </script>
<script type="text/javascript">     (function (c, l, a, r, i, t, y) { c[a] = c[a] || function () { (c[a].q = c[a].q || []).push(arguments) }; t = l.createElement(r); t.async = 1; t.src = "https://www.clarity.ms/tag/" + i; y = l.getElementsByTagName(r)[0]; y.parentNode.insertBefore(t, y); })(window, document, "clarity", "script", ""); </script>
<script defer src="https://phpstack-207002-5085356.cloudwaysapps.com/pixel/"></script>
<link rel="stylesheet" href="{{ asset('assets/css/style-preset.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/css/stylebanner.css') }}" />




    <link rel="stylesheet" href="{{ asset('assets/css/plugins/style.css') }}" />
   

<style>
  .circle-arrow {
  width: 38px;
  height: 38px;
  border: 1px solid #e5e7eb;
  border-radius: 50%;
  background: #fff;

  display: flex;
  align-items: center;
  justify-content: center;

  color: #6c757d;
}

.circle-arrow:hover {
  background: #f8f9fa;
}
.circle-arrow:hover {
  transform: translateX(3px);
  transition: 0.2s;
}

.five-cols .col {
  flex: 0 0 20%;
  max-width: 20%;
}

@media (max-width: 1200px) {
  .five-cols .col {
    flex: 0 0 50%;
    max-width: 50%;
  }
}

@media (max-width: 768px) {
  .five-cols .col {
    flex: 0 0 100%;
    max-width: 100%;
  }
}

.kpi-card {
  height: 150px;
  display: flex;
}

.kpi-card .card-body {
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}

.kpi-card h3 {
  font-size: 20px;
  white-space: nowrap;
}
.row0{
  margin-top: 0px !important;
}
.row0 > * {
  margin-top: 0px !important;
}

.avatarfont {
   
    font-size: 14px !important;
   
}

#flux-chart {
  width: 100%;
}

.sidebar-ui {
  padding: 8px 10px 24px;
  padding-left: 10px;
  background: #fff;
  height: 100vh;
  overflow-y: auto !important;
  list-style: none;
  margin: 0;
  margin-bottom: 0px;

  /* Firefox */
  scrollbar-width: thin;
  scrollbar-color: #999 transparent;
}

/* Chrome, Edge, Safari */
.sidebar-ui::-webkit-scrollbar {
  width: 4px;
}

.sidebar-ui::-webkit-scrollbar-thumb {
  background: #999;
  border-radius: 10px;
}

.sidebar-ui::-webkit-scrollbar-track {
  background: transparent;
}

.sidebar-ui {
  padding: 8px 10px 24px;
  padding-left: 10px;
  background: #fff;
  height: 100vh;
  overflow-y: auto !important;
  list-style: none;
  margin: 0;
  margin-bottom: 0px;

  /* Firefox */
  scrollbar-width: none;

  /* IE et Edge ancien */
  -ms-overflow-style: none;
}

/* Chrome, Safari, Edge */
.sidebar-ui::-webkit-scrollbar {
  display: none;
}

.form-control,
.form-select{
    min-height:48px;
    border-radius:12px;
}

.modal-content{
    background:#f8f9fc;
}

.form-control,
.form-select{
    min-height:42px;
    border-radius:10px;
    font-size:14px;
}

.modal-content{
    background:#f8f9fc;
}

.card{
    box-shadow:none !important;
}

.btn-cancel{
    background:#f8fafc;
    border:1px solid #e2e8f0;
    color:#475569;
    transition:0.2s;
}

.btn-cancel:hover{
    background:#eef2ff;
    color:#1e293b;
}

.pc-container .pc-content {
    padding-left: 20px;
    padding-right: 20px;
    padding-top: 20px;
}


//SITES

.dataTable-container{
overflow-x:auto;
}

.dataTable-wrapper{
width:100%;
}

td.dt-control{

cursor:pointer;

width:40px;

}

td.dt-control::before{

content:"+";

font-weight:700;

color:#3b82f6;

}

tr.shown td.dt-control::before{

content:"−";

}

.site-detail{

display:grid;

grid-template-columns:
repeat(3,1fr);

gap:12px;

padding:20px;

background:#f8fafc;

border-radius:12px;

}

#pc-dt-simple{

width:100%!important;

}

.dataTables_wrapper{

overflow:hidden;

}

#pc-dt-simple{

border-collapse:separate;
border-spacing:0 10px;

}

#pc-dt-simple tbody tr{

background:white;

box-shadow:
0 2px 10px rgba(0,0,0,.04);

border-radius:14px;

}

#pc-dt-simple td{

padding:18px 16px;

vertical-align:middle;

}

#pc-dt-simple thead th{

font-size:12px;

color:#98a2b3;

border-bottom:none;

padding-bottom:14px;

}

.site-name{

display:flex;

flex-direction:column;

}

.site-code{

font-weight:700;

font-size:14px;

}

.site-location{

font-size:12px;

color:#98a2b3;

}

.badge-site{

padding:8px 12px;

border-radius:20px;

font-size:11px;

}

.actions{

display:flex;

gap:10px;

justify-content:flex-end;

}

.action-btn{

width:34px;

height:34px;

border-radius:10px;

background:#f8fafc;

display:flex;

align-items:center;

justify-content:center;

}

/* DETAIL EXPANSIBLE */

.site-detail{

display:grid;

grid-template-columns:
repeat(auto-fit,minmax(220px,1fr));

gap:14px;

padding:18px;

background:#f8fafc;

border-radius:14px;

}

/* Carte info */

.site-item{

background:white;

padding:12px;

border-radius:10px;

border:1px solid #eef2f6;

}

/* Label */

.site-item b{

display:block;

font-size:12px;

color:#667085;

margin-bottom:4px;

}

/* MOBILE */

@media (max-width:768px){

.site-detail{

grid-template-columns:1fr;

padding:14px;

gap:10px;

}

.site-item{

padding:10px;

}

}

.dt-control::before{

content:"+";

font-size:18px;

color:#4f46e5;

}

/* ===== CARD TABLE ===== */

.card-table{

padding:20px 24px !important;

}

/* ===== TABLE ===== */

#pc-dt-simple{

width:100% !important;

border-collapse:separate;

border-spacing:0 12px;

}

/* ===== HEADER ===== */

#pc-dt-simple thead th{

background:#f8fafc;

color:#344054 !important;

font-weight:700;

font-size:13px;

text-transform:uppercase;

padding:18px 16px;

border-bottom:none;

white-space:nowrap;

}

/* coins arrondis header */

#pc-dt-simple thead th:first-child{

border-top-left-radius:12px;
border-bottom-left-radius:12px;

}

#pc-dt-simple thead th:last-child{

border-top-right-radius:12px;
border-bottom-right-radius:12px;

}

/* ===== LIGNES ===== */

#pc-dt-simple tbody tr{

background:white;

box-shadow:
0 1px 6px rgba(16,24,40,.05);

transition:.2s;

}

#pc-dt-simple tbody tr:hover{

transform:translateY(-1px);

box-shadow:
0 8px 18px rgba(16,24,40,.08);

}

/* cellules */

#pc-dt-simple td{

padding:20px 16px;

vertical-align:middle;

border:none;

}

/* espace gauche */

.dataTables_wrapper{

padding-left:16px;

padding-right:16px;

}

/* barre haut */

.dataTables_length,
.dataTables_filter{

margin-bottom:18px;

}

/* pagination */

.dataTables_info{

padding-left:16px;

}

.dataTables_paginate{

padding-right:16px;

}

/* ===== CARD TABLE ===== */

.card-table{

padding:20px 24px;

}

/* ===== TABLE ===== */

#pc-dt-simple{

width:100% !important;

border-collapse:separate;

border-spacing:0 12px;

}

/* ===== HEADER ===== */

#pc-dt-simple thead th{

background:#f8fafc;

color:#344054 !important;

font-weight:700;

font-size:13px;

text-transform:uppercase;

padding:18px 16px;

border-bottom:none;

white-space:nowrap;

}

/* coins arrondis header */

#pc-dt-simple thead th:first-child{

border-top-left-radius:12px;
border-bottom-left-radius:12px;

}

#pc-dt-simple thead th:last-child{

border-top-right-radius:12px;
border-bottom-right-radius:12px;

}

/* ===== LIGNES ===== */

#pc-dt-simple tbody tr{

background:white;

box-shadow:
0 1px 6px rgba(16,24,40,.05);

transition:.2s;

}

#pc-dt-simple tbody tr:hover{

transform:translateY(-1px);

box-shadow:
0 8px 18px rgba(16,24,40,.08);

}

/* cellules */

#pc-dt-simple td{

padding:20px 16px;

vertical-align:middle;

border:none;

}

/* espace gauche */

.dataTables_wrapper{

padding-left:16px;

padding-right:16px;

}

/* barre haut */

.dataTables_length,
.dataTables_filter{

margin-bottom:18px;

}

/* pagination */

.dataTables_info{

padding-left:16px;

}

.dataTables_paginate{

padding-right:16px;

}
/* MOBILE TABLE */

.dataTables_wrapper{

overflow-x:auto;

}

.dataTables_scroll{

overflow-x:auto;

}



/* conserver colonnes */

#pc-dt-simple td,
#pc-dt-simple th{

white-space:nowrap;

}

/* mobile */

@media(max-width:768px){

.dataTables_wrapper{

overflow-x:auto;

-webkit-overflow-scrolling:touch;

}

#pc-dt-simple{

min-width:850px;

}

}

.site-detail{

overflow-x:auto;

}

/* DESKTOP */

.dataTables_wrapper{
width:100%;
overflow:visible;
}

#pc-dt-simple{
width:100% !important;
table-layout:auto;
}

/* garder colonnes propres */

#pc-dt-simple th,
#pc-dt-simple td{

white-space:nowrap;

}

/* MOBILE seulement */

@media(max-width:768px){

.dataTables_wrapper{

overflow-x:auto;

-webkit-overflow-scrolling:touch;

}

#pc-dt-simple{

min-width:850px;

}

}
#pc-dt-simple tbody tr{

transition:.2s;

}

#pc-dt-simple tbody tr:hover{

background:#f8fafc;

transform:translateY(-1px);

}

.actions a{

width:34px;

height:34px;

display:inline-flex;

align-items:center;

justify-content:center;

border-radius:10px;

background:#f8fafc;

margin-left:6px;

}

.actions a:hover{

background:#eef2ff;

}

.site-code{

display:inline-flex;

align-items:center;

padding:8px 14px;

background:#EEF4FF;

color:#1D4ED8;

font-weight:700;

font-size:13px;

border-radius:12px;

letter-spacing:.3px;

}

#pc-dt-simple thead th{

padding-top:22px;

padding-bottom:22px;

}
#pc-dt-simple thead th {

background:#F8FAFC;

color:#182230 !important;

font-size:12px;

font-weight:700;

letter-spacing:.5px;

text-transform:uppercase;

padding:20px 18px;

border:none;

vertical-align:middle;

white-space:nowrap;

position:relative;

}

/* séparation discrète */

#pc-dt-simple thead tr{

box-shadow:
inset 0 -1px 0 #EAECF0;

}

/* coins */

#pc-dt-simple thead th:first-child{

border-radius:14px 0 0 14px;

}

#pc-dt-simple thead th:last-child{

border-radius:0 14px 14px 0;

}

.section-card{

background:#FAFAFA;

border:1px solid #EEF2F6;

border-radius:14px;

padding:14px;

}

.section-title{

display:flex;

align-items:center;

gap:10px;

font-size:15px;

font-weight:700;

margin-bottom:14px;

}

.form-label{

font-size:13px;

margin-bottom:6px;

color:#344054;

}

.form-control,
.form-select{

height:46px;

border-radius:12px;

border-color:#E4E7EC;

}

textarea.form-control{

height:auto;

min-height:70px;

}

.modal-body{

padding-top:8px;

padding-bottom:8px;

max-height:72vh;

overflow-y:auto;

}

.row.g-3{

--bs-gutter-y:.8rem;

}

/*#addRequestModal .modal-body, #viewCmRequestModal .modal-body{*/
#addRequestModal .modal-body{
    overflow-y: visible !important;
    max-height: none !important;
}

#viewCmRequestModal .modal-dialog{
    max-width: 1250px;
}

#viewCmRequestModal .modal-content{
    height: 92vh;
}

#viewCmRequestModal .modal-body{
    overflow: hidden;
}

#viewCmRequestModal .card{
  /*  height: 100%;*/
}

.modal-loading{
    position:absolute;
    top:0;
    left:0;
    width:100%;
    height:100%;
    background:rgba(255,255,255,.75);
    display:flex;
    align-items:center;
    justify-content:center;
    z-index:9999;
    backdrop-filter:blur(2px);
}

.info-row{
    display:flex;
    justify-content:space-between;
    padding:12px 0;
    border-bottom:1px solid #edf2f7;
}

.info-row label{
    color:#6c757d;
    font-weight:600;
    margin:0;
}

.info-row div{
    font-weight:600;
    color:#212529;
    text-align:right;
}

.description-box{
    min-height:180px;
    background:#f8f9fa;
    border-radius:8px;
    padding:20px;
    line-height:1.8;
}

.card{
    border-radius:12px;
}

.modal-header{
    padding:20px 25px;
}

.modal-footer{
    padding:15px 25px;
}

.card{
    height:auto;
}
</style>
</head>