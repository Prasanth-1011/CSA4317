<?php
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST") {
    
    include('Database_Connection.php');
    
    $task_index = mysqli_real_escape_string($conn, $_POST['Task_Index']);
    $edited_task = mysqli_real_escape_string($conn, $_POST['Edited_Task']);
    $username = $_SESSION['username'];

    $sql = "UPDATE clients SET Tasks = REPLACE(Tasks, Tasks[$task_index], '$edited_task') WHERE Username = '$username'";
    if(mysqli_query($conn, $sql)) {
        echo "<script>alert('Task Updated Successfully!')</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>
