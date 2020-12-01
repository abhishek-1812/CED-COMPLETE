<?php
/**
 * Short description for code
 * php version 7.2.10
 * 
 * @category Category_Name
 * @package  PackageName
 * @author   Original Author <author@example.com>
 * @license  http://www.php.net/license/3_01.txt 
 * @link     http://pear.php.net/package/PackageName 
 * 
 * This is a "Docblock Comment," also known as a "docblock."
 */ 
session_start();

    global $pickVal;
    global $dropVal;
    global $kiloMtr;
    global $fareWeight;
    global $pick;
    global $drop;
    global $cab;
    global $rate;
    global $far;
    global $fare;

    $fareWeight=0;  
    $far=0; 
    $fare =0;

    $pick = $_REQUEST['pickUp'];
    $drop = $_REQUEST['drop'];
    $cab = $_REQUEST['cab'];
    $rate = $_POST['rate'];

    // sess($pick, $drop, $cab, $rate);

    $distance = array(
        'charbagh'=>'0',
        'Indira Nagar'=>'10',
        'BBD'=>'30',
        'Barabanki'=>'60',
        'Faizabad'=>'100',
        'Basti'=>'150',
        'Gorakhpur'=>'210');

    // calculating distance
        
    foreach ($distance as $key=>$val) {
        if ($key==$pick) {
            $pickVal = $val;
        }
    }
    foreach ($distance as $key1=>$val1) {
        if ($key1==$drop) {
            $dropVal = $val1;
        }
    }
    $kiloMtr =abs($pickVal-$dropVal);
    // sess($kiloMtr);

    // total luggae fare

    if (($rate =='') && ($rate < 10)) {
        $fareWeight = 0;

    } else if ($rate <= 10) {
        $fareWeight = 50;
        
    } else if (($rate >10) && ($rate <= 20) ) {
        $fareWeight = 100;
        
    } else {
        $fareWeight = 200;
        
    }

    //cab fare

    switch($cab){

    case "CedMicro":
        if ($kiloMtr<=10) {
            $fare = ($kiloMtr*13.5)+50;
            echo ("Price - ".$fare." /-") ;
            //echo("<p class='text-light'>Thankyou for Your trust !</p>");

        } else if (($kiloMtr>10)&& ($kiloMtr<=60)) {
            $kiloMtr = $kiloMtr-10;
            $fare = (10*13.50)+$kiloMtr*12+50;
            echo ("Price - ".$fare." /-") ;
            //echo("<p class='text-light'>Thankyou for Your trust !</p>");

        } else if (($kiloMtr>60)&&($kiloMtr<=160)) {
            $kiloMtr = $kiloMtr-60;
            $fare = (10*13.50)+(50*12)+$kiloMtr*10.20+50;
            echo ("Price - ".$fare." /-") ;
            //echo("<p class='text-light'>Thankyou for Your trust !</p>");

        } else {
            $kiloMtr = $kiloMtr-160;
            $fare = (10*13.50)+(50*12)+(100*10.20)+$kiloMtr*8.50+50;
            echo ("Price - ".$fare." /-") ; 
            //echo("<p class='text-light'>Thankyou for Your trust !</p>");  
        }
        break;

    case "CedMini":
        if ($kiloMtr<=10) {
            $far = ($kiloMtr*14.50)+150;
            $fare=($far+$fareWeight);
            echo ("Price - ".($fare)." /-");
            //echo("<p class='text-light'>Thankyou for Your trust !</p>");

        } else if (($kiloMtr>10)&& ($kiloMtr<=60)) {
            $kiloMtr = $kiloMtr-10;
            $far = (10*14.50)+$kiloMtr*13+150;
            $fare=($far+$fareWeight);
            echo ("Price - ".($fare)." /-");
            //echo("<p class='text-light'>Thankyou for Your trust !</p>");

        } else if (($kiloMtr>60)&&($kiloMtr<=160)) {
            $kiloMtr = $kiloMtr-60;
            $far = (10*14.50)+(50*13)+$kiloMtr*11.20+150;
            $fare=($far+$fareWeight);
            echo ("Price - ".($fare)." /-");
            //echo("<p class='text-light'>Thankyou for Your trust !</p>");

        } else {
            $kiloMtr = $kiloMtr-160;
            $far = (10*14.50)+(50*13)+(100*11.20)+$kiloMtr*9.50+150;
            $fare= ($far+$fareWeight); 
            echo ("Price - ".($fare)." /-");
            //echo("<p class='text-light'>Thankyou for Your trust !</p>");
        }

        break;

    case "CedRoyal":
        if ($kiloMtr<=10) {
            $far = ($kiloMtr*15.50)+200;
            $fare= ($far+$fareWeight);
            echo ("Price - ".($fare)." /-");
            //echo("<p class='text-light'>Thankyou for Your trust !</p>");

        } else if (($kiloMtr>10)&& ($kiloMtr<=60)) {
            $kiloMtr = $kiloMtr-10;
            $far = (10*15.50)+$kiloMtr*14+200;
            $fare = ($far+$fareWeight);
            echo ("Price - ".($fare)." /-");
            //echo("<p class='text-light'>Thankyou for Your trust !</p>");

        } else if (($kiloMtr>60)&&($kiloMtr<=160)) {
            $kiloMtr = $kiloMtr-60;
            $far = (10*15.50)+(50*14)+$kiloMtr*12.20+200;
            $fare = ($far+$fareWeight);
            echo ("Price - ".($fare)." /-");
            //echo("<p class='text-light'>Thankyou for Your trust !</p>");

        } else {
            $kiloMtr = $kiloMtr-160;
            $far = (10*15.50)+(50*14)+(100*12.20)+$kiloMtr*10.50+200;
            $fare= ($far+$fareWeight); 
            echo ("Price - ".($fare)." /-");
            //echo("<p class='text-light'>Thankyou for Your trust !</p>"); 
        }
        
        break;

    case "CedSUV":
        if ($kiloMtr<=10) {
            $far = ($kiloMtr*16.50)+250;
            $fare= ($far+(2*$fareWeight));
            echo ("Price - ".($fare)." /-");
            //echo("<p class='text-light'>Thankyou for Your trust !</p>");

        } else if (($kiloMtr>10)&& ($kiloMtr<=60)) {
            $kiloMtr = $kiloMtr-10;
            $far = (10*16.50)+$kiloMtr*15+250;
            $fare= ($far+(2*$fareWeight));
            echo ("Price - ".($fare)." /-");
            //echo("<p class='text-light'>Thankyou for Your trust !</p>");

        } else if (($kiloMtr>60)&&($kiloMtr<=160)) {
            $kiloMtr = $kiloMtr-60;
            $far = (10*16.50)+(50*15)+$kiloMtr*13.20+250;
            $fare= ($far+(2*$fareWeight));
            echo ("Price - ".($fare)." /-");
            //echo("<p class='text-light'>Thankyou for Your trust !</p>");

        } elseif ($kiloMtr>160) {
            $kiloMtr = $kiloMtr-160;
            $far = (10*16.50)+(50*15.00)+(100*13.20)+($kiloMtr*11.50)+250;
            $fare= ($far+(2*$fareWeight));
            echo ("Price - ".($fare)." /-");
            //echo("<p class='text-light'>Thankyou for Your trust !</p>");
            //sess($fare, $kiloMtr);
            
        }
        
        break;
    }
    $_SESSION['ride']=array();
    $_SESSION['ride']=array('from' => $pick,
    'to'=> $drop,'cabType'=>$cab,'weight'=>$rate,'totalfare'=>$fare,'dist'=>$kiloMtr,'luggage'=>$fareWeight);
    


?>