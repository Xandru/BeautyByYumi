<!--
Date: September 16, 2018
Author:Paul Andrew Samson
Client: Yumi Xyra Samson
-->
<?php
echo '
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Beauty By Yumi</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="css/style.css" type="text/css">
    </head>';
?>
<?php
echo '
    <body>
        <header>
            <img src="img/logo.jpg" alt="Beauty By Yumi" class="logo">
            <nav class="nav-bottombar nav-topbar nav-border-blush">
                <ul>
                    <li><a href="">Home</a></li> <!-- About and Services -->
                    <li><a href="">Gallery</a></li>
                    <li><a href="schedule.php">Schedule</a></li>
                    <li><a href="faqs.html">FAQs</a></li>
                </ul>
            </nav>
        </header>
';
?>
<?php
echo '
        <section class="home-about">
            <div class="container">
                <h1 class="section-title">Who I am</h1>
                <div class="slider-frame">
                    <div class="slider">
                        <figure>
                            <div class="slide">
                                <img src="img/yumi1.jpg" alt="Yumi Xyra Samson" class="yumi">
                            </div>
                            <div class="slide">
                                <img src="img/yumi2.jpg" alt="Yumi Xyra Samson" class="yumi">
                            </div>
                            <div class="slide">
                                <img src="img/yumi3.jpg" alt="Yumi Xyra Samson" class="yumi">
                            </div>
                        </figure>
                    </div>
                </div>
                <p class="about-info">Hi, I\'m Yumi. I\'m pretty and skilled with what I do. I have been in the beauty industry since 2009. I first started with cutting hair and doing make-up, offering my skills to friends. I did not continue professionally but since August 2018 I obtained my lash extentions in August, 2018. I have been fortunate enough to start with a good amount of regular clients to prove my quality of skill. I am also open to feedback in the review section, that are fit to the public.</p>
            </div>
        </section>
';
?>
<?php
echo '
        <section class="home-gallery">
            <div class="container">
                <h1 class="section-title">What I do</h1>
                <!-- gallery -->
                <div class="gallery-board">
                    <figure class="gallery-item">
                        <img src="img/gallery1.jpg" alt="Gallery Item">
                        <figcaption class="gallery-desc">
                            <p>Picture Title</p>
                            <a href="" class="button button-accent button-small">Click Me</a>
                        </figcaption>
                    </figure>
                    <!-- gallery -->
                    <figure class="gallery-item" >
                        <img src="img/gallery2.jpg" alt="Gallery Item">
                        <figcaption class="gallery-desc">
                            <p>Picture Title</p>
                            <a href="" class="button button-accent button-small">Click Me</a>
                        </figcaption>
                    </figure>
                    <!-- gallery -->
                    <figure class="gallery-item">
                        <img src="img/gallery2.jpg" alt="Gallery Item">
                        <figcaption class="gallery-desc">
                            <p>Picture Title</p>
                            <a href="" class="button button-accent button-small">Click Me</a>
                        </figcaption>
                    </figure>
                    <!-- gallery -->
                    <figure class="gallery-item">
                        <img src="img/gallery1.jpg" alt="Gallery Item">
                        <figcaption class="gallery-desc">
                            <p>Picture Title</p>
                            <a href="" class="button button-accent button-small">Click Me</a>
                        </figcaption>
                    </figure>
                </div>    
            </div>
        </section>
';
?>
<?php
echo'
        <section class="home-review">
            <!-- Google and Facebook reviews -->
        </section>
';
?>
<?php
echo '
        <section class="social">
            <div class="container">
                <a href="" class="social-button"><img src="img\icons\iconmonstr-instagram-12-32.png"></a>
                <a href="" class="social-button"><img src="img\icons\iconmonstr-facebook-2-32.png"></a>
                <a href="" class="social-button"><img src="img\icons\iconmonstr-gmail-2-32.png"></a>
            </div>
        </section>
        <footer>


            <div class="col-1">
                <ul class="unstyled-list">
                    <li><strong>Web Links</strong></li>
                    <li>item one</li>
                    <li>item two</li>
                    <li>item three</li>
                    <li>item four</li>
                </ul>
            </div>

            <div class="col-1">
                <ul class="unstyled-list">
                    <li><strong>Credits</strong></li>
                    <li>item one</li>
                    <li>item two</li>
                    <li>item three</li>
                    <li>item four</li>
                </ul>
            </div>

        </footer>
        <!--
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        -->
    </body>
</html>
';
?>