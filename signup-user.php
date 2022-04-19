<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="admin/assets/images/favicon.png">
    <title>Adminmart Template - The Ultimate Multipurpose admin template</title>
    <!-- Custom CSS -->
    <link href="admin/dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <div class="main-wrapper">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center position-relative"
            style="background:url(admin/assets/images/big/auth-bg.jpg) no-repeat center center;">
            <div class="auth-box row text-center">
                <div class="col-lg-7 col-md-5 modal-bg-img" style="background-image: url(admin/assets/images/big/3.jpg);">
                </div>
                <div class="col-lg-5 col-md-7 bg-white">
                    <div class="p-3">
                        <img src="admin/assets/images/big/icon.png" alt="wrapkit">
                        <h2 class="mt-3 text-center">Sign Up for Free</h2>
                        <form class="mt-4" action="service.php" method="post"> 
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input name="username" id="username" class="form-control" type="text" placeholder="your name">
                                        <div id="uname_response" ></div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input name="phone_number" id="phone_number" class="form-control" type="text" placeholder="phone number">
                                        <div id="phone_number_response" ></div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input name="email" id="email" class="form-control" type="email" placeholder="email address">
                                        <div id="email_response" ></div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input name="password" class="form-control" type="password" placeholder="password">
                                    </div>
                                </div>
                                <div class="col-lg-12 text-center">
                                    <button type="submit" name="add_member" id="add_member" class="btn btn-block btn-dark">Sign Up</button>
                                </div>
                                <div class="col-lg-12 text-center mt-5">
                                    Already have an account? <a href="sigin-user.php" class="text-danger">Sign In</a><br>
                                    Or, go back to <a href="./" class="text-danger">home</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <script src="admin/assets/libs/jquery/dist/jquery.min.js "></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="admin/assets/libs/popper.js/dist/umd/popper.min.js "></script>
    <script src="admin/assets/libs/bootstrap/dist/js/bootstrap.min.js "></script>
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>

    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script>
        $(".preloader ").fadeOut();
    </script>
    <script>
		$(document).ready(function(){
		   $("#username").keyup(function(){
		      var username = $(this).val().trim();
		      if(username != ''){

		         $.ajax({
		            url: 'service.php',
		            type: 'post',
		            data: {username: username},
		            success: function(response){
		                $('#uname_response').html(response);
		             }
		         });
		      }else{
		         $("#uname_response").html("");
		      }

		    });

		 });
	</script>
    <script>
		$(document).ready(function(){
		   $("#phone_number").keyup(function(){
		      var phone_number = $(this).val().trim();
              console.log(phone_number);
		      if(phone_number != ''){

		         $.ajax({
		            url: 'service.php',
		            type: 'post',
		            data: {phone_number: phone_number},
		            success: function(response){
		                $('#phone_number_response').html(response);
		             }
		         });
		      }else{
		         $("#phone_number_response").html("");
		      }

		    });

		 });
	</script>
    <script>
		$(document).ready(function(){
		   $("#email").keyup(function(){
		      var email = $(this).val().trim();
              console.log(email);
		      if(email != ''){

		         $.ajax({
		            url: 'service.php',
		            type: 'post',
		            data: {email: email},
		            success: function(response){
		                $('#email_response').html(response);
		             }
		         });
		      }else{
		         $("#email_response").html("");
		      }

		    });

		 });
	</script>
</body>

</html>