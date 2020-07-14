
<header class="main-header">
    <nav class="navbar navbar-static-top bg-info">
        <div class="container">
            <div class="navbar-header">
                <a href="index.php" class="navbar-brand"><?php echo $_SESSION["fname"]." ".$_SESSION["sname"]; ?></a>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                    <i class="fa fa-bars"></i>
                </button>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                <ul class="nav navbar-nav">
                    <?php if($_SERVER['PHP_SELF']=="/TalentHub/TalentHubClient/index.php"){ ?>
                    <li class="active"><a href="index.php"><span class="fa fa-home"></span> Home <span class="sr-only">(current)</span></a></li>
                  <?php }else{?>
                        <li><a href="index.php"><span class="fa fa-home"></span> Home <span class="sr-only">(current)</span></a></li>
                    <?php }?>

                    <?php if($_SERVER["PHP_SELF"]=="/TalentHub/TalentHubClient/intern.php"){ ?>
                        <li class="active"><a href="intern.php" ><span class="fa fa-clipboard"></span>Apply</a></li>
                    <?php }else{ ?>
                        <li><a href="intern.php"><span class="fa fa-clipboard"></span>Apply</a></li>
                    <?php }?>

                    <?php if($_SERVER["PHP_SELF"]=="/TalentHub//TalentHubClient/event.php"){ ?>
                    <li class="active"><a href="event.php"><span class="fa fa-empire"></span>Events</a></li>
                    <?php }else{ ?>
                        <li><a href="event.php"><span class="fa fa-empire"></span>Events</a></li>
                    <?php }?>

                        <?php

                            $sql = "SELECT*FROM jobs AS j INNER JOIN app_job AS a ON j.jobID = a.jobID
                        JOIN employee as e ON a.empID = e.empID WHERE e.empID = ?";
                        $binder = $connect->prepare($sql);
                        $binder->BindValue(1,$_SESSION["UID"]);
                        $binder->execute();
                        $count = $binder->rowCount();

                        ?>
                    <?php if($_SERVER["PHP_SELF"]=="/TalentHub/TalentHubClient/pendingapp.php"){ ?>
                    <li class="active"><a href="pendingapp.php"><span class="fa fa-arrow"></span>Pending Applications<span class="badge"><?php echo $count ?></span></a></li>
                    <?php }else{ ?>
                        <li><a href="pendingapp.php"><span class="fa fa-arrow"></span>Pending Applications<span class="badge"><?php echo $count ?></span></a></li>
                    <?php }?>

                    <li><a href="#"><span class="fa fa-shopping-cart"></span>ShopCart</a></li>

                    <li class="dropdown ">
                       <a href="#" class="dropdown-toggle" data-toggle="dropdown">Profile <span class="caret"></span></a>
                       <ul class="dropdown-menu" role="menu">
                           <li><a href="SubCv.php">Submit CV</a></li>
                           <li><a href="#">Upload Results Transcript</a></li>
                           <li class="divider"></li>
                           <li><a href="#">Change Password</a></li>
                           <li><a href="#">Update Profile</a></li>
                           <li><a href="../logout.php">Logout</a></li>
<!--                           <li><a href="#">Separated link</a></li>-->
<!--                           <li class="divider"></li>-->
<!--                           <li><a href="#">One more separated link</a></li>-->
                       </ul>
                   </li>
                   <!-- <li class="dropdown ">
                       <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
                       <ul class="dropdown-menu" role="menu">
                           <li><a href="#">Action</a></li>
                           <li><a href="#">Another action</a></li>
                           <li><a href="#">Something else here</a></li>
                           <li class="divider"></li>
                           <li><a href="#">Separated link</a></li>
                           <li class="divider"></li>
                           <li><a href="#">One more separated link</a></li>
                       </ul>
                   </li> -->
                </ul>

            </div>
            <!-- /.navbar-collapse -->
            <!-- Navbar Right Menu -->

            <!-- /.navbar-custom-menu -->
        </div>
        <!-- /.container-fluid -->
    </nav>
</header>
