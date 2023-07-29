<?php
require_once "Connection.php";

if (isset($_POST["register"])) {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $nama = $_POST["nama"];
    $password = $_POST["password"];
    $passwordmd5 = md5($password);
    //You can change the role as you wish
    $role = array("user", "admin");
    $role = $role[rand(0, 1)];

    // is image file upload
    if ($_FILES['imgfile']['name'] != "") {

        $imgExtention = strtolower(end(explode(".", $_FILES['imgfile']['name'])));

        if ($imgExtention != "jpg" && $imgExtention != "png" && $imgExtention != "jpeg") {
            header("location: ../dashboard/register.php");
            exit();
        }

        $img = $_FILES['imgfile']['name'];
        $tmp = $_FILES['imgfile']['tmp_name'];
        $path = "../upload/" . $img;
        move_uploaded_file($tmp, $path);
        $img = $_FILES['imgfile']['name'];
    } else {
        $img = "default.png";
    }
    // query to PDO
    try {
        $query = "INSERT INTO user (username, password, name, email,img,role) VALUES (:username, :password, :name, :email,:img,:role)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":password", $passwordmd5);
        $stmt->bindParam(":name", $nama);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":img", $img);
        $stmt->bindParam(":role", $role);

        $stmt->execute();
        header("location: ../dashboard/login.php");
        exit();
    } catch (PDOException $e) {
        echo "Error : " . $e->getMessage();
    }
}
