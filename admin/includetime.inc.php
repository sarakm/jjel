<?php
#########################################################
# Outshine Solutions                                    #
# http://outshinesolutions.com/                         #
# Author: Amitesh php team Omega @ Outshinesolutions    #
# Displays Time and Date with your customized Messages  #
# User can choose multiple formats                      #
#########################################################

$morning_message='Good Morning';
$noon_message='Good Afternoon';
$evening_message='Good Evening';
$night_messgae='Good Night';


$format=10;

/*

$format = 1;                			// March 10, 2001, 5:16 pm
$format = 2;                         	// 03.10.01
$format = 3;                      		// 10, 3, 2001
$format = 4;                           	// 20010310
$format = 5;     						// 05-16-18, 10-03-01, 1631 1618 6 Satpm01
$format = 6;   							// it is the 10th day.
$format = 7;               				// Sat Mar 10 17:16:18 MST 2001
$format = 8;     						// 17:03:18 m is month
$format = 9;                        	// 17:16:18
$format = 10;                        	// Monday 8th of August 2005 03:12:46 PM
$format = 11;                        	// January
$format = 12;                        	// 2009




*/



$hour = date("H");
if ($hour <= 11 && $hour >= 1) {
  $message = $morning_message;
}
else if ($hour <= 17 && $hour >= 12) {
  $message = $noon_message;
}
if ($hour <= 23 && $hour >= 18) {
  $message = $evening_message;
}
if ($hour >= 22 || $hour == 0) {
  $message = $night_messgae;
}


switch ($format) {
            case 1:
                $date=date("F j, Y, g:i a"); 
                break;
            case 2:
               $date=date("m.d.y");;
               
                break;
            case 3:
                $date=date("j, n, Y");
                break;
            case 4:
                $date=date("Ymd");
                break;
            case 5:
                $date=date('h-i-s, j-m-y, it is w Day');
                break;
            case 6:
                $date=date('\i\t \i\s \t\h\e jS \d\a\y.');
                break;
            case 7:
                $date=date("D M j G:i:s T Y");
                break;
            case 8:
                $date=date('H:m:s \m \i\s\ \m\o\n\t\h');
                break;
            case 9:
                $date=date("H:i:s");
                break;
            case 10:
                $date=date('l jS \of F Y h:i:s A');
                break;
            case 11:
                $date=date('F');
                break;
            case 12:
                $date=date('Y');
                break;
        }




        
        
   // By Amitesh from Outshine Solutions  (Php Team Omega)    
        ?>