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
                                <h3 class="box-title">All Employees</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>FullName </th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>ClientID</th>
                                        <th>Control</th>
                                    </tr>
                                    </thead>
                                    <tbody>


                                    <?php

                                    include "include/config.php";
                                    $sql = "SELECT*FROM employee as e INNER JOIN sys_accounts as sys ON sys.username = e.email WHERE sys.accountType = ? ORDER BY e.empID DESC";
                                    $binder = $connect->prepare($sql);
                                    $binder->bindValue(1,"person");
                                    $binder->execute();

                                    $n = 0;

                                    while($row = $binder->fetch(PDO::FETCH_OBJ)){
                                        $n++;

                                        $empID = $row->empID;
                                        $fname = $row->firstName;
                                        $lname = $row->surname;
                                        $dob = $row->dob;
                                        $age = $row->age;
                                        $industry = $row->industry;
                                        $career = $row->careerLevel;
                                        $education = $row->educationLevel;
                                        $yoe = $row->yearsOfExperience;
                                        $nature = $row->natureOfEngagement;
                                        $email = $row->email;
                                        $contact = $row->contactNumber;
                                        $cv = $row->cv;
                                        $status = $row->status;

                                        if($status=="active"){

                                            $state =  "<a href='' class='btn btn-success'><span class='fa fa-unlock'></span></a>";
                                        }else{
                                            $state =  "<a href='' class='btn btn-danger'><span class='fa fa-lock'></span></a>";
                                        }
                                        ?>
                                        <tr class="gradeX">
                                            <td><?php echo $n ?></td>
                                            <td><?php echo $fname." ".$lname?></td>
                                            <td><a href="javascript:void(0)" data-toggle="modal" data-target="#moreinfo" class="btn btn-info"><?php echo $email?></a>  </td>
                                            <td><?php echo $state?></td>
                                            <td><?php echo $empID?></td>
                                            <td><a href="#" class="btn btn-warning"><span class="fa fa-pencil"></span></a>|<a href="#" class="btn btn-danger"><span class="fa fa-trash"></span></a></td>

                                        </tr>
                                    <?php }?>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>SN</th>
                                        <th>FullName </th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>ClientID</th>
                                        <th>Control</th>
                                    </tr>
                                    </tfoot>
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
<?php
/**
 * Created by PhpStorm.
 * User: moondem
 * Date: 11/10/2019
 * Time: 12:11
 */