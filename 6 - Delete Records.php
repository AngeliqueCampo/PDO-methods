<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pharmacy";

try {
    // create new PDO
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    
    // set an exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // prepare SQL
    $sql = "
        DELETE FROM product 
        WHERE product_id IN (?, ?, ?)
    ";

    $stmt = $conn->prepare($sql);

    // execute records
    // delete product_id = 12, 13 and 14
    $stmt->execute([12, 13, 14]);

    echo "3 products deleted successfully!";
    
} catch (PDOException $e) {
    // catch error
    echo "Error: " . $e->getMessage();
}

// close conn
$conn = null;
?>
