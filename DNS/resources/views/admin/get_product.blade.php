<!-- get_product.blade.php -->

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "computer";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$articul = $_GET['articul'];

$stmt = $conn->prepare("SELECT Name, cost, articul FROM computers WHERE articul = ?");
$stmt->bind_param("s", $articul);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $product = $result->fetch_assoc();
    echo json_encode($product);
} else {
    echo 'error';
}

$stmt->close();
$conn->close();
?>
