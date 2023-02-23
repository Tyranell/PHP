<?php
    for ($i = 1; $i <= 9; $i++) {
        if ($i % 2 == 0) {
            echo "<img src='imagesNoArray/image" . $i . ".jpg' alt='image[$i]' style='border: solid 2px red'>";
        } elseif ($i % 2 == 1) {
            echo "<img src='imagesNoArray/image" . $i . ".jpg' alt='image[$i]' style='border: solid 2px green'>";
        }
    }
?>