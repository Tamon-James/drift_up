<?php
require_once __DIR__ . '/../../db/db_connect.php';


$type = $_GET['type'] ?? '';
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;


if ($type === '' || $id === 0) {
    http_response_code(response_code: 400); 
    exit('不正なパラメータです。');
}

// SQLを安全に実行
$sql = "SELECT * FROM posts WHERE type = :type AND id = :id LIMIT 1";
$stmt = $pdo->prepare($sql);
$stmt->execute([':type' => $type, ':id' => $id]);
$post = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ドリフト局公式サイト</title>
    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="../css/show.css">
</head>

<body>
    <div class="main">
        <div class="atama">
            <h1 class="page-title"><?= htmlspecialchars(strtoupper($type)) ?></h1>
            <?php if ($post): ?>
                <div class="show-date"><?= htmlspecialchars(date('Y.m.d', strtotime($post['created_at']))) ?></div>
            <?php endif; ?>
        </div>   
        <hr>  
              
        <div class="show-box">
            <?php if ($post): ?>
                <div class="show-title"><?= htmlspecialchars($post['title']) ?></div>
                <div class="show-text">
                    <?= nl2br(htmlspecialchars($post['content'])) ?>
                </div>
            <?php else: ?>
                <p>ページが見つかりません。</p>
            <?php endif; ?>
        </div>
        <a class="back" href="../report.php">back</a>
    </div>
</body>
</html>
