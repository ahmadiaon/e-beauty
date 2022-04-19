<?php

function _query($data){
    global $conn;
    return mysqli_query($conn, $data);
}
function _validation(){
    if($_POST['role']== 'guest'){
        if(isset($_SESSION['role'])){
            // $_SESSION['role']
        }else{
            $_SESSION['role'] = 'guest';
        }
        // dd($_SESSION['role']);
    }else if($_POST['role']== 'member'){
        
        if(isset($_SESSION['role'])){
            // $_SESSION['role']
            if($_SESSION['role']== 'guest'){
                if($_POST['role']== 'admin'){
                    header("location: ".APP_URL."admin/authentication-login.php");
                }else{
                    header("location: ".APP_URL."sigin-user.php");
                } 
            }else if($_SESSION['role']== 'admin'){
                header("location: ".APP_URL."sigin-user.php");
            } 
        }else{
            $_SESSION['role'] = 'guest';
            if($_POST['role']== 'admin'){
                header("location: ".APP_URL."admin/authentication-login.php");
            }else{
                header("location: ".APP_URL."sigin-user.php");
            }        
        }
    }else if($_POST['role']== 'admin'){
        
        if(isset($_SESSION['role'])){
            if($_SESSION['role'] == 'admin'){
                if($_SESSION['role']== 'guest'){
                    if($_POST['role']== 'admin'){
                        header("location: ".APP_URL."admin/authentication-login.php");
                    }else{
                        header("location: ".APP_URL."admin/authentication-login.php");
                    } 
                } 
            }else{
                header("location: ".APP_URL."admin/authentication-login.php");
            }
        }else{
            if($_POST['role']== 'admin'){
                header("location: ".APP_URL."admin/authentication-login.php");
            }else{
                header("location: ".APP_URL."admin/authentication-login.php");
            }        
        }
    }
}
function getObj($data){
    global $conn;
    $sql = "SELECT * FROM members ";
    return mysqli_query($conn, $sql);
}
function validation($data){
    $validated = htmlspecialchars($data);
    return $validated;
}
function uploadImage($field){          
    try {    
        if (
            !isset($_FILES[$field]['error']) ||
            is_array($_FILES[$field]['error'])
        ) {
            throw new RuntimeException('Invalid parameters.');
        }

        // Check $_FILES[$field]['error'] value.
        switch ($_FILES[$field]['error']) {
            case UPLOAD_ERR_OK:
                break;
            case UPLOAD_ERR_NO_FILE:
                throw new RuntimeException('No file sent.');
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                throw new RuntimeException('Exceeded filesize limit.');
            default:
                throw new RuntimeException('Unknown errors.');
        }

        // You should also check filesize here.
        if ($_FILES[$field]['size'] > 9000000) {
            throw new RuntimeException('Exceeded filesize limit.');
        }

        // DO NOT TRUST $_FILES[$field]['mime'] VALUE !!
        // Check MIME Type by yourself.
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        if (false === $ext = array_search(
            $finfo->file($_FILES[$field]['tmp_name']),
            array(
                'jpg' => 'image/jpeg',
                'png' => 'image/png',
                'gif' => 'image/gif',
            ),
            true
        )) {
            throw new RuntimeException('Invalid file format.');
        }

        if (!move_uploaded_file(
            $_FILES[$field]['tmp_name'],
            'file/images/'.$_FILES[$field]['name'])) {
            throw new RuntimeException('Failed to move uploaded file.');
        }
        return "images/".$_FILES[$field]['name'];
    } catch (RuntimeException $e) {
        echo $e->getMessage();
    }

}
function get_where($table, $field, $value){
    $where = $field.' = '.$value;
    global $conn;
    $rows =[];

    $sql = "SELECT * FROM $table WHERE ".$where." ORDER BY updated_at DESC ";
    $result = mysqli_query($conn, $sql);
    
    while ($row =  mysqli_fetch_assoc($result)) 
    {
        $rows[]=$row;			
    }
    return $rows;	
}
function first_where($table, $field, $value){
    
    $where = $field.' = '.$value;
    global $conn;

    $sql = "SELECT * FROM $table WHERE ".$where;
    
    $result = mysqli_query($conn, $sql);
    
    return mysqli_fetch_assoc($result);	
}
function dd($data){
    var_dump($data);
    die;
}

function first($table){
    global $conn;
    $login = mysqli_query($conn,"select * from $table");
    return mysqli_fetch_assoc($login);
}

function getAll($table){
    global $conn;
    $rows =[];

    $sql = "SELECT * FROM $table ORDER BY updated_at DESC";
    $result = mysqli_query($conn, $sql);
    
    while ($row =  mysqli_fetch_assoc($result)) 
    {
        $rows[]=$row;			
    }
    return $rows;	
}

