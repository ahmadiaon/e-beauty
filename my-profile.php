<?php
    $_POST["role"] = 'member';
    include "service.php";
    $id = $_SESSION['user'][0]['id'];
    $data = queryObj("SELECT * FROM members WHERE id= $id");
    $_SESSION["title"] = "My-Profile";
?>
<?php include "layout/head.php" ?>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>



    <!-- Header Section Begin -->
    <?php include "layout/header.php" ?>
    <!-- Header Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option spad set-bg" data-setbg="img/breadcrumb-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>My Profile</h2>
                        <div class="breadcrumb__links">
                            <a href="./index.html">Home</a>
                            <span>My-Profile</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Contact Section Begin -->
    <section class="contact spad">
        <div class="container">
            <div class="contact__content">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="contact__pic">
                            <img src="img/contact-pic.jpg" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="contact__form">
                            <h3>My Profile</h3>
                            <form action="service.php" method="POST">
                                <input name="id" type="hidden" value="<?=$data['id'] ?>">
                                <input name="username" type="text" placeholder="Name" value="<?=$data['username'] ?>">
                                <input name="email" type="email" placeholder="Email" value="<?=$data['email'] ?>">
                                <input name="phone_number" type="text" placeholder="Website" value="<?=$data['phone_number'] ?>">
                                <input name="address" type="text" placeholder="alamat" value="<?=$data['address'] ?>">
                                <input name="password" type="password" placeholder="**********">
                                <div class="row">
                                    <div class="col">
                                        <button name="update_member" type="submit" class="site-btn">SAVE CHANGE</button>
                                    </div>
                                    <div class="col">
                                        <a href="/sigin-user.php">
                                            <button type="button" class="btn btn-lg btn-secondary">LOG OUT</button>
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

    <!-- Footer Section Begin -->
    <?php include "layout/footer.php" ?>    


    <!-- Js Plugins -->
    <?php include "layout/js.php" ?> 
</body>

</html>