<?php
header('Content-Type: text/html; charset=utf-8');

date_default_timezone_set('Asia/Ho_Chi_Minh');

$now= date('Y-m-d H:i');
$nowint=  strtotime($now);

$time=unint($nowint);

$result=array (
  'messages' => 
  array (
    0 => 
    array (
      'text' => "Bây giờ là $time.\n",
    ),
  ),
);
echo json_encode($result);
function unint($dateint){

return date("hːi A, d/m/Y", $dateint);

}