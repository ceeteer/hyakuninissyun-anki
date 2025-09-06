<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ユーザー一覧</title>
    <style>
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

    <h1>ユーザー一覧</h1>

    <?php 
    // データベース接続情報
    $servername = "localhost";
    $username = "root";
    $password = ""; // 通常、XAMPPのMySQLのパスワードは空
    $dbname = "db";

    // データベースに接続
    $conn = new mysqli($servername, $username, $password, $dbname);

    // 接続確認
    if ($conn->connect_error) {
        die("データベースへの接続に失敗しました: " . $conn->connect_error);
    }

    // usersテーブルからデータを取得
    $sql = "SELECT id, name, email FROM users";
    $result = $conn->query($sql);

    // データがあるか確認
    if ($result->num_rows > 0) {
        // データがある場合、テーブルで表示
        echo "<table>";
        echo "<tr><th>ID</th><th>名前</th><th>メールアドレス</th></tr>";
        // 取得したデータを1行ずつ出力
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["id"]. "</td><td>" . $row["name"]. "</td><td>" . $row["email"]. "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "データがありません。";
    }

    // データベース接続を閉じる
    $conn->close();
    ?>
    
</body>
</html>