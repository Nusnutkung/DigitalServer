<?php

include 'connectdb.php';



	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		// get post body content
		$content = file_get_contents('php://input');
		// parse JSON
		$user = json_decode($content, true);
		//insert data
    $sql = $link->query("INSERT INTO tb_contact SET contact_name ='".$user['name']."' , contact_desc = '".$user['desc']."', contact_number = '".$user['contact']."', contact_flag='0' , contact_date = NOW() ");

		$result = mysqli_query($link, $sql);
header('Content-Type: application/json');
		if ($result) {
		  //  echo json_encode(['status' => 'ok','message' => 'บันทึกข้อมูลเรียบร้อยนะ']);
      // echo json_encode("testqqqqq");
  echo " ";
		} else {
		  //  echo json_encode(['status' => 'error','message' => 'เกิดข้อผิดพลาดในการบันทึกข้อมูล']);
      // echo json_encode("ssssss");
  echo " ";
		}

	}


 ?>
