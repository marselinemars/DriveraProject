<?php

include("init.php");


$public_actions=array('do_login','register','do_register','home','login');

//non-logged user are forced to the login page...
if ($appuser==0  and !in_array($vars['action'],$public_actions)){
	$vars['action']='home';
}elseif(is_array($appuser) and !isset($vars['action'])){
    $vars['action']='dashboard';
}



include("modules/user.php");

//Modules to be accessed only by logged users...


if (is_array($appuser)){
include("modules/student.php");
include("modules/owner.php");
include("modules/monitor.php");
include("modules/vehicle.php");
include("modules/payment.php");
include("modules/calendar.php");
include("modules/exam.php");
include("modules/notifications.php");
include("modules/category.php");
include("modules/succ_st.php");
include("modules/failed_st.php");


}



?>


