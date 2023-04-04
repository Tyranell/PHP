<?php
    function stringReverse($string) {
        $stringLength = strlen($string);
        $gnirts = "";
        for ($i=($stringLength - 1); $i >= 0; $i--) {
            $gnirt = $string[$i];
            $gnirts = $gnirts . $gnirt;
        }
        
        return $gnirts;
    }

    echo stringReverse("For those we have lost, for those we can yet save.");
?>