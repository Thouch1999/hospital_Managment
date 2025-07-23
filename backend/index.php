<?php
session_start();
if (!isset($_SESSION['user_login'])) {
    header("Location: login.php");
}
include_once "database/config_database.php";
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>Admin Dashboard KThoch</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">


    <!--[if lt IE 9]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>

<body>
    <div class="main-wrapper">
        <!--header-->
        <header>
            <?php include('./layout/header.php') ?>
        </header>

        <!--side Bar-->
        <main>
            <?php include('./layout/sidebar.php') ?>
        </main>

        <div class="page-wrapper">
            <!--start contant-->
            <?php // include('./layout/master.php') 
            ?>
            <?php  //include('./page/doctor/list_doctor.php')
            if (isset($_GET['p_doctor'])) {
                include('page/doctor/' . $_GET['p_doctor'] . '.php');
            } else if (isset($_GET['p_patient'])) {
                include('page/patient/' . $_GET['p_patient'] . '.php');
            } else if (isset($_GET['p_appointment'])) {
                include('page/appointment/' . $_GET['p_appointment'] . '.php');
            } else if (isset($_GET['p_doctor_sch'])) {
                include('page/doctor_schedule/' . $_GET['p_doctor_sch'] . '.php');
            } else if (isset($_GET['p_department'])) {
                include('page/department/' . $_GET['p_department'] . '.php');
            } else if (isset($_GET['p_employee'])) {
                include('page/employee/' . $_GET['p_employee'] . '.php');
            } else if (isset($_GET['p_account'])) {
                include('page/account/' . $_GET['p_account'] . '.php');
            }else if (isset($_GET['p_payroll'])) {
                include('page/payroll/' . $_GET['p_payroll'] . '.php');
            } else {
                if ($_SESSION['user_role'] == '1') {
                    include('./layout/master.php');
                } else {
                    include('./page/doctor/list_doctor.php');
                }
            }
            ?>
            <!--end contant-->

            <div class="notification-box">
                <!--start alert-->
                <?php include('./page/alert/alert.php');
                ?>
                <!--end alert-->
            </div>
        </div>
    </div>
    <div class="sidebar-overlay" data-reff=""></div>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/Chart.bundle.js"></script>
    <script src="assets/js/chart.js"></script>
    <script src="assets/js/select2.min.js"></script>
    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/js/bootstrap-datetimepicker.min.js"></script>
    <script src="assets/js/app.js"></script>


</body>



</html>