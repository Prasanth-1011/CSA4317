<?php
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST") {
    include('Database_Connection.php');
    
    $task_index = mysqli_real_escape_string($conn, $_POST['Task_Index']);
    $username = $_SESSION['username'];

    $sql = "UPDATE clients SET Tasks = TRIM(BOTH ',' FROM REPLACE(CONCAT(',', Tasks, ','), ',$task_index,', ',')) WHERE Username = '$username'";
    if(mysqli_query($conn, $sql)) {
        echo "<script>alert('Task Deleted Successfully!')</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>
