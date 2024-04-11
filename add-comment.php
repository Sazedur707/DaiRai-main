<?php
$servername = "localhost";
$username = "id20969921_sazedur";
$password = "937943sS@";
$dbname = "id20969921_diary";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $entryId = $_POST['entry_id'];
    $name = $_POST['name'];
    $comment = $_POST['comment'];

    $name = mysqli_real_escape_string($conn, $name);
    $comment = mysqli_real_escape_string($conn, $comment);

    $commentTable = "user_" . $entryId;
    $commentSql = "INSERT INTO `$commentTable` (name, comment) VALUES ('$name', '$comment')";

    if (mysqli_query($conn, $commentSql)) {
        echo "Comment added successfully!";
        mysqli_close($conn);
        echo '<script>window.location.href = "entries.php#' . $entryId . '";</script>';
        exit();
    } else {
        echo "Error: " . $commentSql . "<br>" . mysqli_error($conn);
    }
}
?>
