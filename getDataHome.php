<?php
header("Access-Control-Allow-Origin: *");
  //
  // $link = mysqli_connect('localhost', 'kityadac_api', 'DoGw2NEr', 'kityadac_new');
  // mysqli_set_charset($link, 'utf8');


include 'connectdb.php';
if ($_REQUEST['mode']==='home') {
  # code...
  $sql = "SELECT * FROM tb_news ORDER BY `publishedAt` DESC LIMIT 8";
  $result = mysqli_query($link, $sql); $coursesArray = array();
  while ($row = mysqli_fetch_assoc($result)) {
  $coursesArray[] = $row; }
}elseif($_REQUEST['mode']==='news'){
  $sql = "SELECT * FROM tb_news ORDER BY `publishedAt` DESC  ";
  $result = mysqli_query($link, $sql); $coursesArray = array();
  while ($row = mysqli_fetch_assoc($result)) {
  $coursesArray[] = $row; }
}elseif($_REQUEST['mode']==='jobs'){
  $sql = "SELECT * FROM tb_job ORDER BY `job_date` DESC  ";
  $result = mysqli_query($link, $sql); $coursesArray = array();
  while ($row = mysqli_fetch_assoc($result)) {
  $coursesArray[] = $row; }
}elseif($_REQUEST['mode']==='promotions'){
  $sql = "SELECT * FROM tb_promotion ORDER BY `promotion_date` DESC  ";
  $result = mysqli_query($link, $sql); $coursesArray = array();
  while ($row = mysqli_fetch_assoc($result)) {
  $coursesArray[] = $row; }
}elseif($_REQUEST['mode']==='Datalist'){
  if ($_GET['page']=='') {
  $_GET['page'] = 'Favorites';
}

if ($_GET['page']=='Favorites') {
  $sql = "SELECT * FROM tb_data WHERE data_page = 'News'  ORDER BY `data_date` DESC LIMIT 10 ";
}else{
  $sql = "SELECT * FROM tb_data WHERE data_page = '".$_GET['page']."'  ORDER BY `data_date` DESC  ";

}



  $result = mysqli_query($link, $sql); $coursesArray = array();
  while ($row = mysqli_fetch_assoc($result)) {
  $coursesArray[] = $row; }
}elseif($_REQUEST['mode']==='Data'){
  $sql = "SELECT * FROM tb_data WHERE data_id ='".$_REQUEST['id']."'  ";
  $result = mysqli_query($link, $sql); $coursesArray = array();
  while ($row = mysqli_fetch_assoc($result)) {
  $coursesArray[] = $row; }
}elseif($_REQUEST['mode']==='DataSlide'){
  if ($_REQUEST['page']=='Favorites') {
    $sql = "SELECT * FROM tb_data WHERE  data_show_head_slide = '1' ";
  }else{
    $sql = "SELECT * FROM tb_data WHERE data_page = '".$_REQUEST['page']."' AND data_show_home_slide = '1' ";
  }
  $result = mysqli_query($link, $sql); $coursesArray = array();
  while ($row = mysqli_fetch_assoc($result)) {
  $coursesArray[] = $row; }
}elseif($_REQUEST['mode']==='Ads'){
  if ($_GET['position']=='Top') {
    $position = ' data_show_ad_top ' ;
  }else if($_GET['position']=='Middle'){
    $position = ' data_show_ad_middle ' ;
  }else if($_GET['position']=='Bottom'){
    $position = ' data_show_ad_bottom ' ;
  }
  $sql = "SELECT * FROM tb_data WHERE data_page = '".$_GET['page']."' AND ".$position." = '1' ORDER BY RAND() LIMIT 1 ";
  // die($sql);
  $result = mysqli_query($link, $sql); $coursesArray = array();
  while ($row = mysqli_fetch_assoc($result)) {
  $coursesArray[] = $row; }
}elseif($_REQUEST['mode']==='DataTest'){
  $sql = "SELECT * FROM wd_post WHERE post_ ORDER BY `post_date` DESC LIMIT 10 ";
  $result = mysqli_query($link, $sql); $coursesArray = array();
  while ($row = mysqli_fetch_assoc($result)) {
  $coursesArray[] = $row; }
}



echo json_encode($coursesArray);
 ?>
