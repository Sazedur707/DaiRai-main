<?php
$servername = "localhost";
$username = "id20969921_sazedur";
$password = "937943sS@";
$dbname = "id20969921_diary";
// Create a new mysqli connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the values from the form
$id = $_POST['id'];
$name = $_POST['name'];
$message = $_POST['message'];

// Prepare the SQL statement
$stmt = $conn->prepare("INSERT INTO `message` (name, message) VALUES (?, ?)");

// Check if the statement was prepared successfully
if ($stmt === false) {
    die("Error preparing statement: " . $conn->error);
}

// Bind the parameters and execute the statement
$stmt->bind_param("ss", $name, $message);
$stmt->execute();

// Check if the query was executed successfully
if ($stmt->affected_rows > 0) {
    mysqli_close($conn);
    echo '<script>window.location.href = "live-chat.php#' . $id . '";</script>';
    exit();
} else {
    echo "Failed to add message.";
}

// Close the statement and the database connection
$stmt->close();

?>
