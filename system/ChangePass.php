<?php
require_once "Connection.php";

if (isset($_POST["reset"])) {
    $username = $_POST["username"];
    $random = rand(100000, 999999);
    $passwordmd5 = md5($random);

    // query to PDO
    $query = "SELECT * FROM user WHERE username=:username";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($result) {
        $query = "UPDATE user SET password=:password,passchange=:passchange  WHERE username=:username";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":password", $passwordmd5);
        $stmt->bindParam(":passchange", $random);
        $stmt->execute();
        header("Location:../dashboard/success-reset.php?pass='$random'");
    } else {
        header("location: ../dashboard/forgot-password.php");
        exit();
    }
}
