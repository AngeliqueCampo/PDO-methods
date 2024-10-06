CREATE TABLE product (
    product_id INT PRIMARY KEY,
    product_name VARCHAR(255),
    category VARCHAR(255),
    price DECIMAL(10, 2),
    manufacturer VARCHAR(255),
    expiration_date DATE,
    stock_quantity INT
);

CREATE TABLE supplier (
    supplier_id INT PRIMARY KEY,
    supplier_name VARCHAR(255),
    address VARCHAR(255),
    contact_number VARCHAR(20)
);

CREATE TABLE orders (
    order_id INT PRIMARY KEY,
    order_date DATE,
    supplier_id INT,
    total_amount DECIMAL(10, 2)
);

CREATE TABLE order_detail (
    order_detail_id INT PRIMARY KEY,
    order_id INT,
    product_id INT,
    quantity INT,
    price DECIMAL(10, 2)
);

CREATE TABLE customer (
    customer_id INT PRIMARY KEY,
    first_name VARCHAR(255),
    last_name VARCHAR(255)
);

CREATE TABLE sale (
    sale_id INT PRIMARY KEY,
    sale_date DATE,
    customer_id INT,
    total_amount DECIMAL(10, 2),
    payment_method VARCHAR(50),
    status VARCHAR(50)
);

CREATE TABLE sale_detail (
    sale_detail_id INT PRIMARY KEY,
    sale_id INT,
    product_id INT,
    quantity INT,
    price DECIMAL(10, 2)
);

INSERT INTO product (product_id, product_name, category, price, manufacturer, expiration_date, stock_quantity) VALUES
(1, 'Aspirin 100mg', 'Medication', 5.99, 'PharmaCorp', '2026-12-31', 200),
(2, 'Cough Syrup 200ml', 'Medication', 8.49, 'HealthPlus', '2025-09-15', 150),
(3, 'Vitamin C Tablets', 'Supplements', 12.00, 'NutraLife', '2025-11-30', 300),
(4, 'Antiseptic Cream 50g', 'Topical', 4.75, 'DermalCare', '2024-10-01', 100),
(5, 'Allergy Relief Tablets', 'Medication', 7.99, 'AllerMed', '2026-02-28', 180),
(6, 'Thermometer Digital', 'Medical Supplies', 15.50, 'MedTech', '2028-05-20', 50),
(7, 'Pain Relief Gel 100g', 'Topical', 9.25, 'ReliefPlus', '2025-07-15', 90),
(8, 'Multivitamin Tablets', 'Supplements', 14.99, 'VitaLife', '2024-12-31', 250),
(9, 'Bandage Pack (10 pcs)', 'Medical Supplies', 6.00, 'SafeCare', '2025-08-01', 120),
(10, 'Prescription Glasses (Frame Only)', 'Optical', 49.99, 'VisionClear', '2026-03-15', 30);

INSERT INTO supplier (supplier_id, supplier_name, address, contact_number) VALUES
(1, 'PharmaCorp Supply', '123 Health St, MedCity, MC 45678', '123-456-7890'),
(2, 'HealthPlus Distributors', '456 Wellness Ave, CareTown, CT 23456', '234-567-8901'),
(3, 'NutraLife Partners', '789 Supplement Blvd, VitaCity, VC 34567', '345-678-9012'),
(4, 'DermalCare Solutions', '101 SkinCare Rd, Dermaville, DV 45678', '456-789-0123'),
(5, 'AllerMed Supplies', '202 Allergy Ln, AllergyTown, AT 56789', '567-890-1234');


INSERT INTO orders (order_id, order_date, supplier_id, total_amount) VALUES
(1, '2024-09-01', 1, 120.00), 
(2, '2024-09-05', 2, 85.00),    
(3, '2024-09-10', 3, 150.00), 
(4, '2024-09-12', 4, 55.00),    
(5, '2024-09-15', 5, 110.00);   

INSERT INTO order_detail (order_detail_id, order_id, product_id, quantity, price) VALUES
(1, 1, 1, 30, 5.99), 
(2, 1, 4, 20, 4.75),  
(3, 1, 9, 10, 6.00), 
(4, 2, 2, 25, 8.49), 
(5, 2, 7, 15, 9.25),  
(6, 3, 3, 50, 12.00), 
(7, 3, 8, 10, 14.99),
(8, 4, 4, 30, 4.75),  
(9, 4, 6, 10, 15.50), 
(10, 5, 5, 40, 7.99); 

INSERT INTO sale (sale_id, sale_date, customer_id, total_amount, payment_method) VALUES
(1, '2024-09-02', 1, 75.00, 'Credit Card'),   
(2, '2024-09-06', 2, 55.00, 'Cash'),         
(3, '2024-09-11', 3, 105.00, 'Debit Card'),     
(4, '2024-09-13', 4, 62.00, 'Credit Card'),     
(5, '2024-09-16', 5, 88.00, 'PayPal');        

INSERT INTO sale_detail (sale_detail_id, sale_id, product_id, quantity, price) VALUES
(1, 1, 1, 10, 5.99),   
(2, 1, 4, 5, 4.75),   
(3, 1, 7, 2, 9.25),   
(4, 2, 2, 5, 8.49),  
(5, 2, 6, 2, 15.50),  
(6, 3, 3, 8, 12.00),  
(7, 3, 8, 3, 14.99),  
(8, 4, 5, 10, 7.99),   
(9, 4, 9, 2, 6.00),   
(10, 5, 4, 6, 4.75);   

INSERT INTO customer (customer_id, first_name, last_name) VALUES
(1, 'John', 'Doe'),      
(2, 'Jane', 'Smith'),    
(3, 'Alice', 'Johnson'), 
(4, 'Bob', 'Williams'),  
(5, 'Eve', 'Davis');   






