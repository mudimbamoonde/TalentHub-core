<?php
session_start();
    session_destroy();
    unset($_SESSION["UID"]);
    header("location:../login.php");
