<?php
    function reverseThisString($string) {
        $stringlength = strlen($string);

        for ($i = $stringlength - 1; $i >= 0; $i--) {
            echo $string[$i];
        }
    }

    reverseThisString("Mono White Control Deck");
?>