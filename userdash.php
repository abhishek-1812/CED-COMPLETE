<?php
/**
 * Short description for code
 * php version 7.2.10
 * 
 * @category Category_Name
 * @package  PackageName
 * @author   Abhishek Singh <author@example.com>
 * @license  http://www.php.net/license/3_01.txt 
 * @link     http://pear.php.net/package/PackageName 
 * 
 * This is a "Docblock Comment," also known as a "docblock." 
 */
session_start();
require 'config.php';
require 'userclass.php';
$obj = new Config();
$data = $obj->connect();

$id = $_SESSION['userdata']['userid'];
$obje = new Userclass();
$msg = $obje->count_all_user_rides($data, $id);
$msg1 = $obje->count_all_at_comp_ride($data, $id);
$msg2 = $obje->count_all_pend_rides($data, $id);

if (empty($_SESSION['userdata'])) { 
    header('Location: login.php');
} else {
    echo '<h1><center>Welcome Dear Customer !!</center></h1>
    <center>'.$_SESSION['userdata']['username'].'<center>';

    if (!empty($_SESSION['ride'])) {
        $from = $_SESSION['ride']['from'];
        $to = $_SESSION['ride']['to'];
        $cabType = $_SESSION['ride']['cabType'];
        $weight = $_SESSION['ride']['weight'];
        $totalDistance = $_SESSION['ride']['dist'];
        $luggage = $_SESSION['ride']['luggage'];
        $fare = $_SESSION['ride']['totalfare'];
        $id = $_SESSION['userdata']['userid'];

        //print_r($_SESSION['ride']);
        $userob = new Userclass();
        if (isset($_SESSION['ride'])) {
            $msg = $userob->rideInsert($from, $to, $cabType, $weight, $totalDistance, $luggage, $fare, $id, $data);
            echo $msg;
            unset($_SESSION['ride']);
        }

    }


}   

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer-Dashboard</title>
    <link rel="stylesheet" type="text/css" href="style3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <header>
        <div class="container-fluid">
            <nav class="navbar navbar-light bg-light navbar-expand-lg ">
                <div class="navbar-header">
                    <a id="a1" href="#" class="navbar-brand">CED-<span id="cold">CAB</span></a>
                </div>
                <button class="navbar-toggler" data-toggle="collapse" data-target="#navbaritem"> 
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse ml-auto" id="navbaritem">
                    <ul class="navbar-nav ml-auto text-right">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">BOOK NOW</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">FEATURES</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">REVIEWS</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-custom-lg" id="btns" href="logout.php">LOG OUT</a>
                        </li>
                    </ul>
                </div>      
            </nav>
        </div>
    </header>
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 col-sm-12">
                    <div class="wrapper">
    <!-- Sidebar -->
                        <nav id="sidebar">
                            <div class="sidebar-header">
                                <h3>CED-CAB USER PANEL</h3>
                            </div>

                        <ul class="list-unstyled components">
                            <li>
                                <a href="#">About</a>
                            </li>
                            <li>
                                <a href="#page" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle abc">Rides</a>
                                <ul class="collapse list-unstyled" id="page">
                                    <li>
                                        <a href="userpendingride.php">Pending Rides</a>
                                    </li>
                                    <li>
                                        <a href="usercompleteride.php">Completed Rides</a>
                                    </li>
                                    <li>
                                        <a href="userallrides.php">All Rides</a>
                                    </li>
                                </ul>
                                <a href="#Submenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle abc">Account</a>
                                <ul class="collapse list-unstyled" id="Submenu">
                                    <li>
                                        <a href="updateuserinfo.php">Update Information</a>
                                    </li>
                                    <li>
                                        <a href="userchangepassword.php">Change Password</a>
                                    </li>
                                </ul>
                            </li>                           
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 mt-4 pr-6">
                <div class="card">
                <div class="card-body bg-danger">
                    <h5 class="card-title">YOUR TOTAL RIDES</h5>
                    <p class="card-text"><?php echo $msg; ?></p>
                    <a href="userallrides.php" class="btn btn-primary">CHECK MORE</a>
                </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 mt-4">
                <div class="card">
                <div class="card-body bg-success">
                    <h5 class="card-title">YOU COMPLETE RIDES</h5>
                    <p class="card-text"><?php echo $msg1; ?></p>
                    <a href="usercompleteride.php" class="btn btn-primary">CHECK MORE</a>
                </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 mt-4">
                <div class="card">
                <div class="card-body bg-warning">
                    <h5 class="card-title">YOUR PENDING RIDES</h5>
                    <p class="card-text"><?php echo $msg2; ?></p>
                    <a href="userpendingride.php" class="btn btn-primary">CHECK MORE</a>
                </div>
                </div>
            </div>
            </div>
        </div>
    </section>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>