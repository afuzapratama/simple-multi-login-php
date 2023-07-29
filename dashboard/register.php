<?php
include "../layout/header.php";
if (isset($_SESSION["role"])) {
    header("Location:index.php");
}
?>
<div class="container">
    <div class="pt-5 mt-5">
        <div class="card col-lg-6 mx-auto">
            <div class="card-header bg-primary">
                <div class="h4 text-center text-light text-uppercase">Register</div>
            </div>
            <div class="card-body">
                <form action="../system/RegisterSystem.php" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <input type="text" class="form-control" name="username" placeholder="Username" required>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <input type="email" class="form-control" name="email" placeholder="Email" required>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <input type="text" class="form-control" name="nama" placeholder="Nama" required>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Upload Avatar</label>
                        <input class="form-control" type="file" name="imgfile">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-sm" name="register">Register</button>
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
</div>
<?php
include "../layout/footer.php";
?>