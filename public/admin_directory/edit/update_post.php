<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

require_once __DIR__ . '/../../../db/db_connect.php';

$id         = isset($_POST['id']) ? (int)$_POST['id'] : 0;
$title      = isset($_POST['title']) ? trim($_POST['title']) : '';
$content    = isset($_POST['content']) ? trim($_POST['content']) : '';
$created_at = isset($_POST['created_at']) ? $_POST['created_at'] : '';

if ($id === 0 || empty($title) || empty($content)) {
    exit("入力内容に不備があります。");
}

$date = date("Y-m-d H:i:s");
$sql = "UPDATE posts SET title = :title, content = :content, created_at = :created_at WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    ':id' => $id,
    ':title' => $title,
    ':content' => $content,
    ':created_at' => $date
]);

echo "編集が完了しました！ <a href='../admin.php'>戻る</a>";
