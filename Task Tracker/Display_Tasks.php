<?php
session_start();
if(isset($_SESSION['username'])) {
    include('Database_Connection.php');

    $username = $_SESSION['username'];

    $sql = "SELECT Tasks FROM clients WHERE Username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($tasks);
    $stmt->fetch();
    $stmt->close();

    if(!empty($tasks)) {
        $task_list = explode(',', $tasks);
        echo "<ul>";
        foreach($task_list as $task) {
            echo "<li>$task</li>";
        }
        echo "</ul>";
    } else {
        echo "<script>alert('No Tasks Found.')</script>";
    }

    mysqli_close($conn);
} else {
    echo "<script>alert('Please Login And View Tasks.')</script>";
}
?>
