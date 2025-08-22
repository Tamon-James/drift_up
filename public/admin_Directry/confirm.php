<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


$type = $_POST['kind-of-admin'] ?? '';
$title = $_POST['report-title'] ?? '';
$content = $_POST['report-text'] ?? '';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>投稿確認</title>
</head>
<body>
    <h1>投稿内容確認</h1>
    <p>投稿場所: <?= htmlspecialchars($type) ?></p>
    <p>タイトル: <?= htmlspecialchars($title) ?></p>
    <p>内容: <?= nl2br(htmlspecialchars($content)) ?></p>

    <form action="save.php" method="post">
        <input type="hidden" name="kind-of-admin" value="<?= htmlspecialchars($type) ?>">
        <input type="hidden" name="report-title" value="<?= htmlspecialchars($title) ?>">
        <input type="hidden" name="report-text" value="<?= htmlspecialchars($content) ?>">
        <input type="submit" value="投稿する">
    </form>
    <form action="admin.php" method="post">
        <input type="hidden" name="kind-of-admin" value="<?= htmlspecialchars($type) ?>">
        <input type="hidden" name="report-title" value="<?= htmlspecialchars($title) ?>">
        <input type="hidden" name="report-text" value="<?= htmlspecialchars($content) ?>">
        <input type="submit" value="修正する">
    </form>
</body>
</html>
