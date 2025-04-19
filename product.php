<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Product_Export";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch products from the database
$sql = "SELECT name, description, image_url, alt_text FROM products";
$result = $conn->query($sql);

// Store products in an array
$products = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
}

// Close the database connection
$conn->close();

// Pass the products array to the HTML file
include 'product.html';
?>