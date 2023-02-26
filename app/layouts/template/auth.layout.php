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
   <link rel="shortcut icon" href="<?= APP_PUBLIC ?>assets/images/favicon.png" />
</head>

<body>
   <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
         <div class="content-wrapper d-flex align-items-center auth px-0">
            <div class="row w-100 mx-0">
               <div class="col-lg-4 mx-auto">
                  @content
               </div>
            </div>
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