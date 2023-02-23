<?php
    $zwemclubs = array(
        array('naam' => 'De spartelkuikens', 'aantal' => 25),
        array('naam' => 'De waterbuffels', 'aantal' => 32),
        array('naam' => 'Plonsmderin', 'aantal' => 11),
        array('naam' => 'Bommetje', 'aantal' => 23)
    );

    foreach ($zwemclubs as $row) {
        echo $row['naam'] . ": " . $row['aantal'] . " ";
        if (round($row['aantal'] / 5, 0) > 1) {
            for ($i = 0; $i < floor($row['aantal'] / 5); $i++) {
                echo '<img src="images/SwimIcon.png" alt="SwimIcon" style="max-height: 50px;max-width: 50px">'; 
            }
            echo "<br/>";
        }
    }
?>