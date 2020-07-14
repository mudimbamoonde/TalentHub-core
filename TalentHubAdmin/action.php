<?php
include "include/config.php";
$output = "";

if(isset($_POST["sys"])){
//    sys:1,fname:fname,lname:lname,username:username,gender:gender,
//               nrc:nrccom,accesslevel:accesslevel,address:address,email:email,phone:phone

    if (empty($_POST["fname"]) || empty($_POST["lname"]) || empty($_POST["username"])
        || empty($_POST["gender"]) || empty($_POST["nrc"]) || empty($_POST["accesslevel"])
        || empty($_POST["address"]) || empty($_POST["email"]) || empty($_POST["phone"])){

        $output .=" <div class='alert alert-warning alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4><i class='icon fa fa-ban'></i> Alert!</h4>
                Dont Leave Field Blank.
              </div>";

    }else{

        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $uname = $_POST["username"];
        $gender = $_POST["gender"];
        $nrc = $_POST["nrc"];
        $accesslevel = $_POST["accesslevel"];
        $address = $_POST["address"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];

        $sql = "INSERT INTO sysadmin VALUES (?,?,?,?,?,?,?,?,?,?,?)";
        $binder = $connect->prepare($sql);
        $binder->bindValue(1,null);
        $binder->bindValue(2,$fname);
        $binder->bindValue(3,$lname);
        $binder->bindValue(4,$uname);
        $binder->bindValue(5,$gender);
        $binder->bindValue(6,$nrc);
        $binder->bindValue(7,$accesslevel);
        $binder->bindValue(8,$address);
        $binder->bindValue(9,$email);
        $binder->bindValue(10,$phone);
        $binder->bindValue(11,0);
        if($binder->execute()){
            $output .=" <div class='alert alert-success alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4><i class='icon fa fa-ban'></i> Successful!</h4>
                Successfully Inserted.
              </div>";
        }else{
            $error = $connect->errorInfo();
            $output .=" <div class='alert alert-danger alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4><i class='icon fa fa-ban'></i> Failed!</h4>
                Failed to Insert: $error
              </div>";
        }
    }
}

//system Admin
if (isset($_POST["sysadmin"])){


                                $sql = "SELECT*FROM sysadmin ORDER BY user_id DESC";
                                $binder = $connect->prepare($sql);
                                $binder->execute();
                                $n = 0;

                                while($row = $binder->fetch(PDO::FETCH_OBJ)) {
                                    $n++;

                                    $UserID = $row->user_id;
                                    $fname = $row->firstname;
                                    $lname = $row->lastname;
                                    $username = $row->username;
                                    $gender = $row->gender;
                                    $nrc = $row->nrc;
                                    $accessLevel = $row->accessLevel;
                                    $address = $row->address;
                                    $email = $row->email;
                                    $phone = $row->phone;
                                    $status = $row->status;
                                    if ($status == 1) {

                                        $state = "<a href='' class='btn btn-success'><span class='fa fa-unlock'></span></a>";
                                    } else {
                                        $state = "<a href='' class='btn btn-danger'><span class='fa fa-lock'></span></a>";
                                    }
                                    $output .= "<tr class='gradeX'>
                                        <td>$n</td>
                                        <td><a href='javascript:void()' id='detailemp'  deepemp='$UserID'  data-toggle='modal' data-target='#modal-default'> $fname $lname </a></td>
                                        <td>$username</td>
                                        <td>$gender </td>
                                        <td>$accessLevel </td>
                                        <td>$email </td>
                                        <td>$phone </td>
                                        <td>$state</td>
                                        <td><a href='#' class='btn btn-warning'><span class='fa fa-pencil'></span></a>|<a href='' class='btn btn-danger'><span class='fa fa-trash'></span></a></td>

                                    </tr
                               ";
                }
}

//TODO:getEmployee:1,userID:details<int:id>
if (isset($_POST["getEmployee"])){
    $userID  = $_POST["userID"];
    $sql = "SELECT*FROM sysadmin WHERE user_id=?";
    $bind = $connect->prepare($sql);
    $bind->bindValue(1,$userID);
    $bind->execute();
    $row = $bind->fetch(PDO::FETCH_OBJ);
//    firstname | lastname | username | gender | nrc         | accessLevel | address | email | phone        | status
    $fullname = $row->firstname." ".$row->lastname;
    $username  = $row->username;
    $gender  = $row->gender;
    $accessLevel  = $row->accessLevel;

    if ($row->status == 0){
        $ts = "<a href='#' class='btn btn-warning' id='unlockaccount' unlock='$userID'><span class='fa fa-lock'></span>UnLock here</a>";
    }else{
        $ts ="";
    }

    $output .="
        <table class='table table-responsive table-striped'>
           <thead>
                <tr class='bg bg-aqua'>
                    <th>USERid</th>
                    <td>".sha1($userID)."</td>
                </tr>
                
                <tr>
                 <th>FullName</th>
                 <td>$fullname</td>
                 </tr>
                 
                 <tr>
                 <th>Username</th>
                 <td>$username</td>
                 </tr> 
                 
                 <tr>
                 <th>Access Level</th>
                 <td>$accessLevel</td>
                 </tr>
                 
                 <tr>
                 <th>National Registration Number </th>
                 <td>$row->nrc</td>
                 </tr>
                 
                 <tr>
                 <th>Address </th>
                 <td><span class='fa fa-location-arrow'></span>$row->address</td>
                 </tr>
                  
                  <tr>
                 <th>Mobile </th>
                 <td><span class='fa fa-phone'></span> $row->phone</td>
                 </tr>
            </thead>
        </table>
        <a href='#' class='btn btn-dropbox' id='createAccount' account='$userID'>Create Account</a>
        $ts
    ";
}


