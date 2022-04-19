<?php
include "env.php";
require 'functions.php';
require_once '../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
// $dotenv->load();

// //Set Your server key
// Midtrans\Config::$serverKey = $_ENV['MIDTRANS_SERVER_KEY'];
// $clientKey = $_ENV['MIDTRANS_CLIENT_KEY'];

var_dump($dotenv);die;
session_start();
$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);

if (mysqli_connect_errno()) {
    echo "Koneksi database gagal : " . mysqli_connect_error();
}
$aaa =  $_SERVER['REQUEST_URI'];

// Login Admin
if (isset($_POST["login"])) {
    loginAdmin($_POST);
}

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
    // var_dump($_POST);
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

// ====================================== T I P S ============================
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

    $date = $_POST['get_option'];

    global $conn;
    $times = mysqli_query($conn, "SELECT * FROM `times`");
    $fulltimes = mysqli_query($conn, "SELECT times.* FROM `times`, reservations WHERE reservations.time_id = times.id AND reservations.date = '$date'");
    $query = mysqli_query($conn, "SELECT times.* FROM `times`, reservations WHERE reservations.time_id != times.id AND reservations.date = '$date'");
    if(mysqli_fetch_object($query)){
        while($row = mysqli_fetch_object($query)){
            echo "<li data-value='".$row->id."' class='option selected'>".$row->time."</li>";
        }
    }else if(mysqli_fetch_object($times)){
        while($row = mysqli_fetch_object($times)){
            echo "<li data-value='".$row->id."' class='option selected'>".$row->time."</li>";
        }
        
    }else{
        echo "<li data-value='0' class='option selected'>No time found</li>";
    }
    
}

if(isset($_POST['add_reservation']))
{
    addReservation($_POST);
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

?>