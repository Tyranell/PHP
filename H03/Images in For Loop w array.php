<?php
$keyblades = array("KingdomKey", "Oathkeeper", "Oblivion", "UltimaWeapon", "KingdomKeyD", "Spellbinder", "MetalChocobo", "Lionheart", "DiamondDust", "OneWingedAngel");

for($i = 0; $i < 10; $i++) {
    echo '<img src="imagesArray/'. $keyblades[$i] .'.png" alt="image[$i]">';
}
?>