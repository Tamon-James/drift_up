<?php
require_once __DIR__ . '/../db/db_connect.php';

$limit = 10; // 1ページあたりの件数
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) { $page = 1; }
$offset = ($page - 1) * $limit;

$sql = "SELECT * FROM posts WHERE type = 'news' ORDER BY id DESC LIMIT :limit OFFSET :offset";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();
$news = $stmt->fetchAll();


$count_sql = "SELECT COUNT(*) FROM posts WHERE type = 'news'";
$total = $pdo->query($count_sql)->fetchColumn();
$total_pages = ceil($total / $limit);
?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ドリフト局公式サイト</title>
        <link rel="stylesheet" href="css/common.css">
        <link rel="stylesheet" href="css/news.css">
    </head>

    <body>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>ドリフト局公式サイト</title>
        <link rel="stylesheet" href="css/common.css">
        <link rel="stylesheet" href="css/news.css">
    </head>

    <body>
        <header>
            <h1><a href="index.php" class="header-logo">ドリフト局</a></h1>
            <img src="images/drift-logo-clear.png" class="drift-logo">

            <div class="hamburger" id="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div>

            <nav class="header-list">
                <ul class="menu-group">
                    <li><a class="menu-item-now" href="news.php">NEWS</a></li>
                    <li><a class="menu-item" href="members.php">MEMBER</a></li>
                    <li><a class="menu-item" href="report.php">REPORT</a></li>
                    <li><a class="menu-item" href="photo.php">PHOTO</a></li>
                    <li><a class="menu-item" href="access.php">ACCESS</a></li>
                </ul>
            </nav>
            <a href="https://www.instagram.com/drift_kyoku?igsh=MThqOGI0a2VnM2dreQ%3D%3D&utm_source=qr"><img src="images/insta-icon.png" class="sns-icon"></a>
            <a gref="#"><img src="images/twitter-icon.png" class="sns-icon"></a>
        </header>

        <div class="main">
            <h1 class="page-title">NEWS</h1>
            <hr>

            <?php
            foreach ($news as $row) {
                    $id = htmlspecialchars($row['id']);
                    $title = htmlspecialchars($row['title']);
                    $date = date('Y.m.d', strtotime($row['created_at']));

                    echo '<a href="common/show.php?type=news&id=' . $id . '" class="news-link">';
                    echo    '<div class="news-box">
                            <div class="news-samune">' . $date . '</div>
                            <div class="news-box-text">
                            <div class="news-box-title">' . $title . '</div>
                        </div>
                    </div>';
                    echo '</a>';
                }
            ?>
            <div class="pagination">
                <?php if ($page > 1): ?>
                    <a href="?page=<?= $page-1 ?>">前へ</a>
                <?php endif; ?>

                <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                    <?php if ($i == $page): ?>
                        <span class="current"><?= $i ?></span>
                    <?php else: ?>
                        <a href="?page=<?= $i ?>"><?= $i ?></a>
                    <?php endif; ?>
                <?php endfor; ?>

                <?php if ($page < $total_pages): ?>
                    <a href="?page=<?= $page+1 ?>">次へ</a>
                <?php endif; ?>
            </div>
        </div>


    <script>
    const hamburger = document.querySelector('.hamburger');
    const menu = document.querySelector('.header-list');

    hamburger.addEventListener('click', () => {
        menu.classList.toggle('active');
    });
    </script>
    <script src="footer.js"></script>

    </body>
</html>