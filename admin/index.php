<?php 
  session_start();
  $server_root = stripos($_SERVER['SERVER_PROTOCOL'],'https') === 0 ? 'https://' : 'http://'.$_SERVER['SERVER_NAME'].'/vegetablestore';
  $document_root = $_SERVER['DOCUMENT_ROOT'].'/vegetablestore';
  require_once($_SERVER['DOCUMENT_ROOT'].'/vegetablestore/class/order.php');
  require_once($_SERVER['DOCUMENT_ROOT'].'/vegetablestore/class/customer.php');
  require_once($_SERVER['DOCUMENT_ROOT'].'/vegetablestore/class/vegetable.php');
  $classVegetable = new vegetable ();
  $classCustomer = new customer();
  $classOrder = new order();
  if (isset($_SESSION['StaffName'])) {
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> <?php echo $_SESSION['Role'] ?> | Dashboard</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo $server_root ?>/admin/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons --> 
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?php echo $server_root ?>/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo $server_root ?>/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?php echo $server_root ?>/admin/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo $server_root ?>/admin/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo $server_root ?>/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo $server_root ?>/admin/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo $server_root ?>/admin/plugins/summernote/summernote-bs4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="<?php echo $server_root ?>/admin/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="" class="nav-link">Home</a>
      </li>
    </ul>
     <!-- Right navbar links -->
     <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" id="search_vegetable_name" type="text" placeholder="Search by Vegetable Name" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                <i class="fas fa-times"></i>
              </button>
            </div>
           </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo $server_root ?>/admin/index.php" class="brand-link">
      <h4><span class="brand-text badge badge-pill badge-primary" style="margin-left: 4%"><?php echo $_SESSION['Role'] ?></span></h4>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <i class="fas fa-user-circle img-circle elevation-2" style="font-size: 36px; color: black" alt="User Image"></i>
        </div>
        <div class="info">
          <a href="<?php echo $server_root ?>/admin/pages/account/profile.php" class="d-block"><?php echo $_SESSION['StaffName'] ?></a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item menu-open">
            <a id="click_dashboard" href="" class="nav-link active">
              <i class="fas fa-tachometer-alt nav-icon"></i>
              <p>
                Dashboard
              </p>
            </a>
        </li>
          
          <li class="nav-item">
              <a id="click_category" href="<?php echo $server_root ?>/admin/pages/management/category/list/index.php" class="nav-link">
                <i class="fa fa-list-alt nav-icon"></i>
                <p>
                  Category
                </p>
              </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo $server_root ?>/admin/pages/management/vegetable/list/index.php" class="nav-link">
              <i class="fa fa-barcode nav-icon"></i>             
              <p>
                Product
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo $server_root ?>/admin/pages/management/order/list/index.php" class="nav-link">
              <i class="fa fa-shopping-cart nav-icon"></i>              
              <p>
                Order
              </p>
            </a>
          </li>

          <?php if ($_SESSION['Role'] == "Admin" || $_SESSION['Role'] == "Manager") {?>
          <li class="nav-item">
            <a href="<?php echo $server_root ?>/admin/pages/management/supplier/list/index.php" class="nav-link">
              <i class="fa fa-university nav-icon"></i>
              <p>
                Supplier
              </p>
            </a>
          </li>
          <?php } ?>

          <?php if ($_SESSION['Role'] == "Admin" || $_SESSION['Role'] == "Manager") {?>
          <li class="nav-item">
            <a href="<?php echo $server_root ?>/admin/pages/management/goodsreceipt/list/index.php" class="nav-link">
              <i class="fas fa-receipt nav-icon"></i>
              <p>
                Goods Receipt
              </p>
            </a>
          </li>
          <?php } ?>
   
          <?php if ($_SESSION['Role'] == "Admin" || $_SESSION['Role'] == "Manager")  { ?>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-user-tie nav-icon"></i>
              <p>
                Customer
              </p>
            </a>
          </li>
          <?php } ?>

          <?php if ($_SESSION['Role'] == "Admin" || $_SESSION['Role'] == "Manager")  { ?>
          <li class="nav-item">
            <a href="<?php echo $server_root ?>/admin/pages/management/staff/list/index.php" class="nav-link">
              <i class="fa fa-users nav-icon"></i>
              <p>
                Staff
              </p>
            </a>
          </li>
          <?php } ?>

          <?php if ($_SESSION['Role'] == "Admin" || $_SESSION['Role'] == "Manager") {?>
          <li class="nav-item">
            <a href="<?php echo $server_root ?>/admin/pages/management/statistic/index.php" class="nav-link">
              <i class="fas fa-chart-bar nav-icon"></i>
              <p>
                Statistic
              </p>
            </a>
          </li>
          <?php } ?>
          
          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="fas fa-user nav-icon"></i>
              <p>
                Account
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo $server_root ?>/admin/pages/account/profile.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Profile</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $server_root ?>/system/logout.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Logout</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->

    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>
                    <?php 
                      $Order = $classOrder->executeResult("SELECT COUNT(*) AS `NewOrder`
                                                          FROM `order`
                                                          WHERE `Status` = 'Unprocessed'");
                      foreach ($Order as $Order) {
                        echo $Order['NewOrder'];
                      }
                    ?>
                  </h3>

                  <p>New Orders</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="<?php echo $server_root ?>/admin/pages/management/order/list/index.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3>
                    <?php
                      $Vegetable = $classVegetable->executeResult("SELECT SUM(`Amount`) AS `AmountVegetable`
                                                      FROM `vegetable`");
                      foreach ($Vegetable as $Vegetable) {
                        echo $Vegetable['AmountVegetable'];
                      }
                    
                    ?>
                  </h3>

                  <p>Inventory Vegetables</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="<?php echo $server_root ?>/admin/pages/management/statistic/condition/inventory/index.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3>
                    <?php 
                      $Customer = $classCustomer->executeResult("SELECT COUNT(*) AS 'CustomerRegistrations'
                                                                 FROM `customer`");
                      foreach ($Customer as $Customer) {
                        echo $Customer['CustomerRegistrations'];
                      }
                    ?>
                  </h3>

                  <p>Customer Registrations</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="<?php echo $server_root ?>/admin/pages/management/customer/list/index.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3>
                    <?php 
                      $sales = $classOrder->executeResult("SELECT SUM(`Total`) AS `Sales`
                                                           FROM `order`
                                                           WHERE Status = 'Shipped'");
                      foreach ($sales as $sales) {
                        echo number_format($sales['Sales']).' VND';
                      }
                    ?>
                  </h3>

                  <p>Sales</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="<?php echo $server_root ?>/admin/pages/management/statistic/condition/sales/index.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
          </div>
        </div>
          </div>
  
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2021 <a href="https://iceman-exe.blogspot.com/"><?php echo $_SESSION['Role'] ?></a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo $server_root ?>/admin/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo $server_root ?>/admin/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo $server_root ?>/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo $server_root ?>/admin/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo $server_root ?>/admin/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?php echo $server_root ?>/admin/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?php echo $server_root ?>/admin/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo $server_root ?>/admin/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo $server_root ?>/admin/plugins/moment/moment.min.js"></script>
<script src="<?php echo $server_root ?>/admin/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo $server_root ?>/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?php echo $server_root ?>/admin/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo $server_root ?>/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo $server_root ?>/admin/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo $server_root ?>/admin/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo $server_root ?>/admin/dist/js/pages/dashboard.js"></script>
</body>
</html>

<?php 
  } else header('Location: '.$server_root.'/system/index.php');
?>