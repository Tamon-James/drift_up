<?php
require_once __DIR__ . '/../db/db_connect.php';

?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>ドリフト局公式サイト</title>
        <link rel="stylesheet" href="css/common.css">
        <link rel="stylesheet" href="css/report.css">
    </head>
    
    <body>
        <header>
            <h1 class="header-logo"><a href="index.php">ドリフト局</a></h1>
            <img src="images/drift-logo-clear.png" class="drift-logo">
            <nav class="header-list">
                <ul class="menu-group">
                    <li><a class="menu-item" href="news.php">NEWS</a></li>
                    <li><a class="menu-item" href="members.php">MEMBER</a></li>
                    <li><a class="menu-item-now" href="report.php">REPORT</a></li>
                    <li><a class="menu-item" href="photo.php">PHOTO</a></li>
                    <li><a class="menu-item" href="access.php">ACCESS</a></li>
                </ul>
            </nav>
            <a href="https://www.instagram.com/drift_kyoku?igsh=MThqOGI0a2VnM2dreQ%3D%3D&utm_source=qr"><img src="images/insta-icon.png" class="sns-icon"></a>
            <a gref="#"><img src="images/twitter-icon.png" class="sns-icon"></a>
        </header>


<!--test2 -->
        <div class="main">

            <h1 class="page-title">REPORT</h1>
            <hr>

            <?php
            $sql = "SELECT * FROM posts WHERE type = 'report' ORDER BY id DESC";
            $stmt = $pdo->query($sql);

            foreach ($stmt as $row) {
                 $id = htmlspecialchars($row['id']);
                 $title = htmlspecialchars($row['title']);

                 $date = date('Y.m.d', strtotime($row['created_at'])); 


                 echo '<a href="common/show.php?type=report&id=' . $id . '" class="report-link">';
                 echo    '<div class="report-box">
                            <div class="report-samune">
                                <img src="images/drift-logo-color.jpg">
                            </div>
                            <div class="report-box-text">
                            <div class="report-box-title">' . $title . '</div>
                        <div class="report-data">' . $date . '</div>
                         </div>
                     </div>';
                 echo '</a>';
            }
            
?>


<!--test2-->


        </div>

        <script src="footer.js"></script>

    </body>
</html>