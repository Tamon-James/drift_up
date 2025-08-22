<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

require_once __DIR__ . '/../../db/db_connect.php';

$type = $_POST['kind-of-admin'] ?? '';
$title = $_POST['report-title'] ?? '';
$content = $_POST['report-text'] ?? '';

if ($type === '未選択' || empty($title) || empty($content)) {
    exit("入力内容に不備があります。");
}

$date = date("Y-m-d H:i:s");
$sql = "INSERT INTO posts (type, title, content, created_at) VALUES (:type, :title, :content, :created_at)";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    ':type' => $type,
    ':title' => $title,
    ':content' => $content,
    ':created_at' => $date
]);

echo "投稿完了しました！ <a href='admin.php'>戻る</a>";