//TODO:setEmployee:1,userID:details<int:id>
if (isset($_POST["setEmployee"])) {
    $userID = $_POST["userID"];

    $sql = "SELECT*FROM sysadmin WHERE user_id=?";
    $bind = $connect->prepare($sql);
    $bind->bindValue(1, $userID);
    $bind->execute();
    $row = $bind->fetch(PDO::FETCH_OBJ);
//   accessLevel | address | email                   | phone        | status
    $fullname = $row->firstname . " " . $row->lastname;
    $username = $row->username;
    $gender = $row->gender;
    $accessLevel = $row->accessLevel;
    if ($row->status == 0) {
        $output .= " <div class='alert alert-warning alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4><i class='icon fa fa-eraser'></i> Account is Locked, Unlock to continue</h4>
                ";
    } else {
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        //TODO: Verify the account
        $ver = $connect->prepare("SELECT*FROM sys_accounts WHERE username=:username");
        $ver->bindParam(":username", $username);
        $ver->execute();
        $ver->fetch(PDO::FETCH_OBJ);
        if ($ver->rowCount() > 0) {
            $output .= " <div class='alert alert-danger alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4><i class='icon fa fa-ban'></i> Account Already exist</h4>
                ";


        } else {

            /////////////////////////////////////////////////////////////////////////////////////////////////////////////////

            $sql = "INSERT INTO sys_accounts (accid,userID,username,password,status,accountType) 
                VALUES(?,?,?,?,?,?)";
            $hashed_password = md5($username);
            $bind = $connect->prepare($sql);
            $bind->bindValue(1, NULL);
            $bind->bindValue(2, $userID);
            $bind->bindValue(3, $username);
            $bind->bindValue(4, $hashed_password);
            $bind->bindValue(5, "active");
            $bind->bindValue(6, "sysadmin");
            if ($bind->execute()) {

// accid        userID | password | status     | enum('active','deactive')   | accountType
                $output .= " <div class='alert alert-success alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4><i class='icon fa fa-ban'></i> Account Created</h4>
         <table>
                   <thead>
                   <tr>
                      <th>Username: </th>                 
                      <td>$username</td>                 
                    </tr> 
                    <tr>
                      <th>Password: </th>                 
                      <td>$username</td>                 
                    </tr>
                    </thead>
                    </table>
              </div>";
            } else {
                $output .= " <div class='alert alert-danger alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4><i class='icon fa fa-ban'></i> Failed to create Account: </h4>
                " . $connect->errorInfo();
            }
        }
    }
}


//TODO: Unlock Account
if (isset($_POST["Unlock"])){
    //Unlock
    $userID = $_POST["userID"];
    $sql = "UPDATE sysadmin SET status=1 WHERE user_id=?";
    $bi = $connect->prepare($sql);
    $bi->bindValue(1,$userID);
    if($bi->execute()){
        $output .= " <div class='alert alert-aqua alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4><i class='icon fa fa-unlock'></i>Account Unlocked: </h4>
                ";
    }else{
        $output .= " <div class='alert alert-danger alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4><i class='icon fa fa-ban'></i> Failed to Unlock Account: </h4>
                " . $connect->errorInfo();
    }


}



//fetchjob
if (isset($_POST["fetchjob"])){

//                                    <tr class="gradeX">
//                                        <td></td>
//<td><a href="javascript:void(0)"><!--</a>  </td>-->
//<!--<td>--><!--</td>-->
//<!--<td>--><!--</td>-->
//<!--<td>--><!--:--><!--</td>-->
//<!--<td><a href="#" class="btn btn-warning"><span class="fa fa-pencil"></span></a>|<a href="#" class="btn btn-danger"><span class="fa fa-trash"></span></a></td>-->
//<!---->
//<!--</tr>-->
$sql = "SELECT*FROM jobs ORDER BY jobID DESC";
$binder = $connect->prepare($sql);
$binder->execute();
$data[] = array();

$n = 0;
while($row = $binder->fetch(PDO::FETCH_OBJ)) {
    $n++;
    // jobID
//| jobTitle
//| jobsummery
//| company
//| jobDetails
//| jobDue
    $data['jobID'] .=$row->jobID;
    $data['jobTitle'] .=$row->jobTitle;
//    $data[] .=$row->jobsummery;
//    $data[] .=$row->company;
//    $data[] .=$row->jobDetails;
//    $data[] .=$row->jobDue;

}

$dt = json_encode($data);

echo $dt;

}

echo $output;