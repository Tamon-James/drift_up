<?php
session_start();
if(!isset($_SESSION["user"])){
    header("Location: /admin_directory/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>編集ページ</title>
    <link rel="stylesheet" href="/css/common.css">
    <link rel="stylesheet" href="/admin_directory/admin_css/edit_post.css">
</head>
<body>
    <?php    require_once __DIR__ . '/../admin_common/admin_header.html';    ?>
    <h1>編集ページ</h1>

    <div class="type-select">
        <label for="post-type" class="type-select-label">投稿タイプ:</label>
        <select id="post-type" name="post-type" class="type-select-dropdown">
            <option value="news">news</option>
            <option value="report">report</option>
            <option value="photo">photo</option>
        </select>
        <button id="select-btn" class="select-button">表示する</button>
    </div>

    <div class="edit-preview">
        <div id="post-list" class="post-list"></div>
    </div>

    <script src="/admin_directory/admin_js/get_post_api.js"></script>
    <script src="/js/hamburger.js"></script>

</body>
</html>