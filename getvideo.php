<?php

include 'connectdb.php';

if ($_GET['mode']=='all') {
  $sql = "SELECT * FROM tb_video WHERE video_cate_id = '".$_GET['id']."' ";
  $result = mysqli_query($link, $sql); $coursesArray = array();
  while ($row = mysqli_fetch_assoc($result)) {
  $coursesArray[] = $row;
  // $coursesArray['video_title'] = substr($row['video_title'],0,15);
}
}elseif ($_GET['mode']=='one') {
  $sql = "SELECT * FROM tb_video WHERE video_id = '".$_GET['id']."' ";
  $result = mysqli_query($link, $sql); $coursesArray = array();
  while ($row = mysqli_fetch_assoc($result)) {
  $coursesArray[] = $row;
  }
}elseif ($_GET['mode']=='cateall') {
  $sql = "SELECT * FROM tb_video_cate";
  $result = mysqli_query($link, $sql); $coursesArray = array();
  while ($row = mysqli_fetch_assoc($result)) {
  $coursesArray[] = $row;
  // $coursesArray['video_title'] = substr($row['video_title'],0,15);
  }
}elseif ($_GET['mode']=='cate') {
  $sql = "SELECT * FROM tb_video WHERE video_cate_id = '".$_GET['id']."' LIMIT 1 ";
  $result = mysqli_query($link, $sql); $coursesArray = array();
  while ($row = mysqli_fetch_assoc($result)) {
  $coursesArray[] = $row;
  // $coursesArray['video_title'] = substr($row['video_title'],0,15);
  }
}elseif ($_GET['mode']=='home') {
  $sql = "SELECT * FROM tb_video order by video_date DESC LIMIT 8 ";
  $result = mysqli_query($link, $sql); $coursesArray = array();
  while ($row = mysqli_fetch_assoc($result)) {
  $coursesArray[] = $row;
  // $coursesArray['video_title'] = substr($row['video_title'],0,15);
  }
}


echo json_encode($coursesArray);
 ?>
