<?php include "include/head.php"; ?>
<?php
isLogin();
?>
<body style="background-color: rgb(2,1,38)">

<main role="main">


    <div class="container marketing" align="center">
        <div align="center">

            <div class="col-md-5">
            <div style="background-color: rgba(69,161,253,0.14);">


                <div class="card-body">
                    <img src="img/logo.png">

                        <hr class="col-md-2">
                        <form method="post">
                            <?php
                            if (isset($_POST["submit"])) {
                                $uname = strip_tags($_POST["username"]);
                                $password =strip_tags($_POST["password"]);
//                                echo $uname." ".$password;
                                $encrypt = md5($password);
                                $sql = "SELECT*FROM sys_accounts WHERE username=:username AND password=:password";
                            // accid | userID | username     | password                         | status | accountTyp
                                $binder = $connect->prepare($sql);
                                $binder->bindParam(":username",$uname);
                                $binder->bindParam(":password",$encrypt);
                                if($binder->execute()) {
                                    if ($binder->rowCount() == 1) {
                                        $row = $binder->fetch(PDO::FETCH_OBJ);
                                        if ($row->accountType == "person") {
//                                            session_start();
                                            $psql = "SELECT*FROM employee WHERE email=:uname";
                                            $person = $connect->prepare($psql);
                                            $person->bindParam(":uname",$uname);
                                            $person->execute();
                                            $personrow = $person->fetch(PDO::FETCH_OBJ);
                                            // empID | firstName | surname | dob        | age | industry    | careerLevel  |
                                            // educationLevel | yearsOfExperience | natureOfEngagement | email        | contactNumber | cv
                                            $_SESSION["UID"] = $personrow->empID;
//                                            $_SESSION["UID"] = $row->accid;
                                            $_SESSION["fname"] = $personrow->firstName;
                                            $_SESSION["sname"] = $personrow->surname;
                                            $_SESSION["dob"] = $personrow->dob;
                                            $_SESSION["industry"] = $personrow->industry;
                                            $_SESSION["careerLevel"] = $personrow->careerLevel;
                                            $_SESSION["educationLevel"] = $personrow->educationLevel;
                                            $_SESSION["yE"] = $personrow->yearsOfExperience;
                                            $_SESSION["nE"] = $personrow->natureOfEngagement;
                                            $_SESSION["email"] = $personrow->email;
                                            $_SESSION["mobile"] = $personrow->contactNumber;
                                            $_SESSION["cv"] = $personrow->cv;
                                            $_SESSION["accountType"] = $row->accountType;
                                            header("location:TalentHubClient/index.php");
//                                            echo "You have Logged in";

                                        }

                                        if($row->accountType == "sysadmin"){
                                            $sysql = "SELECT*FROM sysadmin WHERE username=:uname";
                                            $admin = $connect->prepare($sysql);
                                            $admin->bindParam(":uname",$uname);
                                            $admin->execute();
                                            $adminrow = $admin->fetch(PDO::FETCH_OBJ);
//user_id | firstname | lastname | username | gender | nrc         | accessLevel | address | email                   | phone        | status
                                            $_SESSION["UID"] = $adminrow->user_id;
                                            $_SESSION["fname"] = $adminrow->firstname;
                                            $_SESSION["sname"] = $adminrow->lastname;
                                            $_SESSION["gender"] = $adminrow->gender;
                                            $_SESSION["nrc"] = $adminrow->nrc;
                                            $_SESSION["accessLevel"] = $adminrow->accessLevel;
                                            $_SESSION["address"] = $adminrow->address;
                                            $_SESSION["email"] = $adminrow->email;
                                            $_SESSION["phone"] = $adminrow->phone;
                                            header("location:TalentHubAdmin/index.php");
                                            
                                        }

                                    }else{

                                        echo "<script> alert('Password or username Error {$binder->rowCount()}')</script>";
                                    }
                                }else{
                                    echo "<script> alert('Error')</script>";
                                }

                            }


                            ?>
                            <div class="form-row">
                                <div class="col">
<!--                                    <label for="username"><p>Username</p></label>-->
                                    <input type="text"  class="form-control" name="username" id="username" placeholder="Username">
                                </div>
                            </div>
                            <br>
                            <div class="form-row">
                                <div class="col">
<!--                                    <label for="password"><h3>Password</h3></label>-->
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                                </div>

                            </div>
                            <br>
                            <div class="form-row">
                                <div class="col">
                                    <input type="submit" class="btn btn-danger" value="Login" name="submit" id="submit"> |
                                   <a href="">Forgot Password</a>
                                </div>

                            </div>



                        </form>
                    </div>
                </div>
            </div>


        </div>

        </div>



        <!-- /END THE FEATURETTES -->

    </main><!-- /.container -->



