<?php
    include "service.php";
    $today = date("Y-m-d");
    if(isset($_POST['add_reservation']))
    {
        $data = $_POST;
        $id = $data["product_id"];
        $product = queryObj("SELECT promotions.*, product.* FROM promotions, product WHERE promotions.product_id = product.id AND promotions.status=1 AND `promotions`.`start_date` < '$today' AND '$today' < `promotions`.`end_date` AND `product`.`id` = $id ");
        if(isset($product)){
            $price = $product["price"] - ($product['price']*$product['discount'] /100);
        }else{
            $product = first_where("product","id",$id);
            $price = $product["price"];
        }
        // dd($product);
    }else{
        header("location: product.php");;
    }
    
    require_once 'vendor/autoload.php';

    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();

    //Set Your server key
    Midtrans\Config::$serverKey = $_ENV['MIDTRANS_SERVER_KEY'];
    $clientKey = $_ENV['MIDTRANS_CLIENT_KEY'];
    // Uncomment for production environment
    // Midtrans\Config::$isProduction = true;

    // Enable sanitization
    Midtrans\Config::$isSanitized = true;

    // Enable 3D-Secure
    Midtrans\Config::$is3ds = true;

    // Uncomment for append and override notification URL
    // Midtrans\Config::$appendNotifUrl = "https://example.com";
    // Midtrans\Config::$overrideNotifUrl = "https://example.com";

    // Required
    $transaction_details = array(
        'order_id' => rand(),
        'gross_amount' => 94000, // no decimal allowed for creditcard
    );

    // Optional
    $item1_details = array(
        'id' => 'a1',
        'price' => $price,
        'quantity' => 1,
        'name' => $product['title']
    );

    // Optional
    $item_details = array($item1_details);

    // dd($_SESSION['user']);
    // Optional
    $billing_address = array(
        'first_name'    => $_SESSION['user'][0]['username'],
        'last_name'     => "-",
        'address'       => " ",
        'city'          => CITY,
        'postal_code'   => POSTAL_CODE,
        'phone'         => $_SESSION['user'][0]['phone_number'],
        'country_code'  => 'IDN'
    );

    // Optional
    $shipping_address = array(
        'first_name'    => $_SESSION['user'][0]['username'],
        'last_name'     => " ",
        'address'       => " ",
        'city'          => CITY,
        'postal_code'   => POSTAL_CODE,
        'phone'         => $_SESSION['user'][0]['phone_number'],
        'country_code'  => 'IDN'
    );

    // Optional
    $customer_details = array(
        'first_name'    => $_SESSION['user'][0]['username'],
        'last_name'     => " ",
        'email'         => $_SESSION['user'][0]['email'],
        'phone'         => $_SESSION['user'][0]['phone_number'],
        'billing_address'  => $billing_address,
        'shipping_address' => $shipping_address
    );

    // Optional, remove this to display all available payment methods
    $enable_payments = array('credit_card','cimb_clicks','mandiri_clickpay','echannel');

    // Fill transaction details
    $transaction = array(
        'enabled_payments' => $enable_payments,
        'transaction_details' => $transaction_details,
        'customer_details' => $customer_details,
        'item_details' => $item_details,
    );

    $snapToken = Midtrans\Snap::getSnapToken($transaction);
    echo "snapToken = ".$snapToken;
    $base = $_SERVER['REQUEST_URI'];
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Aesthetic Template">
    <meta name="keywords" content="Aesthetic, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aesthetic | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/flaticon.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__logo">
            <a href="./index.html"><img src="img/logo.png" alt=""></a>
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__btn">
            <a href="#" class="primary-btn">Appointment</a>
        </div>
        <ul class="offcanvas__widget">
            <li><i class="fa fa-phone"></i> 1-677-124-44227</li>
            <li><i class="fa fa-map-marker"></i> Los Angeles Gournadi, 1230 Bariasl</li>
            <li><i class="fa fa-clock-o"></i> Mon to Sat 9:00am to 18:00pm</li>
        </ul>
        <div class="offcanvas__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-instagram"></i></a>
            <a href="#"><i class="fa fa-dribbble"></i></a>
        </div>
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <?php include "layout/header.php" ?>

    <!-- Header Section End -->

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
                            <h2><?= $product['title']?></h2>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua.</p>
                        <ul>
                            <li><i class="fa fa-check-circle"></i> I ordered on 12/04/2022 at 05:00</li>
                            <li><i class="fa fa-check-circle"></i> product with a price of Rp. <?= $price?> rupiah</li>
                            
                        </ul>
                        <div id="pay">
                       
                        </div>
                        <a href="product.php" class="btn btn-secondary">Product</a>
                        <button type="button" hidden id="cencel_reservation" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModalCenter">
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
                                    <input type="text" id="order_id" name="order_id" value="">
                                    <input type="text" id="done_status" name="done_status" value="cencel">
                                    <button type="submit" name="cencel_order" class="btn btn-primary">Yes</button>
                                </form>
                            </div>
                            </div>
                        </div>
                        </div>
                        <a href="#" id="pay-button" class="btn btn-info">Pay</a>
                        <!-- <button id="pay-button">Pay!</button>    -->

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Section End -->

    <!-- Footer Section Begin -->
    <?php include "layout/footer.php" ?>     
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
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="<?php echo $clientKey; ?>"></script>
    <script type="text/javascript">
        document.getElementById('pay-button').onclick = function(){
            var member_id = "<?= $_SESSION['user'][0]['id']?>";
            var product_id = "<?= $product['id']?>";
            var time_id = "<?= $data['time_id']?>";
            var date = "<?= $data['date']?>";
            var status_payment = "<?= $data['status_payment']?>";
            var payment = "<?= $data['payment']?>";
            var done_status = "<?= $data['done_status']?>";
            
            // SnapToken acquired from previous step
            snap.pay('<?php echo $snapToken?>', {
                // Optional
                onSuccess: function(result){
                    /* You may add your own js here, this is just example */ 
                    document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                    console.log("sucsess");
                },
                // Optional
                onPending: function(result){
                    var ul=document.createElement('ul');
                    var li=document.createElement('li'); 
                    li.innerHTML="<i class='fa fa-check-circle'></i>"+" "+" Transaction status, "+result.transaction_status;
                    ul.appendChild(li);
                    var li=document.createElement('li');
                    li.innerHTML="<i class='fa fa-check-circle'></i>"+" "+" Payment code, "+result.bill_key;
                    ul.appendChild(li);
                    var li=document.createElement('li');
                    li.innerHTML="<i class='fa fa-check-circle'></i>"+" "+" Document payment, "+ "<a href='"+result.pdf_url+"'>here</a>";
                    ul.appendChild(li);
                    var li=document.createElement('li');
                    const appointment = new Date(result.transaction_time);
                    appointment.setDate(appointment.getDate() + 1); 

                    li.innerHTML="<i class='fa fa-check-circle'></i>"+" "+" Due, "+ appointment;
                    ul.appendChild(li);
                    document.getElementById('pay').appendChild(ul);

                    document.getElementById("pay-button").style.visibility = "hidden";
                    document.getElementById("cencel_reservation").hidden = false;
                    document.getElementById("order_id").value = result.order_id;

                     /* You may add your own js here, this is just example */ 
                    console.log(result.status_code);
                    var val = 'haha';
                   
                    $.ajax({
                        type: 'post',
                        url: 'service.php',
                        data: {
                            cek:"",
                            order_id:result.order_id,
                            time_checkout: result.transaction_time,
                            grous_amount: result.gross_amount,
                            payment_type: result.payment_type,
                            pdf_url: result.pdf_url,
                            bill_key: result.bill_key,
                            member_id: member_id,
                            product_id: product_id,
                            time_id:time_id,
                            date:date,
                            status_payment:status_payment,
                            payment:payment,
                            done_status:done_status
                        },
                        cache: false,
                        success: function (response) {
                            console.log(response);
                            // $(".list").html(response)                      
                        },
                    });
                },
                // Optional
                onError: function(result){
                    /* You may add your own js here, this is just example */ 
                    document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                    console.log("eror");
                }
            });
        };
    </script>
</body>

</html>