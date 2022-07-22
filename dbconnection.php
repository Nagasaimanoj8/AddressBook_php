<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname="AddressBook";
// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";
// $sql = "CREATE DATABASE AddressBook";

// if ($conn->query($sql) === TRUE) {
//   echo "Database created successfully";
// } else {
//   echo "Error creating database: " . $conn->error;
// }
// $sql = "CREATE TABLE registrationform(
//     id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
//     username VARCHAR(50) NOT NULL UNIQUE,
//     email varchar(255),
//     password VARCHAR(255) NOT NULL
//     )";
    
//     if ($conn->query($sql) === TRUE) {
//       echo "Table MyGuests created successfully";
//     } else {
//       echo "Error creating table: " . $conn->error;
//     }


?>