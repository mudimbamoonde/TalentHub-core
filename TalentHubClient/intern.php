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

            <!--Left side content-->
            <section class="pull-left col-lg-3">
                <?php include "../assets/include/events.php"?>
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="col-md-1"></div>
                <div class="col-md-2"></div>
                <div class="col-md-7">
                    <h4>Job Advertisement</h4>
                    <?php
                    $sql = "SELECT*FROM jobs ORDER BY jobID DESC  ";
                    $binder = $connect->prepare($sql);
                    $binder->execute();
                    while ($jobs = $binder->fetch(PDO::FETCH_OBJ)){
                        $job_id = $jobs->jobID;
                        $company = $jobs->company;
                        $jobTitle = $jobs->jobTitle;
                        $jobDue = $jobs->jobDue;
                        $jobDetails = $jobs->jobDetails;
                        $summary  = $jobs->summary;
                        ?>
                        <div class="box box-widget">
                            <div class="box-header with-border">
                                <div class="user-block">
                                    <img  src="dist/img/icon.jpg" alt="User Image">
                                    <span class="username"><a href="#"><?php echo $company ?></a></span>
                                    <span class="description">Due Date <?php echo $jobDue ?></span>
                                </div>
                                <!-- /.user-block -->
                                <div class="box-tools">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                </div>
                                <!-- /.box-tools -->
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">

                                <a href="appJob.php?app_id=<?php echo $job_id ?>" class="text-black">  <!-- post text -->
                                    <h3><?php echo $jobTitle ?></h3>
                                    <p><?php echo $summary  ?></p>
                                    <!-- Social sharing buttons -->
                                    <a href="appJob.php?app_id=<?php echo $job_id ?>" class="btn btn-default btn-xs"><i class="fa fa-share"></i> View More Details</a>
                                
                                    <!-- <span class="pull-right text-muted">45 likes - 2 comments</span>-->
                                </a>

                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    <?php } ?>
                </div>

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