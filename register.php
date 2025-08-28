<?php
session_start();
require 'db.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($username && $email && $password) {
        // パスワードをハッシュ化
        $hash = password_hash($password, PASSWORD_DEFAULT);

        // DBに保存
        $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        try {
            $stmt->execute([$username, $email, $hash]);
            $message = "登録成功！ログインしてください。";
        } catch (PDOException $e) {
            if ($e->getCode() == 23000) {
                $message = "ユーザー名またはメールアドレスは既に使用されています。";
            } else {
                $message = "エラー: " . $e->getMessage();
            }
        }
    } else {
        $message = "全ての項目を入力してください。";
    }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>新規登録 - 百人一瞬暗記</title>
</head>
<body>
<h2>新規登録</h2>
<p><?php echo $message; ?></p>
<form method="post" action="">
    <label>ユーザー名: <input type="text" name="username" required></label><br>
    <label>メール: <input type="email" name="email" required></label><br>
    <label>パスワード: <input type="password" name="password" required></label><br>
    <button type="submit">登録</button>
</form>
<p><a href="login.php">ログインはこちら</a></p>
</body>
</html>
