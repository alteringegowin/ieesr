<?php 
$step = $_REQUEST['step_number'];
switch($step){
	case($step == '1'):
		include('request/transportations.php');
	break;
	case($step == '2'):
		include('request/long-transportations.php');
	break;
}

?>