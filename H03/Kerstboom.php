<?php
$star = "*";

echo "<div style='text-align:center'>";
for($i = 0; $i < 10; $i++) {
    for($j = 1; $j <= $i; $j++) {
        echo $star;
    }
    echo "</br>";
}
echo "</div>"
?>