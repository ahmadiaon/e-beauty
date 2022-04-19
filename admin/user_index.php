<?php
    include "service.php";
    $tipss = get_where("tips", 'status', 1 );
    // Declare for this page
    $_SESSION["title"] = "Beranda";
?>
<!-- H E A D -->
<?php include "layout/head.php" ?>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

   <?php include "layout/navbar.php" ?>
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    <section class="hero spad set-bg" data-setbg="img/hero-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    
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
                                        <span>Selamat datang di Beauty</span>
                                        <h2>Dapatkan Pelayanan <b>AESTHETIC</b></h2>
                                    </div>
                                    <p>30 Years of experience in Cosmetic Surgery.Lorem ipsum dolor sit amet,
                                        consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                                    dolore magna aliqua.</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="consultation__video set-bg" data-setbg="img/consultation-video.jpg">
                                    <a href="https://www.youtube.com/watch?v=PXsuI67s2AA" class="play-btn video-popup"><i class="fa fa-play"></i></a>
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
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="team__item">
                        <img src="img/team/team-1.jpg" alt="">
                        <h5>Caroline Grant</h5>
                        <span>Plastic surgeon</span>
                        <div class="team__item__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-dribbble"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="team__item">
                        <img src="img/team/team-2.jpg" alt="">
                        <h5>Dr. Maria Angel</h5>
                        <span>Plastic surgeon</span>
                        <div class="team__item__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-dribbble"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="team__item">
                        <img src="img/team/team-3.jpg" alt="">
                        <h5>Nathan Mullins</h5>
                        <span>Plastic surgeon</span>
                        <div class="team__item__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-dribbble"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="team__item">
                        <img src="img/team/team-3.jpg" alt="">
                        <h5>Nathan Mullins</h5>
                        <span>Plastic surgeon</span>
                        <div class="team__item__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-dribbble"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="team__item">
                        <img src="img/team/team-3.jpg" alt="">
                        <h5>Nathan Mullins</h5>
                        <span>Plastic surgeon</span>
                        <div class="team__item__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-dribbble"></i></a>
                        </div>
                    </div>
                </div>
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
    <section class="latest spad">
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
    <footer class="footer">
        <div class="footer__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                        <div class="footer__logo">
                            <a href="#"><img src="img/footer-logo.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-8">
                        <div class="footer__newslatter">
                            <form action="#">
                                <input type="text" placeholder="Email">
                                <button type="submit" class="site-btn">Subscribe</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="footer__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-dribbble"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <div class="footer__widget">
                        <h5>Company</h5>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Departments</a></li>
                            <li><a href="#">Find a Doctor</a></li>
                            <li><a href="#">FAQ</a></li>
                            <li><a href="#">News</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <div class="footer__widget">
                        <h5>Quick links</h5>
                        <ul>
                            <li><a href="#">Facial Fillers</a></li>
                            <li><a href="#">Breast Surgery</a></li>
                            <li><a href="#">Body Lifts</a></li>
                            <li><a href="#">Face & Neck</a></li>
                            <li><a href="#">Fat Reduction</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="footer__address">
                        <h5>Contact Us</h5>
                        <ul>
                            <li><i class="fa fa-map-marker"></i> Los Angeles Gournadi, 1230 Bariasl</li>
                            <li><i class="fa fa-phone"></i> 1-677-124-44227</li>
                            <li><i class="fa fa-envelope"></i> Support@gmail.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-6">
                    <div class="footer__map">
                        <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d48158.305462977965!2d-74.13283844036356!3d41.02757295168286!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c2e440473470d7%3A0xcaf503ca2ee57958!2sSaddle%20River%2C%20NJ%2007458%2C%20USA!5e0!3m2!1sen!2sbd!4v1575917275626!5m2!1sen!2sbd"
                        height="190" style="border:0" allowfullscreen=""></iframe>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer__copyright">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        <div class="footer__copyright__text">
                            <p>Copyright &copy; <script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a></p>
                        </div>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </div>
                    <div class="col-lg-5">
                        <ul>
                            <li>All Rights Reserved</li>
                            <li>Terms & Use</li>
                            <li>Privacy Policy</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/masonry.pkgd.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>