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

    // prepare SQL query
    $sql = "
        INSERT INTO product (product_id, product_name, category, price, manufacturer, expiration_date, stock_quantity) 
        VALUES 
        (?, ?, ?, ?, ?, ?, ?),
        (?, ?, ?, ?, ?, ?, ?),
        (?, ?, ?, ?, ?, ?, ?),
        (?, ?, ?, ?, ?, ?, ?),
        (?, ?, ?, ?, ?, ?, ?)
    ";

    $stmt = $conn->prepare($sql);

    // execute insert statement
    $stmt->execute([
        11, 'Cold Relief Capsules', 'Medication', 10.50, 'ReliefMed', '2027-01-01', 120,  
        12, 'Headache Tablets', 'Medication', 9.75, 'PainAway', '2026-08-15', 80,     
        13, 'Bandage Roll', 'Medical Supplies', 3.50, 'CareBand', '2025-12-31', 150,
        14, 'Hand Sanitizer 500ml', 'Hygiene', 6.00, 'CleanHands', '2026-05-20', 200,
        15, 'First Aid Kit', 'Medical Supplies', 25.00, 'SafeMed', '2028-10-01', 50   
    ]);

    echo "5 new products inserted successfully!";
    
} catch (PDOException $e) {
    // catch error
    echo "Error: " . $e->getMessage();
}

// close conn
$conn = null;
?>
