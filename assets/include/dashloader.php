<!--                    <ul class="products-list product-list-in-box">-->
<!--                        <li class="item">-->
<!--                            <div class="product-img">-->
<!--                                <img src="dist/img/default-50x50.gif" alt="Product Image">-->
<!--                            </div>-->
<!--                            <div class="product-info">-->
<!--                                <a href="javascript:void(0)" class="product-title">Samsung TV-->
<!--                                    <span class="label label-warning pull-right">$1800</span></a>-->
<!--                                <span class="product-description">-->
<!--                          Samsung 32" 1080p 60Hz LED Smart HDTV.-->
<!--                        </span>-->
<!--                            </div>-->
<!--                        </li>-->
<!--                    </ul>-->
<div class="box-footer box-comments">
<!--    <h1>Feed</h1>-->
<!--    <hr>-->
    <?php

    $sql = "SELECT*FROM event ORDER BY eventID DESC  ";
    $binder = $connect->prepare($sql);
    $binder->execute();

    while ($event = $binder->fetch(PDO::FETCH_OBJ)){
    $eventID = $event->eventID;
    $eventName = $event->eventName;
    $eventDate = date_create($event->eventDate);
    $venue = $event->venue;
    $eventFrom = $event->eventFrom;
    $eventto = $event->eventTo;
    $eventDetails = $event->eventDetails;
//    $NumberEvent = $event->NumberEvent;

$reformated = date_format($eventDate,"d D, M Y");

    ?>

    <div class="box-comment">
    <div class="box box-widget">
        <div class="box-header with-border">
        <!-- User image -->
        <img class="img-circle img-sm" src="icon.png" width="120" height="120"  alt="Event">
        <div class="comment-text">
                      <span class="username">
                      <a href=""><?php echo $eventName ?></a>
                        <span class="text-muted pull-right"><?php echo $reformated ?></span>
                      </span><!-- /.username -->
           <div class="box-body">
          <div class="text-black">  <!-- post text -->
            <p><?php echo $eventDetails ?></p>
            <!-- Social sharing buttons -->
            <button type="button" class="btn btn-default btn-xs"><i class="fa fa-book"></i>Read More</button>
<!--            <span class="pull-right text-muted">45 likes - 2 comments</span>-->
          </div>
        </div>
        </div>
        </div>
        </div>
        <!-- /.comment-text -->
    </div>

    <?php } ?>

    <!-- <h4>Sales</h4> -->
    <!-- <h4>Job Advertisement</h4> -->
<?php

$sql = "SELECT*FROM jobs ORDER BY jobID DESC  ";
$binder = $connect->prepare($sql);
$binder->execute();

while ($jobs = $binder->fetch(PDO::FETCH_OBJ)){
$jobid = $jobs->jobID;
$company = $jobs->company;
$jobTitle = $jobs->jobTitle;
$jobDue = $jobs->jobDue;
$jobDetails = $jobs->jobDetails;
$summary  = $jobs->summary;

/**
->   jobID int(10) NOT NULL primary key auto_increment,
->  jobTitle varchar(100) not null,
->  company varchar(100) not null,
->  jobDetails text,
->  jobDue datetime

 */

?>
    <div class="box box-widget">
        <div class="box-header with-border">
            <div class="user-block">
                <img  src="dist/img/icon.jpg" width="100" height="100" alt="User Image">
                <span class="username"><a href="#"><?php echo $company ?></a></span>
                <span class="description">Due Date <?php echo $jobDue ?></span>
            </div>
            <!-- /.user-block -->
            <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
            <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <a href="" class="text-black">  <!-- post text -->
            <h3><?php echo $jobTitle ?></h3>
            <p><?php echo $summary  ?></p>
            <!-- Social sharing buttons -->
            <a href="appJob.php?app_id=<?php echo $jobid ?>" class="btn btn-default btn-xs"><i class="fa fa-share"></i> View More Details</a>
<!--            <span class="pull-right text-muted">45 likes - 2 comments</span>-->
          </a>
        </div>
        <!-- /.box-body -->


    </div>
    <!-- /.box -->
<?php }?>
