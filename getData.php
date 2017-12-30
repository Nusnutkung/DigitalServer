<?php
include('connectdb.php');

    $sql = "
        SELECT  wm2.meta_value , wp_posts.*  FROM wp_term_relationships LEFT JOIN wp_posts ON wp_term_relationships.object_id = wp_posts.ID
        LEFT JOIN
            wp_postmeta wm1
            ON (
                wm1.post_id = wp_posts.id
                AND wm1.meta_value IS NOT NULL
                AND wm1.meta_key = '_thumbnail_id'
            )
        LEFT JOIN
            wp_postmeta wm2
            ON (
                wm1.meta_value = wm2.post_id
                AND wm2.meta_key = '_wp_attached_file'
                AND wm2.meta_value IS NOT NULL
            )

";


if ($_REQUEST['page']=='HeadFavorite' ) {
  $where = "WHERE wp_term_relationships.term_taxonomy_id = '18' ";
}else if($_REQUEST['page']=='HeadNews' ) {
  $where = "WHERE wp_term_relationships.term_taxonomy_id = '22' ";
}else if($_REQUEST['page']=='HeadJob' ) {
  $where = "WHERE wp_term_relationships.term_taxonomy_id = '23' ";
}else if($_REQUEST['page']=='HeadVideo' ) {
  $where = "WHERE wp_term_relationships.term_taxonomy_id = '24' ";
}else if($_REQUEST['page']=='HeadPromotion' ) {
  $where = "WHERE wp_term_relationships.term_taxonomy_id = '25' ";
}else if($_REQUEST['page']=='HeadSeries' ) {
  $where = "WHERE wp_term_relationships.term_taxonomy_id = '26' ";
}else if($_REQUEST['page']=='Job' ) {
  $where = "WHERE wp_term_relationships.term_taxonomy_id = '19' ";
}else if($_REQUEST['page']=='News' ) {
  $where = "WHERE wp_term_relationships.term_taxonomy_id = '3' ";
}else if($_REQUEST['page']=='Video' ) {
  $where = "WHERE wp_term_relationships.term_taxonomy_id = '29' ";
}else if($_REQUEST['page']=='Series' ) {
  $where = "WHERE wp_term_relationships.term_taxonomy_id = '28' ";
}else if($_REQUEST['page']=='Promotions' ) {
  $where = "WHERE wp_term_relationships.term_taxonomy_id = '21' ";
}else if($_REQUEST['page']=='Ads' ) {
  $where = "WHERE wp_term_relationships.term_taxonomy_id = '32' ";
}else if($_REQUEST['page']=='Information' ) {
  $where = "WHERE wp_term_relationships.term_taxonomy_id = '30' ";
}else if($_REQUEST['page']=='Travel' ) {
  $where = "WHERE wp_term_relationships.term_taxonomy_id = '31' ";
}else if($_REQUEST['page']=='NewsList' ) {
  $where = "WHERE wp_term_relationships.term_taxonomy_id = '3' ";
}else if($_REQUEST['page']=='Property' ) {
  $where = "WHERE wp_term_relationships.term_taxonomy_id = '20' ";
}else if($_REQUEST['page']=='HeadProperty' ) {
  $where = "WHERE wp_term_relationships.term_taxonomy_id = '37' ";
}else if ($_REQUEST['page']=='notification'){
  $where = " WHERE wp_term_relationships.object_id = ' ".$_REQUEST['object_id']." '  ";
}

if($_REQUEST['page']=='notification'){
   $limit = 'LIMIT 1 ';
}
else if ($_REQUEST['limit']!='0') {
$limit = ' LIMIT 5';
}else{
  $limit =' ';
}
if ($_REQUEST['page']=='NewsList' ) {
  $limit = ' LIMIT 15';
}
$orderby = ' ORDER BY wp_posts.post_date DESC '.$limit ;
// $orderby = ' ORDER BY wp_posts.post_date DESC LIMIT 5' ;

    $strQuery = $sql.$where.$orderby;
    $result = mysqli_query($link, $strQuery); $coursesArray = array();
    while ($row = mysqli_fetch_assoc($result)) {
    $coursesArray[] = $row;
    }
    echo json_encode($coursesArray);

 ?>
