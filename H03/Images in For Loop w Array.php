<?php
$keyblades = array("DiamondDust", "KingdomKey", "KingdomKeyD", "Lionheart", "MetalChocobo", "Oathkeeper", "Oblivion", "OneWingedAngel", "Spellbinder", "UltimaWeapon");

for($i = 0; $i < 10; $i++) {
    echo '<img src="imagesArray/' . $keyblades[$i] . '.png" alt="[' . $keyblades[$i] . ']">';
}