<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <h1>アンケート</h1>
    </div>

    <div>
        <form action="write.php" method="post">
            <div>
                <p>お名前: <input type="text" name="name"></p>
                <p>Email: <input type="text" name="mail"></p>
                <p>電話番号: <input type="number" name="phone"></p>
                <p>会社名: <input type="text" name="company"></p>
                
                
            </div>
            <div>
                <input type="submit"  value="送信">
                <input type="reset" value="リセット">
            </div>

        </form>

    </div>



</body>
</html>