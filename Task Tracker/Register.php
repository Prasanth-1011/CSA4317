<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include('Database_Connection.php');
    
    $sql = "INSERT INTO clients (Username, Phone, Mail, Password) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $username, $phone, $email, $password);
    
    $username = $_POST['username'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    if ($stmt->execute()) {
        echo "<script>alert('Registration Successful!')</script>";
        echo "<script>window.location.href = 'login.html';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
