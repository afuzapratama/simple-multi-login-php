<?php

require_once "Connection.php";

session_start();

if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $passwordmd5 = md5($password);

    // query to PDO
    try {
        $query = "SELECT * FROM user WHERE username=:username AND password=:password";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":password", $passwordmd5);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            $_SESSION["name"] = $result["name"];
            $_SESSION["email"] = $result["email"];
            $_SESSION["role"] = $result["role"];
            header("location: ../dashboard/index.php");
            // defferent Dashboard roles
            // if ($_SESSION["role"] == "admin") {
            //     header("location: ../dashboard/admin.php");
            // } else if ($_SESSION["role"] == "user") {
            //     header("location: ../dashboard/user.php");
            // }
            exit();
        } else {
            header("location: ../dashboard/login.php");
            exit();
        }
    } catch (PDOException $e) {
        echo "Error : " . $e->getMessage();
    }
}
