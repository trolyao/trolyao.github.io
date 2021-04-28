<?php
header('Content-Type: application/json; charset=utf-8');
$api_key = '0913f02784b97c157bdb0f18e9a37d74';
if(!empty($_GET['province'])){
	$province = $_GET['province'];
}else{
	$province = 'Ha Noi';
}
$url = 'http://api.openweathermap.org/data/2.5/forecast?q=' . $province . ',vietnam&appid=' . $api_key . '&units=metric&lang=vi';
$content = file_get_contents($url);
$json = json_decode($content, true);

if(isset($json) && !empty($json)){
	$list_day = array();
	$list = $json['list'];
	foreach ($list as $key => $value) {
		$date = $value['dt_txt'];
		$trim_time = strtotime(substr($date, 11));
		$df_time = strtotime('12:00:00');
		if($trim_time == $df_time){
			$icon =  $value['weather'][0]['icon']; 
			switch ($icon) {
				case '01n':
					$image_url = 'https://i.imgur.com/J3a135c.jpg';
					break;
				case '02n':
					$image_url = 'https://i.imgur.com/CRh04K2.jpg';
					break;
				case '03n':
					$image_url = 'https://i.imgur.com/b5BKa4x.jpg';
					break;
				case '04n':
					$image_url = 'https://i.imgur.com/CRh04K2.jpg';
					break;
				case '09n':
					$image_url = 'https://i.imgur.com/XHUnTV6.jpg';
					break;
				case '10n':
					$image_url = 'https://i.imgur.com/7ECPQGA.jpg';
					break;
				case '11n':
					$image_url = 'https://i.imgur.com/dMj6Rt9.jpg';
					break;
				default:
					$image_url = '';
					break;
			}
			$list_day[] = array(
				'title' => 'Ngày ' . date('d/m/Y', strtotime(substr($date,0, 11))),
				'image_url' => $image_url,
				'subtitle' => "\nNhiệt độ trung bình: " .floor($value['main']['temp']) . "°C \nĐộ ẩm: " .$value['main']['humidity'] . "% \nTình trạng thời tiết: " . ucfirst($value['weather'][0]['description'])
			);
		}
	}
	$result = array(
		"messages" => array(
			array('text' => 'Bạn đã tra cứu dữ liệu thời tiết cho ' . $province . '. Dưới đây là thông tin thời tiết của 5 ngày tới. Bạn nên chú ý để mang theo vật dụng tránh mưa, nắng khi đi ra ngoài.'
			),
	    array(
	      "attachment" => array(
	          "type" => "template",
	          "payload" => array(
              "template_type" => "generic",
              //"image_aspect_ratio"=> "square",
              "elements" => $list_day
	          )
	      )
	    )
		)
	);
}else{
	$result = array(
		"messages" => array(
			array("text" => "Không tìm thấy dữ liệu của thành phố bạn tra cứu 🙁 \nVui lòng thử tìm thành phố lân cận khác.")
		)
	);
}

echo json_encode($result, JSON_UNESCAPED_UNICODE);