<?php

session_start();
if(!isset($_SESSION["user"])){
    header("Location: /admin_directory/login.php");
    exit();
}

require_once __DIR__ . '/../../../db/db_connect.php';

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

$sql = "SELECT * FROM posts WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);
$post = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$post) {
    header("Location: /admin_directory/edit/post_list.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>投稿内容編集</title>
    <link rel="stylesheet" href="/css/common.css">
    <link rel="stylesheet" href="/admin_directory/css/style.css">
</head>
<body>
    <h1>投稿内容編集</h1>

    <form action="confirm_edit.php" method="post">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($post['id']); ?>">

        <div>
            <label for="title">タイトル</label><br>
            <input type="text" name="title" id="title"  value="<?php echo htmlspecialchars($post['title'], ENT_QUOTES); ?>" required>
        </div>

        <div>
            <label for="content">内容</label><br>
            <textarea name="content" id="content" rows="20" cols="150" required><?php echo htmlspecialchars($post['content'], ENT_QUOTES); ?></textarea>
        </div>

        <div>
            <label for="created_at">作成日時</label><br>
            <input type="date" id="created_at" name="created_at" value="<?php echo date('Y-m-d', strtotime($post['created_at'])); ?>" required>
        </div>

        <button type="submit">確認画面へ</button>

    </form>
</body>
</html>