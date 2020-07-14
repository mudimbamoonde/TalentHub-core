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
                <!--            Events -->
                <?php include "../assets/include/events.php"?>
                               <!-- .events -->


            </section>
            <!-- Main content -->
            <section class="content">
                <div class="col-md-1"></div>
                <div class="col-md-2"></div>
                <div class="col-md-7">
                    
                    <?php

                    $sql = "SELECT*FROM jobs AS j INNER JOIN app_job AS a ON j.jobID = a.jobID 
                    JOIN employee as e ON a.empID = e.empID WHERE e.empID = ?";
                    $binder = $connect->prepare($sql);
                    $binder->BindValue(1,$_SESSION["UID"]);
                    $binder->execute();
                    if($binder->rowCount() > 0 ){
                
                    while ($jobs = $binder->fetch(PDO::FETCH_OBJ)){
                        $job_id = $jobs->jobID;
                        $company = $jobs->company;
                        $jobTitle = $jobs->jobTitle;
                        $jobDue = $jobs->jobDue;
                        $jobDetails = $jobs->jobDetails;
                        $summary  = $jobs->summary;

                        $status = $jobs->status;

                        if($status == "pending"){
                            $tp = "<a href='' class='btn btn-warning'>pending</a>";
                        }elseif($status =="checked"){
                            $tp = "<a href='' class='btn btn-success'>Checked</a>";
                        }

                        ?>
                        <div class="box box-widget">
                            <div class="box-header with-border">
                                <div class="user-block">
                                <span class="pull-right"><?php echo $tp; ?> <a href="pendingapp.php?del=<?php echo $job_id ?>"><span class="btn btn-danger">x</span></a> </span>
                                    <img  src="dist/img/icon.jpg" alt="User Image">
                                    <span class="username"><a href="#"><?php echo $jobTitle ."@". $company ?></a></span>
                                    <span class="description">Due Date <?php echo $jobDue ?></span>
                                    
                                </div>
                            
                            </div>
                            <!-- /.box-header -->
                           
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    <?php }
                    }else{?>

                        <div class="box box-widget"> 
                            <div class="box-header with-border">
                                <div class="user-block">
                        
                                    <!-- <img  src="dist/img/icon.jpg" alt="User Image"> -->
                                    <span class="username"><a href="#">No Pending Applications</a></span>
                                
                                    
                                </div>
                            
                            </div>
                            <!-- /.box-header -->
                           
                            <!-- /.box-body -->
                        </div>



                    <?php } ?>
                </div>
                <!-- Delete Job Applied for -->
                <?php if(isset($_GET["del"])){
                    $appID = $_GET["del"];
                    $dsql = "DELETE FROM app_job WHERE jobID=?";
                    $lead = $connect->prepare($dsql);
                    $lead->BindValue(1,$appID);
                    if($lead->execute()){
                        echo "<script>alert('Job Deleted. Refresh Page to see Effects.')</script>";
                    
                    }

                    // $rtu = $_SERVER[""]
                    // header("location:pendingapp.php");

                } ?>
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


