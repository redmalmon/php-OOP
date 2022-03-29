<?php

require_once('classes/database.php');
$con = new database();
session_start();

if (!empty($_SESSION['username'])) {
    header('location:index.php');
}

?>


<!DOCTYPE html>
<html lang="en">

<?php include('includes/header.php'); ?>

<body>
    <main>

        <!-- topbar -->
        <nav class="navbar navbar-expand navbar-dark bg-dark" aria-label="First navbar example">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarsExample01">
                    <ul class="navbar-nav me-auto mb-2">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="signup.php">Create Account</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            <div class="row mb-3">
                <div class="col-md-12 mt-5">

                    <div class="col-md-4 form-signin">

                        <h1 class="h3 mb-3 fw-normal">Create Account</h1>


                        <?php
                            if (isset($_POST['signup'])) {
                                $username = $_POST['username'];
                                $password = $_POST['password'];
                                $confirm = $_POST['confirm'];
                                if ($password == $confirm) {

                                    if ($con->signup($username, $password)) {
                                        header('location:login.php');
                                    } else {
                                        echo "error";
                                    }
                                } else {
                                    echo "password did not match";
                                }
                            }
                        ?>

                        <form method="post">
                            <div class="form-group mb-3">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control" required>
                            </div>
                            <div class="form-group mb-3">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <div class="form-group mb-3">
                                <label>Confirm Password</label>
                                <input type="password" name="confirm" class="form-control" required>
                            </div>
                            <div class="form-group mb-3">
                                <input type="submit" value="Sign Up" class="btn btn-success btn-lg" name="signup">
                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>

    </main>


</body>

</html>