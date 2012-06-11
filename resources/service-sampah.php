<?php 
$step = $_REQUEST['step_number'];
switch($step){
	case($step == '1'):
		include('request/trash.php');
	break;
}

?>