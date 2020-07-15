<?php
//$connection = new PDO("mysql:host=localhost;dbname=talenthub","root","");
//
//$sl = "SELECT*FROM sys_accounts";
//echo select($connection,$sl);
//
//function select($con,$sql){
//
//    $binder = $con->prepare($sql);
//    $binder->execute();
//
//    $result = array();
//    $day =null;
//    while($row = $binder->fetchAll()){
//
//        $result[]=  $row;
//        $day .= json_encode($result);
//    }
//
//    return $day;
//
//}

function isLogin(){
    session_start();
    if(isset($_SESSION["UID"])){
        if($_SESSION["accountType"] == "person"){
            header("location:index.php");
        }elseif($_SESSION["accountType"] == "sysadmin"){
            header("location:index.php");
        }
    }
}

function NotLoginedIn(){
    session_start();
    if(!isset($_SESSION["UID"])){
      session_destroy();
      unset($_SESSION["UID"]);
      header("location:login.php");
    }
}