<?php
    $servername = "localhost";
    $username = "root";
    $password = "";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=fullstack", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
?>

<head>
    <style>
        .flexbox {
            display: flex;
            flex-wrap: nowrap;
        }
    </style>
</head>
<body>
    <form method="post" class="flexbox">
        <div> 
            <select name="bandname" id="bands">
                <?php
                // Assuming you've already established a valid database connection
                $sql1 = "SELECT * FROM band";
                $result1 = $conn->query($sql1); 
                if ($result1) { 
                    while ($row = $result1->fetch(PDO::FETCH_ASSOC)) { 
                        echo "<option value='" . $row["idband"] . "'>" . $row["naam"] . "</option>"; 
                        } 
                    }
                ?>
            </select>
        </div>
        <div>
            <?php 
                $sql2 = "SELECT * FROM event";
                $result2 = $conn->query($sql2); 
                if ($result2) { 
                    while ($row = $result2->fetch(PDO::FETCH_ASSOC)) { 
                        echo "<input type='checkbox' name='events[]' value='" . $row["idevent"] . "'> " . $row["naam"] . " " . $row["aanvangstijd"] . "<br>";
                    } 
                } 
            ?>
        </div>
        <div>
            <input type="submit" value="Verstuur">
        </div>
    </form>
</body>

<?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $bandname = $_POST['bandname'];
        $events = $_POST['events'];
        $evenLeng = count($events);
        
        foreach ($events as $event){
            $sql = "INSERT INTO band_has_event(band_idband, event_idevent) VALUES($bandname, $event)";
            $conn->exec($sql);
            echo "New record created successfully.";
        }
    } 
?>