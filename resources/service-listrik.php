<?php 
$step = $_REQUEST['step_number'];
switch($step){
	case($step == '1'):
		include('request/penerangan.php');
	break;
	case($step == '2'):
		include('request/peralatan-dapur.php');
	break;
	case($step == '3'):
		include('request/laundry.php');
	break;
	case($step == '4'):
		include('request/personal-care.php');
	break;
	case($step == '5'):
		include('request/other-electronics.php');
	break;
	case($step == '6'):
		include('request/infokom.php');
	break;
}

?>