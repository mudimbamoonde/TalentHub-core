<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-secondary">
<!--        <img src="img/logo.png" width="100" height="100" class="d-inline-block align-top" alt="">-->
        <a class="navbar-brand" href="#">TalentHub</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About Us</a>
                </li>

            </ul>

        </div>
        <a href="login.php" class="nav-link text-white" >Login</a><span class="list-group-horizontal">|</span>
        <?php if (!isset($_SESSION["UID"])){
            ?>
        <a href="createaccount.php" class="nav-link text-white" data-toggle="modal" data-target="#accountType">Create Account</a>
        <?php }elseif (isset($_SESSION["UID"])){ ?>
       <a href="logout.php" class="nav-link text-white"><?php echo $_SESSION["fname"]." ".$_SESSION["sname"]; ?></a>
        <?php }?>

    </nav>
</header>

<!-- Modal -->
<div class="modal fade" id="accountType" tabindex="-1" role="dialog" aria-labelledby="accountTypemodel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="accountTypemodel">Account Type</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" align="center">
                <span class="text-uppercase text-dark">Are you an </span><br>
                <a href="createaccount.php?accounttype=<?php echo sha1("employer")?>" class="btn btn-primary">Company?</a>
                - OR -
                <a href="createaccount.php?accounttype=<?php echo sha1("employee")?>" class="btn btn-secondary"> Job Seeker?</a>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>