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
          Content Management
          <small>Add Content</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active"><?php echo "Content Management" ?></li>
          <li class="active"><?php echo "Add Content" ?></li>
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
                <span class="fa fa-plus"></span><h1 class="box-title">Add Content</h1>

              </div>
              <?php

              if (isset($_POST["submit"])){
                $title = $_POST["contentTitle"];
                $is_pub = $_POST["is_published"];
                $content = $_POST["body"];

                include "include/config.php";
                $sql = "INSERT INTO content(contentID,title,is_published,body) VALUES(?,?,?,?)";
                $binder = $connect->prepare($sql);
                $binder->bindValue(1,NULL);
                $binder->bindValue(2,$title);
                $binder->bindValue(3,$is_pub);
                $binder->bindValue(4,$content);

                if($binder->execute()){
                  echo " <div class='alert alert-success alert-dismissible'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                  <h4><i class='icon fa fa-ban'></i> Successful!</h4>
                  Successfully Created.
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
                <form method="post" action="addContent.php">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" name="contentTitle" id="contentTitle" placeholder="Enter Content Title">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Published</label>
                        <Select class="form-control" name="is_published">
                          <option>NO</option>
                          <option>YES</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <!--                    <textarea id="details" name="details" rows="10" cols="80" placeholder="Event Details"></textarea>-->
                  <textarea id="details" name="body" class="details" placeholder="Place some text here"
                  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                  <p></p>
                  <!--                                <a href="javascript:" class="btn btn-success"  id="eventLog" >ADD Event</a>-->
                  <Button type="submit" name="submit" class="btn btn-success" >ADD Content</Button>
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
  // $(function () {
  //     // Replace the <textarea id="editor1"> with a CKEditor
  //     // instance, using default configuration.
  //     CKEDITOR.replace('details')
  //     //bootstrap WYSIHTML5 - text editor
  //     $('.textarea').wysihtml5()
  // })
  </script>
  <script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('details')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
  </script>
