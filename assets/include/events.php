

<div class="panel panel-success">
    <!--                    <div class="panel-heading">-->
    <h6 class="callout callout-success"><span class="fa fa-calendar"></span>Events</h6>
    <!--                    </div>-->
    <div class="panel-body">
        <?php
         $sql = "SELECT eventID, eventName, eventDate, venue,eventFrom, eventTo, eventDetails, 
                    COUNT(eventName) as NumberEvent FROM event GROUP BY eventName ORDER BY eventID DESC  ";
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
             $NumberEvent = $event->NumberEvent;
        ?>

        <ul class="list-group">
            <li class="list-group-item"><span class="fa fa-check"></span><?php echo $eventName ?> <span class="badge"><?php echo $NumberEvent?></span></li>
        </ul>

        <?php } ?>
    </div>
</div>

<!--                </div>-->

<!--                <div class="col-md-10">-->
<!--                    <div class="list-group">-->
<!--                        <a href="javascript:void()" class="list-group-item active">-->
<!--                            Events-->
<!--                        </a>-->
<!--                        <a href="#" class="list-group-item">Dapibus ac facilisis in</a>-->
<!--                        <a href="#" class="list-group-item">Morbi leo risus</a>-->
<!--                        <a href="#" class="list-group-item">Porta ac consectetur ac</a>-->
<!--                        <a href="#" class="list-group-item">Vestibulum at eros</a>-->
<!--                    </div>-->
<div class="panel panel-success">
    <!--                    <div class="panel-heading">-->
    <h6 class="callout callout-success"><span class="fa fa-shopping-basket"></span>Shopping Cart</h6>
    <!--                    </div>-->
    <div class="panel-body">
        Panel content
    </div>
</div>