<?php
 
error_reporting(E_ERROR | E_PARSE);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

define('APP_LANG','en');

include("lib/db.php");
include("lib/utils.php");
include("lang/".APP_LANG.".php");

include("lib/func.user.php");
include("lib/func.student.php");
include("lib/func.monitor.php");
include("lib/func.owner.php");
include("lib/func.vehicle.php");
include("lib/func.payment.php");
include("lib/func.category.php");
include("lib/calendar/database_connection.php");
include("lib/func.exam.php");
include("lib/func.submitResult.php");
include("lib/func.failedst.php");
include("lib/func.succst.php");


include("lib/func.notification.php");
include("lib/calendar/save_attendance.php");
include("lib/calendar/database_connection.php");







//It is very stupid to share passwords within GIT, but for demostration, we will close our eyes on this principle.
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'drivera_database';


$db = new db($dbhost, $dbuser, $dbpass, $dbname);

$there_are_notifications=are_there_notifications();

$vars=get_input_vars();
$appuser=user_get_logged_user();
?>
