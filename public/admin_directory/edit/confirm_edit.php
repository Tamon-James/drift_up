<?php
session_start();
if(!isset($_SESSION["user"])){
    header("Location: /admin_directory/login.php");
    exit();
}

$id         = isset($_POST['id']) ? (int)$_POST['id'] : 0;
$title      = isset($_POST['title']) ? trim($_POST['title']) : '';
$content    = isset($_POST['content']) ? trim($_POST['content']) : '';
$created_at = isset($_POST['created_at']) ? $_POST['created_at'] : '';


$safe_title      = htmlspecialchars($title, ENT_QUOTES, 'UTF-8');
$safe_content    = nl2br(htmlspecialchars($content, ENT_QUOTES, 'UTF-8'));
$safe_created_at = htmlspecialchars($created_at, ENT_QUOTES, 'UTF-8');
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>投稿内容確認</title>
    <link rel="stylesheet" href="/css/common.css">
    <link rel="stylesheet" href="/admin_directory/css/style.css">
</head>
<body>
    <h1>編集内容確認</h1>

    <form action="update_post.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="hidden" name="title" value="<?php echo $safe_title; ?>">
        <input type="hidden" name="content" value="<?php echo htmlspecialchars($content, ENT_QUOTES, 'UTF-8'); ?>">
        <input type="hidden" name="created_at" value="<?php echo htmlspecialchars($safe_created_at, ENT_QUOTES, 'UTF-8'); ?>">

        <div>
            <strong>タイトル：</strong><br>
            <?php echo $safe_title; ?>
        </div>

        <div>
            <strong>内容：</strong><br>
            <?php echo $safe_content; ?>
        </div>

        <div>
            <strong>作成日時：</strong><br>
            <?php echo $safe_created_at; ?>
        </div>

        <br>
        <button type="submit">この内容で保存する</button>
    </form>

    <form action="edit_post.php" method="get" style="margin-top:10px;">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <button type="submit">戻って修正する</button>
    </form>
</body>
</html>
