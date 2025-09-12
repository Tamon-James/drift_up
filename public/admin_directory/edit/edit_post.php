<?php

session_start();
if(!isset($_SESSION["user"])){
    header("Location: /admin_directory/login.php");
    exit();
}

require_once __DIR__ . '/../../../db/db_connect.php';

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

if($_SERVER["REQUEST_METHOD"] == 'POST'){
    $title = $_POST['title'] ?? '';
    $content = $_POST['content'] ?? '';
    $created_at = $_POST['created_at'] ?? '';
}else{
    $sql = "SELECT * FROM posts WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    $post = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$post) {
        header("Location: /admin_directory/edit/post_list.php");
        exit();
    }

    $title = $post["title"];
    $content = $post["content"];
    $created_at = $post["created_at"];
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
<?php    require_once __DIR__ . '/../admin_common/admin_header.html';    ?>
    <h1>投稿内容編集</h1>

    <form action="confirm_edit.php" method="post">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($id, ENT_QUOTES) ?>">

        <div>
            <label for="title">タイトル</label><br>
            <input type="text" name="title" id="title"  value="<?php echo htmlspecialchars($title, ENT_QUOTES); ?>" required>
        </div>

        <div>
            <label for="content">内容</label><br>
            <textarea name="content" id="content" rows="20" cols="150" required><?php echo htmlspecialchars($content, ENT_QUOTES); ?></textarea>
        </div>

        <div>
            <label for="created_at">作成日時</label><br>
            <input type="date" id="created_at" name="created_at" value="<?php echo date('Y-m-d', strtotime($created_at)); ?>" required>
        </div>
        <br>
        <button type="submit">確認画面へ</button><br><br>
        <button type="button" onclick="window.location.href='edit_list.php'">投稿一覧へ戻る</button><br><br>
    </form>

    <form action="delete_post.php" method="post" onsubmit="return confirm('[<?= htmlspecialchars($title, ENT_QUOTES) ?>]を本当に削除しますか？削除された場合、復元できません。');">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($id, ENT_QUOTES); ?>">
            <button type="submit">投稿削除</button>
    </form>

    
</body>
</html>