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

    // prepare query
    // fetch all products with more than 10 units ordered and calculate total cost for each product
    $sql = "
        SELECT 
            product.product_name,
            product.category,
            order_detail.quantity,
            (product.price * order_detail.quantity) AS total_cost
        FROM product
        JOIN order_detail ON product.product_id = order_detail.product_id
        WHERE order_detail.quantity > 10
        ORDER BY total_cost DESC;
    ";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    
    // fetch all
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // display results
    echo "<pre>";
    print_r($result);
    echo "</pre>";

} catch (PDOException $e) {
    // catch error
    echo "Connection failed: " . $e->getMessage();
}

// close conn
$conn = null;
?>
