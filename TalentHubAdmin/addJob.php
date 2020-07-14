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
                Employer Management
                <small>Add Job</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active"><?php echo "Company Settings" ?></li>
                <li class="active"><?php echo "Add Job" ?></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- /.row -->
            <!-- Main row -->
            <div class="col-md-1"></div>
            <div class="col-md-2"></div>
            <div class="row">
                <!-- Left col -->
                <section class="col-lg-11">
                    <!-- quick email widget -->
                    <div class="box">
                        <div class="box-header">
                            <span class="fa fa-plus"></span><h1 class="box-title">Add Job</h1>

                        </div>
                        <?php
                        if (isset($_POST["submit"])){
                            $jobtitle = $_POST["jobtitle"];
                            $company = $_POST["company"];
                            $jobdue = $_POST["jobdue"];
                            $jobdetails = $_POST["jobdetails"];
                            $summary = $_POST["summary"];

                            include "include/config.php";
                            $sql = "INSERT INTO jobs VALUES(?,?,?,?,?,?)";
                            $binder = $connect->prepare($sql);
                            $binder->bindValue(1,NULL);
                            $binder->bindValue(2,$jobtitle);
                            $binder->bindValue(3,$company);
                            $binder->bindValue(4,$jobdetails);
                            $binder->bindValue(5,$jobdue);
                            $binder->bindValue(6,$summary);

                            if($binder->execute()){
                                echo " <div class='alert alert-success alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4><i class='icon fa fa-ban'></i> Successful!</h4>
                Successfully Inserted.
              </div>";
                            }else{
                                $error = $connect->errorInfo();
                                echo " <div class='alert alert-danger alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4><i class='icon fa fa-ban'></i> Failed!</h4>
                Failed to Insert: $error
              </div>";
                            }
                        }

                        ?>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div id="msg"></div>
                            <form method="post" action="addJob.php">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="jobtitle">Job Title</label>
                                            <input type="text" class="form-control" name="jobtitle" id="jobtitle" placeholder="Enter Job Title">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Company</label>
                                            <input type="text" class="form-control" name="company" id="company">
                                        </div>
                                    </div>
                                </div>
<!--
jobID int(10) NOT NULL primary key auto_increment,
 jobTitle varchar(100) not null,
 jobDetails text,
 jobDue datetime
 company varchar
-->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="jobdue">Job Due</label>
                                            <input type="datetime-local" class="form-control" name="jobdue" id="jobdue" placeholder="Enter Job Due">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="summary">Job Summary</label>
                                            <textarea class="form-control" name="summary"
                                                      id="summary"   maxlength="150" placeholder="Enter Job Summary < 150"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="field">Field</label>
                                            <select class="form-control" name="field" id="field">
                                                <option>SELECT FIELD</option>
                                                <?php
                                                 $sql ="SELECT*FROM foi";
                                                 include "include/config.php";
                                                 $bnder = $connect->prepare($sql);
                                                 $bnder->execute();
                                                 while ($row = $bnder->fetch(PDO::FETCH_OBJ)){
                                                     $Fid = $row->fid;
                                                     $fiedName = $row->fiedName;
                                                ?>
                                                <option><?php echo $fiedName; ?></option>

                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!--<textarea id="details" name="details" rows="10" cols="80" placeholder="Event Details"></textarea>-->
                                <label for="jobdetails">Job Details</label>
                                <textarea id="jobdetails" name="jobdetails" class="jobdetails" placeholder="Place some text here"
                                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                <p></p>
                                <!--                                <a href="javascript:" class="btn btn-success"  id="eventLog" >ADD Event</a>-->
                                <Button type="submit" name="submit" class="btn btn-success"  >ADD JOB</Button>
                            </form>
                        </div>
                        <!-- /.box-body -->
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
<!-- CK Editor -->
<!--<script src="bower_components/ckeditor/ckeditor.js"></script>-->
<!-- CK Editor -->
<script src="bower_components/ckeditor/ckeditor.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script>
    $(function () {
        // instance, using default configuration.
        CKEDITOR.replace('jobdetails');
        //bootstrap WYSIHTML5 - text editor
        $('.textarea').wysihtml5()
    });
</script>