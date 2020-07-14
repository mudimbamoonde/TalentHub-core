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
                            <h3 class="box-title">All Employer Login Details</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>SN</th>
                                    <th>Applicant</th>
                                    <th>Company Name</th>
                                    <th>Position</th>
                                    <th>Email</th>
                                    <th>Control</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php
                                include "include/config.php";
                                $sql = "SELECT*FROM app_job as aj INNER JOIN employee as eme  
                                ON eme.empID = aj.empID INNER JOIN jobs as j  ON aj.jobID = j.jobID";
                                //appID | jobID | empID | status
                                $binder = $connect->prepare($sql);
                                $binder->execute();

                                $n = 0;

                                while($row = $binder->fetch(PDO::FETCH_OBJ)){
                                    $n++;
                                    $firstName = $row->firstName;
                                    $surName = $row->surname;
                                    $companyName = $row->company;
                                    $position = $row->jobTitle;
                                    $email = $row->email;
                                    $contactNumber = $row->contactNumber;


                                    ?>
                                    <tr class="gradeX">
                                        <td><?php echo $n ?></td>
                                        <td><a href="javascript:void(0)"><?php echo $firstName." ". $surName?></a>  </td>
                                        <td><?php echo $companyName ?></td>
                                        <td><?php echo $position ?></td>
                                        <td><?php echo $email ?></td>
                                        <td><a href="#" class="btn btn-info"><span class="fa fa-pencil"></span>Reply</a></td>

                                    </tr>
                                <?php }?>
                                </tbody>
                            </table>
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

