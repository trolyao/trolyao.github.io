<?php
header('Content-Type: text/html; charset=utf-8');

$url = 'https://code.junookyo.xyz/api/ncov-moh/data.json';
$content = file_get_contents($url);
$json = json_decode($content, true);
$data = $json['data'];
$result = array(
   'messages' => array(
      '0' => array(
      	'text' => "Thế giới: \n + Số ca nhiễm: " . number_format($data['global']['cases'],0,",",".") . "\n + Tử vong: " . number_format($data['global']['deaths'],0,",",".") . "\n + Đã hồi phục: " . number_format($data['global']['recovered'],0,",",".") . "\n\nViệt Nam: \n + Số ca nhiễm: " . number_format($data['vietnam']['cases'],0,",",".") . "\n + Tử vong: " . number_format($data['vietnam']['deaths'],0,",",".") . "\n + Đã hồi phục: " .number_format($data['vietnam']['recovered'],0,",",".")
      ),
   )
);
echo json_encode($result, JSON_UNESCAPED_UNICODE);