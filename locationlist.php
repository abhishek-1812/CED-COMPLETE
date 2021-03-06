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
$usrobjects = new Userclass();
$msg = $usrobjects->locationList($data);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-Dashboard</title>
    <link rel="stylesheet" type="text/css" href="style3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
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
    </header>
    <section>
        <h2 class="text-center mt-4">LOCATION LIST</h2>
        <div class="conatiner text-center">
   
            <table class="table table-dark table-bordered" >
            <tr>
                    <th>ID</th>
                    <th>PLACE</th>
                    <th>DISTANCE</th>
                    <th>AVAILABILTIY</th>
                    <th>ACTION</th>
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
    function locationList() {
    var action='location_data';
    $.ajax({
                url : 'ajaxaction.php',
                type : "POST",
                dataType :'json',
                data : {action:action},               
                success : function (data) {
                var output;
                for(var i=0;i<data.length;i++) {
                  var status;
                  if(data[i]['isavail']==0) {
                    status = "NOT-AVAILABLE";
                  }  else  if(data[i]['isavail']==1) { 
                    status = "AVAILABLE";
                  }
                    output+= "<tr><td>" + data[i]['lid'] + "</td><td>" + data[i]['name'] + "</td><td>" + data[i]['distance'] + "</td><td>" + status + "</td><td><input type='submit' class='btn btn-secondary' value='EDIT' id='appbtn' data-eid=" + data[i]['lid'] + "><input type='submit' class='btn btn-danger ml-2' value='DELETE' id='delbtn' data-did=" + data[i]['lid'] + "></td></tr>";                        
                }
                $('#data').html(output); 
                }               
            });
        }
       locationList() ;

       $(document).on("click",'#appbtn', function(){
            var id = $(this).data("eid");
            var element=this;
            var action ='edit_btn_for_location';
            $.ajax({
                url : 'ajaxaction.php',
                type : "POST",
                data : {id:id, action:action},
                success : function (data) {
                  if(data=='AVAILABLE' || data == 'UNAVAILABLE'){
                    locationList();
                    $(element).closest("tr").fadeOut();
                   } else {
                     alert(data);
                   }
                }
            });
        })
            
            $(document).on("click",'#delbtn', function(){
            if(confirm("Are you sure you want to delete ?")==true ){
            var id = $(this).data("did");
            var element=this;
            var action ='del_btn_for_location';
            $.ajax({
                url : 'ajaxaction.php',
                type : "POST",
                data : {id:id, action:action},
                success : function (data) {
                  if(data==1){
                    locationList();
                    $(element).closest("tr").fadeOut();
                   } else {
                     alert(data);
                   }
                }
            });
        }
      }); 
    });
</script>
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>