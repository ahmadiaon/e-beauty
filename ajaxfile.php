<?php
include "service.php";

if(isset($_POST['username'])){
  
   global $conn;
   $username = $_POST['username'];
  
   $query = "select count(*) as cntUser from users where username='".$username."'";
   echo $conn;die;
   $result = mysqli_query($conn,$query);

   echo $result;die;
   $response = "<span style='color: green;'>Available.</span><script>
                        $(document).ready(function(){  
                            document.getElementById('add_member').disabled = false;
                        });
                     </script>";
   if(mysqli_num_rows($result)){
      $row = mysqli_fetch_array($result);

      $count = $row['cntUser'];
    
      if($count > 0){
          $response = "<span style='color: red;'>Not Available.</span>
                     <script>
                        $(document).ready(function(){  
                            document.getElementById('add_member').disabled = true;
                        });
                     </script>
          ";
         
      }else{
        # code...
      }
   
   }


   echo $response;
   die;
}