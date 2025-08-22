<?php 

    $dsn = 'mysql:host=localhost;dbname=driftinformation;charset=utf8';
    $user = 'root';
    $password = '';

    require_once __DIR__ . '/../db/db_connect.php';


    if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $type = $_POST['kind-of-admin'] ?? '';
    $title = $_POST['report-title'] ?? '';
    $content = $_POST['report-text'] ?? '';

    if ($type === '未選択' || empty($title) || empty($content)) {
        echo "入力内容に不備があります。";
    } else {
        $date = date("Y-m-d");
        $sql = "INSERT INTO posts (type, title, content, created_at) VALUES (:type, :title, :content, :created_at)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':type', $type);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':created_at', $date);

        if ($stmt->execute()) {
            echo "投稿完了しました！";
        } else {
            echo "投稿失敗しました。";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>ドリフト局公式サイト</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
   
    <body>
        <header>
            <h1><a href="index.php" class="header-logo">ドリフト局</a></h1>
            <img src="images/drift-logo-clear.png" class="drift-logo">
                
            
            <a href="https://www.instagram.com/drift_kyoku?igsh=MThqOGI0a2VnM2dreQ%3D%3D&utm_source=qr"><img src="images/insta-icon.png" class="sns-icon"></a>
            <a gref="#"><img src="images/twitter-icon.png" class="sns-icon"></a>
        </header>

        <div class="main">
            <form action="admin.php" method="post">
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

                 <input type="submit" value="送信" class="send-button">
            </form>
       </div>

        <div class="footer">

        </div>

        <script src="footer.js"></script>

    </body>

</html>

