<?php
require_once __DIR__ . '/../../../db/db_connect.php';

$type = $_GET['type'] ?? '';
if($type === '') {
    echo json_encode([]);
    exit;
}

$smtm = $pdo->prepare("SELECT id, title, created_at FROM posts WHERE type = ? ORDER BY created_at DESC");
$smtm->execute([$type]);
$posts = $smtm->fetchAll(PDO::FETCH_ASSOC);

foreach($posts as &$post) {
    $timestamp = strtotime($post['created_at']);
    $post['year'] = date('Y.', $timestamp);
    $post['month_day'] = date('m.d', $timestamp);
}

header('Content-Type: application/json; charset=utf-8');
echo json_encode($posts);