<?php
$user = $_GET['user'];
if(empty($user)){
echo json_encode(array('ok'=>false,'error'=>'User Empty'));
} else {

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://www.instagram.com/$user/?__a=1");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 $header[] = "accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9";
$header[] = "Accept-Encoding: gzip, deflate, br";
$header[] = "Accept-Language: ar-EG,ar;q=0.9,en-US;q=0.8,en;q=0.7";
$header[] = "Cache-Control: max-age=0";
$header[] = "Cookie: csrftoken=psDRt4xL7v2dQGkm1lgQo80a548UCJxM; mid=YkiW2gABAAHJZH3dlmB1nfUE5gBd; ig_did=88FCF2EB-A265-4565-9DD4-8EC627AE8EE2";
$header[] = 'sec-ch-ua: " Not A;Brand";v="99", "Chromium";v="99';
$header[] = 'sec-ch-ua-platform: "Android"';
$header[] = "sec-feche-dest: document";
$header[] = "sec-feche-site: none";
$header[] = "upgrade-inseccure-requests: 1";
$header[] = "User-Agent: Mozilla/5.0 (Linux; Android 10; STK-L21) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.94 Mobile Safari/537.36";
curl_setopt($ch,CURLOPT_HTTPHEADER, $header);
//curl_setopt($ch, CURLOPT_POST, true);
//curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch,CURLOPT_ENCODING, "gzip");
$result = curl_exec($ch);
curl_close($ch);
//echo $result;
//print_r($result);
$api = json_decode($result, true);
$name = $api['graphql']['user']['id'];
echo json_encode([("info"),"ID"=>$name]);

/*
header('Content-Type: application/json; charset=utf-8');
$user = $_GET['user'];


$api = json_decode(file_get_contents("https://www.instagram.com/".$user."/?__a=1"),true);
$name = $api['graphql']['user']['id'];
echo json_encode([("info"),"name"=>$name]);

*/
}

?>
