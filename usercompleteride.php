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
$output='';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User-Dashboard</title>
    <link rel="stylesheet" type="text/css" href="style3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
</head>
<body class="id">
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
    <select name="" id="sort_com_app" class="sort">
            <option value="">SORT BY</option>
            <option value="ridedate">DATE</option>
            <option value="cabtype">CABTYPE</option>
            <option value="totaldist">DISTANCE</option>
        </select>
        <h2 class="text-center mt-5">COMPLETE RIDES</h2>
            <div class="container text-center">   
                <table class="table table-dark table-bordered" >
                    <tr>
                        <th>ID</th>
                        <th>RIDE DATE</th>
                        <th>FROM</th>
                        <th>TO</th>
                        <th>CAB-TYPE</th>
                        <th>DISTANCE</th>
                        <th>LUGGAGE</th>
                        <th>TOTAL FARE</th>
                        <th>USER-ID</th>
                    </tr>
                    <tbody id="data"></tbody>
                </table>
            </div>
    </section>
    <footer>
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
    function completeRideUser() {
    var action='usr_cmpl_data';
    var c_id = <?php echo $_SESSION['userdata']['userid']?>;
    $.ajax({
                url : 'ajaxaction.php',
                type : "POST",
                dataType :'json',
                data : {action:action ,id:c_id},               
                success : function (data) {
                var output;
                for(var i=0;i<data.length;i++) { 
                    output+= "<tr><td>" + data[i]['rideid'] + "</td><td>" + data[i]['ridedate'] + "</td><td>" + data[i]['from'] + "</td><td>" + data[i]['to'] + "</td><td>" + data[i]['cabtype'] + "</td><td>" + data[i]['totaldist'] + "</td><td>" + data[i]['luggage'] + "</td><td>" + data[i]['totalfare'] + "</td><td>"+data[i]['userid']+"</td></tr>";                        
                }
                $('#data').html(output); 
                }               
            });
        }
       completeRideUser();
       $('#sort_com_app').change(function(){
            var sort_ride = $(this).val();
            var id = <?php echo $_SESSION['userdata']['userid']?>;
            var action = 'sort_comp_user';
            $.ajax({
                url:'ajaxaction.php',
                type:'post',
                dataType : "json",
                data : {ride:sort_ride, action:action, id:id},
                success : function(data) {
                    var output;
                for(var i=0;i<data.length;i++) { 
                    output+= "<tr><td>" + data[i]['rideid'] + "</td><td>" + data[i]['ridedate'] + "</td><td>" + data[i]['from'] + "</td><td>" + data[i]['to'] + "</td><td>" + data[i]['cabtype']+"</td><td>" + data[i]['totaldist'] + "</td><td>" + data[i]['luggage'] + "</td><td>" + data[i]['totalfare'] + "</td><td>"+data[i]['userid']+"</td></tr>";                        
                }
                $('#data').html(output); 
                }
            })
        });

      
    });
</script>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html> 