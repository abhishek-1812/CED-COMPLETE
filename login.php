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

// $userCook = $_COOKIE['username'];
// $passCook = $_COOKIE['pass'];

if (isset($_POST['submit'])) {

    $username = isset($_POST['username'])?$_POST['username']:'';
    $modpassword = isset($_POST['password'])?$_POST['password']:'';
    $password = md5($modpassword);
    // if (!empty($_POST['check'])) {
    //     setcookie("username", $username, time()+(10*365*24*60*60));
    //     setcookie("pass", $modpassword, time()+(10*365*24*60*60));
    // }
    //$check  = isset($_POST['check'])?$_POST['check']:'';
    $userobj = new Userclass();
    $msg = $userobj->login($username, $password, $data);


}
?>
<!DOCTYPE html>
<html>
<head>
    <title>
        LOGIN
    </title>
    <link rel="stylesheet" type="text/css" href="style4.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Rancho&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<header>
<div class="container-fluid">
        <nav class="navbar navbar-light bg-light navbar-expand-lg mt-2 ">
            <div class="navbar-header">
                <a id="a1" href="#" class="navbar-brand">CED-<span id="cold">CAB</span></a>
            </div>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#navbaritem"> 
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse ml-auto" id="navbaritem">
                <ul class="navbar-nav ml-auto text-right">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">HOME</a>
                    </li>
                </ul>
            </div>      
        </nav>
    </div>
</header>
<section>
<div class="container-fluid">
    <div class="row clss">
        <div class="col-md-3"></div>   
        <div class="col-md-6">
            <div class="card text-center abs">          
                <form class="box" action="" method="post">
                    <h1>Login</h1>
                    <p class="text-muted"> Please Enter Your Username and Password !</p>
                    <p> <?php echo $msg;?></p> 
                    <input type="text" name="username" placeholder="Username" required> 
                    <input type="password" name="password" placeholder="Password" required> 
                    <input type="submit" class="btn" name="submit" value="Login">
                   
                </form>
                <p>
                    Don't have account?
                </p>
                <p>
                    <a href= "register.php"><input type="submit" class="btns1" value="SIGN UP"></a>
                </p>
            </div>
        </div>
    </div>
</div>
</section>
<footer>
  <div class="container-fluid">
      <div class="row align-items-center">
          <div class="col-lg-4 my-3 my-lg-0">
              <a class="btn btn-dark btn-social mx-2" href="#"><i class="fab fa-twitter"></i></a>
              <a class="btn btn-dark btn-social mx-2" href="#"><i class="fab fa-facebook-f"></i></a>
              <a class="btn btn-dark btn-social mx-2" href="#"><i class="fab fa-instagram"></i></a>
          </div>
          <div class="col-lg-4 text-lg-center rs">
              <p id="ced">CED-<span>CAB</span></p>
              <p class="text-danger"><i class="fas fa-heart"></i>
              Crafted lovingly in CEDCOSS.
          </div>
          <div class="col-lg-4 text-lg-right">
              <a class="mr-3 text-muted" href="#!">Features</a>
              <a class="mr-3 text-muted" href="#!">Reviews</a>
              <a class="mr-3 text-muted" href="#!">Sign up</a>
          </div>
      </div>
  </div>
</footer>

    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>