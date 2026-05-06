<!doctype html>
<html lang="en">

<!-- [Head] start -->
<!-- [Head] start -->
@include('style.style')
<!-- [Head] end -->

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
 @include('header.header')
<!-- [ Header ] end -->



    <!-- [ Main Content ] start -->
<div class="pc-container">
    <div class="pc-content">
          <!-- [ Main Content ] start -->
        <div class="row row0">
            @include('banner.banner')
            <div class="row row0 g-3">
              <div class="col">
                <div class="card kpi-card">
                  <div class="card-body">

                    <!-- TOP -->
                    <div class="d-flex align-items-center">
                      <div class="avtar avtar-s avatarfont bg-light-primary me-3">
                        <i class="ti ti-clipboard text-primary"></i>
                      </div>
                      <h6 class="mb-0">Demandes CM</h6>
                    </div>
                    <!-- BOTTOM -->
                    <div class="d-flex align-items-center justify-content-between mt-3">
                      <div>
                        <h3 class="mb-1">128</h3>
                        <small class="text-muted">En cours : 37</small>
                      </div>
                      <!-- FLECHE DANS CERCLE -->
                      <a href="#" class="circle-arrow">
                        <i class="ti ti-arrow-right"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col">
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
              <div class="col">
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
              <div class="col">
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

              <div class="col">
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
            <div class="col-lg-9">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-center mb-2">
                    <div class="flex-grow-1">
                      <h5 class="mb-0">Repeat customer rate</h5>
                    </div>
                    <div class="flex-shrink-0 ms-3">
                      <div class="dropdown">
                        <a
                          class="avtar avtar-s btn-link-secondary dropdown-toggle arrow-none"
                          href="#"
                          data-bs-toggle="dropdown"
                          aria-haspopup="true"
                          aria-expanded="false"
                        >
                          <i class="ti ti-dots f-18"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                          <a class="dropdown-item" href="#">Today</a>
                          <a class="dropdown-item" href="#">Weekly</a>
                          <a class="dropdown-item" href="#">Monthly</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <h5 class="text-end my-2">5.44% <span class="badge bg-success">+2.6%</span> </h5>
                  <div id="customer-rate-graph"></div>
                </div>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="card">
                <div class="card-header">
                  <h5 class="mb-0">Project - Able Pro</h5>
                </div>
                <div class="card-body">
                  <div class="mb-4">
                    <p class="mb-2">Release v1.2.0<span class="float-end">70%</span></p>
                    <div class="progress progress-primary" style="height: 8px">
                      <div class="progress-bar" style="width: 70%"></div>
                    </div>
                  </div>
                  <div class="d-grid gap-2">
                    <a href="#" class="btn btn-link-secondary">
                      <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                          <span class="p-1 d-block bg-warning rounded-circle">
                            <span class="visually-hidden">New alerts</span>
                          </span>
                        </div>
                        <div class="flex-grow-1 mx-2">
                          <p class="mb-0 d-grid text-start">
                            <span class="text-truncate w-100">Horizontal Layout</span>
                          </p>
                        </div>
                        <div class="badge bg-light-secondary f-12"><i class="ti ti-paperclip text-sm"></i> 2</div>
                      </div>
                    </a>
                    <a href="#" class="btn btn-link-secondary">
                      <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                          <span class="p-1 d-block bg-warning rounded-circle">
                            <span class="visually-hidden">New alerts</span>
                          </span>
                        </div>
                        <div class="flex-grow-1 mx-2">
                          <p class="mb-0 d-grid text-start">
                            <span class="text-truncate w-100">Invoice Generator</span>
                          </p>
                        </div>
                      </div>
                    </a>
                    <a href="#" class="btn btn-link-secondary">
                      <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                          <span class="p-1 d-block bg-warning rounded-circle">
                            <span class="visually-hidden">New alerts</span>
                          </span>
                        </div>
                        <div class="flex-grow-1 mx-2">
                          <p class="mb-0 d-grid text-start">
                            <span class="text-truncate w-100">Package Upgrades</span>
                          </p>
                        </div>
                      </div>
                    </a>
                    <a href="#" class="btn btn-link-secondary">
                      <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                          <span class="p-1 d-block bg-success rounded-circle">
                            <span class="visually-hidden">New alerts</span>
                          </span>
                        </div>
                        <div class="flex-grow-1 mx-2">
                          <p class="mb-0 d-grid text-start">
                            <span class="text-truncate w-100">Figma Auto Layout</span>
                          </p>
                        </div>
                      </div>
                    </a>
                  </div>
                  <div class="d-grid mt-3">
                    <button class="btn btn-primary d-flex align-items-center justify-content-center gap-2"
                      ><i class="ti ti-plus"></i> Add task</button
                    >
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-9">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Project overview</h5>
                    <div class="dropdown">
                      <a
                        class="avtar avtar-s btn-link-secondary dropdown-toggle arrow-none"
                        href="#"
                        data-bs-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                      >
                        <i class="ti ti-dots f-18"></i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="#">Today</a>
                        <a class="dropdown-item" href="#">Weekly</a>
                        <a class="dropdown-item" href="#">Monthly</a>
                      </div>
                    </div>
                  </div>
                  <div class="row align-items-center justify-content-center">
                    <div class="col-md-6 col-xl-4">
                      <div class="mt-3 row align-items-center">
                        <div class="col-6">
                          <p class="text-muted mb-1">Total Tasks</p>
                          <h5 class="mb-0">34,686</h5>
                        </div>
                        <div class="col-6">
                          <div id="total-tasks-graph"></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 col-xl-4">
                      <div class="mt-3 row align-items-center">
                        <div class="col-6">
                          <p class="text-muted mb-1">Pending Tasks</p>
                          <h5 class="mb-0">3,786</h5>
                        </div>
                        <div class="col-6">
                          <div id="pending-tasks-graph"></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 col-xl-4">
                      <div class="mt-3 d-grid">
                        <button class="btn btn-primary d-flex align-items-center justify-content-center gap-2"
                          ><i class="ti ti-plus"></i> Add project</button
                        >
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <div class="flex-shrink-0">
                      <div class="avtar avtar-s bg-light-primary">
                        <i class="ti ti-at f-20"></i>
                      </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                      <h6 class="mb-0">Able pro</h6>
                      <small class="text-muted">@ableprodevelop</small>
                    </div>
                    <div class="dropdown">
                      <a
                        class="avtar avtar-s btn-link-secondary dropdown-toggle arrow-none"
                        href="#"
                        data-bs-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                      >
                        <i class="ti ti-dots-vertical f-18"></i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="#">Today</a>
                        <a class="dropdown-item" href="#">Weekly</a>
                        <a class="dropdown-item" href="#">Monthly</a>
                      </div>
                    </div>
                  </div>
                  <div class="d-flex align-items-center justify-content-between mt-4">
                    <div class="user-group able-user-group">
                      <img src="{{ asset('assets/images/user/avatar-1.jpg') }}" alt="user-image" class="avtar" />
                      <img src="{{ asset('assets/images/user/avatar-3.jpg') }}" alt="user-image" class="avtar" />
                      <img src="{{ asset('assets/images/user/avatar-4.jpg') }}" alt="user-image" class="avtar" />
                      <img src="{{ asset('assets/images/user/avatar-5.jpg') }}" alt="user-image" class="avtar" />
                      <span class="avtar bg-light-primary text-primary text-sm">+2</span>
                    </div>
                    <a href="#" class="avtar avtar-s btn btn-primary rounded-circle">
                      <i class="ti ti-plus f-20"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card">
                <div class="card-body border-bottom pb-0">
                  <div class="d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Transactions</h5>
                    <div class="dropdown">
                      <a
                        class="avtar avtar-s btn-link-secondary dropdown-toggle arrow-none"
                        href="#"
                        data-bs-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                      >
                        <i class="ti ti-dots-vertical f-18"></i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="#">Today</a>
                        <a class="dropdown-item" href="#">Weekly</a>
                        <a class="dropdown-item" href="#">Monthly</a>
                      </div>
                    </div>
                  </div>
                  <ul class="nav nav-tabs analytics-tab" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                      <button
                        class="nav-link active"
                        id="analytics-tab-1"
                        data-bs-toggle="tab"
                        data-bs-target="#analytics-tab-1-pane"
                        type="button"
                        role="tab"
                        aria-controls="analytics-tab-1-pane"
                        aria-selected="true"
                        >All Transaction</button
                      >
                    </li>
                    <li class="nav-item" role="presentation">
                      <button
                        class="nav-link"
                        id="analytics-tab-2"
                        data-bs-toggle="tab"
                        data-bs-target="#analytics-tab-2-pane"
                        type="button"
                        role="tab"
                        aria-controls="analytics-tab-2-pane"
                        aria-selected="false"
                        >Success</button
                      >
                    </li>
                    <li class="nav-item" role="presentation">
                      <button
                        class="nav-link"
                        id="analytics-tab-3"
                        data-bs-toggle="tab"
                        data-bs-target="#analytics-tab-3-pane"
                        type="button"
                        role="tab"
                        aria-controls="analytics-tab-3-pane"
                        aria-selected="false"
                        >Pending</button
                      >
                    </li>
                  </ul>
                </div>
                <div class="tab-content" id="myTabContent">
                  <div
                    class="tab-pane fade show active"
                    id="analytics-tab-1-pane"
                    role="tabpanel"
                    aria-labelledby="analytics-tab-1"
                    tabindex="0"
                  >
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item">
                        <div class="d-flex align-items-center">
                          <div class="flex-shrink-0">
                            <div class="avtar avtar-s border"> AI </div>
                          </div>
                          <div class="flex-grow-1 ms-3">
                            <div class="row g-1">
                              <div class="col-6">
                                <h6 class="mb-0">Apple Inc.</h6>
                                <p class="text-muted mb-0"><small>#ABLE-PRO-T00232</small></p>
                              </div>
                              <div class="col-6 text-end">
                                <h6 class="mb-1">$210,000</h6>
                                <p class="text-danger mb-0"><i class="ti ti-arrow-down-left"></i> 10.6%</p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </li>
                      <li class="list-group-item">
                        <div class="d-flex align-items-center">
                          <div class="flex-shrink-0">
                            <div class="avtar avtar-s border" data-bs-toggle="tooltip" data-bs-title="10,000 Tracks"><span>SM</span></div>
                          </div>
                          <div class="flex-grow-1 ms-3">
                            <div class="row g-1">
                              <div class="col-6">
                                <h6 class="mb-0">Spotify Music</h6>
                                <p class="text-muted mb-0"><small>#ABLE-PRO-T10232</small></p>
                              </div>
                              <div class="col-6 text-end">
                                <h6 class="mb-1">- 10,000</h6>
                                <p class="text-success mb-0"><i class="ti ti-arrow-up-right"></i> 30.6%</p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </li>
                      <li class="list-group-item">
                        <div class="d-flex align-items-center">
                          <div class="flex-shrink-0">
                            <div class="avtar avtar-s border bg-light-primary" data-bs-toggle="tooltip" data-bs-title="143 Posts"
                              ><span>MD</span>
                            </div>
                          </div>
                          <div class="flex-grow-1 ms-3">
                            <div class="row g-1">
                              <div class="col-6">
                                <h6 class="mb-0">Medium</h6>
                                <p class="text-muted mb-0"><small>06:30 pm</small></p>
                              </div>
                              <div class="col-6 text-end">
                                <h6 class="mb-1">-26</h6>
                                <p class="text-warning mb-0"><i class="ti ti-arrows-left-right"></i> 5%</p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </li>
                      <li class="list-group-item">
                        <div class="d-flex align-items-center">
                          <div class="flex-shrink-0">
                            <div class="avtar avtar-s border" data-bs-toggle="tooltip" data-bs-title="143 Posts"><span>U</span> </div>
                          </div>
                          <div class="flex-grow-1 ms-3">
                            <div class="row g-1">
                              <div class="col-6">
                                <h6 class="mb-0">Uber</h6>
                                <p class="text-muted mb-0"><small>08:40 pm</small></p>
                              </div>
                              <div class="col-6 text-end">
                                <h6 class="mb-1">+210,000</h6>
                                <p class="text-success mb-0"><i class="ti ti-arrow-up-right"></i> 10.6%</p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </li>
                      <li class="list-group-item">
                        <div class="d-flex align-items-center">
                          <div class="flex-shrink-0">
                            <div class="avtar avtar-s border bg-light-warning" data-bs-toggle="tooltip" data-bs-title="143 Posts"
                              ><span>OC</span>
                            </div>
                          </div>
                          <div class="flex-grow-1 ms-3">
                            <div class="row g-1">
                              <div class="col-6">
                                <h6 class="mb-0">Ola Cabs</h6>
                                <p class="text-muted mb-0"><small>07:40 pm</small></p>
                              </div>
                              <div class="col-6 text-end">
                                <h6 class="mb-1">+210,000</h6>
                                <p class="text-success mb-0"><i class="ti ti-arrow-up-right"></i> 10.6%</p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </div>
                  <div class="tab-pane fade" id="analytics-tab-2-pane" role="tabpanel" aria-labelledby="analytics-tab-2" tabindex="0">
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item">
                        <div class="d-flex align-items-center">
                          <div class="flex-shrink-0">
                            <div class="avtar avtar-s border" data-bs-toggle="tooltip" data-bs-title="143 Posts"><span>U</span> </div>
                          </div>
                          <div class="flex-grow-1 ms-3">
                            <div class="row g-1">
                              <div class="col-6">
                                <h6 class="mb-0">Uber</h6>
                                <p class="text-muted mb-0"><small>08:40 pm</small></p>
                              </div>
                              <div class="col-6 text-end">
                                <h6 class="mb-1">+210,000</h6>
                                <p class="text-success mb-0"><i class="ti ti-arrow-up-right"></i> 10.6%</p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </li>
                      <li class="list-group-item">
                        <div class="d-flex align-items-center">
                          <div class="flex-shrink-0">
                            <div class="avtar avtar-s border bg-light-warning" data-bs-toggle="tooltip" data-bs-title="143 Posts"
                              ><span>OC</span>
                            </div>
                          </div>
                          <div class="flex-grow-1 ms-3">
                            <div class="row g-1">
                              <div class="col-6">
                                <h6 class="mb-0">Ola Cabs</h6>
                                <p class="text-muted mb-0"><small>07:40 pm</small></p>
                              </div>
                              <div class="col-6 text-end">
                                <h6 class="mb-1">+210,000</h6>
                                <p class="text-success mb-0"><i class="ti ti-arrow-up-right"></i> 10.6%</p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </li>
                      <li class="list-group-item">
                        <div class="d-flex align-items-center">
                          <div class="flex-shrink-0">
                            <div class="avtar avtar-s border">AI</div>
                          </div>
                          <div class="flex-grow-1 ms-3">
                            <div class="row g-1">
                              <div class="col-6">
                                <h6 class="mb-0">Apple Inc.</h6>
                                <p class="text-muted mb-0"><small>#ABLE-PRO-T00232</small></p>
                              </div>
                              <div class="col-6 text-end">
                                <h6 class="mb-1">$210,000</h6>
                                <p class="text-danger mb-0"><i class="ti ti-arrow-down-left"></i> 10.6%</p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </li>
                      <li class="list-group-item">
                        <div class="d-flex align-items-center">
                          <div class="flex-shrink-0">
                            <div class="avtar avtar-s border" data-bs-toggle="tooltip" data-bs-title="10,000 Tracks"><span>SM</span></div>
                          </div>
                          <div class="flex-grow-1 ms-3">
                            <div class="row g-1">
                              <div class="col-6">
                                <h6 class="mb-0">Spotify Music</h6>
                                <p class="text-muted mb-0"><small>#ABLE-PRO-T10232</small></p>
                              </div>
                              <div class="col-6 text-end">
                                <h6 class="mb-1">- 10,000</h6>
                                <p class="text-success mb-0"><i class="ti ti-arrow-up-right"></i> 30.6%</p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </li>
                      <li class="list-group-item">
                        <div class="d-flex align-items-center">
                          <div class="flex-shrink-0">
                            <div class="avtar avtar-s border bg-light-primary" data-bs-toggle="tooltip" data-bs-title="143 Posts"
                              ><span>MD</span>
                            </div>
                          </div>
                          <div class="flex-grow-1 ms-3">
                            <div class="row g-1">
                              <div class="col-6">
                                <h6 class="mb-0">Medium</h6>
                                <p class="text-muted mb-0"><small>06:30 pm</small></p>
                              </div>
                              <div class="col-6 text-end">
                                <h6 class="mb-1">-26</h6>
                                <p class="text-warning mb-0"><i class="ti ti-arrows-left-right"></i> 5%</p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </div>
                  <div class="tab-pane fade" id="analytics-tab-3-pane" role="tabpanel" aria-labelledby="analytics-tab-3" tabindex="0">
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item">
                        <div class="d-flex align-items-center">
                          <div class="flex-shrink-0">
                            <div class="avtar avtar-s border" data-bs-toggle="tooltip" data-bs-title="10,000 Tracks"><span>SM</span></div>
                          </div>
                          <div class="flex-grow-1 ms-3">
                            <div class="row g-1">
                              <div class="col-6">
                                <h6 class="mb-0">Spotify Music</h6>
                                <p class="text-muted mb-0"><small>#ABLE-PRO-T10232</small></p>
                              </div>
                              <div class="col-6 text-end">
                                <h6 class="mb-1">- 10,000</h6>
                                <p class="text-success mb-0"><i class="ti ti-arrow-up-right"></i> 30.6%</p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </li>
                      <li class="list-group-item">
                        <div class="d-flex align-items-center">
                          <div class="flex-shrink-0">
                            <div class="avtar avtar-s border bg-light-primary" data-bs-toggle="tooltip" data-bs-title="143 Posts"
                              ><span>MD</span>
                            </div>
                          </div>
                          <div class="flex-grow-1 ms-3">
                            <div class="row g-1">
                              <div class="col-6">
                                <h6 class="mb-0">Medium</h6>
                                <p class="text-muted mb-0"><small>06:30 pm</small></p>
                              </div>
                              <div class="col-6 text-end">
                                <h6 class="mb-1">-26</h6>
                                <p class="text-warning mb-0"><i class="ti ti-arrows-left-right"></i> 5%</p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </li>
                      <li class="list-group-item">
                        <div class="d-flex align-items-center">
                          <div class="flex-shrink-0">
                            <div class="avtar avtar-s border" data-bs-toggle="tooltip" data-bs-title="143 Posts"><span>U</span> </div>
                          </div>
                          <div class="flex-grow-1 ms-3">
                            <div class="row g-1">
                              <div class="col-6">
                                <h6 class="mb-0">Uber</h6>
                                <p class="text-muted mb-0"><small>08:40 pm</small></p>
                              </div>
                              <div class="col-6 text-end">
                                <h6 class="mb-1">+210,000</h6>
                                <p class="text-success mb-0"><i class="ti ti-arrow-up-right"></i> 10.6%</p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </li>
                      <li class="list-group-item">
                        <div class="d-flex align-items-center">
                          <div class="flex-shrink-0">
                            <div class="avtar avtar-s border"> AI </div>
                          </div>
                          <div class="flex-grow-1 ms-3">
                            <div class="row g-1">
                              <div class="col-6">
                                <h6 class="mb-0">Apple Inc.</h6>
                                <p class="text-muted mb-0"><small>#ABLE-PRO-T00232</small></p>
                              </div>
                              <div class="col-6 text-end">
                                <h6 class="mb-1">$210,000</h6>
                                <p class="text-danger mb-0"><i class="ti ti-arrow-down-left"></i> 10.6%</p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </li>
                      <li class="list-group-item">
                        <div class="d-flex align-items-center">
                          <div class="flex-shrink-0">
                            <div class="avtar avtar-s border bg-light-warning" data-bs-toggle="tooltip" data-bs-title="143 Posts"
                              ><span>OC</span>
                            </div>
                          </div>
                          <div class="flex-grow-1 ms-3">
                            <div class="row g-1">
                              <div class="col-6">
                                <h6 class="mb-0">Ola Cabs</h6>
                                <p class="text-muted mb-0"><small>07:40 pm</small></p>
                              </div>
                              <div class="col-6 text-end">
                                <h6 class="mb-1">+210,000</h6>
                                <p class="text-success mb-0"><i class="ti ti-arrow-up-right"></i> 10.6%</p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="row g-2">
                    <div class="col-md-6">
                      <div class="d-grid">
                        <button class="btn btn-outline-secondary d-grid"
                          ><span class="text-truncate w-100">View all Transaction History</span></button
                        >
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="d-grid">
                        <button class="btn btn-primary d-grid"><span class="text-truncate w-100">Create new Transaction</span></button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Total Income</h5>
                    <div class="dropdown">
                      <a
                        class="avtar avtar-s btn-link-secondary dropdown-toggle arrow-none"
                        href="#"
                        data-bs-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                      >
                        <i class="ti ti-dots-vertical f-18"></i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="#">Today</a>
                        <a class="dropdown-item" href="#">Weekly</a>
                        <a class="dropdown-item" href="#">Monthly</a>
                      </div>
                    </div>
                  </div>
                  <div id="total-income-graph"></div>
                  <div class="row g-3 mt-3">
                    <div class="col-sm-6">
                      <div class="bg-body p-3 rounded">
                        <div class="d-flex align-items-center mb-2">
                          <div class="flex-shrink-0">
                            <span class="p-1 d-block bg-primary rounded-circle">
                              <span class="visually-hidden">New alerts</span>
                            </span>
                          </div>
                          <div class="flex-grow-1 ms-2">
                            <p class="mb-0">Income</p>
                          </div>
                        </div>
                        <h6 class="mb-0"
                          >$23,876 <small class="text-muted"><i class="ti ti-chevrons-up"></i> +$763,43</small></h6
                        >
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="bg-body p-3 rounded">
                        <div class="d-flex align-items-center mb-2">
                          <div class="flex-shrink-0">
                            <span class="p-1 d-block bg-warning rounded-circle">
                              <span class="visually-hidden">New alerts</span>
                            </span>
                          </div>
                          <div class="flex-grow-1 ms-2">
                            <p class="mb-0">Rent</p>
                          </div>
                        </div>
                        <h6 class="mb-0"
                          >$23,876 <small class="text-muted"><i class="ti ti-chevrons-up"></i> +$763,43</small></h6
                        >
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="bg-body p-3 rounded">
                        <div class="d-flex align-items-center mb-2">
                          <div class="flex-shrink-0">
                            <span class="p-1 d-block bg-success rounded-circle">
                              <span class="visually-hidden">New alerts</span>
                            </span>
                          </div>
                          <div class="flex-grow-1 ms-2">
                            <p class="mb-0">Download</p>
                          </div>
                        </div>
                        <h6 class="mb-0"
                          >$23,876 <small class="text-muted"><i class="ti ti-chevrons-up"></i> +$763,43</small></h6
                        >
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="bg-body p-3 rounded">
                        <div class="d-flex align-items-center mb-2">
                          <div class="flex-shrink-0">
                            <span class="p-1 d-block bg-light-primary rounded-circle">
                              <span class="visually-hidden">New alerts</span>
                            </span>
                          </div>
                          <div class="flex-grow-1 ms-2">
                            <p class="mb-0">Views</p>
                          </div>
                        </div>
                        <h6 class="mb-0"
                          >$23,876 <small class="text-muted"><i class="ti ti-chevrons-up"></i> +$763,43</small></h6
                        >
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
          <!-- [ Main Content ] end -->
    </div>
</div>




<!-- [ Main Content ] end -->
    
<!-- [ Footer ] start -->
@include('footer.footer')
<!-- [ Footer ] End -->

 <!-- Customizer start -->
@include('customizer.customizer')
<!-- Customizer end -->

   <!-- [ Footer Script ] start  -->
 @include('footerscript.footerscript')


<!-- [ Footer Script ] end -->
    

  </body>
  <!-- [Body] end -->
</html>
