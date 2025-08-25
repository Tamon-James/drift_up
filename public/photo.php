<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ドリフト局公式サイト</title>
        <link rel="stylesheet" href="css/common.css">
        <link rel="stylesheet" href="css/photo.css">
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
                    <li><a class="menu-item" href="news.php">NEWS</a></li>
                    <li><a class="menu-item" href="members.php">MEMBER</a></li>
                    <li><a class="menu-item" href="report.php">REPORT</a></li>
                    <li><a class="menu-item-now" href="photo.php-now">PHOTO</a></li>
                    <li><a class="menu-item" href="access.php">ACCESS</a></li>
                </ul>
            </nav>
            <a href="https://www.instagram.com/drift_kyoku?igsh=MThqOGI0a2VnM2dreQ%3D%3D&utm_source=qr"><img src="images/insta-icon.png" class="sns-icon"></a>
            <a gref="#"><img src="images/twitter-icon.png" class="sns-icon"></a>
        </header>

        <div class="main">
            <h1 class="page-title">PHOTO</h1>
            <hr>


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
