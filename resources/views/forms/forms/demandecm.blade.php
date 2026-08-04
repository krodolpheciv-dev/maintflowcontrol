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
        <!-- [ breadcrumb ] start -->
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
        <!-- [ breadcrumb ] end -->


        <!-- [ Main Content ] start -->
        <div class="row">
          <div class="col-12">
            <div class="card table-card">
              <div class="card-header">
                <div class="d-sm-flex align-items-center justify-content-between">
                  <h5 class="mb-3 mb-sm-0">Teacher list</h5>
                  <div>
                    <a href="../admins/course-teacher-apply.html" class="btn btn-outline-secondary">Apply Teacher List</a>
                    <a href="../admins/course-teacher-add.html" class="btn btn-primary">Add Teacher</a>
                  </div>
                </div>
              </div>
              <div class="card-body pt-3">
                <div class="table-responsive">
                  <table class="table table-hover" id="pc-dt-simple">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Departments</th>
                        <th>Qualification</th>
                        <th>Mobile</th>
                        <th>Joining Date</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                              <img src="../assets/images/user/avatar-1.jpg" alt="user image" class="img-radius wid-40" />
                            </div>
                            <div class="flex-grow-1 ms-3">
                              <h6 class="mb-0">Airi Satou</h6>
                            </div>
                          </div>
                        </td>
                        <td>Developer</td>
                        <td>B.COM., M.COM.</td>
                        <td>(123) 4567 890</td>
                        <td>2023/09/12</td>
                        <td>
                          <a href="#" class="avtar avtar-xs btn-link-secondary">
                            <i class="ti ti-eye f-20"></i>
                          </a>
                          <a href="#" class="avtar avtar-xs btn-link-secondary">
                            <i class="ti ti-edit f-20"></i>
                          </a>
                          <a href="#" class="avtar avtar-xs btn-link-secondary">
                            <i class="ti ti-trash f-20"></i>
                          </a>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                              <img src="../assets/images/user/avatar-2.jpg" alt="user image" class="img-radius wid-40" />
                            </div>
                            <div class="flex-grow-1 ms-3">
                              <h6 class="mb-0">Ashton Cox</h6>
                            </div>
                          </div>
                        </td>
                        <td>Junior Technical</td>
                        <td>B.COM., M.COM.</td>
                        <td>(123) 4567 890</td>
                        <td>2023/12/24</td>
                        <td>
                          <a href="#" class="avtar avtar-xs btn-link-secondary">
                            <i class="ti ti-eye f-20"></i>
                          </a>
                          <a href="#" class="avtar avtar-xs btn-link-secondary">
                            <i class="ti ti-edit f-20"></i>
                          </a>
                          <a href="#" class="avtar avtar-xs btn-link-secondary">
                            <i class="ti ti-trash f-20"></i>
                          </a>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                              <img src="../assets/images/user/avatar-3.jpg" alt="user image" class="img-radius wid-40" />
                            </div>
                            <div class="flex-grow-1 ms-3">
                              <h6 class="mb-0">Bradley Greer</h6>
                            </div>
                          </div>
                        </td>
                        <td>Sales Assistant</td>
                        <td>B.A, B.C.A</td>
                        <td>(123) 4567 890</td>
                        <td>2022/09/19</td>
                        <td>
                          <a href="#" class="avtar avtar-xs btn-link-secondary">
                            <i class="ti ti-eye f-20"></i>
                          </a>
                          <a href="#" class="avtar avtar-xs btn-link-secondary">
                            <i class="ti ti-edit f-20"></i>
                          </a>
                          <a href="#" class="avtar avtar-xs btn-link-secondary">
                            <i class="ti ti-trash f-20"></i>
                          </a>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                              <img src="../assets/images/user/avatar-4.jpg" alt="user image" class="img-radius wid-40" />
                            </div>
                            <div class="flex-grow-1 ms-3">
                              <h6 class="mb-0">Brielle Williamson</h6>
                            </div>
                          </div>
                        </td>
                        <td>JavaScript Developer</td>
                        <td>B.A, B.C.A</td>
                        <td>(123) 4567 890</td>
                        <td>2022/08/22</td>
                        <td>
                          <a href="#" class="avtar avtar-xs btn-link-secondary">
                            <i class="ti ti-eye f-20"></i>
                          </a>
                          <a href="#" class="avtar avtar-xs btn-link-secondary">
                            <i class="ti ti-edit f-20"></i>
                          </a>
                          <a href="#" class="avtar avtar-xs btn-link-secondary">
                            <i class="ti ti-trash f-20"></i>
                          </a>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                              <img src="../assets/images/user/avatar-5.jpg" alt="user image" class="img-radius wid-40" />
                            </div>
                            <div class="flex-grow-1 ms-3">
                              <h6 class="mb-0">Airi Satou</h6>
                            </div>
                          </div>
                        </td>
                        <td>Developer</td>
                        <td>B.COM., M.COM.</td>
                        <td>(123) 4567 890</td>
                        <td>2023/09/12</td>
                        <td>
                          <a href="#" class="avtar avtar-xs btn-link-secondary">
                            <i class="ti ti-eye f-20"></i>
                          </a>
                          <a href="#" class="avtar avtar-xs btn-link-secondary">
                            <i class="ti ti-edit f-20"></i>
                          </a>
                          <a href="#" class="avtar avtar-xs btn-link-secondary">
                            <i class="ti ti-trash f-20"></i>
                          </a>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                              <img src="../assets/images/user/avatar-6.jpg" alt="user image" class="img-radius wid-40" />
                            </div>
                            <div class="flex-grow-1 ms-3">
                              <h6 class="mb-0">Ashton Cox</h6>
                            </div>
                          </div>
                        </td>
                        <td>Junior Technical</td>
                        <td>B.COM., M.COM.</td>
                        <td>(123) 4567 890</td>
                        <td>2023/12/24</td>
                        <td>
                          <a href="#" class="avtar avtar-xs btn-link-secondary">
                            <i class="ti ti-eye f-20"></i>
                          </a>
                          <a href="#" class="avtar avtar-xs btn-link-secondary">
                            <i class="ti ti-edit f-20"></i>
                          </a>
                          <a href="#" class="avtar avtar-xs btn-link-secondary">
                            <i class="ti ti-trash f-20"></i>
                          </a>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                              <img src="../assets/images/user/avatar-7.jpg" alt="user image" class="img-radius wid-40" />
                            </div>
                            <div class="flex-grow-1 ms-3">
                              <h6 class="mb-0">Bradley Greer</h6>
                            </div>
                          </div>
                        </td>
                        <td>Sales Assistant</td>
                        <td>B.A, B.C.A</td>
                        <td>(123) 4567 890</td>
                        <td>2022/09/19</td>
                        <td>
                          <a href="#" class="avtar avtar-xs btn-link-secondary">
                            <i class="ti ti-eye f-20"></i>
                          </a>
                          <a href="#" class="avtar avtar-xs btn-link-secondary">
                            <i class="ti ti-edit f-20"></i>
                          </a>
                          <a href="#" class="avtar avtar-xs btn-link-secondary">
                            <i class="ti ti-trash f-20"></i>
                          </a>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                              <img src="../assets/images/user/avatar-8.jpg" alt="user image" class="img-radius wid-40" />
                            </div>
                            <div class="flex-grow-1 ms-3">
                              <h6 class="mb-0">Brielle Williamson</h6>
                            </div>
                          </div>
                        </td>
                        <td>JavaScript Developer</td>
                        <td>B.A, B.C.A</td>
                        <td>(123) 4567 890</td>
                        <td>2022/08/22</td>
                        <td>
                          <a href="#" class="avtar avtar-xs btn-link-secondary">
                            <i class="ti ti-eye f-20"></i>
                          </a>
                          <a href="#" class="avtar avtar-xs btn-link-secondary">
                            <i class="ti ti-edit f-20"></i>
                          </a>
                          <a href="#" class="avtar avtar-xs btn-link-secondary">
                            <i class="ti ti-trash f-20"></i>
                          </a>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                              <img src="../assets/images/user/avatar-9.jpg" alt="user image" class="img-radius wid-40" />
                            </div>
                            <div class="flex-grow-1 ms-3">
                              <h6 class="mb-0">Brielle Williamson</h6>
                            </div>
                          </div>
                        </td>
                        <td>JavaScript Developer</td>
                        <td>B.A, B.C.A</td>
                        <td>(123) 4567 890</td>
                        <td>2022/08/22</td>
                        <td>
                          <a href="#" class="avtar avtar-xs btn-link-secondary">
                            <i class="ti ti-eye f-20"></i>
                          </a>
                          <a href="#" class="avtar avtar-xs btn-link-secondary">
                            <i class="ti ti-edit f-20"></i>
                          </a>
                          <a href="#" class="avtar avtar-xs btn-link-secondary">
                            <i class="ti ti-trash f-20"></i>
                          </a>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                              <img src="../assets/images/user/avatar-10.jpg" alt="user image" class="img-radius wid-40" />
                            </div>
                            <div class="flex-grow-1 ms-3">
                              <h6 class="mb-0">Airi Satou</h6>
                            </div>
                          </div>
                        </td>
                        <td>Developer</td>
                        <td>B.COM., M.COM.</td>
                        <td>(123) 4567 890</td>
                        <td>2023/09/12</td>
                        <td>
                          <a href="#" class="avtar avtar-xs btn-link-secondary">
                            <i class="ti ti-eye f-20"></i>
                          </a>
                          <a href="#" class="avtar avtar-xs btn-link-secondary">
                            <i class="ti ti-edit f-20"></i>
                          </a>
                          <a href="#" class="avtar avtar-xs btn-link-secondary">
                            <i class="ti ti-trash f-20"></i>
                          </a>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                              <img src="../assets/images/user/avatar-2.jpg" alt="user image" class="img-radius wid-40" />
                            </div>
                            <div class="flex-grow-1 ms-3">
                              <h6 class="mb-0">Ashton Cox</h6>
                            </div>
                          </div>
                        </td>
                        <td>Junior Technical</td>
                        <td>B.COM., M.COM.</td>
                        <td>(123) 4567 890</td>
                        <td>2023/12/24</td>
                        <td>
                          <a href="#" class="avtar avtar-xs btn-link-secondary">
                            <i class="ti ti-eye f-20"></i>
                          </a>
                          <a href="#" class="avtar avtar-xs btn-link-secondary">
                            <i class="ti ti-edit f-20"></i>
                          </a>
                          <a href="#" class="avtar avtar-xs btn-link-secondary">
                            <i class="ti ti-trash f-20"></i>
                          </a>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                              <img src="../assets/images/user/avatar-3.jpg" alt="user image" class="img-radius wid-40" />
                            </div>
                            <div class="flex-grow-1 ms-3">
                              <h6 class="mb-0">Bradley Greer</h6>
                            </div>
                          </div>
                        </td>
                        <td>Sales Assistant</td>
                        <td>B.A, B.C.A</td>
                        <td>(123) 4567 890</td>
                        <td>2022/09/19</td>
                        <td>
                          <a href="#" class="avtar avtar-xs btn-link-secondary">
                            <i class="ti ti-eye f-20"></i>
                          </a>
                          <a href="#" class="avtar avtar-xs btn-link-secondary">
                            <i class="ti ti-edit f-20"></i>
                          </a>
                          <a href="#" class="avtar avtar-xs btn-link-secondary">
                            <i class="ti ti-trash f-20"></i>
                          </a>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                              <img src="../assets/images/user/avatar-4.jpg" alt="user image" class="img-radius wid-40" />
                            </div>
                            <div class="flex-grow-1 ms-3">
                              <h6 class="mb-0">Brielle Williamson</h6>
                            </div>
                          </div>
                        </td>
                        <td>JavaScript Developer</td>
                        <td>B.A, B.C.A</td>
                        <td>(123) 4567 890</td>
                        <td>2022/08/22</td>
                        <td>
                          <a href="#" class="avtar avtar-xs btn-link-secondary">
                            <i class="ti ti-eye f-20"></i>
                          </a>
                          <a href="#" class="avtar avtar-xs btn-link-secondary">
                            <i class="ti ti-edit f-20"></i>
                          </a>
                          <a href="#" class="avtar avtar-xs btn-link-secondary">
                            <i class="ti ti-trash f-20"></i>
                          </a>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                              <img src="../assets/images/user/avatar-5.jpg" alt="user image" class="img-radius wid-40" />
                            </div>
                            <div class="flex-grow-1 ms-3">
                              <h6 class="mb-0">Airi Satou</h6>
                            </div>
                          </div>
                        </td>
                        <td>Developer</td>
                        <td>B.COM., M.COM.</td>
                        <td>(123) 4567 890</td>
                        <td>2023/09/12</td>
                        <td>
                          <a href="#" class="avtar avtar-xs btn-link-secondary">
                            <i class="ti ti-eye f-20"></i>
                          </a>
                          <a href="#" class="avtar avtar-xs btn-link-secondary">
                            <i class="ti ti-edit f-20"></i>
                          </a>
                          <a href="#" class="avtar avtar-xs btn-link-secondary">
                            <i class="ti ti-trash f-20"></i>
                          </a>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                              <img src="../assets/images/user/avatar-6.jpg" alt="user image" class="img-radius wid-40" />
                            </div>
                            <div class="flex-grow-1 ms-3">
                              <h6 class="mb-0">Ashton Cox</h6>
                            </div>
                          </div>
                        </td>
                        <td>Junior Technical</td>
                        <td>B.COM., M.COM.</td>
                        <td>(123) 4567 890</td>
                        <td>2023/12/24</td>
                        <td>
                          <a href="#" class="avtar avtar-xs btn-link-secondary">
                            <i class="ti ti-eye f-20"></i>
                          </a>
                          <a href="#" class="avtar avtar-xs btn-link-secondary">
                            <i class="ti ti-edit f-20"></i>
                          </a>
                          <a href="#" class="avtar avtar-xs btn-link-secondary">
                            <i class="ti ti-trash f-20"></i>
                          </a>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                              <img src="../assets/images/user/avatar-7.jpg" alt="user image" class="img-radius wid-40" />
                            </div>
                            <div class="flex-grow-1 ms-3">
                              <h6 class="mb-0">Bradley Greer</h6>
                            </div>
                          </div>
                        </td>
                        <td>Sales Assistant</td>
                        <td>B.A, B.C.A</td>
                        <td>(123) 4567 890</td>
                        <td>2022/09/19</td>
                        <td>
                          <a href="#" class="avtar avtar-xs btn-link-secondary">
                            <i class="ti ti-eye f-20"></i>
                          </a>
                          <a href="#" class="avtar avtar-xs btn-link-secondary">
                            <i class="ti ti-edit f-20"></i>
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
