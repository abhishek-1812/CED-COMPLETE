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
$userob = new Userclass();
$msg  = $userob->displayLocation($data);


if (!empty($_SESSION['ride'])) {
      $from = $_SESSION['ride']['from'];
      $to = $_SESSION['ride']['to'];
      $cabType = $_SESSION['ride']['cabType'];
      $weight = $_SESSION['ride']['weight'];
      $totalDistance = $_SESSION['ride']['dist'];
      $luggage = $_SESSION['ride']['luggage'];
      $fare = $_SESSION['ride']['totalfare'];

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CedFare</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="style1.css"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Abel&family=Poiret+One&family=Tajawal:wght@200&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;500&display=swap" rel="stylesheet">   
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script> 
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
                <?php
                if (empty($_SESSION['userdata'])) {
                ?>                   
                <ul class="navbar-nav ml-auto text-right">
                    <li class="nav-item">
                      <a class="btn btn-custom-lg" id="btns" href="login.php?key=1">LOG IN</a>
                    </li>
                    <li class="nav-item">
                      <a class="btn btn-custom-lg ml-1" id="btns" href="register.php">SIGN UP</a>
                    </li>
                </ul>
                <?php
                } else {?>
                    <ul class="navbar-nav ml-auto text-right">
                        <li class="nav-item">
                        <a class="btn btn-custom-lg" id="btns" href="logout.php">LOG OUT</a>
                        </li>
                        <li class="nav-item">
                        <a class="btn btn-custom-lg ml-1" id="btns" href="userdash.php">DASHBOARD</a>
                        </li>
                     </ul>
                <?php }
                ?>
            </div>      
        </nav>
    </div>
</header>
<section>
    <div class="container-fluid forphoto">
        <div class="container text-center clr">
            <h1>Book a City Taxi to your Destination in Town</h1>
            <h5>Choose from a range of categories and prices !</h5>
        </div>
        <div class="card-body">
                <form id="contact">
                    <div class="row">
                        <div class="col-md-4 col-sm-12 c1 text-center">
                            <span class="taxi pr-2 pl-2">CITY TAXI</span>
                            
                            <p class="text-center bol">Your everyday travel partner</p>
                            <p class="text-center smll">AC Cabs for point to point travel</p>
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" id="spn1">PICK UP</span>
                                </div>
                                <select class="form-control mr-sm-2 s" id="pickup">
                                   
                                <?php
                                foreach ($msg as $key=>$val) {         
                                ?>
                                <option selected value="<?php echo $key;?>"><?php echo $key;?></option>                                  
                                    <?php
                                }
                                    ?>
                                     <option selected value="Choose">Choose</option>
                                </select>
                              </div>
                              <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" id="spn2">DROP</span>
                                </div>
                                <select class="form-control mr-sm-2 s" id="drop">
                                    
                                <?php
                                foreach ($msg as $key=>$val) {       
                                ?>
                                    <option selected value="<?php echo $key;?>"><?php echo $key;?></option>                                 
                                    <?php
                                }
                                    ?>
                                    <option selected value="Choose">Choose</option>
                                </select>
                              </div>
                              <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" id="spn3">CAB TYPE</span>
                                </div>
                                <select class="form-control mr-sm-2 s" id="cab">
                                    <option selected value="Choose">Choose</option>
                                    <option value="CedMicro">CedMicro</option>
                                    <option value="CedMini">CedMini</option>
                                    <option value="CedRoyal">CedRoyal</option>
                                    <option value="CedSUV">CedSUV</option>
                                  </select>
                              </div>
                              <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" id="spn4">LUGGAGE</span>
                                </div>
                                <input type="text" class="form-control a" placeholder="Enter Weight in KG" id="lug">
                              </div>
                            <div class="form-group mb-2">
                                <input class="btn btn-xl btn-block" id="b1" type="button" data-toggle="modal" data-target="#exampleModal" value="CALCULATE FARE">
                            </div>
                            <!-- 
                            <a href="userdash.php" class="btn btn-success bn mb-2" id="box" type="submit">BOOK NOW</a> -->
                        </div>
                        <!-- Modal -->
                        
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">TOTAL AMOUNT</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body text-center">
                                <p class="text-center" id="core"></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">CLOSE</button>
                                <a href="userdash.php" ><button type="button" class="btn btn-success">BOOK NOW</button></a>
                            </div>
                            </div>
                        </div>
                        </div>
                        <?php
                        if (!empty($_SESSION['ride'])) {
                        ?>
                        <div class="col-md-4 col-sm-12 c1 ml-3" id="invoice" >
                            <table class="table table-striped">
                                <tr>
                                <tr><th>FROM</th><td><?php echo $from;?></td></tr>
                                <tr><th>TO</th><td><?php echo $to;?></td></tr>
                                <tr><th>CAB-TYPE</th><td><?php echo $cabType;?></td></tr>
                                <tr><th>DISTANCE</th><td><?php echo $totalDistance;?></td></tr>
                                <tr><th>LUGGAGE (in kg)</th><td><?php echo $luggage;?></td></tr>
                                <tr><th>FARE</th><td><?php echo $fare;?></td></tr>
                                <tr><td><a href="userdash.php"><button type="button" class="btn btn-success">BOOK NOW</button></a></td><td><a href="cancelsess.php"><button type="button" id="cancel" class="btn btn-danger">CANCEL</button></a></td></tr>
                                </tr>
                            </table>
                        </div>                        
                        <?php
                        }
                        ?>
                        <div class="col-md-4 col-sm-12">
                        </div>
                    </div>
                </form>                       
            </div>              
        </div>
    </div>
</section>
<footer>
  <div class="container">
      <div class="row align-items-center pad">
          <div class="col-lg-4 my-3 my-lg-0">
              <a class="btn btn-dark btn-social mx-2" href="#"><i class="fab fa-twitter"></i></a>
              <a class="btn btn-dark btn-social mx-2" href="#"><i class="fab fa-facebook-f"></i></a>
              <a class="btn btn-dark btn-social mx-2" href="#"><i class="fab fa-instagram"></i></a>
          </div>
          <div class="col-lg-4 text-lg-center rs">
              <p id="ced">CED-<span>CAB</span></p>
              <p class="text-danger"><i class="fas fa-heart"></i>
              Crafted lovingly in CEDCOSS
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
  $('#cancel').click(function(){
    $('#invoice').hide();
  });
    
    $("#lug").keypress(function(event) {
    var character = String.fromCharCode(event.keyCode);
    return isValid(character);     
});

    function isValid(str) {
        return !/[~`!@.a-zA-Z#$%\^&*()+=\-\[\]\\';,/{}|\\":<>\?]/g.test(str);
    }
});
</script>    
    <script src="https://code.jquery.com/jquery-3.5.1.js"
    integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
    crossorigin="anonymous"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="script.js"></script>
</body>
</html>