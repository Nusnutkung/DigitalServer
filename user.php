<?php
include('connectdb.php');


$data = [] ;
if ($_REQUEST['Mode'] == 'Select' ) {
	$str  =  "SELECT * FROM api_users WHERE email = '".$_REQUEST['Email']."'  
				AND password = '".$_REQUEST['Pass']."'   ";
	 $result = mysqli_query($link, $str  ); 
	 $coursesArray = array();
    $data = mysqli_fetch_assoc($result);

}
if ($_REQUEST['Mode'] == 'Insert' ) {
	$str  =  "SELECT * FROM api_users WHERE email = '".$_REQUEST['Email']."'  ";
	$result = mysqli_query($link, $str  ); 
    $data = mysqli_fetch_assoc($result);

    if ($data == null) {
		$str  =  " INSERT INTO api_users VALUES ('0','".$_REQUEST['Email']."','".$_REQUEST['Pass']."','','".$_REQUEST['Phone']."', NOW() )  ";
	    $result = mysqli_query($link, $str  ); 	
	    $data['result'] = 'Done';
    }else{
    	$data['result'] = 'Aready';
    }
}

if( $_REQUEST['Mode'] == 'GetAbout' ){
	$str  =  " SELECT * FROM api_about  WHERE about_id = 1 ";
	 $result = mysqli_query($link, $str  ); 
	 $data = array();
     $data = mysqli_fetch_assoc($result);	
}
if( $_REQUEST['Mode'] == 'SaveAbout' ){
	$str  =  " UPDATE api_about SET email = '".$_REQUEST['email']."' , phone = '".$_REQUEST['phone']."' WHERE about_id = 1 ";
	 $result = mysqli_query($link, $str  ); 
}

if( $_REQUEST['Mode'] == 'getPromotion' ){
	if( $_REQUEST['day'] == 'Today' ){ $day = date("Y-m-d") ;
	}else if($_REQUEST['day'] == 'Tomorrow' ){ $day = date("Y-m-d", strtotime("+1 Days")) ;
	}else if($_REQUEST['day'] == 'Yesterday' ){ $day = date("Y-m-d", strtotime("-1 Days") ) ; 
	}
	$str  =  " SELECT * FROM api_promotion WHERE  date  BETWEEN '".$day." 00:00:00'  AND '".$day." 23:59:59' ";
	 $result = mysqli_query($link, $str  ); 
	 $data = mysqli_fetch_assoc($result);	
}
if( $_REQUEST['Mode'] == 'savePromotion' ){

	$day = date("Y-m-d", strtotime("+1 Days")) ;

	// $str  =  " SELECT * FROM api_promotion WHERE  date  BETWEEN '".$day." 00:00:00'  AND '".$day." 23:59:59' ";
	// $result = mysqli_query($link, $str  ); 
    // $data = mysqli_fetch_assoc($result);
    // if ($data == null) {
		// $str  =  " INSERT INTO api_promotion VALUES ('0','".$_REQUEST['title']."','".$_REQUEST['detail']."','".$_REQUEST['condition']."','".$_REQUEST['image']."', '".$day."' )  ";
		
		$str  =  " UPDATE api_promotion SET  title = '".$_REQUEST['title']."' , 
					detail = '".$_REQUEST['detail']."', 
					condition_pro = '".$_REQUEST['condition']."', 
					WHERE promotion_id = '".$_REQUEST['id']."'  ";

	    $result = mysqli_query($link, $str  ); 	
	    $data['result'] = 'Done';
    // }else{
    // 	$data['result'] = 'Aready';
    // }
}
if($_REQUEST['Mode']=='UploadImage'){
	$day = date("Y-m-d", strtotime("+1 Days")) ;

	$str  =  " SELECT promotion_id FROM api_promotion WHERE  date  BETWEEN '".$day." 00:00:00'  AND '".$day." 23:59:59' ";
	$target_path = "images/";
	$data = implode(' ',$_REQUEST) ;
	$target_path = $target_path . $day;
	
	if(move_uploaded_file($_FILES['file']['tmp_name'],$target_path )) {
		$data['result'] = "Upload and move success";
		$str  =  " INSERT INTO api_promotion VALUES ('0','IMG','IMG','Upload and move success ','".$day."', '".$day."' )  ";
		$result = mysqli_query($link, $str  ); 	
		$str = " SELECT promotion_id FROM  api_promotion ORDER BY promotion_id DESC LIMIT 1 "; 
		$result = mysqli_query($link, $str  ); 	
		$re = mysqli_fetch_assoc($result);
		$data['id'] = $re['promotion_id'];
	} else{
		$data['result'] = "There was an error uploading the file, please try again!";
		$str  =  " INSERT INTO api_promotion VALUES ('0','IMG','".$target_path."',' There was an error uploading the file, please try again!','".$day."', '".$day."' )  ";
	}
	
	
}


 echo json_encode($data);
?>