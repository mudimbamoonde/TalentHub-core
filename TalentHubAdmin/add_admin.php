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
                <small>System User</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active"><?php echo "Admin Settings" ?></li>

                <li class="active"><?php echo "System User" ?></li>
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
                            <span class="fa fa-plus"></span><h1 class="box-title">Add System USER</h1>
                            <a href="sys_admin.php" class="btn btn-danger pull-right"><span class="fa fa-close"></span>Close</a>

                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div id="msg"></div>
                            <form role="form" method="post">
                                <!-- text input -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input type="text" class="form-control" name="fname" id="fname" placeholder="Enter Your First Name">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input type="text" class="form-control" name="lname" id="lname" placeholder="Enter Last name">
                                            </div>
                                        </div>
                                    </div>


                                <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>username</label>
                                                <input type="text" class="form-control" name="username" id="username" placeholder="Enter Preferred Username">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Gender</label>
                                                <select class="form-control" name="gender" id="gender">
                                                    <option selected disabled>SELECT GENDER</option>
                                                    <option>Male</option>
                                                    <option>Female</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>NRC</label>
                                                <div class="row">
                                                  <div class="col-md-3">
                                                      <input type="text" class="form-control" id="nrc" name="nrc" maxlength="6">
                                                  </div>

                                                    <div class="col-md-2">
                                                       <input type="text" class="form-control" id="nrc1" name="nrc1" maxlength="2">

                                                  </div>

                                                    <div class="col-md-2">
                                                        <input type="text" class="form-control" id="nrc2" name="nrc2" maxlength="1">
                                                  </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Access Level</label>
                                                <select class="form-control" name="accesslevel" id="accesslevel">
                                                    <option selected disabled>SELECT ACCESS LEVEL</option>
                                                    <option>sys_admin</option>
                                                    <option>developer</option>
                                                    <option>moderator</option>
                                                    <option>Contributor</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <textarea class="form-control"  name="address" id="address" placeholder="Enter your Address"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email"></label>
                                            <input type="email" class="form-control" name="email" id="email" placeholder="Enter a valid email">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="phone">Phone</label>
                                           <input type="text" class="form-control" id="phone" name="phone">
                                        </div>
                                    </div>

                                    <br>
                                </div>
                                <div class="col-md-6">

                                    <a href="#" class="btn btn-success"  id="submit" >ADD USER</a>
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

