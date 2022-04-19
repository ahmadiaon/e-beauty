<?php
    include "service.php";
    

    
    if(isset($_GET['q']))
    {
        $id = $_GET['q'];
        $reservation = queryObj("SELECT reservations.* , product.title, product.price, times.time from product, reservations,times WHERE product.id=reservations.product_id AND times.id = reservations.time_id AND reservations.id= $id");
        // dd($reservation);
       // $q = queryObj("SELECT reservations.*, times.time, product.title FROM product, reservations,times WHERE product.id=reservations.product_id AND times.id = reservations.time_id AND member_id= ".$_SESSION['user'][0]['id']");
        // $product = first_where("product","id",$data["product_id"]);
    }else{
        header("location: product.php");;
    }
?>
<?php include "layout/head.php" ?>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <?php include "layout/header.php" ?>

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option spad set-bg" data-setbg="img/breadcrumb-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Reservations</h2>
                        <div class="breadcrumb__links">
                            <a href="./index.html">Home</a>
                            <span>Checkout</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- About Section Begin -->
    <section class="about spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="about__video set-bg" data-setbg="img/about-video.jpg">
                        <a href="https://www.youtube.com/watch?v=PXsuI67s2AA" class="play-btn video-popup"><i class="fa fa-play"></i></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="about__text">
                        <div class="section-title">
                            <span>I want to order</span>
                            <h2><?= $reservation['title']?></h2>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua.</p>
                        <ul>
                            <li><i class="fa fa-check-circle"></i> I ordered on <?= $reservation['date']?>  at <?= $reservation['time']?></li>
                            <li><i class="fa fa-check-circle"></i> product with a price of <?= $reservation['price']?> rupiah</li>
                            <li><i class="fa fa-check-circle"></i> Transaction status, <?= $reservation['done_status']?></li>
                            <li><i class="fa fa-check-circle"></i> Payment code, <?= $reservation['bill_key']?></li>
                            <li><i class="fa fa-check-circle"></i> Document payment,<a href="<?= $reservation['pdf_url']?>">here</a> </li>
                            <li><i class="fa fa-check-circle"></i> Due, Tue Apr 12 2022 22:48:04 GMT+0700 (Indochina Time)</li>

                            
                        </ul>
                       
                        </div>
                        <a href="product.php" class="btn btn-secondary">Product</a>
                        <button type="button" <?= ($reservation['done_status'] == 'cencel' ||$reservation['done_status'] == 'done')?"hidden":"" ?> id="cencel_reservation" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModalCenter">
                            Cencel
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Cencel Reservation</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <h3>Are you sure to cencel this Reservation?</h3>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                <form action="service.php" method="POST">
                                    <input type="text" id="order_id" name="order_id" value=" <?= $reservation['order_id']?>">
                                    <input type="text" id="done_status" name="done_status" value="cencel">
                                    <button type="submit" name="cencel_order" class="btn btn-primary">Yes</button>
                                </form>
                            </div>
                            </div>
                        </div>
                        </div>
                        <!-- <button id="pay-button">Pay!</button>    -->

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Section End -->

    <?php include "layout/footer.php" ?>    


    <!-- Js Plugins -->
    <?php include "layout/js.php" ?>      

</body>

</html>