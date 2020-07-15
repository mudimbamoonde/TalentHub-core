<?php include "include/head.php"; ?>
<body>
<?php include "include/header.php"; ?>

<main role="main">

    <?php
    $accounttype = $_GET["accounttype"];

    ?>
<!--    --><?php //include "include/carousel.php"; ?>


    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">

        <!-- Three columns of text below the carousel -->
        <div class="jumbotron">
            <?php if ($accounttype==sha1("employer")){
                echo "<h3>Create an Account as an Employer so that you can Post a vacancy, Request for Interns
, Request Head hunt etc.
</h3>";
            }else if ($accounttype==sha1("employee")){
                echo "<h3>Are you looking for Employment, Internship, or Attachments.Sign up and Get started.</h3>";
            }?>
        </div>
<br>
        <div id="msg"></div>
        <?php if ($accounttype==sha1("employer")){?>
        <div class="card">
                        <div class="card-header bg-info text-white">
                            <?php echo "<h1>Employer</h1>"; ?>
                        </div>
            <div class="card-body">
<!--                                <h5 class="card-title">Special title treatment</h5>-->
<!--                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>-->
<!--                                <a href="#" class="btn btn-primary">Go somewhere</a>-->
                <form method="post">
                    <div class="form-row">
                        <div class="col">
                            <label for="cname">Company Name</label>
                            <input type="text" id="cname" name="cname" class="form-control" placeholder="Company Name">
                        </div>
                        <div class="col">
                            <label for="regnum">Registration Number</label>
                            <input type="text" id="regnum" name="regnum" class="form-control" placeholder="Company Registration Number">
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="col">
                            <label for="email">Email Address</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="Email Address">
                        </div>
                        <div class="col">
                            <label for="contactNumber">Contact Number</label>
                            <input type="text" id="contactNumber" name="contactNumber" maxlength="10" class="form-control" placeholder="Contact Number">
                        </div>
                    </div>
                    <br>
                    <div class="form-row">

                    <div class="col">
                        <label for="phoneNumber">Apply Using linkedIn</label>
                        <a href="">LinkedIn</a>
                    </div>

                    <div class="col">
                        <a href="#"   class="btn btn-primary" name="signup" id="signup">Sign Up</a>
                    </div>

            </div>
                </form>

            </div>
        </div>
        <?php }?>



<!--        Employee-->
        <br>
        <?php if ($accounttype==sha1("employee")){?>
<!--jdf-->
        <div class="card">
            <div id="msgem"></div>
<!--            <div class="card-header">-->
<!--                Featured-->
<!--            </div>-->
            <div class="card-body">
<!--                <h5 class="card-title">Special title treatment</h5>-->
<!--                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>-->
<!--                <a href="#" class="btn btn-primary">Go somewhere</a>-->
                <form>
                    <div class="form-row">
                        <div class="col">
                            <label for="fname">First Name</label>
                            <input type="text" id="fname" name="fname" class="form-control" placeholder="First name">
                        </div>
                        <div class="col">
                            <label for="surname">Surname</label>
                            <input type="text" id="surname" name="surname" class="form-control" placeholder="Last name">
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="col">
                            <label for="gender">Gender</label>
                            <select  class="form-control" name="gender" id="gender">
                                <option selected disabled>SELECT GENDER</option>
                                <option>Male</option>
                                <option>Female</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="dob">Date Of Date</label>
                            <input type="date" name="dob" id="dob" class="form-control">
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="col">
                            <label for="industry">Field of Interest(Industry)</label>
                            <select  class="form-control" name="industry" id="industry">
                                <option selected disabled>SELECT INDUSTRY</option>
                                <?php
                                include "include/config.php";
                                $sql = "SELECT*FROM foi";
                                $b = $connect->prepare($sql);
                                $b->execute();

                                while ($row = $b->fetch(PDO::FETCH_OBJ)){
                                    ?>
                                    <option><?php echo $row->fiedName?></option>
                                <?php }?>
                            </select>
                        </div>
<!--                        <div class="col">-->
<!--                            <label for="field">Field</label>-->
<!--                            <select  class="form-control" name="field" id="field">-->
<!--                                <option selected disabled>SELECT FIELD</option>-->
<!--                                --><?php
//                                include "include/config.php";
//                                $sql = "SELECT*FROM foi";
//                                $b = $connect->prepare($sql);
//                                $b->execute();
//
//                                while ($row = $b->fetch(PDO::FETCH_OBJ)){
//                                    ?>
<!--                                    <option value="--><?php //echo $row->fid ?><!--">--><?php //echo $row->fieldName ?><!--</option>-->
<!--                                --><?php //}?>
<!---->
<!--                            </select>-->
<!--                        </div>-->
                    </div>

                    <br>
                    <div class="form-row">
                        <div class="col">
                            <label for="careerlevel">Career Level</label>
                            <select  class="form-control" name="careerlevel" id="careerlevel">
                                <option selected disabled>SELECT CAREER LEVEL</option>
                                <option>Student</option>
                                <option>New graduate</option>
                                <option>Professional</option>
                            </select>
                        </div>

                        <div class="col">
                            <label for="gender">Education Level</label>
                            <select  class="form-control" name="level" id="level">
                                <option selected disabled>SELECT EDUCATION LEVEL</option>
                                <option>Craft Certificate</option>
                                <option>Certificate</option>
                                <option>Diploma</option>
                                <option>Degree</option>
                                <option>Masters</option>
                                <option>PhD</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <h6>Years of Experience</h6>
                    <div class="form-row">
                        <div class="col">
                            <label for="to">From</label>
                            <input type="date"  class="form-control" name="from" id="from">
                        </div>

                        <div class="col">
                            <label for="to">To</label>
                            <input type="date"  class="form-control" name="to" id="to">
                        </div>

                    </div>
                    <br>
                    <div class="form-row">

                        <div class="col">
                            <label for="nature">Nature of Engagement</label>
                            <select class="form-control" name="nature" id="nature">
                                <option selected disabled>SELECT NATURE OF ENGAGEMENT</option>
                                <option>Employment</option>
                                <option>Internship</option>
                                <option>Attachment</option>
                            </select>
                        </div>

                        <div class="col">
                            <label for="email">Email</label>
                            <input type="email"  class="form-control" name="email" id="email" placeholder="Email Address">
                        </div>

                    </div>

                    <br>
                    <div class="form-row">

                        <div class="col">
                            <label for="phoneNumber">Contact Number</label>
                            <input class="form-control" name="phoneNumber" id="phoneNumber" placeholder="Mobile Number">
                        </div>

                        <div class="col">
                            <label for="email">Upload CV</label>
                            <input type="file"  class="form-control" name="cv" id="cv" placeholder="Curriculum Vitae">
                        </div>

                    </div>
                    <br>
                    <div class="form-row">

                        <div class="col">
                            <label for="phoneNumber">Apply Using linkedIn</label>
                           <a href="">LinkedIn</a>
                        </div>

                        <div class="col">
                            <a href="#"   class="btn btn-primary" name="signemp" id="signemp">Sign Up</a>
                        </div>

                    </div>


                </form>
            </div>
        </div>
       <!-- /.row -->
        <?php }?>


        <!-- START THE FEATURETTES -->

        <hr class="featurette-divider">

        <!-- /END THE FEATURETTES -->

    </div><!-- /.container -->


    <!-- FOOTER -->
    <?php include "include/footer.php"; ?>

