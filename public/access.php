<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ドリフト局公式サイト</title>
        <link rel="stylesheet" href="css/common.css">
        <link rel="stylesheet" href="css/access.css">
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
                    <li><a class="menu-item" href="photo.php">PHOTO</a></li>
                    <li><a class="menu-item-now" href="access.php">ACCESS</a></li>
                </ul>
            </nav>
            <a href="https://www.instagram.com/drift_kyoku?igsh=MThqOGI0a2VnM2dreQ%3D%3D&utm_source=qr"><img src="images/insta-icon.png" class="sns-icon"></a>
            <a gref="#"><img src="images/twitter-icon.png" class="sns-icon"></a>
        </header>

        <div class="ACCESS-main">
            <h1 class="page-title">主な活動場所</h1>
            <hr>
                 <div class="map">
                   <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3240.748439369923!2d139.3180561!3d35.683195700000006!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60191efbf4760a57%3A0xeac22d357c022101!2z5bel5a2m6Zmi5aSn5a2mIOWFq-eOi-WtkOOCreODo-ODs-ODkeOCuQ!5e0!3m2!1sja!2sjp!4v1744622063852!5m2!1sja!2sjp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            

        </div>

        <div class="footer">

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