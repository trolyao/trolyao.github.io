<?php
header('Content-Type: text/html; charset=utf-8');
$url         = 'http://www.petrolimex.com.vn/';
$content     = file_get_contents($url);
$first_step  = explode('<div id="vie_p5_PortletContent">', $content);
$second_step = explode("</div>", $first_step[1]);

// "Xăng 95 IV: <br />";
$xang_95_4_v1 = strip_tags($second_step[4]);
$xang_95_4_v2 = strip_tags($second_step[5]);

// "Xăng 95 III <br />";
$xang_95_3_v1 = strip_tags($second_step[8]);
$xang_95_3_v2 = strip_tags($second_step[9]);

// "Xăng 95 II <br />";
$xang_95_2_v1 = strip_tags($second_step[12]);
$xang_95_2_v2 = strip_tags($second_step[13]);

// "E5 RON 92-II <br />";
$xang_92_2_v1 = strip_tags($second_step[16]);
$xang_92_2_v2 = strip_tags($second_step[17]);

// "DO 0,05S <br />";
$xang_do_v1 = strip_tags($second_step[20]);
$xang_do_v2 = strip_tags($second_step[21]);
// "Dầu hỏa <br />";
$dauhoa_v1  = strip_tags($second_step[24]);
$dauhoa_v2  = strip_tags($second_step[25]);

$result = Array(
    
    "0" => array(
        "attachment" => array(
            "type" => "template",
            "payload" => array(
                "template_type" => "generic",
                "elements" => array(
                    "0" => array(
                        "title" => "Xăng RON 95-IV",
                        "image_url" => "https://canthotv.vn/wp-content/uploads/2018/01/BoCongthuong.jpg",
                        "subtitle" => "Vùng 1 : " . $xang_95_4_v1 . "đ/L \nVùng 2 : " . $xang_95_4_v2 . "đ/L"
                        
                    ), // End 
                    "1" => array(
                        "title" => "Xăng RON 95-III",
                        "image_url" => "https://media.congluan.vn/files/huuphuong/2021/01/26/31af411e-dae4-4f48-b5ca-380919c9e88f-1509.jpeg",
                        "subtitle" => "Vùng 1 : " . $xang_95_3_v1 . "đ/L \nVùng 2 : " . $xang_95_3_v2 . "đ/L"
                        
                    ), // End 
                    "2" => array(
                        "title" => "Xăng E5 RON 92-II",
                        "image_url" => "https://bkgroup.vn//admin/webroot/upload/image/files/sanpham/X%C4%83ng/xang%20e5%20ron%2092.jpg",
                        "subtitle" => "Vùng 1 : " . $xang_95_2_v1 . "đ/L \nVùng 2 : " . $xang_95_2_v2 . "đ/L"
                        
                    ), // End 
                    "3" => array(
                        "title" => "DO 0,001S-V",
                        "image_url" => "https://fs.petrolimex.com.vn/Files/6783DC1271FF449E95B74A9520964169/image=jpeg/74c36ca9827246e0be767508d641d533/12.jpg",
                        "subtitle" => "Vùng 1 : " . $xang_92_2_v1 . "đ/L \nVùng 2 : " . $xang_92_2_v2 . "đ/L"
                        
                    ), // End 
                    
                    "4" => array(
                        "title" => "DO 0,05S-II",
                        "image_url" => "https://orientoil.com.vn/wp-content/uploads/2018/09/sanpham4.png",
                        "subtitle" => "Vùng 1 : " . $xang_do_v1 . "đ/L \nVùng 2 : " . $xang_do_v2 . "đ/L"
                        
                    ), // End 
                    "5" => array(
                        "title" => "Dầu hỏa 2-K",
                        "image_url" => "https://sitienpetrol.com.vn/wp-content/uploads/2020/05/DO.png",
                  "subtitle" => "Vùng 1 : " . $dauhoa_v1 . "đ/L \nVùng 2 : " . $dauhoa_v2 . "đ/L"
                        
                    ) // End 
                )
            )
        )
    )
);
echo json_encode($result, JSON_UNESCAPED_UNICODE);