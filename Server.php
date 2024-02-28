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