<?php
include "../layout/header.php";
session_start();
?>


<div class="container">
    <div class="col-lg-12 mb-3">
        <div class="h3 text-center mt-5">Is Home For Role : <?= $_SESSION["role"]  ?></div>
    </div>
    <?php
    if ($_SESSION["role"] == "admin") {
        require_once "../system/Connection.php";
        $sql = "SELECT * FROM user";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo "<div class='col-lg-12 mt-5'>";
        echo "<div class='h3 text-center'>List User</div>";
        echo "<table class='table table-bordered'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>Username</th>";
        echo "<th>Name</th>";
        echo "<th>Email</th>";
        echo "<th>Role</th>";
        echo "<th>Avatar</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        foreach ($result as $row) {
            echo "<tr>";
            echo "<td>" . $row["username"] . "</td>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["role"] . "</td>";
            echo "<td><img src='../upload/" . $row["img"] . "' width='100px'></td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
        echo "</div>";
    } else {
        echo "<div class='text-center mb-3'>you are not admin</div>";
    }
    ?>
    <div class="text-center">
        <a href="../system/LogoutSystem.php" class="btn btn-danger btn-sm">Logout</a>
    </div>
</div>
<?php
include "../layout/footer.php";
?>