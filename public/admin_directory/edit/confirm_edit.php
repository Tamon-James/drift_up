<?php
session_start();
if(!isset($_SESSION["user"])){
    header("Location: /admin_directory/login.php");
    exit();
}


$id         = isset($_POST['id']) ? (int)$_POST['id'] : 0;
$title      = isset($_POST['title']) ? trim($_POST['title']) : '';
$content    = isset($_POST['content']) ? trim($_POST['content']) : '';
$created_at = isset($_POST['created_at']) ? $_POST['created_at'] : '';


$safe_title      = htmlspecialchars($title, ENT_QUOTES, 'UTF-8');
$safe_content    = nl2br(htmlspecialchars($content, ENT_QUOTES, 'UTF-8'));
$safe_created_at = htmlspecialchars($created_at, ENT_QUOTES, 'UTF-8');

require_once __DIR__ . '/../../../db/db_connect.php';

$sql = "SELECT content FROM posts WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->execute();

$before = $stmt->fetch(PDO::FETCH_ASSOC);
$before_content = $before ? nl2br(htmlspecialchars($before['content'],ENT_QUOTES,'UTF-8')) : '';
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>投稿内容確認</title>
    <link rel="stylesheet" href="/css/common.css">
    <link rel="stylesheet" href="/admin_directory/admin_css/edit_post.css">
</head>
<body>
    <h1>編集内容確認</h1>
    <hr>

    <form action="update_post.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="hidden" name="title" value="<?php echo $safe_title; ?>">
        <input type="hidden" name="content" value="<?php echo htmlspecialchars($content, ENT_QUOTES, 'UTF-8'); ?>">
        <input type="hidden" name="created_at" value="<?php echo htmlspecialchars($safe_created_at, ENT_QUOTES, 'UTF-8'); ?>">

        <div>
            <strong>タイトル：</strong><br>
            <?php echo '<div class="confirm_title">' . $safe_title . '</div>'; ?>
        </div>

        <div class="content-change">
            <strong>内容の変更点：</strong><br>
        <?php
            function diffHighlight($old, $new) {
            $oldWords = preg_split('//u', $old, -1, PREG_SPLIT_NO_EMPTY);
            $newWords = preg_split('//u', $new, -1, PREG_SPLIT_NO_EMPTY);

            $matrix = [];
            $maxlen = 0;
            $omax = $nmax = 0;

            foreach ($oldWords as $oIndex => $oWord) {
                $nkeys = array_keys($newWords, $oWord);
                    foreach ($nkeys as $nIndex) {
                        $matrix[$oIndex][$nIndex] = ($matrix[$oIndex-1][$nIndex-1] ?? 0) + 1;
                        if ($matrix[$oIndex][$nIndex] > $maxlen) {
                            $maxlen = $matrix[$oIndex][$nIndex];
                            $omax = $oIndex + 1 - $maxlen;
                            $nmax = $nIndex + 1 - $maxlen;
                        }
                    }
                }

            if ($maxlen === 0) {
                $out = '';
                if (!empty($oldWords)) {
                    $out .= '<span style="background-color:red;text-decoration:line-through;">' . implode('', $oldWords) . '</span>';
                }
                if (!empty($newWords)) {
                    $out .= '<span style="background-color:lime;">' . implode('', $newWords) . '</span>';
                }
                return $out;
            }

            return diffHighlight(
            implode('', array_slice($oldWords, 0, $omax)),
            implode('', array_slice($newWords, 0, $nmax))
            ) .
            implode('', array_slice($newWords, $nmax, $maxlen)) .
            diffHighlight(
            implode('', array_slice($oldWords, $omax + $maxlen)),
            implode('', array_slice($newWords, $nmax + $maxlen))
            );
        }

        $before_text = $before['content'] ?? '';
        $after_text  = $content;

        $before_text = str_replace("\n","\n",$before_text);
        $after_text  = str_replace("\n","\n",$after_text);

        echo '<div class="confirm_content">' 
            . nl2br(diffHighlight(
            htmlspecialchars($before_text,ENT_QUOTES,'UTF-8'),
            htmlspecialchars($after_text,ENT_QUOTES,'UTF-8')
            ))
            . '</div>';
        ?>
        </div>

        <div>
            <strong>作成日時：</strong><br>
            <?php echo '<div class="confirm_date">' . $safe_created_at . '</div>'; ?>
        </div>

        <br>
        <button type="submit">この内容で保存する</button>
    </form>

    <form action="edit_post.php" method="post" style="margin-top:10px;">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="hidden" name="title" value="<?php echo $safe_title; ?>">
        <input type="hidden" name="content" value="<?php echo htmlspecialchars($content) ?>">
        <input type="hidden" name="created_at" value="<?php echo htmlspecialchars($safe_created_at) ?>">
        <button type="submit">戻って修正する</button>
    </form>
</body>
</html>
