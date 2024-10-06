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
    // show product details of sale_id is 1, calculate total cost
    $sql = "
        SELECT 
            sale_detail.sale_id,
            product.product_name,
            sale_detail.quantity,
            (product.price * sale_detail.quantity) AS total_cost
        FROM sale_detail
        JOIN product ON sale_detail.product_id = product.product_id
        WHERE sale_detail.sale_id = 1;
    ";
    
    // prepare SQL
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    
    // fetch
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // display result
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
