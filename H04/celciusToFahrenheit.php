<?php
    function fahrenheitCalc($celsius) {
        $fahrenheit = $celsius * 9 / 5 + 32;
        return $fahrenheit;
    }

    $celsius = rand(0, 30);
    echo "$celsius degrees Celsius is " . fahrenheitCalc($celsius) . " degrees Fahrenheit.";
?>