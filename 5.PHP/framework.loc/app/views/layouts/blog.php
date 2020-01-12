<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
    <link href="/blog/css/bootstrap.css" rel='stylesheet' type='text/css'/>
    <link href="/blog/css/style.css" rel='stylesheet' type='text/css'/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <?php framework\core\base\View::getMeta(); ?>
    <!----webfonts---->
    <link href='http://fonts.googleapis.com/css?family=Oswald:100,400,300,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,300italic' rel='stylesheet'
          type='text/css'>
    <!----//webfonts---->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <!--end slider -->
    <!--script-->
    <script type="text/javascript" src="/blog/js/move-top.js"></script>
    <script type="text/javascript" src="/blog/js/easing.js"></script>
    <!--/script-->
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $(".scroll").click(function (event) {
                event.preventDefault();
                $('html,body').animate({scrollTop: $(this.hash).offset().top}, 900);
            });
        });
    </script>
    <!---->

</head>
<body>
<!---header---->
<div class="header">
    <div class="container">
        <div class="logo">
            <a href="/"><img src="/blog/images/logo.jpg" title=""/></a>
        </div>
        <!---start-top-nav---->
        <div class="top-menu">
            <span class="menu"> </span>
            <ul>
                <li class="active"><a href="/">HOME</a></li>
                <li><a href="page/about">ABOUT</li>
                <li><a href="/admin">ADMIN</a></li>
                <li><a href="/user/signup">SIGNUP</a></li>
                <li><a href="/user/login">LOGIN</a></li>
                <li><a href="/user/logout">LOGOUT</a></li>
                <div class="clearfix"></div>
            </ul>
        </div>
        <div class="clearfix"></div>
        <script>
            $("span.menu").click(function () {
                $(".top-menu ul").slideToggle("slow", function () {
                });
            });
        </script>
        <!---//End-top-nav---->
    </div>
</div>
<!--/header-->
<div class="content">
    <div class="container">
        <div class="content-grids">
            <div class="col-md-8 content-main">
                <div class="content-grid">
                    <div class="container">
                        <?php if (isset($_SESSION['error'])): ?>
                            <div class="alert alert-danger">
                                <?= $_SESSION['error'];
                                unset($_SESSION['error']); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="container">
                        <?php if (isset($_SESSION['success'])): ?>
                            <div class="alert alert-success">
                                <?= $_SESSION['success'];
                                unset($_SESSION['success']); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <?= $content ?>

                </div>
            </div>
            <div class="col-md-4 content-right">
                <?php $this->getPart('inc/sidebar'); ?>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!---->
<div class="footer">
    <div class="container">
        <p>Copyrights © 2015 Blog All rights reserved | Template by <a href="http://w3layouts.com/">W3layouts</a></p>
    </div>
</div>


</body>
</html>