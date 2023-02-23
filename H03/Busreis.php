<?php
    $leeftijd = 12;
    $prijs = 10;

    echo "Uw leeftijd is " . $leeftijd . " jaar oud.";
    if ($leeftijd <= 12 && $leeftijd >= 3 || $leeftijd > 65) {
        echo " Uw prijs is " . $prijs / 2 . " euro." ;
    } elseif ($leeftijd < 3) {
        echo " Uw prijs is " . $prijs * 0 . " euro.";
    } else {
        echo " Uw prijs is " . $prijs . " euro.";
    }