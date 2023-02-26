<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title><?= APP_NAME ?> </title>
   <link rel="stylesheet" href="<?= APP_PUBLIC ?>assets/vendors/feather/feather.css">
   <link rel="stylesheet" href="<?= APP_PUBLIC ?>assets/vendors/mdi/css/materialdesignicons.min.css">
   <link rel="stylesheet" href="<?= APP_PUBLIC ?>assets/vendors/ti-icons/css/themify-icons.css">
   <link rel="stylesheet" href="<?= APP_PUBLIC ?>assets/vendors/typicons/typicons.css">
   <link rel="stylesheet" href="<?= APP_PUBLIC ?>assets/vendors/simple-line-icons/css/simple-line-icons.css">
   <link rel="stylesheet" href="<?= APP_PUBLIC ?>assets/vendors/css/vendor.bundle.base.css">
   <link rel="stylesheet" href="<?= APP_PUBLIC ?>assets/css/vertical-layout-light/style.css">
   <link rel="shortcut icon" href="<?= APP_PUBLIC ?>assets/images/logo/favicon.ico" />
</head>

<body>
   <div class="container-scroller">
      <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
         <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
            <div class="me-3">
               <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
                  <span class="icon-menu"></span>
               </button>
            </div>
            <div>
               <a class="navbar-brand brand-logo" href="<?= APP_PUBLIC ?>assets/index.html">
                  <img src="<?= APP_PUBLIC ?>assets/images/logo/cc-logo.png" alt="logo" />
               </a>
               <a class="navbar-brand brand-logo-mini" href="<?= APP_PUBLIC ?>assets/index.html">
                  <img src="<?= APP_PUBLIC ?>assets/images/logo/32.png" alt="logo" />
               </a>
            </div>
         </div>
         <div class="navbar-menu-wrapper d-flex align-items-top">
            <ul class="navbar-nav">
               <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
                  <h1 class="welcome-text"><?= $title ?><span class="text-black fw-bold"></span></h1>
                  <h3 class="welcome-sub-text"></h3>
               </li>
            </ul>
            <ul class="navbar-nav ms-auto">
               <li class="nav-item dropdown d-none d-lg-block user-dropdown">
                  <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                     <img class="img-xs rounded-circle" src="<?= APP_PUBLIC ?>assets/images/faces/face8.jpg" alt="Profile image"> </a>
                  <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                     <div class="dropdown-header text-center">
                        <img class="img-md rounded-circle" src="<?= APP_PUBLIC ?>assets/images/faces/face8.jpg" alt="Profile image">
                        <p class="mb-1 mt-3 font-weight-semibold">Allen Moreno</p>
                        <p class="fw-light text-muted mb-0">allenmoreno@gmail.com</p>
                     </div>
                     <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> My Profile <span class="badge badge-pill badge-danger">1</span></a>
                     <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-message-text-outline text-primary me-2"></i> Messages</a>
                     <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-calendar-check-outline text-primary me-2"></i> Activity</a>
                     <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-help-circle-outline text-primary me-2"></i> FAQ</a>
                     <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Sign Out</a>
                  </div>
               </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
               <span class="mdi mdi-menu"></span>
            </button>
         </div>
      </nav>
      <div class="container-fluid page-body-wrapper">
         <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
               <li class="nav-item">
                  <a class="nav-link" href="<?= APP_PUBLIC ?>assets/index.html">
                     <i class="mdi mdi-grid-large menu-icon"></i>
                     <span class="menu-title">Dashboard</span>
                  </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                     <i class="menu-icon mdi mdi-floor-plan"></i>
                     <span class="menu-title">UI Elements</span>
                     <i class="menu-arrow"></i>
                  </a>
                  <div class="collapse" id="ui-basic">
                     <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="<?= APP_PUBLIC ?>assets/pages/ui-features/buttons.html">Buttons</a></li>
                        <li class="nav-item"> <a class="nav-link" href="<?= APP_PUBLIC ?>assets/pages/ui-features/dropdowns.html">Dropdowns</a></li>
                        <li class="nav-item"> <a class="nav-link" href="<?= APP_PUBLIC ?>assets/pages/ui-features/typography.html">Typography</a></li>
                     </ul>
                  </div>
               </li>

            </ul>
         </nav>
         <div class="main-panel">
            <div class="content-wrapper">
               @content
            </div>
            <footer class="footer">
               <div class="d-sm-flex justify-content-center justify-content-sm-between">
                  <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Panam&aacute; <a href="http://css.gob.pa/" target="_blank">Caja de Seguro Social </a> Direcci&oacute;n Nacional de Asistencia de Atenci&oacute;n al Asegurado.</span>
                  <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">DNASA &copy;<?= APP_NAME ?> © (<?= date('Y') ?>).</span>
               </div>
            </footer>
         </div>
      </div>
   </div>
   <script src="<?= APP_PUBLIC ?>assets/vendors/js/vendor.bundle.base.js"></script>
   <script src="<?= APP_PUBLIC ?>assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
   <script src="<?= APP_PUBLIC ?>assets/js/off-canvas.js"></script>
   <script src="<?= APP_PUBLIC ?>assets/js/hoverable-collapse.js"></script>
   <script src="<?= APP_PUBLIC ?>assets/js/template.js"></script>
   <script src="<?= APP_PUBLIC ?>assets/js/settings.js"></script>
   <script src="<?= APP_PUBLIC ?>assets/js/todolist.js"></script>
</body>

</html>