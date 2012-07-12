<?php
$browser = substr(trim($HTTP_USER_AGENT), 0, 4);

if ( $browser == "Noki" ) {
    $url['Paddle Pop Movie'] = 'http://store.nokia.com/content/290991';
    $url['Paddle Pop Movie 2'] = 'http://store.nokia.com/content/290991';
    $url['Shadow Master'] = 'http://store.nokia.com/content/290991';
    $url['Paddle Pop On Dessert'] = 'http://store.nokia.com/content/290991';
    $url['Liona'] = 'http://store.nokia.com/content/290991';

    /*
      http://store.ovi.mobi/content/290991


      Paddle Pop Movie 2 :
      http://store.nokia.com/content/290989
      http://store.ovi.mobi/content/290989

      Shadow Master :
      http://store.nokia.com/content/290979
      http://store.ovi.mobi/content/290979

      Paddle Pop On Dessert :
      http://store.nokia.com/content/291000
      http://store.ovi.mobi/content/291000

      Liona :
      http://store.nokia.com/content/290952
      http://store.ovi.mobi/content/290952
     * 
     */
} else {
    $url = "http://store.nokia.com/content/288627";
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="css/css.css" type="text/css" rel="stylesheet" media="screen" />
        <title>Paddlepop Mobile Launcher</title>
    </head><body>
        <div id="container">
            <div id="header">
                <h1 id="logo">Paddle Pop Mobile Phone</h1>
                <div class="back-btn">
                    <a href="index.php">Back</a>
                </div>
            </div>
            <div id="main">
                <div class="title" id="wallpaper">Wallpaper</div>
                <ul id="content-list">
                    <li><a href="http://store.ovi.com/content/290948?clickSource=publisher+channel&channel=&pos=1Paddle">Higgabottom - download</a></li>
                    <li><a href="http://store.ovi.com/content/290969?clickSource=publisher+channel&channel=&pos=2Paddle">Pop and Friends - download</a></li>
                    <li><a href="http://store.ovi.com/content/290963?clickSource=publisher+channel&channel=&pos=3">Pop and Shadow Master - download</a></li>


                    <li><a href="#">Paddle Pop Movie - download</a></li>
                    <li><a href="#">Paddle Pop Movie 2 - download</a></li>
                    <li><a href="#">Shadow Master - download</a></li>
                    <li><a href="#">Paddle Pop On Dessert - download</a></li>
                    <li><a href="#">Liona - download</a></li>



                </ul>
            </div>
            <div id="bottom">
                <div class="back-btn">
                    <a href="index.php">Back</a>
                </div>
            </div>
        </div>
    </body>
</html>