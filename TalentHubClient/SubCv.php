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
                <!--                /.events-->


            </section>
            <!-- Main content -->
            <section class="content">
                <div class="col-md-1"></div>
                <div class="col-md-2"></div>
                <div class="col-md-7">
                    <div class="box-footer box-comments">
                        <h3>Submit Cv for Review</h3>

                        <?php
                        $uid = $_SESSION["UID"];
                        if (isset($_POST["submit"])){
                            include "../assets/include/config.php";

                            $target_dir = "CV/";
                            $file = $target_dir.basename($_FILES["cv"]["name"]);


                            $sql1 = "UPDATE employee SET cv=? WHERE empID=?";
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

                        if(isset($_POST["review"])){
                            $sql1 = "INSERT INTO cv_review VALUES(?,?,?)";
                            $let = $connect->prepare($sql1);
                            $let->bindValue(1,null);
                            $let->bindValue(2,$uid);
                            $let->bindValue(3, "pending");
                            if($let->execute()){
                                echo "your cv has ben submitted";
                            }else{
                                echo $connect->errorInfo();
                            }
                        }
                        ?>

                        <form method="post" enctype="multipart/form-data">
                            <div class="col-md-2">
                                <input type="file" id="cv" class="cv" name="cv">
                                <br>
                                <?php
                                $know = "SELECT cv FROM employee WHERE empID=?";
                                $b = $connect->prepare($know);
                                $b->bindValue(1,$_SESSION["UID"]);
                                $b->execute();

                                $row = $b->fetch(PDO::FETCH_OBJ);
                                $cv = $row->cv;
                                //echo $_SESSION["UID"];

                                if ($cv=="upload"){
                                    echo '<button type="submit" name="submit" class="btn btn-success">Add CV</button>';
                                }else{
                                    echo '<button type="submit" name="review" class="btn btn-success text-capitalize">Submit CV for review</button>';
                                }
                                ?>

                            </div>
                        </form>
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


