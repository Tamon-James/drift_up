<?php 
    session_start();
        if (!isset($_SESSION['user'])) {
            header("Location: login.php");
            exit;
        }




    $dsn = 'mysql:host=localhost;dbname=driftinformation;charset=utf8';
    $user = 'root';
    $password = '';

    require_once __DIR__ . '/../../db/db_connect.php';

?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>ドリフト局公式サイト</title>
        <link rel="stylesheet" href="../css/style.css">
    </head>
   
    <body>
        <header>
            <h1><a href="/../index.php" class="header-logo">ドリフト局</a></h1>
            <img src="/../images/drift-logo-clear.png" class="drift-logo">
                
            
            <a href="https://www.instagram.com/drift_kyoku?igsh=MThqOGI0a2VnM2dreQ%3D%3D&utm_source=qr"><img src="../images/insta-icon.png" class="sns-icon"></a>
            <a gref="#"><img src="../images/twitter-icon.png" class="sns-icon"></a>
        </header>

        <div class="main">
            <form action="confirm.php" method="post">
               <div class="admin-item">投稿場所選択→
                  <select name="kind-of-admin" class="admin-select">
                     <option value="未選択">選択してください</option>
                     <option value="report">活動報告</option>
                     <option value="news">ニュース</option>
                     <option value="photo">写真</option>
                    </select>
        </div>

               <div class="admin-item">タイトル</div>
                 <input type="text" name="report-title" class="admin-title">

                <div class="admin-item">内容</div>
                     <textarea name="report-text" class="admin-text"></textarea>

                <br> 写真ボックス作成予定（※今後）

                 <input type="submit" value="確認" class="send-button">
            </form>
       </div>

        <div class="footer">

        </div>

        <script src="footer.js"></script>

    </body>

</html>

