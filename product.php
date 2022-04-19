<?php
    $_POST["role"] = 'member';
    include "service.php";
    $today = date("Y-m-d");
    $dataAllProducts = [];
    $myReservations = query("SELECT reservations.product_id FROM product, reservations,times WHERE product.id=reservations.product_id AND times.id = reservations.time_id AND member_id= ".$_SESSION['user'][0]['id']);
    // dd($myReservations);
    $promotions = query("SELECT promotions.*, product.* FROM promotions, product WHERE promotions.product_id = product.id AND promotions.status=1 AND `promotions`.`start_date` < '$today' AND '$today' < `promotions`.`end_date`");
    // $promotions = query("SELECT promotions.*, product.* FROM promotions, product WHERE promotions.product_id = product.id AND promotions.status=1");//dd($promotions);
    $datas = query("SELECT reservations.*, times.time, product.title FROM product, reservations,times WHERE product.id=reservations.product_id AND times.id = reservations.time_id AND member_id= ".$_SESSION['user'][0]['id']);
    $products = get_where("product", 'status', 1 );
    $ppp = mysqli_query($conn, "SELECT * FROM product");
    while ($row =  mysqli_fetch_assoc($ppp)) 
    {
      $id = $row['id'];
      $dataAllProducts[$id] = $row;
    }
    // dd($dataAllProducts);
    $idRecomedations = query("SELECT DISTINCT(reservations.member_id) FROM reservations WHERE reservations.done_status = 'done'");
    $idProducts = query("SELECT DISTINCT(reservations.product_id) FROM reservations WHERE reservations.done_status = 'done'");
    $transactions = [];
    $minSupport = 0.3;
    // dd($idProduct);
    foreach($idProducts as $p){
      $sigma[$p['product_id']] = 0;
    }
    // dd($sigma);
    // dd($idRecomedations);
   
    
    foreach($idRecomedations as $idR){
        $id = $idR['member_id'];
        $idProduct = [];
        $transactionsById = query("SELECT reservations.product_id FROM reservations WHERE reservations.member_id = $id");
        foreach($transactionsById as $tbyid){
          array_push($idProduct, $tbyid['product_id']);
        }
        // dd($idProduct);
      array_push($transactions, $idProduct);
    }
    // dd($transactions);

    $transactionCount = count($transactions);

    // mencari total
    foreach($transactions as $tr){
      foreach($tr as $t){
          foreach($idProducts as $s){
            $id = $s["product_id"];
              if($id == $t){
                  $sigma[$id] = $sigma[$id] + 1;
              }
          }
      }
    }
    // dd($sigma);
    $itemSet[1] = [];
    foreach($idProducts as $pr){
      $pr = $pr['product_id'];
      $support[$pr] = $sigma[$pr]  / $transactionCount;
      if( $support[$pr] > $minSupport){
          $data = [
              'item' => $pr,
                  'transaction' => $sigma[$pr],
                  'support' => $support[$pr]
          ];
          array_push(
              $itemSet[1],
              $data
          );
      }
    }
    // dd($itemSet[1]);
    $countItemSet = count($itemSet[1]);
    $item2 = [];
    for($i= 1; $i < $countItemSet; $i++){
        for($j= $i + 1; $j < $countItemSet; $j++){
            $data = [$itemSet[1][$i],$itemSet[1][$j]];
            array_push(
                $item2,
                $data
            );
        }
        $data = [$itemSet[1][0],$itemSet[1][$i]];
        array_push(
            $item2,
            $data
        );
    }
    // dd($item2);


    $supportItem2 = [];
    $combination = [];
    foreach($item2 as $i){
        $sup = 0;
        $valA = 0;
        $valB = 0;
        $A = $i[0]["item"];
        $B = $i[1]["item"];
        
        foreach($transactions as $tr){

            if(in_array($A, $tr)){
                $valA = $valA + 1;
            }
            if(in_array($B, $tr)){
                $valB = $valB + 1;
            }
            if(in_array($i[0]["item"], $tr) && in_array($i[1]["item"], $tr)){
                $sup = $sup + 1;
            }
        }
        if($sup/$transactionCount > $minSupport){
            $com = [
                'A' => $valA,
                'B' => $valB,
                'sup' => $sup,
                $A.$B => $sup/$valA,
                $B.$A => $sup/$valB
            ];
            $data = [
                'key'   => $i[0]["item"].','.$i[1]["item"],
                'support' => $sup
            ];
            array_push(
                $supportItem2,
                $data
            );
            array_push(
                $combination,
                $com
            );
        }
    }
    // var_dump($combination);die;

    // var_dump($itemSet[1]);die;
    // for($i= 1; $i < $countItemSet; $i++){
    //     for($i= 1; $i < $countItemSet; $i++){

    //     }
    //     for($j= $i + 1; $j < $countItemSet; $j++){
    //         $data = [$itemSet[1][$i],$itemSet[1][$j]];
    //         array_push(
    //             $item2,
    //             $data
    //         );
    //     }
    //     $data = [$itemSet[1][0],$itemSet[1][$i]];
    //     array_push(
    //         $item2,
    //         $data
    //     );
    // }
    // dd($myReservations);
    

    $recomendationForYou = [];
    foreach($myReservations as $myR){
      foreach($combination as $c){
        if($myR["product_id"] == $c['A']){
          array_push($recomendationForYou,$c['B'] );
        }
        if($myR["product_id"] == $c['B']){
          array_push($recomendationForYou,$c['A'] );
        }
      }
    }
    $uniq = array_unique($recomendationForYou);
    // dd($dataAllProducts);
    // echo $dataAllProducts[1]["title"];
    $_SESSION["title"] = "Product";
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
                        <h2>Our Prices</h2>
                        <div class="breadcrumb__links">
                            <a href="./">Home</a>
                            <span>Pricing</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
    <!-- About Section Begin -->
    
        <?php $isOdd = false; foreach($uniq as $u): ?>
          <?php if($isOdd == false){?>
            <section id="recomendation" class="about spad">
              <div class="container">
                <div class="row">
                  <div class="col-lg-6 col-md-6">
                    <div class="about__video set-bg" data-setbg="img/about-video.jpg">
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6">
                    <div class="about__text">
                      <div class="section-title">
                        <span><?= $dataAllProducts[$u]["treatments"]; ?></span>
                        <h2><?= $dataAllProducts[$u]["title"]; ?></h2>
                      </div>
                      <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                        eiusmod tempor incididunt ut labore et dolore magna aliqua.
                      </p>
                      <ul>
                        <li>
                          <i class="fa fa-check-circle"></i> Routine and medical care
                        </li>
                        <li>
                          <i class="fa fa-check-circle"></i> Excellence in Healthcare
                          every
                        </li>
                        <li>
                          <i class="fa fa-check-circle"></i> Building a healthy
                          environment
                        </li>
                        <li>
                            <div class="row">
                                <div class="col">
                                        <h3>Rp. <?= $dataAllProducts[$u]["price"]; ?> .-</h3>
                                </div>
                            </div>
                        </li>
                      </ul>
                      <a href="#"  data-bs-toggle="modal" data-bs-target="#staticBackdrop"  onclick="setUser(<?= $dataAllProducts[$u]['id'] ?>)" class="primary-btn normal-btn">Book Now</a>
                    </div>
                  </div>
                </div>
                </div>
              </section>
          <?php $isOdd = true;}else{ ?>
            <section id="recomendation" class="about spad">
              <div class="container">
                <div class="row">
                  <div class="col-lg-6 col-md-6">
                    <div class="about__text">
                      <div class="section-title">
                        <span><?=  $dataAllProducts[$u]["treatments"]; ?></span>  
                        
                        <h2><?= $dataAllProducts[$u]["title"]; ?></h2>
                      </div>
                      <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                        eiusmod tempor incididunt ut labore et dolore magna aliqua.
                      </p>
                      <ul>
                        <li>
                          <i class="fa fa-check-circle"></i> Routine and medical care
                        </li>
                        <li>
                          <i class="fa fa-check-circle"></i> Excellence in Healthcare
                          every
                        </li>
                        <li>
                          <i class="fa fa-check-circle"></i> Building a healthy
                          environment
                        </li>
                        <li>
                            <div class="row">
                                <div class="col">
                                        <h3>Rp. <?= $dataAllProducts[$u]["price"]; ?> .-</h3>
                                </div>
                            </div>
                        </li>
                      </ul>
                      <a href=""  data-bs-toggle="modal" data-bs-target="#staticBackdrop"  onclick="setUser(<?=$dataAllProducts[$u]['id']?>)" class="primary-btn normal-btn">Book Now</a>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6">
                    <div class="about__video set-bg" data-setbg="img/about-video.jpg">
                    </div>
                  </div>
                </div>
                </div>
              </section>
          <?php $isOdd = false; } ?>
        <?php endforeach;?>

      
    <!-- About Section End -->
    <!-- promotion for you -->

    <!-- Pricing Section Begin -->
    <section id="promotion" class="pricing spad">
    <div class="blog__details__comment">
        <h3>Promotion</h3>
    </div>
        <div class="container">
            <div class="row">
                <?php foreach($promotions as $promotion) :?>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="pricing__item">
                            <div class="pricing__item__title">
                                <p><?= $promotion["title"] ?></p>
                                <h3>Dr. Manuel Benet <span><?= $promotion["treatments"] ?></span></h3>
                            </div>
                            <img src="img/blog/blog-1.jpg" alt="">
                            <ul>
                                <li>
                                  <br>
                                    <div>
                                      <h6 class="d-float"><del>Rp. <?= $promotion["price"] ?></del></h6>
                                      <h5 class="d-float">Rp. <?= $promotion["price"] - ($promotion["price"] * $promotion["discount"] /100) ?></h5>
                                    </div>
                                </li>
                            </ul>
                            <a data-bs-toggle="modal" data-bs-target="#staticBackdrop" href="#" onclick="setUser(<?= $promotion['product_id'] ?>)" class="primary-btn">Book now</a>
                        </div>
                    </div>
                <?php endforeach?>
            </div>
        </div>
    </section>
    <!-- Pricing Section End -->
  
    <!-- Blog Section Begin -->
    <section id="product" class="blog spad">
    <div class="blog__details__comment">
        <h3>Product</h3>
    </div>
        <div class="container">
            <div class="row">
                <?php foreach($products as $product):?>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="blog__item">
                            <div class="blog__item__pic">
                                <img src="img/blog/blog-1.jpg" alt="">
                            </div>
                            <div class="blog__item__text">
                                <h5><a href="reservation-detail.php?q=<?= $product['id']?>"><?= $product['title'] ?></a></h5>
                                <ul>
                                  <div class="row">
                                    <div class="col">
                                      <div class="col">
                                        <li> <?= $product['treatments'] ?></li>
                                      </div>
                                      <div class="col">
                                        <li><h6>Rp. <?= $product['price'] ?></h6></li>
                                      </div>
                                    </div>
                                    <div class="col">
                                      <a data-bs-toggle="modal" data-bs-target="#staticBackdrop" href="#" onclick="setUser(<?= $product['id'] ?>)" class="primary-btn">Book now</a>
                                    </div>
                                  </div>
                                </ul>
                                
                            </div>
                            
                        </div>
                    </div>
                <?php endforeach;?>
            </div>
        </div>
    </section>
    <!-- Pricing Section End -->

    <!-- Footer Section Begin -->
    <?php include "layout/footer.php" ?>   
    <!-- Footer Section End -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Edit Home</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
               <div class="card">
               <div class="card-body">
                    <div class="services__appoinment">
                                <div class="services__title">
                                    <h4><img src="img/icons/services-icon.png" alt=""> Get an appointment</h4>
                                </div>
                                <form action="checkout.php" method="post">
                                    <!-- isi value sesion id  -->
                                    <input type="hidden" id="member_id" name="member_id" value="<?= '1'?>">
                                    <input type="hidden" id="status_payment" name="status_payment" value="pending">
                                    <input type="hidden" id="done_status" name="done_status" value="pending">
                                    <input type="hidden" id="payment" name="payment" value="pending">
                                    <input type="hidden" id="product_id" name="product_id" value="">
                                    <div class="datepicker__item">
                                        <input name="date"  onchange="fetch_select(this.value);" type="text" placeholder="Date" class="datepicker">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input id="time" type="hidden" name="time_id" value="">
                                    <div class="nice-select open" tabindex="0">
                                        <span class="current">chose</span>
                                        <ul  onchange="setTime()" class="list">
                                        </ul>
                                    </div>
                                    <button onclick="setTime()" name="add_reservation" type="submit" class="site-btn">Book appoitment</button>
                                </form>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Js Plugins -->
    <?php include "layout/js.php" ?>
    <script>
        function fetch_select(val)
        {
            $.ajax({
                type: 'post',
                url: 'service.php',
                data: {
                get_option:val
                },
                cache: false,
                success: function (response) {
                    console.log(response)
                    $(".list").html(response)                      
                },
            });
        }
    </script>
    <script>
        function setTime()
        {
            var val = $('.selected').attr('data-value'); 
            $("#time").val(val)          
        }
        function setUser(data)
        {
            $("#product_id").val(data)
        }
    </script>
</body>

</html>