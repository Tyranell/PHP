<?php
    function divisibleByThree($getal) {
        if ($getal % 3 == 0) {
            return true;
        } else {
            return false;
        }
    }

    $getal = rand(1, 30);

    if (divisibleByThree($getal) == true) { 
        echo "TRUE! Het getal was " . $getal . "."; 
    } elseif (divisibleByThree($getal) == false) {
        echo "FALSE! Het getal was " . $getal . "."; 
    }
?>