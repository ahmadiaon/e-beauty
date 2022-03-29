<?php
include "env.php";
require 'functions.php';
session_start();
$conn = mysqli_connect(HOST, USERNAME, "", DATABASE);

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