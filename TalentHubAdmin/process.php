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
                Admin Settings
                <small>Manage Employee</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active"><?php echo "Admin Settings" ?></li>

                <li class="active"><?php echo "Manage Employee" ?></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Small boxes (Stat box) -->
            <?php include "include/statbox.php" ?>
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
                            <h3 class="box-title">Review CV- <?php
                                echo $_GET["emp"];
                                ?></h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">


                            <form role="form" method="post">
                                <!-- text input -->
                                <?php
                        $uid = $_GET["emp"];
                        if (isset($_POST["submit"])){
                            include "include/config.php";

                            $target_dir = "talenthubClient/CV/";
                            $file = $target_dir.basename($_FILES["cv"]["name"]);


                            $sql1 = "UPDATE cv_review SET cv =? WHERE empID=?";
                            $binder = $connect->prepare($sql1);
                            $binder->bindValue(1,$file);
                            $binder->bindValue(2,$uid);
                            if($binder->execute()){
                                if ( move_uploaded_file($_FILES["cv"]["tmp_name"],$file)){
                                    echo "File ".$_FILES["cv"]["name"]. " Has been uploaded successfully";

                                }else{
                                    echo $connect->errorInfo();
                                }
                            }

                 }

                        ?>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Updated CV</label>
                                            <input type="file" class="form-control" name="cvUpdate" >
                                        </div>

                                        <div class="form-group">
                                            <label>Comment</label>
                                            <textarea type="text" class="form-control" name="comment" id="comment" placeholder="Enter Comment"></textarea>
                                        </div>

                                    </div>
                                </div>



                                <div class="col-md-6">
                                    <button href="#" class="btn btn-success"  name="update" >Update</button>
                                </div>

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
