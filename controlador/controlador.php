<?php
    require("modelo/fibonacci.php");
    $fibo = new Fibonacci(4000000);
    $set = $fibo->generateFibonacci();
    $valor = $fibo->getResult();

    require("vista/vista.phtml");
?>