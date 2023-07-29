<?php
include "../layout/header.php";
if (isset($_SESSION["role"])) {
    header("Location:index.php");
}
?>
<div class="position-fixed top-50 start-50 translate-middle">
    <div class="card col-lg-12 mx-auto">
        <div class="card-header bg-primary">
            <div class="h4 text-center text-light text-uppercase">Login</div>
        </div>
        <div class="card-body">
            <form action="../system/ChangePass.php" method="post">
                <input type="text" class="form-control mb-3" id="username" name="username" placeholder="Username">
                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-sm" name="reset">Reset</button>
                </div>
            </form>
        </div>
        <div class="card-footer bg-none">
            <div class="text-center">
                <a href="login.php" class="btn btn-link text-decoration-none ">Login</a>
            </div>
        </div>
    </div>
</div>

<?php
include "../layout/footer.php";
?>