<?php 

//postファイルからの値を受け取る
$name = $_POST['name'];
$mail = $_POST['mail'];
$phone = $_POST['phone'];
$country = $_POST['country'];

//時間の情報を取得
$time = date('Y-m-d H:i:s');



//以下は出典元のページを引用（https://www.mkbtm.jp/?p=1436）
//ーーーーーーーーーーーーーここからーーーーーーーーーーーーーーーーー

mb_language("Japanese");//文字コードの設定
mb_internal_encoding("UTF-8");

//住所を入れて緯度経度を求める。
$address = $country;
$myKey = "YOUR_API_KEY";

$address = urlencode($address);

$url = "https://maps.googleapis.com/maps/api/geocode/json?&address=" . $address . "+CA&key=" . $myKey ;

$contents= file_get_contents($url);
$jsonData = json_decode($contents,true);

// echo $jsonData[0];
// var_dump ($jsonData);

$lat = $jsonData["results"][0]["geometry"]["location"]["lat"];
$lng = $jsonData["results"][0]["geometry"]["location"]["lng"];

// print("lat=$lat\n");
// print("lng=$lng\n");


//ーーーーーーーーーーーーーここまでーーーーーーーーーーーーーーーーー


//ファイルに書き込み
$file = fopen('./data/data.txt','a');

//受け取ったデータをスラッシュで区切って1行に記入
fwrite($file, $time.'/'.$name.'/'.$mail.'/'.$phone.'/'.$country.'/'.$lat.'/'.$lng."\n");
fclose($file);



?>


<html>
<head>
    <meta charset="utf-8">
    <title>入力完了しました</title>





    
</head>

<body>
    <h2>入力完了しました/Complete!</h2>
    <h2>ありがとうございました/Thank you</h2>
</body>

</html>