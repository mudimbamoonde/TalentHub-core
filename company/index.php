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

<!--                <div class="col-md-10">-->
<!--                    <div class="list-group">-->
<!--                        <a href="javascript:void()" class="list-group-item active">-->
<!--                            Events-->
<!--                        </a>-->
<!--                        <a href="#" class="list-group-item">Dapibus ac facilisis in</a>-->
<!--                        <a href="#" class="list-group-item">Morbi leo risus</a>-->
<!--                        <a href="#" class="list-group-item">Porta ac consectetur ac</a>-->
<!--                        <a href="#" class="list-group-item">Vestibulum at eros</a>-->
<!--                    </div>-->
                <!--             Events -->
                        <?php include "../assets/include/events.php"?>
                <!--                /.events-->


<!--                </div>-->
                    <!--Jairos Mwanza Trading-->
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


