<?php
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Headers: X-Requested-With, content-type, access-control-allow-origin, access-control-allow-methods, access-control-allow-headers');

    
$link = mysqli_connect('localhost', 'root', 'pattayapal', 'kityadac_pattayapal');


if ( $_REQUEST['user']!='' && $_REQUEST['pass']!='' ) {
	$_REQUEST['pass'] = '$P$Bz3ns.7xM8sPUmPBekZID6htBwE.Qk1';
	// $_REQUEST['pass'] = '$P$Bz3ns.7xM8sPUmPBekZID6htBwE.k1';
	$_REQUEST['user'] = 'admin';
	$sql = " SELECT * FROM wp_users WHERE user_login = '".$_REQUEST['user']."' AND user_pass = '".$_REQUEST['pass']."'  ";
	// echo $sql;
	$result = mysqli_query($link, $sql ); 
	$num = mysqli_num_rows($result);
	// echo $num;
	if ($num!=0) {
		$data = mysqli_fetch_assoc($result);
		echo json_encode($data);
	}else{
		echo json_encode('Failed');
	}
}

// admin
// $P$Bz3ns.7xM8sPUmPBekZID6htBwE.Qk1

 ?>