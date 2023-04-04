<?php
    function deelDoorDrie($dDD) {
        if ($dDD % 3 == 0) {
            $deelbaarDoorDrie = true;
        } else {
            $deelbaarDoorDrie = false;
        }

        return $deelbaarDoorDrie;
    }

    if (deelDoorDrie(5)) {
        echo "Het is deelbaar door drie.";
    } else {
        echo "Het is NIET deelbaar door drie.";
    }
?>