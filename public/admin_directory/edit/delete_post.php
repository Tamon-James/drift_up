<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: /admin_directory/login.php");
    exit();
}

require_once __DIR__ . '/../../../db/db_connect.php';

$id = isset($_POST['id']) ? (int)$_POST['id'] : 0;

if ($id > 0 && $_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $sql = "DELETE FROM posts WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        ?>
        <!DOCTYPE html>
        <html lang="ja">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>投稿削除完了</title>
            <link rel="stylesheet" href="/css/common.css">
            <link rel="stylesheet" href="/admin_directory/css/edit.css">
        </head>
        <body>
            <?php require_once __DIR__ . '/../admin_common/admin_header.html'; ?>
            <h1>投稿削除完了</h1>
            <p>投稿は正常に削除されました。</p>
            <button type="button" onclick="window.location.href='edit_list.php'">投稿一覧へ戻る</button>
        </body>
        </html>
        <?php
        exit();

    } catch (PDOException $e) {
        echo "削除エラー: " . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8');
        exit();
    }
} else {
    echo "不正なアクセスです。";
    exit();
}
