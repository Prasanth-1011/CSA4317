<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include('Database_Connection.php');

    $sql = "SELECT * FROM clients WHERE Username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);

    $username = $_POST['username'];
    $stmt->execute();
    $result = $stmt->get_result();

    $row = $result->fetch_assoc();

    if ($row) {
        if (password_verify($_POST['password'], $row['Password'])) {
            $delete_sql = "DELETE FROM clients WHERE Username = ?";
            $delete_stmt = $conn->prepare($delete_sql);
            $delete_stmt->bind_param("s", $username);
            if ($delete_stmt->execute()) {
                echo "<script>alert('User Account Deleted Successfully!')</script>";
            } else {
                echo "Error Deleting User Account: " . $conn->error;
            }
        } else {
            echo "<script>alert('Incorrect Password!')</script>";
        }
    } else {
        echo "<script>alert('User Not Found!')</script>";
    }

    $stmt->close();
    $delete_stmt->close();
    $conn->close();
}
?>
