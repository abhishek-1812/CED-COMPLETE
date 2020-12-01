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
 * This is a "Docblock Comment," also known as a "docblock."  The class'
 * docblock, below, contains a complete description of how to write these.
 */
session_start();
require 'config.php';
require 'userclass.php';
$obj = new Config();
$data = $obj->connect();
$msg='';
// $errors = array();

if (isset($_POST['submit'])) {
    $name = isset($_POST['lname'])?$_POST['lname']:'';
    $km = isset($_POST['distance'])?$_POST['distance']:'';
    $isavail = isset($_POST['avail'])?$_POST['avail']:'';
  
    $userobject = new Userclass();
    $msg = $userobject->enterLocation($name, $km, $isavail, $data);
    // echo $msg;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>
        LOCATION
    </title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Rancho&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <header>
        
        <div class="container-fluid mt-2">
        
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
                        <a class="nav-link" href="admindash.php">BACK</a>
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
    <p>ADD LOCATION</p>
    </header>
    <section>
        <div id="wrapper">
        <?php echo $msg;?>
            <div id="login-form">
                <form action="location.php" method="POST">
                <p>                          
                    <input type="text" name="lname" placeholder="Location" required>
                </p>
                <p>
                    <input type="number" name="distance" placeholder="Distance in KM" required>
                </p>
                <p>
                    <input type="text" name="avail" placeholder="is available" required>
                </p>
                <p>
                    <input class="btn" type="submit" name="submit" value="Submit">
                </p>
            </form>
            </div>
        </div>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>