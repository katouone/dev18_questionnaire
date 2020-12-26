<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>データまとめ</title>
    <style>
        table {
            margin:auto
        }

        #myMap {
            height: 100%;
        }

        html, body {
            height: 100%;
        }

        #maparea {
            height: 75%;
        }
    
    </style>

    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script defer
    src="https://maps.googleapis.com/maps/api/js?key=Your_API_key&callback=initMap&libraries=&v=weekly">
    </script>

</head>



<body>



    <!-- MapArea -->
    <div id="maparea">
        <div id="myMap"></div>
    </div>


<table border="1">

    <!-- 表の１行目（列のタイトル） -->
    <tr>
        <th>タイムスタンプ</th>
        <th>名前</th>
        <th>Emailアドレス</th>
        <th>電話番号</th>
        <th>国名</th>
    </tr>

    <!-- 表の2行目以降（各データを取り出して、2行目以降に書き込む）     -->

    <?php
    //ファイルを開く
    $openFile = fopen('./data/data.txt','r');

    //XSS対策の関数を定義
    function h ($value){
        return htmlspecialchars($value,ENT_QUOTES);
    }

    //開いたファイルのデータを格納する
    while ($data = fgets($openFile)){

        // echo $data;

        // ”/”がある位置でデータを分割：[0]時間、[1]名前、[2]Emailアドレス、[3]電話番号、[4]国名
        $split_data = preg_split('/\//',$data);

        // echo '<br>';
        // var_dump($split_data);

    ?>

        <!-- 2行目以降に分割したデータを書き込む -->
        <tr>
            <td><?php print(h($split_data[0])); ?></td>
            <td><?php print(h($split_data[1])); ?></td>
            <td><?php print(h($split_data[2])); ?></td>
            <td><?php print(h($split_data[3])); ?></td>
            <td><?php print(h($split_data[4])); ?></td>
        
        </tr>

     <!-- whileの閉じカッコのphp部分 -->
    <?php
    }
    ?>

</table>

<script>
    // 最初の地図の中心を東京にするため、ロケーションを設定
    const Tokyo = { lat: 35.68, lng: 139.77 };

    // 地図を作成
    function initMap() {
      map = new google.maps.Map(document.getElementById("myMap"), {
        center: Tokyo,
        zoom: 3,
      });
    }

</script>

</body>
</html>
