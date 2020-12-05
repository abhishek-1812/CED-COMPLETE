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


if (isset($_POST['submit'])) {
    $name = isset($_POST['lname'])?$_POST['lname']:'';
    $km = isset($_POST['distance'])?$_POST['distance']:'';
    $isavail = isset($_POST['avail'])?$_POST['avail']:'';
  
    $userobject = new Userclass();
    $msg = $userobject->enterLocation($name, $km, $isavail, $data);
    
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
        <a class="nav-link" href="admindash.php">HOME<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          LOCATION
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="location.php">Add Location</a>
          <a class="dropdown-item" href="locationlist.php">Location List</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          USERS
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="pendinguser.php">Pending Users</a>
          <a class="dropdown-item" href="approveduser.php">Approved Users</a>
          <a class="dropdown-item" href="allusers.php">All Users</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          RIDES
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="requestride.php">Pending Rides</a>
          <a class="dropdown-item" href="completedride.php">Completed Rides</a>
          <a class="dropdown-item" href="cancelride.php">Cancelled Rides</a>
          <a class="dropdown-item" href="allride.php">All Rides</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          ACCOUNT
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="changepassword.php">Change Password</a>
        </div>
      </li>
    </ul>
  </div>
</nav>
    </div>
    <p>
    ADD LOCATION
    </p>
    </header>
    <section>
        <div id="wrapper">
        <?php echo $msg;?>
            <div id="login-form">
                <form action="location.php" method="POST">
                <p>                          
                    <input type="text" id="name" name="lname"  placeholder="Location" required>
                </p>
                <p>
                    <input type="text" id="dist" name="distance" placeholder="Distance in KM" required>
                </p>
                <p>
                    <input type="text" id="ava" name="avail" placeholder="is available" required>
                </p>
                <p>
                    <input class="btn" type="submit" name="submit" value="Submit">
                </p>
            </form>
            </div>
        </div>
    </section>
    <script>
      $(document).ready(function(){     
        $("#name").keypress(function(event) {
        var character = String.fromCharCode(event.keyCode);
        return isValid(character);     
        });

        function isValid(str) {
            return !/[~`!.0-9@#$%\^&*()+=\-\[\]\\';,/{}|\\":<>\?]/g.test(str);
        }

        $("#dist").keypress(function(event) {
        var character = String.fromCharCode(event.keyCode);
        return isValid(character);     
        });

        function isValid(str) {
            return !/[~`!.a-z@#$%\^&*()+=\-\[\]\\';,/{}|\\":<>\?]/g.test(str);
        }
        $("#ava").keypress(function(event) {
        var character = String.fromCharCode(event.keyCode);
        return isValid(character);     
        });

        function isValid(str) {
            return !/[~`!.a-z@#$%\^&*()+=\-\[\]\\';,/{}|\\":<>\?]/g.test(str);
        }
      })
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>