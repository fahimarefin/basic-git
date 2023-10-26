<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "fall2023";

$conn = mysqli_connect($server, $username, $password);

if (!$conn) {
    die("ERROR: Could not connect " . mysqli_connect_error());
} else {
    echo "Connected successfully.";
    echo "<br>";
}

$sql = "CREATE DATABASE IF NOT EXISTS fall2023";
if (mysqli_query($conn, $sql)) {
    echo "Database created successfully.";
    echo "<br>";
} else {
    echo "Error: Could not execute $sql. " . mysqli_error($conn);
    echo "<br>";
}


mysqli_close($conn);


$conn = mysqli_connect($server, $username, $password,$database);

if (!$conn) {
    die("ERROR: Could not connect to the database " . mysqli_connect_error());
} else {
    echo "Connected to the database.";
    echo "<br>";
}

$sql = "CREATE TABLE IF NOT EXISTS user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(100) NOT NULL,
    ip VARCHAR(20) NOT NULL,
    url VARCHAR(100) NOT NULL,
    dob VARCHAR(10) NOT NULL,
    gender VARCHAR(10) NOT NULL,
    mobile VARCHAR(15) NOT NULL,
    info TEXT NOT NULL
)";

if (mysqli_query($conn, $sql)) {
    echo "Table 'users' created successfully.";
    echo "<br>";
} else {
    echo "Error: Could not execute $sql. " . mysqli_error($conn);
    echo "<br>";
}



mysqli_close($conn);
?>
