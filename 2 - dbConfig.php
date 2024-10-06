<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pharmacy";

try {
    // create PDO 
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    // set exception for errors
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // connection success
    echo "Connected successfully"; 
} catch (PDOException $e) {
    // catch connection error
    echo "Connection failed: " . $e->getMessage();
}
?>
