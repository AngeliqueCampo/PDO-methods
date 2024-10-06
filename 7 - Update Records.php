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
        UPDATE product 
        SET product_name = 'Cold Relief Tablets', 
            category = 'Medication', 
            price = 9.99, 
            manufacturer = 'ReliefMed Co.', 
            expiration_date = '2027-06-30', 
            stock_quantity = 150
        WHERE product_id = 11;
    ";

    // execute
    $conn->exec($sql);

    echo "Product updated successfully!";
    
} catch (PDOException $e) {
    // catch error
    echo "Error: " . $e->getMessage();
}

// close conn
$conn = null;
?>
