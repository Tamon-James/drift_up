<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

    require_once __DIR__ . '/../../../db/db_connect.php';

    $type = $_POST['kind-of-admin'] ?? '';
    $title = $_POST['report-title'] ?? '';
    $content = $_POST['report-text'] ?? '';
?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ドリフト局公式サイト</title>
        <link rel="stylesheet" href="../../css/common.css">
        <link rel="stylesheet" href="../admin_css/new_post.css">
    </head>
   
    <body>
<?php    require_once __DIR__ . '/../admin_common/admin_header.html';    ?>

        <div class="main">
            <form action="confirm.php" method="post">
                <div class="admin-item">投稿場所選択→
                    <select name="kind-of-admin" class="admin-select">
                        <option value="未選択">選択してください</option>
                        <option value="report" <?= $type === 'report' ? 'selected' : '' ?>>活動報告</option>
                        <option value="news" <?= $type === 'news' ? 'selected' : '' ?>>ニュース</option>
                        <option value="photo" <?= $type === 'photo' ? 'selected' : '' ?>>写真</option>
                    </select>
                </div>

               <div class="admin-item">タイトル</div>
                 <input type="text" name="report-title" class="admin-title" value="<?=htmlspecialchars($title) ?>">

                <div class="admin-item">内容</div>
                     <textarea name="report-text" class="admin-text"><?=htmlspecialchars($content) ?></textarea>

                <br> 写真ボックス作成予定（※今後）

                 <input type="submit" value="確認" class="send-button">
            </form>
       </div>

        <div class="footer">

        </div>

        <script src="footer.js"></script>

    </body>

</html>

