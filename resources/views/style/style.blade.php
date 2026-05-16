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
</style>
</head>