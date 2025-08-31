<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // test
    if ($username === 'admin' && $password === 'admin') {
        $_SESSION['user'] = $username;
        header("Location: /admin_directory/admin.php");
        exit;
    } else {
        $error = "ログイン失敗：ユーザー名またはパスワードが違います。";
    }
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ログイン</title>
    <link rel="stylesheet" href="/css/common.css">
    <link rel="stylesheet" href="admin_css/admin.css">
</head>
<body>
    <h1>管理者ログイン</h1>
    <?php if (!empty($error)) echo "<p class='error'>$error</p>"; ?>
    <form method="post" class="login-form">
        ユーザー名: <input type="text" name="username"><br>
        パスワード: <input type="password" name="password"><br>
        <input type="submit" value="ログイン">
    </form>
</body>
</html>
