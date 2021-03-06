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

$uid = $_SESSION['userdata']['userid'];


if (isset($_POST['submit'])) {
    $name = isset($_POST['name'])?$_POST['name']:'';
    $mobile = isset($_POST['mobile'])?$_POST['mobile']:'';
    
    $userobj = new Userclass();
    $msg = $userobj->userchangeinfo($name, $mobile, $uid, $data);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>
        LOGIN
    </title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Rancho&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
</head>
<body>
<header>
<div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">CED-<span id="cold">CAB</span></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="userdash.php">HOME<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          RIDES
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="userpendingride.php">Pending Rides</a>
          <a class="dropdown-item" href="usercompleteride.php">Completed Rides</a>
          <a class="dropdown-item" href="userallrides.php">All Rides</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          ACCOUNT
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="updateuserinfo.php">Update Information</a>
          <a class="dropdown-item" href="userchangepassword.php">Change Password</a>
          <a class="dropdown-item" href="logout.php">Log Out</a>
        </div>
      </li>
    </ul>
  </div>
</nav>
    </div>
    </header>
    <section>    
        <div class="container mt-3" id="wrapper">
            <?php echo $msg;?>
            <div id="login-form">
                <form action="" method="POST">
                <p>
                    <input type="text" id="pass" name="name" placeholder="name" required>
                </p>
                <p>
                    <input type="text" id="mob" name="mobile" placeholder="mobile" required>
                </p>
                <p>
                    <input class="btn" type="submit" name="submit" value="Submit">
                </p>
            </form>
            </div>
        </div>
    </section>
    <!-- <footer>
  <div class="container-fluid">
      <div class="row align-items-center pad">
          <div class="col-lg-4 my-3 my-lg-0">
              <a class="btn btn-dark btn-social mx-2" href="#"><i class="fab fa-twitter"></i></a>
              <a class="btn btn-dark btn-social mx-2" href="#"><i class="fab fa-facebook-f"></i></a>
              <a class="btn btn-dark btn-social mx-2" href="#"><i class="fab fa-instagram"></i></a>
          </div>
          <div class="col-lg-4 text-lg-center rs">
              <p id="ced">CED-<span>CAB</span></p>
              <p class="text-danger"><i class="fas fa-heart"></i>
              Crafted lovingly with Pagecloud.
          </div>
          <div class="col-lg-4 text-lg-right">
              <a class="mr-3 text-muted" href="#!">Features</a>
              <a class="mr-3 text-muted" href="#!">Reviews</a>
              <a class="mr-3 text-muted" href="#!">Sign up</a>
          </div>
      </div>
  </div>
</footer> -->
    <script>
    $(document).ready(function(){   
        $("#pass").keypress(function(event) {
        var character = String.fromCharCode(event.keyCode);
        return isValid(character);     
        });

        function isValid(str) {
            return !/[~`.!@#$%\^&*()+=\-\[\]\\';0123456789,/{}|\\":<>\?]/g.test(str);
        }
        $("#mob").keypress(function(event) {
        var character = String.fromCharCode(event.keyCode);
        return Valid(character);     
        });

        function Valid(str) {
            return !/[~`.!a-z@#$%\^&*()+=\-\[\]\\';,/{}|\\":<>\?]/g.test(str);
        }
      })
    </script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>