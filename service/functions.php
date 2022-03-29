<?php

if(isset($_SESSION["isLogin"])){
    echo "a";
    die;

}else{
    echo "b";
    die;
}
if($_SESSION["isLogin"] == false){
    header("location: ../admin/authentication-login.php");
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
            '../file/images/'.$_FILES[$field]['name'])) {
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

function where($table, $where, $find){
    global $conn;
    $rows =[];

    $sql = "SELECT * FROM  $table WHERE $where = '$find'";
    $result = mysqli_query($conn, $sql);
    
    while ($row =  mysqli_fetch_assoc($result)) 
    {
        $rows[]=$row;			
    }
    return $rows;	
}
function query($query)
{
    global $conn;
    $result= mysqli_query($conn, $query);
    $rows =[];
        while ($row =  mysqli_fetch_assoc($result)) 
        {
            $rows[]=$row;			
        }
    return $rows;	
}

function loginAdmin($data){
    $_SESSION['username'] =  $username = validation($data["username"]);
    $password = validation($data["password"]);

    $data = where("users","username",$username);
    if($data){
        if($data[0]["username"] == $username && $data[0]["password"] == $password){
            $_SESSION["isLogin"] = true;
            header("location: ../admin/index.php");
        }else{            
            header("location: ../admin/authentication-login.php");
        }
    }else{       
        header("location: ../admin/authentication-login.php");
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

function insert($table, $data){
    global $conn;
    $data = getvalue($data);
    $sql = 'INSERT INTO '.$table.' ('.$data["key"].') VALUES ('.$data["value"].')';
    
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
    
    return mysqli_query($conn, $sql);
}
function delete($table, $data){
    global $conn;
    $data = getvalue($data);
    $sql = 'DELETE FROM '.$table.' WHERE '. $data["key"].'='.$data["value"];
    
    return mysqli_query($conn, $sql);
}

//  ======================== D O C T E R =
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
// ======================== M E M B E R =
function createMember($data){   
    $result = insert("members", $data);
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

// ======================== T I P S =
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