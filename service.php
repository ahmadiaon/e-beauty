<?php
include "env.php";
require 'functions.php';

session_start();
$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
$isConnect = false;
if (mysqli_connect_errno()) {
    echo "Koneksi database gagal : " . mysqli_connect_error();
}else{
    $isConnect = true;
}

// ============ V A L I D A T I O N =
_validation();

// ============ L O G I N =
if (isset($_POST["login"])) {
    loginAdmin($_POST);
}
if (isset($_POST["login_user"])) {
    loginUser($_POST);
}

  
// ====================================== D O C T E R ============================
// Create Docter
if (isset($_POST["create_docter"])) {
    createDocter($_POST);
}

// Edit Docter
if (isset($_POST["edit_docter"])) {
    editDocter($_POST);
}

// Delete Docter
if (isset($_POST["delete_docter"])) {
    deleteDocter($_POST);
}

// ====================================== M E M B E R ============================
// Create Docter
if (isset($_POST["create_member"])) {
    createMember($_POST);
}

// Edit Docter
if (isset($_POST["edit_member"])) {
    editMember($_POST);
}

// Delete Docter
if (isset($_POST["delete_member"])) {
    deleteMember($_POST);
}

// ====================================== T I P S ============================
// Create Docter
if (isset($_POST["create_tips"])) {
    createTips($_POST);
}

// Edit Docter
if (isset($_POST["edit_tips"])) {
    editTips($_POST);
}

// Delete Docter
if (isset($_POST["delete_tips"])) {
    deleteTips($_POST);
}

// ====================================== I N T E R F A C E ============================
// Edit Home
if (isset($_POST["edit_home"])) {
    editHome($_POST);
}

// ====================================== R E S E R V A T I O N S ============================
// Edit Home
if (isset($_POST["add_reservation"])) {
    editHome($_POST);
}

if(isset($_POST['get_option']))
{
    getOption($_POST['get_option']);    
}

if(isset($_POST['adds_reservation']))
{
    addReservation($_POST);
}
// Delete Docter
if (isset($_POST["delete_reservation"])) {
    deleteReservation($_POST);
}
if (isset($_POST["update_reservation"])) {
    updateReservation($_POST);
}
if (isset($_POST["cencel_order"])) {
    cencelReservation($_POST);
}

// ====================================== R E G I S T R A T I O N ============================
if(isset($_POST['username'])){    
    cekField($_POST['username'],"members","username");    
}
if(isset($_POST['phone_number'])){     
    cekField($_POST['phone_number'],"members","phone_number");    
}
if(isset($_POST['email'])){     
    cekField($_POST['email'],"members","email");    
}

if(isset($_POST['add_member'])){
    createMember_member($_POST);
}
if(isset($_POST['cek'])){
    checkOut($_POST);
    echo $_POST['member_id'];
}
if (isset($_POST["update_member"])) {
    updateMember($_POST);
}

// ====================================== P R O M O T I O N ============================
if(isset($_POST['create_promotion'])){
    createPromotion($_POST);
}
if (isset($_POST["delete_promotion"])) {
    deletePromotion($_POST);
}

  
// ====================================== P R O D U C T ============================
// Create Docter
if (isset($_POST["create_product"])) {
    // dd($_POST);
    createProduct($_POST);
}

// Edit Docter
if (isset($_POST["edit_product"])) {
    editProduct($_POST);
}

// Delete Docter
if (isset($_POST["delete_product"])) {
    deleteProduct($_POST);
}






































// header("location: /e-beauty/service/udin/");

// function setupDatabase(){
//     echo "hai";
// };
// function cekConnection(){
//     echo "hai";
// };
// $servername = "localhost";
// $username = "root";
// $password = "";

// // Create connection
// $conn = new mysqli($servername, $username, $password);
// // Check connection
// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
// }

// // Create database
// $sql = "CREATE DATABASE e_beautys";
// if ($conn->query($sql) === TRUE) {
//   echo "Database created successfully";
// } else {
//   echo "Error creating database: " . $conn->error;
// }

// $conn->close();
// setupDatabase();
// $aaa =  $_SERVER['REQUEST_URI'];

?>