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
                <small>Manage Jobs</small>

            </h1>

            <ol class="breadcrumb">

                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active"><?php echo "Admin Settings" ?></li>
                <li class="active"><?php echo "Manage Jobs" ?></li>


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
                            <h3 class="box-title">All Jobs</h3>
                            <a href="addEvent.php" class="btn btn-success pull-right">Add Jobs</a>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>SN</th>
                                    <th>Job Title</th>
                                    <th>Company</th>
                                    <th>Due</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                include "include/config.php";
                                $sql = "SELECT*FROM jobs ORDER BY jobID DESC";
                                $binder = $connect->prepare($sql);
                                $binder->execute();
//                                $data[] = array();

                                $n = 0;
                                while($row = $binder->fetch(PDO::FETCH_OBJ)) {
                                    $n++;
                                    /*
                                     *  jobID      | int(10)      | NO   | PRI | NULL    | auto_increment |
| jobTitle   | varchar(100) | NO   |     | NULL    |                |
| company    | varchar(100) | NO   |     | NULL    |                |
| jobDetails | text         | YES  |     | NULL    |                |
| jobDue     | datetime     | YES  |     | NULL    |                |
| summary
                                     * */
                                    ?>
                                    <tr>
                                        <td><?php echo $n ?></td>
                                        <td><?php echo $row->jobTitle; ?></td>
                                        <td><?php echo $row->company ?></td>
                                        <td><?php echo $row->jobDue ?></td>
                                        <td><a href=""><span class="fa fa-pencil"></span></a> </td>
                                    </tr>

                                <?php } ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>SN</th>
                                    <th>Job Title</th>

                                    <th>Company</th>
                                    <th>Due</th>
                                    <th>Action</th>
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

