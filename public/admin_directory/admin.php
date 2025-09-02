<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: /admin_directory/login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>管理ページ</title>
    <link rel="stylesheet" href="/css/common.css">
    <link rel="stylesheet" href="/admin_directory/admin_css/admin.css">
</head>
<body>
    <?php    require_once __DIR__ . '/admin_common/admin_header.html';    ?>
    <h1>管理ページ</h1>
    <div class="menu">
        <a href="new/new_post.php" class="menu-btn">新規投稿</a>
        <a href="edit/edit_list.php" class="menu-btn">投稿編集</a>
    </div>

    <script src="/js/hamburger.js"></script>
</body>
</html>
