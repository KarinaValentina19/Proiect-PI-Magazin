<?php
// Database connection parameters
$servername = "localhost";
$username = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password
$dbname = "parfumuri"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to retrieve items from 'produse' table
$sql = "SELECT * FROM produse";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id_produse"] . " - Name: " . $row["nume"] . " - Description: " . $row["descriere"] . "<br>";
        // Replace "id", "name", and "description" with your actual column names
    }
} else {
    echo "0 results";
}

// Close connection
$conn->close();
?>
