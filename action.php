<?php
/*
 * <div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <strong>Holy guacamole!</strong> You should check in on some of those fields below.
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>*/
include "include/config.php";

$output = "";
//Employer Post
if(isset($_POST["employer"])){
//    cname:cname,regnum:regnum,email:email,contactNumber:contactNumber
    if (empty($_POST["cname"])|| empty($_POST["regnum"]) || empty($_POST["email"]) || empty($_POST["contactNumber"])){
        $output .= "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
              <strong>Dont Leave Blank</strong> You should check in on some of those fields
              <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
              </button>
            </div>";
    }else{
        $cname = $_POST["cname"];
        $regnum = $_POST["regnum"];
        $email = $_POST["email"];
        $contactNumber = $_POST["contactNumber"];
//mpID int(10)  primary key auto_increment,
//  companyName varchar(100) not null,
//  RegistrationNumber varchar(100) not null,
//  email varchar(100),
//  contactNumber varchar(20)
//        $output .= $contactNumber;
        $s = "SELECT*FROM employer WHERE companyName=? OR RegistrationNumber=?";
        $verify = $connect->prepare($s);
        $verify->bindValue(1,$cname);
        $verify->bindValue(2,$regnum);
        $verify->execute();
        if ($verify->rowCount() > 0){
            $output .= "<div class='alert alert-secondary alert-dismissible fade show' role='alert'>
              <strong>InUse:</strong> The Company Name and Registration Number you have used is Already in the System.
                         <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
              </button>
            </div>";
        }else {

            try {

                $sql = "INSERT INTO employer VALUES(?,?,?,?,?)";

                $binder = $connect->prepare($sql);
                $binder->bindValue(1, NULL);
                $binder->bindValue(2, $cname);
                $binder->bindValue(3, $regnum);
                $binder->bindValue(4, $email);
                $binder->bindValue(5, $contactNumber);

                if ($binder->execute()) {
                    $lastID = $connect->lastInsertId();

            //accid
            //uid int(100) not null,
            //password varchar(150),
            //status enum('active','deactive'),
            //accountType enum("sysadmin","admin","company","person")


                    $sqlAccount = "INSERT INTO sys_accounts VALUES (?,?,?,?,?,?)";
                    $account = $connect->prepare($sqlAccount);



                    $status = "active";
                    $accountType = "company";
                    $hashed_pass = md5($regnum);
                    $account->bindValue(1,null);
//                    $account->bindValue(2,$lastID);
                    $account->bindValue(2,$lastID);
                    $account->bindValue(3,$regnum);
                    $account->bindValue(4,$hashed_pass);
                    $account->bindValue(5,$status);
                    $account->bindValue(6,$accountType);

                    if ($account->execute()) {
                        $output .= "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                                  <strong>Success: </strong> Your Company has been record
                                      <ul>
                                           <li>ClientID: $lastID</li>
                                           <li>Username: $regnum</li>
                                           <li>password: $regnum</li>
                                        </ul>
                                  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                  </button>
                                </div>";
                            }else{
                        $output .= "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                  <strong>Failed: </strong> Failed to create account
                                  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                  </button>
                                </div>".$connect->errorInfo();
                    }

                }


            } catch (PDOException $e) {
                $error = $e->getMessage();
                $output .= "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
              <strong>Failure: </strong> Failed to Record your Company due to $error
              <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
              </button>
            </div>";
            }
        }



    }
}


