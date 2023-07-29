<?php
require_once "Connection.php";

session_start();

if (isset($_SESSION['email'])) {
    session_destroy();
    header("location: ../dashboard/login.php");
    exit();
} else {
    header("location: ../dashboard/login.php");
    exit();
}
