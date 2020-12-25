<?php 

//ファイルを開く
$openFile = fopen('./data/data.txt','r');

?>


<html>
<head>
    <meta charset="UTF-8">
    <title>データまとめ</title>
</head>
<body>


<table border="1">

    <!-- 表の１行目（列のタイトル） -->
    <tr>
        <th>タイムスタンプ</th>
        <th>名前</th>
        <th>Emailアドレス</th>
        <th>電話番号</th>
        <th>会社名</th>
    </tr>

    <!-- 表の2行目以降（各データを取り出して、2行目以降に書き込む）     -->

    <?php

    //開いたファイルのデータを格納する
    while ($data = fgets($openFile)){

        // echo $data;

        // ”/”がある位置でデータを分割：[0]時間、[1]名前、[2]Emailアドレス、[3]電話番号、[4]会社名
        $split_data = preg_split('/\//',$data);

        // echo '<br>';
        // var_dump($split_data);
    ?>

        <!-- 2行目以降に分割したデータを書き込む -->
        <tr>
            <td><?php print(htmlspecialchars($split_data[0])); ?></td>
            <td><?php print(htmlspecialchars($split_data[1])); ?></td>
            <td><?php print(htmlspecialchars($split_data[2])); ?></td>
            <td><?php print(htmlspecialchars($split_data[3])); ?></td>
            <td><?php print(htmlspecialchars($split_data[4])); ?></td>
        
        </tr>

     <!-- whileの閉じカッコのphp部分 -->
    <?php
    }
    ?>

</table>

</body>
</html>
