<?php include"../assets/include/css.php" ?>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-green layout-top-nav">
<div class="wrapper">
  <?php  include "../assets/include/header.php"?>
    <!-- Full Width Column -->
    <div class="content-wrapper">
        <div class="container">
            <!-- Content Header (Page header) -->
             <?php include "../assets/include/contentHeader.php"; ?>
            <p><br></p>
            <!--Left side content-->
            <section class="pull-left col-lg-3">
                <!--             Events -->
                <?php include "../assets/include/events.php"?>
                <!--/.events-->
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="col-md-1"></div>
                <div class="col-md-2"></div>
                <div class="col-md-7">
                  <?php include "../assets/include/dashloader.php" ?>
                <!-- /.box -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.content-wrapper -->
    <?php include "../assets/include/footer.php"?>
</div>
<!-- ./wrapper -->
<?php include "../assets/include/foot-depe.php" ?>


