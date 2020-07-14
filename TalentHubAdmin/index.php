<?php include "include/header.php" ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <?php include "include/top.php"; ?>

  <!-- Left side column. contains the logo and sidebar -->
   <?php include "include/sidebar.php"?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
    <?php include "include/statbox.php" ?>
      <!-- /.row -->
      <!-- Main row -->
      
      <div class="row">
        <!-- Left col -->
          <section class="col-lg-3">
              <!-- quick email widget -->
              <div class="box box-info">
                  <div class="box-body">
                      <div class='row' align="center">
                          <i class="fa fa-3x fa-users"></i>
                          <p></p>
                          <p><a href="#" class="btn btn-info">Company</a></p>

                      </div>
                  </div>
              </div>
          </section>

          <section class="col-lg-3">
              <!-- quick email widget -->
              <div class="box box-info">
                  <div class="box-body">
                      <div class='row' align="center">
                              <i class="fa fa-3x fa-user"></i>
                          <p></p>
                              <p><a href="#" class="btn btn-info">Job Seeker</a></p>

                      </div>
                  </div>
              </div>
          </section>

          <section class="col-lg-3">
              <!-- quick email widget -->
              <div class="box box-info">
                  <div class="box-body">
                      <div class='row' align="center">
                          <i class="fa fa-3x fa-globe"></i>
                          <p></p>
                          <p><a href="#" class="btn btn-info">Web Site Management</a></p>

                      </div>
                  </div>
              </div>
          </section>

          <section class="col-lg-3">
              <!-- quick email widget -->
              <div class="box box-info">
                  <div class="box-body">
                      <div class='row' align="center">
                          <i class="fa fa-3x fa-map"></i>
                          <p></p>
                          <p><a href="#" class="btn btn-info">Events</a></p>

                      </div>
                  </div>
              </div>
          </section>
          <section class="col-lg-3">
              <!-- quick email widget -->
              <div class="box box-info">
                  <div class="box-body">
                      <div class='row' align="center">
                          <i class="fa fa-3x fa-shopping-cart"></i>
                          <p></p>
                          <p><a href="#" class="btn btn-info">Shopping Cart</a></p>

                      </div>
                  </div>
              </div>
          </section>

          <section class="col-lg-3">
              <!-- quick email widget -->
              <div class="box box-info">
                  <div class="box-body">
                      <div class='row' align="center">
                          <i class="fa fa-3x fa-hand-paper-o"></i>
                          <p></p>
                          <p><a href="#" class="btn btn-info">Reports</a></p>

                      </div>
                  </div>
              </div>
          </section>
        <!-- /.Left col -->

      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 <?php include "include/footer.php"?>

</div>
<!-- ./wrapper -->
<?php include "include/foot-depe.php" ?>
