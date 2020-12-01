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

class Userclass
{
    public $userid;
    public $username;
    public $name;
    public $password;
    public $repassword;
    public $mobile;
    public $con;
    public $count=0;

    public function registration($username, $name, $password, $repassword, $mobile, $data)
    {

        $u = 'SELECT * FROM user WHERE username="'.$username.'"';
        $un = mysqli_query($data, $u);
        $unamecount = mysqli_num_rows($un);
        if ($unamecount>0) {
            return 'username already exist';
        }

        $sql = "INSERT INTO user (`username`,`name`,`date`, `password`, `mobile`,`isblock`,`isadmin`)
        VALUES ('".$username."','".$name."', NOW(), '".$password."','".$mobile."' ,'0', '0')";
            
        if ($data->query($sql) === true) {    
            return 'New Record added succesfully';  
        } else {
             return 'Error';
        }
            return $errors;
            $data->close(); 
        
    }
    public function login($username, $password,$data)
    {
        $sql= "SELECT * FROM user WHERE 
        `username`='$username' AND `password`='$password'"; 
        
        $res = $data->query($sql);
        if ($res->num_rows >0) {
            while ($row = $res->fetch_array()) {
                if ($row['isadmin']=='1') {
                    $_SESSION['userdata']=array('username' => $row['username'],
                    'userid' => $row['userid'],'isadmin'=>$row['isadmin'],'isblock'=>$row['isblock']);
                    header('Location: admindash.php');
                }  else if($row['isblock']==1) {
                    $_SESSION['userdata']=array('username' => $row['username'],
                    'userid' => $row['userid'],'isadmin'=>$row['isadmin']);
                    
                    header('Location: userdash.php');
                }  
            }
        } else {
            return 'Invalid User Detail';    
        }
        $data->close();
    }
    public function rideInsert($from, $to, $cab, $weight, $totalDistance, $lugg, $fare, $id, $data)
    {
        $sql = "INSERT INTO ride (`ridedate`,`from`,`to`,`cabtype`, `totaldist`, `luggage`,`totalfare`,`status`,`userid`)
        VALUES (NOW(),'".$from."','".$to."','".$cab."','".$totalDistance."','".$weight."', '".$fare."', '1','".$id."')";

        if ($data->query($sql) === true) {  
            echo'<script>alert("Your Request has been Processed!")</script>';    
        } else {
            return 'Error';
        }
        //return $errors;
        $data->close(); 
    }
    public function enterLocation($name, $km, $isavail, $data)
    {
        $sql = "INSERT INTO `locationtbl` (`name`,`distance`,`isavail`) VALUES 
        ('$name','$km','$isavail')";

        if ($data->query($sql) === true) {  
            return 'Location added succesfully';    
        } else {
            return 'Error';
        }
        $data->close(); 
    }
    public function request($data)
    {
        $sql = "SELECT * FROM  ride WHERE `status`= 1";
        $result = $data->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $dat[]=$row;
            }
            return $dat;
        } else {
            return 'No data Found';
        }
    }
    public function locationList($data)
    {
        $sql = "SELECT * FROM  locationtbl";
        $result = $data->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $dat[]=$row;
            }
            return json_encode($dat);
        } else {
            return 'No data Found';
        }
    }
    public function changepass($username, $password, $data)
    {
        $sql = "UPDATE user SET `password`='".$password."' WHERE `username`='".$username."'";

        $result = $data->query($sql);
        if ($result) {
            echo'<script>alert("PASSWORD CHANGED !")</script>';
            //header("Location:login.php"); 
        } else {
            return 'Error';
        }
    }
    public function userchangepass($username, $password, $data)
    {
        $sql = "UPDATE user SET `password`='".$password."' WHERE `username`='".$username."'";

        $result = $data->query($sql);
        if ($result) {
            echo'<script>alert("PASSWORD CHANGED !")</script>';
            //header("Location:login.php"); 
        } else {
            return 'Error';
        }
    }
    public function fatch_data($data)
    {
        $sql = "SELECT * FROM  ride where `status` = 1";
        $result = $data->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $dat[]=$row;
            }
            return json_encode($dat);
        } else {
            return 0;
        }
    }
    public function comp_ride_data($data)
    {   
        $sql = "SELECT * FROM  ride WHERE `status`=2";
        $result = $data->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $dat[]=$row;
            }
            return json_encode($dat);
        } else {
            return 0;
        }
    }
    public function canc_ride_data($data)
    {   
        $sql = "SELECT * FROM  ride WHERE `status`=3";
        $result = $data->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $dat[]=$row;
            }
            return json_encode($dat);
        } else {
            return 0;
        }
    }
    public function all_ride_data($data)
    {   
        $sql = "SELECT * FROM  ride";
        $result = $data->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $dat[]=$row;
            }
            return json_encode($dat);
        } else {
            return 0;
        }
    }
    public function allusers($data)
    {
        $sql = "SELECT * FROM  user WHERE `isadmin`='0'";
        $result = $data->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $dat[]=$row;
            }
            return $dat;
        } else {
            return 'No data Found';
        }
    }
    public function edit_btn_for_ride($id, $data)
    {   
        $output;
        $sql = "UPDATE `ride` SET `status`= '2'  WHERE `rideid`='$id' ";
        if ($data->query($sql) === true) {
            $output =  1;
        } else {
            $output =  "Error updating record: " . $data->error;
        }
          return $output;

    }
    public function del_btn_for_ride($id, $data)
    {
        $output;
        $sql = "UPDATE `ride` SET `status`= '3'  WHERE `rideid`='$id'";
        if ($data->query($sql) === true) {
            $output =  1;
          } else {
            $output =  "Error updating record: " . $data->error;
          }
          return $output;

    }
    public function del_btn_for_all_ride($id, $data )
    {
        $sql = "DELETE FROM ride WHERE `rideid` = '$id'";

        if ($data->query($sql) === true) {
            $out = 1;
        } else {
            $out =  "Error deleting record: " . $data->error;
        }
        return $out;
    }
    public function pending_data($data)
    {
        $sql = "SELECT * FROM  user WHERE `isblock`=0";
        $result = $data->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $dat[]=$row;
            }
            return json_encode($dat);
        } else {
            return 'No data Found';
        }
    }
    public function del_btn_for_app_users($id, $data )
    {
        $sql = "DELETE FROM user WHERE `userid` = '$id'";

        if ($data->query($sql) === true) {
            $out = 1;
        } else {
            $out =  "Error deleting record: " . $data->error;
        }
        return $out;
    }
    public function edit_btn_app_users($id, $data)
    {
        $output;
        $sql = "UPDATE `user` SET `isblock`= '1'  WHERE `userid`='$id' ";
        if ($data->query($sql) === true) {
            $output =  1;
        } else {
            $output =  "Error updating record: " . $data->error;
        }
          return $output;

    }
    public function approved_data($data)
    {
        $sql = "SELECT * FROM  user WHERE `isblock`=1";
        $result = $data->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $dat[]=$row;
            }
            return json_encode($dat);
        } else {
            return 'No data Found';
        }
    }
    public function del_btn_for_approved_users($id, $data )
    {
        $sql = "DELETE FROM user WHERE `userid` = '$id'";

        if ($data->query($sql) === true) {
            $out = 1;
        } else {
            $out =  "Error deleting record: " . $data->error;
        }
        return $out;
    }
    public function userchangeinfo($name, $mobile, $uid, $data)
    {
        $sql = "UPDATE user SET `name`='".$name."', `mobile`='".$mobile."' WHERE `userid`='".$uid."'";

        $result = $data->query($sql);
        if ($result) {
            echo'<script>alert("INFO CHANGED !")</script>';
            
        } else {
            return 'Error';
        }    
    }
    public function pending_ride_user($data, $id)
    {
        $sql = "SELECT * FROM  ride WHERE `status`=1 AND `userid`='".$id."'";
        $result = $data->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $dat[]=$row;
            }
            return json_encode($dat);
        } else {
            return 0;
        }
    }
    public function usr_compl_data($data, $id)
    {
        $sql = "SELECT * FROM  ride where `status` =2 AND `userid`='".$id."'" ;
        $result = $data->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $dat[]=$row;
            }
            return json_encode($dat);
        } else {
            return 0;
        }
    }
    public function usr_all_data($data, $id)
    {
        $sql = "SELECT * FROM  ride where `userid`='".$id."'" ;
        $result = $data->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $dat[]=$row;
            }
            return json_encode($dat);
        } else {
            return 0;
        }
    }
    public function count_all_rides($data)
    {
        $sql = "SELECT * FROM  ride" ;
        $result = $data->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $count = $result->num_rows;
            }
            return $count;
        } else {
            return 0;
        }
    }
    public function count_all_users($data)
    {
        $sql = "SELECT * FROM  user" ;
        $result = $data->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $count = $result->num_rows;
            }
            return $count;
        } else {
            return 0;
        }
    }
    public function count_all_locations($data)
    {
        $sql = "SELECT * FROM  locationtbl" ;
        $result = $data->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $count = $result->num_rows;
            }
            return $count;
        } else {
            return 0;
        }
    }
    public function count_all_user_rides($data, $id)
    {
        $sql = "SELECT * FROM  ride WHERE `userid`='".$id."'";
        $result = $data->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $count = $result->num_rows;
            }
            return $count;
        } else {
            return 0;
        } 
    }
    public function count_all_at_comp_ride($data, $id)
    {
        $sql = "SELECT * FROM  ride WHERE `status`=2 AND `userid`='".$id."'" ;
        $result = $data->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $count = $result->num_rows;
            }
            return $count;
        } else {
            return 0;
        } 
    }
    public function count_all_pend_rides($data, $id)
    {
        $sql = "SELECT * FROM  ride WHERE `status`=1 AND `userid`='".$id."'" ;
        $result = $data->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $count = $result->num_rows;
            }
            return $count;
        } else {
            return 0;
        } 
    }
    public function sort_ride($data, $ride_sort)
    {
        $sql = "SELECT * FROM  ride  ORDER BY `$ride_sort` DESC" ;
        $result = $data->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $dat[]=$row;
            }
            return json_encode($dat);
        } else {
            return 0;
        }

    }
    public function sort_user_ride($data, $ride_sort, $id)
    {
        $sql = "SELECT * FROM  ride WHERE `userid`='".$id."'  ORDER BY `$ride_sort` DESC" ;
        $result = $data->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $dat[]=$row;
            }
            return json_encode($dat);
        } else {
            return 0;
        }
    }
    public function del_btn_for_location($id, $data)
    {
        $sql = "DELETE FROM locationtbl WHERE `lid` = '$id'";

        if ($data->query($sql) === true) {
            $out = 1;
        } else {
            $out =  "Error deleting record: " . $data->error;
        }
        return $out;
    }

    public function totalEarning($data)
    {
        $sql = "SELECT * FROM  ride ";
        $result = $data->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $dat[]=$row;
            }
            return $dat;
        } else {
            return 0;
        }
    }
    public function invoice_ride($id, $data)
    {
        $sql = "SELECT * FROM  ride WHERE `rideid`='".$id."' ";
        $result = $data->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $dat[]=$row;
            }
            return json_encode($dat);
        } else {
            return 0;
        }
    }
}
?>