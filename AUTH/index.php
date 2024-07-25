
<?php
session_start();

include('../includes/db.php');


if(isset($_POST['register'])){

    $admin_name = $_POST['adminname'];
    $admin_email = $_POST['adminemail'];
    $admin_pwd = $_POST['adminpwd'];
    $admin_cpwd = $_POST['admincpwd'];

    if($admin_pwd==$admin_cpwd){

        $admin_query = "INSERT INTO admins(`admin_name`,`admin_email`,`admin_password`) VALUES('$admin_name','$admin_email','$admin_pwd')";
        $admin_query_exe = mysqli_query($con,$admin_query);
        if($admin_query_exe)
        {
            echo "<script>window.alert('Registered Succesfully')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }
        else{
            die(mysqli_error($con));
        }
    }
    else{
        echo "<script>window.alert('Passwords Does not match')</script>";
    }
}

if(isset($_POST['Login'])){

    $admin_mail = $_POST['login_email'];
    $admin_pass = $_POST['login_pwd'];
    $admin_fetch = "SELECT  * from admins where admin_email='$admin_mail' and  admin_password='$admin_pass'";
    $admin_exe = mysqli_query($con,$admin_fetch);
    if(mysqli_num_rows($admin_exe)>0){
        $_SESSION['admin'] = $admin_mail;
        echo "<script>window.alert('Login Succesfull')</script>";
        echo "<script>window.open('../index.php','_self')</script>";
        
    }
    else{
        echo "<script>window.alert('Invalid Credentials')</script>";
    }

}

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<style>
    .form-control:focus {
  border-color: black;
  box-shadow: none;
}

</style>
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-address-card"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Gmrit Admin</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Authentication</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Login Screens:</h6>
                        <!-- <a class="collapse-item" href="index.php?login">Login</a> -->
                        <?php 
                        if(isset($_GET['register'])){
                            echo "<a class='collapse-item' href='index.php'>Login</a>";
                        }
                        else{
                            echo "<a class='collapse-item' href='index.php?register'>Register</a>";
                        }
                        
                        ?>
                        <!-- <a class='collapse-item' href='index.php?register'>Register</a> -->
                        <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                        <div class="collapse-divider"></div>
                        
                    </div>
                </div>
            </li>

            
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
            <!-- <div class="sidebar-card d-none d-lg-flex">
                <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">
                <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
                <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
            </div> -->

        </ul>
        <!-- End of Sidebar -->
       <?php 
       if(isset($_GET['register'])){
        include('register.php');
       }
       else{
     include('login.php');
       }
       ?>

        <!-- Content Wrapper -->
        
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/chart-area-demo.js"></script>
    <script src="../js/demo/chart-pie-demo.js"></script>

</body>

</html>