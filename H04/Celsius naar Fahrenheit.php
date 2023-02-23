<?php
    $cel = rand(0, 35);
    function celToFahr($celsius) {
        $fahrenheit = ($celsius * 1.8) + 32;
        return $fahrenheit; 
    }

    echo $cel . "oC is " . celToFahr($cel) . "oF.";
?>