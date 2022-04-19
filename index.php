<?php
    $_POST["role"] = 'guest';
    include "service.php";
    $tipss = get_where("tips", 'status', 1 );
    $docters = query("SELECT * FROM docters");
    // dd($_SESSION['user']);
    // Declare for this page
    $_SESSION["title"] = "Beranda";
    $data = first("profile");
?>
<!-- H E A D -->
<?php include "layout/head.php" ?>

<body>
    <!-- Page Preloder -->
    
    <!-- Header Section Begin -->
    <?php include "layout/header.php" ?>
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    <section class="hero spad set-bg" data-setbg="img/hero-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="hero__text">
                        <span>Eiusmod tempor incididunt </span>
                        <h2>Take the world's best quality Treadment</h2>
                        <a href="#tips" class="primary-btn normal-btn">Tips for you</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Consultation Section Begin -->
    <section class="consultation">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="consultation__form">
                        <img height="500px" src="img/gallery/gallery-4.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="consultation__text">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="consultation__text__item">
                                    <div class="section-title">
                                        <span><?= $data["home_welcome"] ?></span>
                                        <h2><?= $data["home_title"] ?><b> <?= $data["home_name"] ?> </b></h2>
                                    </div>
                                    <p><?= $data["home_description"] ?></p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="consultation__video set-bg" data-setbg="img/consultation-video.jpg">
                                    <a href="<?= $data["home_video"] ?>" class="play-btn video-popup"><i class="fa fa-play"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Consultation Section End -->

    <!-- Chooseus Section Begin -->
    <section class="chooseus spad">
        <div class="container">
          
        </div>
    </section>
    <!-- Chooseus Section End -->

    <!-- Services Section Begin -->
    <section class="services spad set-bg" data-setbg="img/services-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-6">
                    <div class="section-title">
                        <span>Pelayanan kami</span>
                        <h2>Tersedia untuk anda</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="services__item">
                        <div class="services__item__icon">
                            <span class="flaticon-044-aesthetic"></span>
                        </div>
                        <div class="services__item__text">
                            <h5>Body procedures</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor aliqua.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="services__item">
                        <div class="services__item__icon">
                            <span class="flaticon-027-beauty"></span>
                        </div>
                        <div class="services__item__text">
                            <h5>Facial Procedures</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor aliqua.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="services__item">
                        <div class="services__item__icon">
                            <span class="flaticon-031-anatomy"></span>
                        </div>
                        <div class="services__item__text">
                            <h5>Breast procedures</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor aliqua.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="services__item">
                        <div class="services__item__icon">
                            <span class="flaticon-008-abdominoplasty"></span>
                        </div>
                        <div class="services__item__text">
                            <h5>Skin care & Beauty</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor aliqua.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Services Section End -->

    <!-- Team Section Begin -->
    <section class="team spad">
        <div class="container ">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="section-title">
                        <span>Our Team</span>
                        <h2>Our Expert Doctors</h2>
                    </div>
                </div>
            </div>
            <div class="row text-center">
            <?php foreach($docters as $docter):?>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="team__item">
                        <img src="file/<?= $docter['image_path']?>" alt="">
                        <h5><?= $docter['name']?></h5>
                        <span><?= $docter['specialis']?></span>
                        <div class="team__item__social">
                            <a href="<?= $docter['facebook']?>"><i class="fa fa-facebook"></i></a>
                            <a href="<?= $docter['twitter']?>"><i class="fa fa-twitter"></i></a>
                            <a href="<?= $docter['instagram']?>"><i class="fa fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            <?php endforeach?>
            </div>
        </div>
    </section>
    <!-- Team Section End -->

    <!-- Gallery Begin -->
    <div class="gallery">
        <div class="gallery__container">
            <div class="grid-sizer"></div>
            <div class="gc__item set-bg" data-setbg="img/gallery/gallery-1.jpg">
                <a href="img/gallery/gallery-1.jpg" class="image-popup"><i class="fa fa-search-plus"></i></a>
            </div>
            <div class="gc__item set-bg" data-setbg="img/gallery/gallery-2.jpg">
                <a href="img/gallery/gallery-2.jpg" class="image-popup"><i class="fa fa-search-plus"></i></a>
            </div>
            <div class="gc__item set-bg" data-setbg="img/gallery/gallery-3.jpg">
                <a href="img/gallery/gallery-3.jpg" class="image-popup"><i class="fa fa-search-plus"></i></a>
            </div>
            <div class="gc__item gc__item__large set-bg" data-setbg="img/gallery/gallery-4.jpg">
                <a href="img/gallery/gallery-4.jpg" class="image-popup"><i class="fa fa-search-plus"></i></a>
            </div>
            <div class="gc__item set-bg" data-setbg="img/gallery/gallery-5.jpg">
                <a href="img/gallery/gallery-5.jpg" class="image-popup"><i class="fa fa-search-plus"></i></a>
            </div>
            <div class="gc__item set-bg" data-setbg="img/gallery/gallery-6.jpg">
                <a href="img/gallery/gallery-6.jpg" class="image-popup"><i class="fa fa-search-plus"></i></a>
            </div>
            <div class="gc__item set-bg" data-setbg="img/gallery/gallery-7.jpg">
                <a href="img/gallery/gallery-7.jpg" class="image-popup"><i class="fa fa-search-plus"></i></a>
            </div>
        </div>
    </div>
    <!-- Gallery End -->

    <!-- Latest News Begin -->
    <section id="tips" class="latest spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-6">
                    <div class="section-title">
                        <span>Tips cantik</span>
                        <h2>Cantik itu mudah</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php foreach($tipss as $tips) :?>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="latest__item">
                            <h5><a href="#"><?= $tips["title"] ?></a></h5>
                            <p><?= $tips["description"] ?></p>                            
                        </div>
                    </div>
                <?php endforeach?>                
            </div>
        </div>
    </section>
    <!-- Latest News End -->

    <!-- Footer Section Begin -->
    <?php include "layout/footer.php" ?>                
    <!-- Footer Section End -->

    <?php include "layout/js.php" ?>            
</body>

</html>