<?php
session_start();
require 'db.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($username && $password) {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            header('Location: start.html'); // ログイン成功後のページ
            exit;
        } else {
            $message = "ユーザー名またはパスワードが間違っています。";
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
<title>ログイン - 百人一瞬暗記</title>
</head>
<body>
<h2>ログイン</h2>
<p><?php echo $message; ?></p>
<form method="post" action="">
    <label>ユーザー名: <input type="text" name="username" required></label><br>
    <label>パスワード: <input type="password" name="password" required></label><br>
    <button type="submit">ログイン</button>
</form>
<p><a href="register.php">新規登録はこちら</a></p>
</body>
</html>
