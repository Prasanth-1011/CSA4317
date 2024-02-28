<html>
    <head>
        <title>Client Server</title>
    </head>
    <body>
        <form action="Fact.php" method="post">
            <label>Enter Number</label>
            <input type="number" id="number" name="number" placeholder="Enter Input" required>
            <input type="submit" value="Find Factorial">
        </form>
    </body>

    <?php
    if($_POST) {
        $fact = 1;

        $number = $_POST['number'];
        echo "Factorial of $number:<br><br>";

        for($i=1;$i<=$number; $i++){
            $fact = $fact * $i;
        }
        echo $fact. "<br>";
    }
?>
</html>