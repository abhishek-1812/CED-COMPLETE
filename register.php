<?php
require 'config.php';
require 'userclass.php';
$obj = new Config();
$data = $obj->connect();


$errors = array();
$msg = '';

if (isset($_POST['submit'])) {
    $username = isset($_POST['username'])?$_POST['username']:'';
    $name = isset($_POST['name'])?$_POST['name']:'';
    $password = md5(isset($_POST['password'])?$_POST['password']:'');
    $repassword = md5(isset($_POST['repassword'])?$_POST['repassword']:'');
    $mobile = isset($_POST['mobile'])?$_POST['mobile']:'';

    if ($password==$repassword) {
        $con = new Userclass();
        $msg = $con->registration($username, $name, $password, $repassword, $mobile, $data);
    } else {
        $errors = array('input'=>'form','msg'=>'Password does not match');
    }


}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CED-CAB BOOKING USING PHP</title>
    <link rel="stylesheet" type="text/css" href="style4.css"> 
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Rancho&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    
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
                    <h1>REGISTER</h1>
                    <p class="text-muted"> Please Enter Your Details !</p>
                    <p> <?php echo $msg;?></p> 
                        <div id="error">
                            <?php if (sizeof($errors)>0) :?>
                                <ul>
                                <?php foreach ($errors as $error):?>
                                    <li><?php echo $errors['msg'];break?></li>
                                <?php endforeach;?>
                                </ul>
                            <?php endif;?>
                        </div>
                    <input type="text" name="username" placeholder="Username" required>
                    <input type="text" id="Name" name="name" placeholder="Name" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <input type="password" name="repassword" placeholder="Re-Password" required>
                    <input type="text" id="mob" name="mobile" placeholder="Mobile" required>
                    <input class="btn1" type="submit" name="submit" value="Submit"> 
                    <p>
                    Already have an account!
                    </p>
                    <p>
                        <a href= "login.php"><input class="btn1" type="submit" value="Log In"> </a> 
                    </p>              
                </form>
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

    <script>
        $(document).ready(function(){
            $("#Name").keypress(function(event) {
            var character = String.fromCharCode(event.keyCode);
            return isValid(character);     
        });

        function isValid(str) {
            return !/[~`!@.0-9#$%\^&*()+=\-\[\]\\';,/{}|\\":<>\?]/g.test(str);
        }
        $("#mob").keypress(function(event) {
            var character = String.fromCharCode(event.keyCode);
            return Valid(character);     
        });

        function Valid(str) {
            return !/[~`!@.a-zA-Z#$%\^&*()+=\-\[\]\\';,/{}|\\":<>\?]/g.test(str);
        }
    });
        </script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>