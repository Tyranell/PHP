<?php
echo "<div style='text-align:center'>";
for($i = 1; $i < 10; $i++) {
    for($j = 0; $j < $i; $j++) {
        echo ("*");
    }
    echo nl2br("\n");
}
echo "</div>";