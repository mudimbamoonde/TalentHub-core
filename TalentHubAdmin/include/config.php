<?php

try {

    $connect = new PDO("mysql:host=localhost;dbname=talenthub", "root", "");
    $connect->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    $connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);

 } catch (PDOException $e){

    echo $e->getMessage();

}
