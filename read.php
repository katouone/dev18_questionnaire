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
    src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap&libraries=&v=weekly">
    </script>

</head>

<?php
//ファイルを開く
$openFile = fopen('./data/data.txt','r');

//XSS対策の関数を定義
function h ($value){
    return htmlspecialchars($value,ENT_QUOTES);
}

//開いたファイルのデータを格納する
$ary=[];
while ($data = fgets($openFile)){
    // echo $data;

    // ”/”がある位置でデータを分割：[0]時間、[1]名前、[2]Emailアドレス、[3]電話番号、[4]国名
    $spd = preg_split('/\//',$data);

    // echo '<br>';
    // var_dump($split_data);
    
    // JSへの受け渡し様の配列を作成
    $ary[] =[h($spd[0]),h($spd[1]),h($spd[2]),h($spd[3]),h($spd[4]),h($spd[5]),h($spd[6])];
}

// 配列をJSONデータにして、JSに渡す
$json_array = json_encode($ary);

// ファイルを閉じる
fclose($openFile);
?>

<body>
    <!-- MapArea -->
    <div id="maparea">
        <div id="myMap"></div>
    </div>

    <table border="1">
        <!-- 表の１行目（列のタイトル） -->
        <tr>
            <th>番号</th>
            <th>タイムスタンプ</th>
            <th>名前</th>
            <th>Emailアドレス</th>
            <th>電話番号</th>
            <th>地名</th>
            <th>緯度</th>
            <th>経度</th>
        </tr>

        <!-- 表の2行目以降 -->
        <?php 
            for( $j =0; $j< count($ary); $j++){
        ?>
            <tr>
                <td><?php print($j+1); ?></td>
                <td><?php print(h($ary[$j][0])); ?></td>
                <td><?php print(h($ary[$j][1])); ?></td>
                <td><?php print(h($ary[$j][2])); ?></td>
                <td><?php print(h($ary[$j][3])); ?></td>
                <td><?php print(h($ary[$j][4])); ?></td>
                <td><?php print(h($ary[$j][5])); ?></td>
                <td><?php print(h($ary[$j][6])); ?></td>
            </tr>

        <?php
        }
        ?>
    </table>


<script>
    // phpから配列を受け取る
    let js_ary = <?php echo $json_array?>

    console.log(js_ary);
    console.log(js_ary.length);
    console.log(js_ary[0][6]);

    // 最初の地図の中心を東京にするため、ロケーションを設定
    const Tokyo = { lat: 35.68, lng: 139.77 };

    // 地図を作成
    function initMap() {
        map = new google.maps.Map(document.getElementById("myMap"), {
            center: Tokyo,
            zoom: 2,
        });

        for(let i=0 ; i<js_ary.length;i++ ){

            let place = { lat: Number(js_ary[i][5] ), lng: Number(js_ary[i][6])};

            console.log(place);

            let marker = new google.maps.Marker({
                position: place,
                map,
                label: String(i+1),
                // label: js_ary[i][4],
            });
        }
    }

</script>




</body>
</html>
