<?php
    $_POST["role"] = 'member';
    include "service.php";
    // dd($_SESSION["user"]);
    $datas = query("SELECT reservations.*, times.time, product.title FROM product, reservations,times WHERE product.id=reservations.product_id AND times.id = reservations.time_id AND member_id= ".$_SESSION['user'][0]['id']);
    // Declare for this page
    $_SESSION["title"] = "My Reservation";
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
                        <h2>News</h2>
                        <div class="breadcrumb__links">
                            <a href="./index.html">Home</a>
                            <span>News</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Blog Section Begin -->
    <section class="blog spad">
        <div class="container">
            <div class="row">
                <?php foreach($datas as $data):?>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="blog__item">
                            <div class="blog__item__pic">
                                <img src="img/blog/blog-1.jpg" alt="">
                            </div>
                            <div class="blog__item__text">
                                <h5><a href="reservation-detail.php?q=<?= $data['id']?>"><?= $data['title'] ?> (<?= $data['done_status'] ?>)</a></h5>
                                <ul>
                                    <li> <?= $data['time'] ?></li>
                                    <li><?= $data['date'] ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php endforeach;?>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->

    <!-- Footer Section Begin -->
    <?php include "layout/footer.php" ?>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <?php include "layout/js.php" ?>  
</body>

</html>