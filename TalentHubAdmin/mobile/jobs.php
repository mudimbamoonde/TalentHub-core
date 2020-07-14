<?php
include ("../include/config.php");
$sql = "SELECT*FROM jobs ORDER BY jobID DESC";
$binder = $connect->prepare($sql);
$binder->execute();
//                                $data[] = array();
$data = [];

$n = 0;
while($row = $binder->fetch(PDO::FETCH_ASSOC)) {
    $n++;
    /*
     *  jobID      | int(10)      | NO   | PRI | NULL    | auto_increment |
| jobTitle   | varchar(100) | NO   |     | NULL    |                |
| company    | varchar(100) | NO   |     | NULL    |                |
| jobDetails | text         | YES  |     | NULL    |                |
| jobDue     | datetime     | YES  |     | NULL    |                |
| summary
     * */
$data = ["jobTitle" => $row['jobTitle'], "company" =>$row['company'],"jobDetails"=>$row['jobDetails'],
          "jobDue"=>$row['jobDue'],"sumarry"=>$row['summary'] ];

print_r(json_encode($data));
// $de = json_decode($view);
//
// echo $de->jobDetails."<br>";
}
 ?>
