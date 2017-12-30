<?php
header("Access-Control-Allow-Origin: *");

  $link = mysqli_connect('localhost', 'kityadac_api', 'DoGw2NEr', 'kityadac_new');
  mysqli_set_charset($link, 'utf8');
    $sql = "SELECT * FROM tb_introduction";
  $result = mysqli_query($link, $sql); $coursesArray = array();
  while ($row = mysqli_fetch_assoc($result)) {
  $coursesArray[] = $row; }



echo json_encode($coursesArray);
 ?>
