<?php

try {
    
    $connect = new PDO("mysql:host=localhost;dbname=talenthub", "root", "");
    
 } catch (PDOException $e){
    
    echo $e->getMessage();

}