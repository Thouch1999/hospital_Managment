<?php
session_start();
include_once "database/config_database.php";


?>

<!DOCTYPE html>
<html lang="en">


<!-- login23:11-->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>Login ot Dashboard KThoch</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">

</head>

<body>
    <div class="main-wrapper account-wrapper">
        <div class="account-page">
            <div class="account-center">
                <div class="account-box">
                    <?php
                    if (isset($_POST['btnLogin'])) {
                        $userName = $con->real_escape_string(trim($_POST['userName']));
                        $pssword = $con->real_escape_string(trim($_POST['password']));
                        $userPassword = md5($pssword);
                        if ($userName == "" || $userPassword == "") {
                            echo msgstyle("Please input username or password! ", "info");
                        } else {
                            $sql = "SELECT * FROM user WHERE username ='$userName' and password='$userPassword'";
                            $result = $con->query($sql);
                            if (mysqli_num_rows($result) > 0) {
                                $row = mysqli_fetch_array($result);
                                $_SESSION['user_login'] = $userName;
                                $_SESSION['user_role'] = $row['role_id'];

                                header("Location: index.php");
                            } else {
                                echo msgstyle("wrong username or password! ", "danger");
                            }
                        }
                    }
                    ?>
                    <form action="" method="post" class="form-signin">
                        <div class="account-logo">
                            <a href="index-2.html"><img src="assets/img/logo-dark.png" alt=""></a>
                        </div>
                        <div class="form-group">
                            <label>Username or Email</label>
                            <input type="text" autofocus="" name="userName" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="form-group text-right">
                            <a href="forgot-password.html">Forgot your password?</a>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" name="btnLogin" class="btn btn-primary account-btn">Login</button>
                        </div>
                        <div class="text-center register-link">
                            Don’t have an account? <a href="register.html">Register Now</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/app.js"></script>

    <script>
        $(document).ready(function() {
            // Automatically close success or error messages after 3 seconds
            setTimeout(function() {
                $(".auto-hide-alert").fadeTo(500, 0).slideUp(500, function() {
                    $(this).remove();
                });
            }, 2000); // 3 seconds
        });
    </script>
</body>


<!-- login23:12-->

</html>