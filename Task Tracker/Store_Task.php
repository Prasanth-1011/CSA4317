<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store Task</title>
</head>
<body>
    <h1>Store Task</h1>
    <?php
    session_start();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include('Database_Connection.php');
        
        $task = $_POST['Task'];
        $username = $_SESSION['username'];
    
        $sql = "UPDATE Clients SET Tasks = CONCAT_WS(',', Tasks, ?) WHERE Username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $task, $username);
    
        if ($stmt->execute()) {
            echo "<script>('Task Saved Successfully!'); window.location.href='User Interface.html'</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $stmt->close();
        $conn->close();
    }
    ?>
</body>
</html>
