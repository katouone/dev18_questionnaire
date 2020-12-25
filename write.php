<?php 

//postファイルからの値を受け取る
$name = $_POST['name'];
$mail = $_POST['mail'];
$phone = $_POST['phone'];
$company = $_POST['company'];

//時間の情報を取得
$time = date('Y-m-d H:i:s');

//ファイルに書き込み
$file = fopen('./data/data.txt','a');

//
fwrite($file, $time.'/'.$name.'/'.$mail.'/'.$phone.'/'.$company."\n");
fclose($file);


?>

<html>
<head>
    <meta charset="utf-8">
    <title>入力完了しました</title>
    
</head>

<body>
    <h2>入力完了しました</h2>
    <h2>ありがとうございました</h2>
</body>

</html>