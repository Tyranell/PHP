<?php
$leeftijd = 16;
$prijs = 10;

    if ($leeftijd > 65 || $leeftijd < 12 && $leeftijd >= 3) {
        $prijs = $prijs / 2;
    } elseif ($leeftijd < 3) {
        $prijs = 0;
    } else {
        $prijs;
    }
    echo $prijs;
?>