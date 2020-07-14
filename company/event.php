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

                <?php include "../assets/include/events.php"?>
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="col-md-1"></div>
                <div class="col-md-2"></div>
                <div class="col-md-7">

                    <div class="box-footer box-comments">
                        <h2>Upcoming Events.</h2>
                        <hr>
                        <?php

                        $sql = "SELECT*FROM event ORDER BY eventID DESC  ";
                        $binder = $connect->prepare($sql);
                        $binder->execute();

                        while ($event = $binder->fetch(PDO::FETCH_OBJ)){
                            $eventID = $event->eventID;
                            $eventName = $event->eventName;
                            $eventDate = $event->eventDate;
                            $venue = $event->venue;
                            $eventFrom = $event->eventFrom;
                            $eventto = $event->eventTo;
                            $eventDetails = $event->eventDetails;
//    $NumberEvent = $event->NumberEvent;


                            ?>

                            <div class="box-comment">
                                <!-- User image -->
                                <img class="img-circle img-sm" src="dist/img/Events.jpg" alt="Event">
                                <div class="comment-text">
                      <span class="username">
                          <a href=""><?php echo $eventName ?></a>
                        <span class="text-muted pull-right"><?php echo $eventDate ?></span>
                      </span><!-- /.username -->
                                    <?php echo $eventDetails ?>
                                </div>
                                <!-- /.comment-text -->
                            </div>

                        <?php } ?>


                    </div>

                    <br>
                    <br>


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


