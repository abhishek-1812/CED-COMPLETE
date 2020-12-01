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
$msg='';
$output='';


if (empty($_SESSION['userdata'])) { 
    header('Location: login.php');
} else {
    echo '<h1><center>Welcome Admin !!</center></h1>
    <center>'.$_SESSION['userdata']['username'].'<center>';

    $obj = new Userclass();
    $msg = $obj->count_all_rides($data);
    $msg1 = $obj->count_all_users($data);
    $msg2 = $obj->count_all_locations($data);
    $earning = $obj->totalEarning($data);
}    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-Dashboard</title>
    <link rel="stylesheet" type="text/css" href="style3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="id">
    <header>
    <div class="container-fluid">
        <nav class="navbar navbar-light bg-light navbar-expand-lg">
            <div class="navbar-header">
                <a id="a1" href="#" class="navbar-brand">CED-CAB</a>
            </div>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#navbaritem"> 
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse ml-auto" id="navbaritem">
                <ul class="navbar-nav ml-auto text-right">
                    <li class="nav-item">
                        <a class="nav-link" href="#">FEATURES</a>
                      </li>
                      <li class="nav-item ">
                        <a class="nav-link" href="#">REVIEWS</a>
                      </li>
                      <li class="nav-item ">
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
    
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3>CED-CAB ADMIN PANEL</h3>
        </div>

        <ul class="list-unstyled components">
            <li>
                <a href="#" active>Home</a>
            </li>
            <li>
                <a href="#page" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle">Locations</a>
                <ul class="collapse list-unstyled" id="page">
                    <li>
                        <a href="locationlist.php">Location List</a>
                    </li>
                    <li>
                        <a href="location.php">Add Location</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#Submenu" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle">Users</a>
                <ul class="collapse list-unstyled" id="Submenu">
                    <li>
                        <a href="pendinguser.php">Pending user request</a>
                    </li>
                    <li>
                        <a href="approveduser.php">Approved User Request</a>
                    </li>
                    <li>
                        <a href="allusers.php">All Users</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#menu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Rides</a>
                <ul class="collapse list-unstyled" id="menu">
                    <li>
                        <a href="requestride.php">Pending Rides</a>
                    </li>
                    <li>
                        <a href="completedride.php">Completed Rides</a>
                    </li>
                    <li>
                        <a href="cancelride.php">Cancelled Rides</a>
                    </li>
                    <li>
                        <a href="allride.php">All Rides</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="changepassword.php">Change Password</a>
            </li>
        </ul>
    </nav>
</div>
    </div>
    <div class="col-9 mt-4">
    <div class="row">
        <div class="col-md-3  mt-4">
            <div class="card">
                <div class="card-body bg-danger">
                    <h5 class="card-title">TOTAL RIDES</h5>
                    <p class="card-text bg-light"><?php echo $msg; ?></p>
                    <a href="allride.php" class="btn btn-primary">CHECK MORE</a>
                </div>
            </div>
        </div>
        <div class="col-md-3 mt-4">
            <div class="card">
                <div class="card-body bg-success">
                    <h5 class="card-title">TOTAL USERS</h5>
                    <p class="card-text bg-light"><?php echo $msg1; ?></p>
                    <a href="allusers.php" class="btn btn-primary">CHECK MORE</a>
                </div>
            </div>
        </div>
        <div class="col-md-3 mt-4">
            <div class="card">
                <div class="card-body bg-warning">
                    <h5 class="card-title">LOCATIONS</h5>
                    <p class="card-text bg-light"><?php echo $msg2; ?></p>
                    <a href="locationlist.php" class="btn btn-primary">CHECK MORE</a>
                </div>
            </div>
        </div>
        <?php
            $disp = 0;
        foreach ($earning as $val) {
            $disp+= $val['totalfare']; 
        }
                //echo $disp;
            ?>
        <div class="col-md-3  mt-4">
            <div class="card">
                <div class="card-body bg-secondary">
                    <h5 class="card-title">TOTAL EARNING</h5>
                    <p class="card-text bg-light"><?php echo $disp; ?></p>
                    <a href="#" class="btn btn-primary">IN INR</a>
                </div>
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