//Employer Post
if (isset($_POST["jobseeker"]))
{
//    fname:fname,lname:lname,gender:gender,dob:dob,
//                industry:industry,careerlevel:careerlevel,from:from,to:to,nature:nature,
//                email:email,phoneNumber:phoneNumber,cv:cv
    if (empty($_POST["fname"]) || empty($_POST["lname"]) || empty($_POST["gender"]) ||
        empty($_POST["dob"]) || empty($_POST["industry"]) || empty($_POST["careerlevel"])
        || empty($_POST["from"]) || empty($_POST["to"]) || empty($_POST["nature"])
        || empty($_POST["email"]) || empty($_POST["phoneNumber"])){

        $output .= "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
              <strong>Dont Leave Blank</strong> You should check in on some of those fields
              <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
              </button>
             
            </div>";
    }else{

        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $gender = $_POST["gender"];
        $dob = $_POST["dob"];
        $industry = $_POST["industry"];
        $careerlevel = $_POST["careerlevel"];
        $level = $_POST["level"];
        $from = $_POST["from"];
        $to = $_POST["to"];
        $nature = $_POST["nature"];
        $email = $_POST["email"];
        $phoneNumber = $_POST["phoneNumber"];
        //$cv = $_POST["cv"];
		$cv = "upload";

        $s = "SELECT*FROM employee WHERE email=?";
        $verify = $connect->prepare($s);
        $verify->bindValue(1,$email);
        $verify->execute();
        if ($verify->rowCount() > 0){
            $output .= "<div class='alert alert-secondary alert-dismissible fade show' role='alert'>
              <strong>InUse:</strong> The Email you have used is Already inUse.
                         <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
              </button>
            </div>";
        }else{


            try {

//                echo $dob;
                function f($t, $fom){
                    $date1 = $fom;
                    $date2 = $t;

                    $ts1 = strtotime($date1);
                    $ts2 = strtotime($date2);

                    $year1 = date('Y', $ts1);
                    $year2 = date('Y', $ts2);

                    $month1 = date('m', $ts1);
                    $month2 = date('m', $ts2);

                    $diff = (($year2 - $year1) * 12) + ($month2 - $month1);


                    return $diff;
                }

                $exprience = f($to,$from);
                @$age = date("Y-m-d") - $dob;
//                 echo date("Y-m-d")-$dob;
				//echo $exprience;

                $sql = "INSERT INTO employee VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)";

                $binder = $connect->prepare($sql);
                $binder->bindValue(1, NULL);
                $binder->bindValue(2, $fname);
                $binder->bindValue(3, $lname);
                $binder->bindValue(4, $dob);
                $binder->bindValue(5, $age);
                $binder->bindValue(6, $industry);
                $binder->bindValue(7,$careerlevel);
                $binder->bindValue(8, $level);
                $binder->bindValue(9, $exprience);
                $binder->bindValue(10, $nature);
                $binder->bindValue(11, $email);
                $binder->bindValue(12, $phoneNumber);
                $binder->bindValue(13, $cv);



                if ($binder->execute()) {
                    $lastID = $connect->lastInsertId();


                    $sqlAccount = "INSERT INTO sys_accounts (accid,userID,username,password,status,accountType) 
                VALUES(?,?,?,?,?,?)";
                    $account = $connect->prepare($sqlAccount);

                    $hashed_password = md5($fname);
                    $status = "active";
                    $accountType = "person";

                    $account->bindValue(1,null);
//                    $account->bindValue(2,$lastID);
                    $account->bindValue(2,$lastID);
                    $account->bindValue(3,$email);
                    $account->bindValue(4,$hashed_password);
                    $account->bindValue(5,$status);
                    $account->bindValue(6,$accountType);
                    $errorx = $binder->errorInfo();
                    if ($account->execute()) {
                        $output .= "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                                 <strong>Success: </strong> Your Account has been Recorded
                                      <ul>
                                            <li>ClientID: $lastID</li>
                                           <li>Username: $email</li>
                                           <li>password: $fname</li>
                                        </ul>
                                  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                  </button>
                                </div>";
                    }else{
                        $output .= "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                  <strong>Failed: </strong>$lastID Failed to create account $errorx
                                  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                  </button>
                                </div>";
                    }





                }else{
                    $errorx = $binder->errorInfo();
                    $output .= "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
              <strong>Failure (i): </strong> Failed to Record your Account due to $errorx
              <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
              </button>
            </div>";
                }


            } catch (PDOException $e) {
                $error = $e->getMessage();
                $output .= "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
              <strong>Failure (ii): </strong> Failed to Record your Account due to $error
              <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
              </button>
            </div>";
            }


        }







    }
}

echo $output;