function getOption($date){
    global $conn;
    $times = mysqli_query($conn, "SELECT * FROM `times`");
    $fulltimes = query("SELECT times.id FROM `times`, reservations WHERE reservations.time_id = times.id AND reservations.date = '$date' AND reservations.done_status = 'done' ");
    if($fulltimes){
        foreach($fulltimes as $ft){
                $booked[] = $ft['id'];
        }
        while($row = mysqli_fetch_object($times)){
            if(in_array($row->id,$booked)){
    
            }else{
                echo "<li data-value='".$row->id."' class='option'>".$row->time."</li>";
            }        
        }
    }else{
        while($row = mysqli_fetch_object($times)){            
            echo "<li data-value='".$row->id."' class='option selected'>".$row->time."</li>";                   
        }
    }    
}
function where($table, $where, $find){
    global $conn;
    $rows =[];

    $sql = "SELECT * FROM  $table WHERE $where = '$find'";
    // dd($sql);
    $result = mysqli_query($conn, $sql);
    
    while ($row =  mysqli_fetch_assoc($result)) 
    {
        $rows[]=$row;			
    }
    return $rows;	
}
function query($query){
    global $conn;
    $result= mysqli_query($conn, $query);
    $rows =[];
        while ($row =  mysqli_fetch_assoc($result)) 
        {
            $rows[]=$row;			
        }
    return $rows;	
}
function queryObj($query){
    global $conn;
    return 	 mysqli_fetch_assoc(mysqli_query($conn, $query));
}

function loginAdmin($data){
    $_SESSION['username'] =  $username = validation($data["username"]);
    $password = validation($data["password"]);

    $_SESSION['user'] = $data = where("users","username",$username);
    if($data){
        if($data[0]["username"] == $username && $data[0]["password"] == $password){
            $_SESSION["isLogin"] = true;
            $_SESSION["role"] = "admin";
            header("location: ../admin/index.php");
        }else{            
            header("location: ../admin/authentication-login.php");
        }
    }else{       
        header("location: ../admin/authentication-login.php");
    }
}
function loginUser($data){
    $email = validation($data["email"]);
    $password = validation($data["password"]);

    $_SESSION['user'] =  $data = where("members","email",$email);
    // dd($_SESSION['user']);
    if($data){
        if($data[0]["email"] == $email && $data[0]["password"] == $password){
            $_SESSION["isLogin"] = true;
            $_SESSION["role"] = "member";
            header("location: index.php");
        }else{            
            header("location: sigin-user.php");
        }
    }else{       
        header("location: sigin-user.php");
    }
    
}
function getvalue($data){
    // array_pop($data);
    $keys = "";
    $values = "";
   
    foreach($data as $x => $x_value) {
        if($x_value != null){
            $keys = $keys.','.$x;
            $values = $values.',"'.$x_value.'"'; 
        }
       
    }
    $validated["key"] = ltrim($keys, ',');
    $validated["value"] = ltrim($values, ',');
    return $validated;
}
function cekField($data,$table, $field){
    global $conn;
    
   
    $query = "select count(*) as cntUser from $table where $field='".$data."'";

    $result = mysqli_query($conn,$query);
 
    
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
    
    }else{
        echo "kosong";
    }
 
 
    echo $response;
    
}

function insert($table, $data){
    global $conn;
    $data = getvalue($data);
    $sql = 'INSERT INTO '.$table.' ('.$data["key"].') VALUES ('.$data["value"].')';
    // dd($sql);
    return mysqli_query($conn, $sql);
}
function update($table, $data, $id){
    global $conn;
    $keys = "";
   
    foreach($data as $x => $x_value) {
        if($x_value != null){            
            $keys =  $keys.','.$x.' = "'.$x_value.'"';
        }       
    }
    $keys = ltrim($keys, ',');
    
    $sql = "UPDATE $table SET $keys WHERE id = $id";
    // dd($sql);
    return mysqli_query($conn, $sql);
}
function updateReservations($table, $data, $id){
    global $conn;
    $keys = "";
   
    foreach($data as $x => $x_value) {
        if($x_value != null){            
            $keys =  $keys.','.$x.' = "'.$x_value.'"';
        }       
    }
    $keys = ltrim($keys, ',');
    
    $sql = "UPDATE $table SET $keys WHERE order_id = $id";
    
    return mysqli_query($conn, $sql);
}
function delete($table, $data){
    global $conn;
    $data = getvalue($data);
    $sql = 'DELETE FROM '.$table.' WHERE '. $data["key"].'='.$data["value"];
    
    return mysqli_query($conn, $sql);
}

