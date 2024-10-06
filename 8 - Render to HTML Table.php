<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pharmacy";

try {
    // create new PDO
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // prepare SQL query
    $stmt = $conn->prepare("
        SELECT 
            product.product_id,
            product.product_name,
            product.category,
            SUM(sale_detail.quantity * sale_detail.price) AS total_sales
        FROM 
            product
        JOIN 
            sale_detail ON product.product_id = sale_detail.product_id
        JOIN 
            sale ON sale_detail.sale_id = sale.sale_id
        GROUP BY 
            product.product_id, product.product_name, product.category
        HAVING 
            total_sales > 20
        ORDER BY 
            total_sales DESC
    ");

    // execute SQL
    $stmt->execute();

    // fetch results
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // HTML table
    echo "<table border='1'>
            <tr>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Category</th>
                <th>Total Sales</th>
            </tr>";

    // use for loop to create table rows
    for ($i = 0; $i < count($results); $i++) {
        echo "<tr>
                <td>" . $results[$i]['product_id'] . "</td>
                <td>" . $results[$i]['product_name'] . "</td>
                <td>" . $results[$i]['category'] . "</td>
                <td>" . number_format($results[$i]['total_sales'], 2) . "</td>
              </tr>";
    }

    // close table
    echo "</table>";

} catch (PDOException $e) {
    // catch error
    echo "Error: " . $e->getMessage();
}

// close conn
$conn = null;
?>
