<?php
date_default_timezone_set('Asia/Bangkok');

header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Headers: X-Requested-With, content-type, access-control-allow-origin, access-control-allow-methods, access-control-allow-headers');
  // $link = mysqli_connect('localhost', 'kityadac_api', 'DoGw2NEr', 'kityadac_new');
  
  $link = mysqli_connect('localhost', 'kityadac_pattayapal', '60214i3H', 'kityadac_pattayapal');


  if (mysqli_connect_errno())
    {
      $link = mysqli_connect('localhost', 'root', 'pattayapal', 'kityadac_pattayapal');

    }

  mysqli_set_charset($link, 'utf8');
 ?>