// ======================= D O C T E R =
function createDocter($data){   
     
    if (!empty($_FILES['image_path'])) {
        foreach($_FILES as $x => $x_value) {
            if($x_value != null){
                $keys = $x;
            }        
        }
        $data["image_path"] = uploadImage($keys);
        $result = insert("docters", $data);
        if($result){
            header("location: ../admin/docters.php");
        }        
    }
}
function editDocter($data){  
    $keys = "";
    $id= $data["id"];
    if (!empty($_FILES['image_path']) && $_FILES['image_path']['name']  !=null) {
        // ket key
        foreach($_FILES as $x => $x_value) {
            if($x_value != null){
                $keys = $x;
            }        
        }
        $data["image_path"] = uploadImage($keys);


        $result = update("docters", $data, $id);
        if($result){
            header("location: ../admin/docters.php");
        }        
    }else{
        $result = update("docters", $data, $id);
        if($result){
            header("location: ../admin/docters.php");
        } 
    }
}
function deleteDocter($data){
    $result = delete("docters", $data);
    if($result){
        header("location: ../admin/docters.php");
    }
}
// ======================= M E M B E R =
function createMember($data){   
    $result = insert("members", $data);
    // dd($result);
    if($result){
        header("location: ../admin/members.php");
    }
}
function deleteMember($data){
    $result = delete("members", $data);
    if($result){
        header("location: ../admin/members.php");
    }
}
function editMember($data){  
    $keys = "";
    $id= $data["id"];
    
    $result = update("members", $data, $id);
    if($result){
        header("location: ../admin/members.php");
    }        
   
}

// ======================= T I P S =
function createTips($data){   
    $result = insert("tips", $data);
    if($result){
        header("location: ../admin/tips.php");
    }
}
function deleteTips($data){
    $result = delete("tips", $data);
    if($result){
        header("location: ../admin/tips.php");
    }
}
function editTips($data){  
    $keys = "";
    $id= $data["id"];
    
    $result = update("tips", $data, $id);
    if($result){
        header("location: ../admin/tips.php");
    }
}

// ======================== P R O F I L E =
function editHome($data){  
    $keys = "";
    $id= $data["id"];
    
    $result = update("profile", $data, $id);
    if($result){
        header("location: ../manage_index.php");
    }
}

// ======================== R E S E R V A T I O N S =
function addReservation($data){
    require_once 'vendor/autoload.php';
    $product = where("product","id", $data["product_id"]);
    var_dump($product[0]["price"]);
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();

    //Set Your server key
    Midtrans\Config::$serverKey = $_ENV['MIDTRANS_SERVER_KEY'];
    $clientKey = $_ENV['MIDTRANS_CLIENT_KEY'];
    var_dump($data);die;

    $result = insert("reservations", $data);
    if($result){
        header("location: products.php");
    }
}
function createMember_member($data){   
    $result = insert("members", $data);
    if($result){
        header("location: index.php");
    }
}
function checkOut($data){   
    $result = insert("reservations", $data);
    if($result){
        header("location: my-reservations.php");
    }
}
function deleteReservation($data){
    $result = delete("reservations", $data);
    if($result){
        header("location: ../admin/reservations.php");
    }
}
function updateReservation($data){  
    $id= $data["id"];
    $result = update("reservations", $data, $id);
    if($result){
        header("location: admin/reservations.php");
    }
}
function cencelReservation($data){  
    $id= $data["order_id"];
    $result = updateReservations("reservations", $data, $id);
    if($result){
        header("location: my-reservations.php");
    }
}

// ======================== P R O M O T I O N S =
function createPromotion($data){
    $result = insert("promotions", $data);
    if($result){
        header("location: admin/promotions.php");
    }
}
function deletePromotion($data){
    $result = delete("promotions", $data);
    if($result){
        header("location: admin/promotions.php");
    }
}

// ======================= P R O D U C T  =
function createProduct($data){   
     
    if (!empty($_FILES['image_path'])) {
        foreach($_FILES as $x => $x_value) {
            if($x_value != null){
                $keys = $x;
            }        
        }
        $data["image_path"] = uploadImage($keys);
        $result = insert("product", $data);
        if($result){
            header("location: ../admin/products.php");
        }        
    }
}
function deleteProduct($data){
    $result = delete("product", $data);
    if($result){
        header("location: ../admin/products.php");
    }
}
function editProduct($data){  
    // dd($data);
    $keys = "";
    $id= $data["id"];
    if (!empty($_FILES['image_path']) && $_FILES['image_path']['name']  !=null) {
        // ket key
        foreach($_FILES as $x => $x_value) {
            if($x_value != null){
                $keys = $x;
            }        
        }
        $data["image_path"] = uploadImage($keys);


        $result = update("product", $data, $id);
        if($result){
            header("location: ../admin/products.php");
        }        
    }else{
        $result = update("product", $data, $id);
        if($result){
            header("location: ../admin/products.php");
        } 
    }
}
// ======================= M E M B E R  =
function updateMember($data){  
    $id= $data["id"];
    
    $result = update("members", $data, $id);
    if($result){
        header("location:my-profile.php");
    }        
   
}
