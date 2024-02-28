<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include('Database_Connection.php');

    $username = $_SESSION['username'];

    $sql = "UPDATE clients SET Tasks = NULL WHERE Username = '$username'";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('All Tasks Cleared Successfully!');</script>";
    } else {
        echo "Error Clearing Tasks: " . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>
