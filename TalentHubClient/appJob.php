<?php include "../assets/include/css.php" ?>
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
                <?php include "../assets/include/events.php"?>
        
            </section>
            <!-- Main content -->
            <?php if(isset($_GET["app_id"])){ ?>
            <section class="content">
                <div class="col-md-1"></div>
                <div class="col-md-2"></div>
                <div class="col-md-7">      
                                    <!-- <span class="pull-right text-muted">45 likes - 2 comments</span>-->
                    <?php
                    $app_id  = $_GET["app_id"];
                    $sql = "SELECT*FROM jobs WHERE jobID=?  ";
                    $binder = $connect->prepare($sql);
                    $binder->BindValue(1,$app_id);
                    $binder->execute();

                    while ($jobs = $binder->fetch(PDO::FETCH_OBJ)){
                        $job_id = $jobs->jobID;
                        $company = $jobs->company;
                        $jobTitle = $jobs->jobTitle;
                        $jobDue = date_create($jobs->jobDue);
                        $jobDetails = $jobs->jobDetails;
                        $summary  = $jobs->summary;

                        $jDue = date_format($jobDue,"d F Y, h:m");
                        ?>
                        <div class="box box-widget">
                        
                            <div class="box-header with-border">
                                <div class="user-block">
                                
                                    <img  src="dist/img/icon.jpg" alt="User Image">
                                    <span class="username"><a href="#"><?php echo $company ?></a></span>
                                    <span class="description">Due Date On <?php echo $jDue ?></span>
                                </div>
                                <!-- /.user-block -->
                                <a href="appJob.php?apply=<?php echo $job_id?>" class="btn btn-default btn-xs pull-right"><i class="fa fa-share"></i> Apply</a>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">                               
                                    <h3><?php echo $jobTitle ?></h3>
                                    <p><?php echo $jobDetails ?></p>
                                    <!-- Social sharing buttons -->
                                    

                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    <?php }?>
                </div>
                    <?php }?>



                    <!-- Section2 -->
      <?php if(isset($_GET["apply"])){ ?>
            <section class="content">
                <div class="col-md-1"></div>
                <div class="col-md-2"></div>
                <div class="col-md-7">      
                                    <!-- <span class="pull-right text-muted">45 likes - 2 comments</span>-->
                    <?php
                    $app_id  = $_GET["apply"];
                    $sql = "SELECT*FROM jobs WHERE jobID=?  ";
                    $binder = $connect->prepare($sql);
                    $binder->BindValue(1,$app_id);
                    $binder->execute();

                    $jobs = $binder->fetch(PDO::FETCH_OBJ);
                        $job_id = $jobs->jobID;
                        $company = $jobs->company;
                        $jobTitle = $jobs->jobTitle;
                        $jobDue = date_create($jobs->jobDue);
                        $jobDetails = $jobs->jobDetails;
                        $summary  = $jobs->summary;

                        $jDue = date_format($jobDue,"d F Y, h:m");
                        ?>
                        <div class="box box-widget">
                        
                            <div class="box-header with-border">
                                <div class="user-block">
                                
                                    <img  src="dist/img/icon.jpg" alt="User Image">
                                    <span class="username"><a href="#"><?php echo $company ?></a></span>
                                    <span class="description">Due Date On <?php echo $jDue ?></span>
                                </div>
                                <!-- /.user-block -->
                                <a href="appJob.php?applied=<?php echo $job_id?>" class="btn btn-default btn-xs pull-right"><i class="fa fa-send"></i> Submit</a>
                                <a href="appJob.php?app_id=<?php echo $job_id?>" class="btn btn-default btn-xs pull-right"><i class="fa fa-back"></i> Back</a>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">                               
                                
                                  <div align="center">
                                     <table class="table table-bordered table-striped">
                                       <tbody>
                                           <tr>
                                             <th>Fullname</th>
                                             <td><?php echo $_SESSION["fname"]." ". $_SESSION["sname"] ?></td>
                                           </tr>
                                           <tr>
                                             <th>Career Level</th>
                                             <td><?php echo $_SESSION["careerLevel"]?></td>
                                           </tr>
                                           <tr>
                                             <th>Education Level</th>
                                             <td><?php echo $_SESSION["educationLevel"]?></td>
                                           </tr>
                                           <tr>
                                             <th>Years of Experience</th>
                                             <td><?php echo $_SESSION["yE"]?></td>
                                           </tr>
                                           <tr>
                                             <th>Job Applied for</th>
                                             <td><?php echo $jobTitle?></td>
                                           </tr>
                                       </tbody>
                                     </table>
                                  
                                  </div>
                                    <!-- Social sharing buttons -->
                                    

                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                 
                </div>
                    <?php }?>
                    <?php if(isset($_GET["applied"])){ ?>
            <section class="content">
                <div class="col-md-1"></div>
                <div class="col-md-2"></div>
                <div class="col-md-7">      
                                    <!-- <span class="pull-right text-muted">45 likes - 2 comments</span>-->
                    <?php
                    $app_id  = $_GET["applied"];
                    $sql = "SELECT*FROM jobs WHERE jobID=?  ";
                    $binder = $connect->prepare($sql);
                    $binder->BindValue(1,$app_id);
                    $binder->execute();

                    $jobs = $binder->fetch(PDO::FETCH_OBJ);
                        $job_id = $jobs->jobID;
                        $company = $jobs->company;
                        $jobTitle = $jobs->jobTitle;
                        $jobDue = date_create($jobs->jobDue);
                        $jobDetails = $jobs->jobDetails;
                        $summary  = $jobs->summary;

                        $jDue = date_format($jobDue,"d F Y, h:m");
                        ?>
                        <div class="box box-widget">
                        
                            <div class="box-header with-border">
                                <div class="user-block">
                                
                                    <img  src="dist/img/icon.jpg" alt="User Image">
                                    <span class="username"><a href="#"><?php echo $company ?></a></span>
                                    <span class="description">Due Date On <?php echo $jDue ?></span>
                                </div>
                                <!-- /.user-block -->
                                <a href="appJob.php?applied=<?php echo $job_id?>" class="btn btn-default btn-xs pull-right"><i class="fa fa-send"></i> Submit</a>
                                <a href="appJob.php?app_id=<?php echo $job_id?>" class="btn btn-default btn-xs pull-right"><i class="fa fa-back"></i> Back</a>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">                               
                                
                                  <div align="center">
                                     <table class="table table-bordered table-striped">
                                       <tbody>
                                           <tr>
                                             <th>Fullname</th>
                                             <td><?php echo $_SESSION["fname"]." ". $_SESSION["sname"] ?></td>
                                           </tr>
                                           <tr>
                                             <th>Career Level</th>
                                             <td><?php echo $_SESSION["careerLevel"]?></td>
                                           </tr>
                                           <tr>
                                             <th>Education Level</th>
                                             <td><?php echo $_SESSION["educationLevel"]?></td>
                                           </tr>
                                           <tr>
                                             <th>Years of Experience</th>
                                             <td><?php echo $_SESSION["yE"]?></td>
                                           </tr>
                                           <tr>
                                             <th>Job Appy for</th>
                                             <td><?php echo $jobTitle?></td>
                                           </tr>
                                       </tbody>
                                     </table>
                                  
                                  </div>
                                    <!-- Social sharing buttons -->
                                    

                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                 
                </div>
                    <?php }?>
                
            
                        <!-- /.box-header -->
                        <div class="box-body">      

            <?php if(isset($_GET["applied"])){
                $app_id = $_GET["applied"];

                // //TODO: check if the job applied has not been entered.
                // $sqlx = "SELECT*FROM app_job WHERE empID=?";
                // $lead = $connect->prepare($sqlx);
                // $lead->BindValue(1,$_SESSION["UID"]);
                // $lead->execute();
                // if($lead->rowCount() > 0){
                //     echo "<script> alert('You have already this job.') </script>";

                // }else{


                $sql = "INSERT INTO  app_job (appID,jobID,empID,status) VALUES(?,?,?,?)";
                $binder = $connect->prepare($sql);
                $binder->BindValue(1,NULL);
                $binder->BindValue(2,$app_id);
                $binder->BindValue(3,$_SESSION["UID"]);
                $binder->BindValue(4,"pending");
                if($binder->execute()){
                    echo "<script> alert('Successfully Applied for a job.') </script>";
                    echo " <div class='alert alert-success alert-dismissible'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4><i class='icon fa fa-ban'></i> Successful!</h4>
                    Successfully Applied for the job.
                  </div>";
                
                }else{
                    echo " <div class='alert alert-danger alert-dismissible'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4><i class='icon fa fa-ban'></i> Failed!</h4>
                    Failed to apply for a job.
                  </div>".$connect->errorInfo();
                }
            // }
        
    
            } ?>

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


