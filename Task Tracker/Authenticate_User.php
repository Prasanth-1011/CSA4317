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
    
    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        if ($_POST['password'] === $row['Password']) {
            $_SESSION['username'] = $username;
            echo "<script>alert('Login Successful!');</script>";
            echo "<script>window.location.href = 'User Interface.html';</script>";
        } else {
            echo "<script>alert('Invalid Username or Password!')</script>";
        }
    } else {
        echo "<script>alert('Invalid Username or Password!')</script>";
    }

    $stmt->close();
    $conn->close();
}
?>