
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__logo">
            <a href="./index.html"><img src="img/logo.png" alt=""></a>
        </div>
        <div id="mobile-menu-wrap"></div>
        <?php if($_SESSION['role'] == 'member') : ?>  
            <div class="offcanvas__btn">
                <a href="my-profile.php" class="primary-btn">My Profile</a>
            </div>
        <?php else : ?>
            <div class="offcanvas__btn">
            <a href="sigin-user.php" class="primary-btn">Login</a>
        </div>
        <?php endif; ?>
        
    </div>

<header class="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="header__logo">
                        <a href="./"><img src="img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-10">
                    <div class="header__menu__option">
                        <nav class="header__menu">
                            <ul>
                                <li class="active"><a href="index.php">Home</a></li>
                                <li><a href="my-reservations.php">My Reservation</a></li>
                                <li><a href="product.php">Product</a>
                                    <ul class="dropdown">
                                        <li><a href="./product.php#recomendation">Recomendation</a></li>
                                        <li><a href="./product.php#product">Product</a></li>
                                        <li><a href="./product.php#promotion">Promotion</a></li>
                                    </ul>
                                </li>
                                <!-- <li><a href="./blog.html">News</a></li> -->
                                <li><a href="about.php">About</a></li>
                            </ul>
                        </nav>
                        <?php if($_SESSION['role'] == 'member') : ?>  
                            <div class="header__btn">
                                <a href="my-profile.php" class="primary-btn">My Profile</a>
                            </div>
                        <?php else : ?>
                            <div class="header__btn">
                                <a href="sigin-user.php" class="primary-btn">Login</a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="canvas__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>