<?php
    $user = "schooluser";
    $pass = "SchoolUser5*";
    $dbh = new PDO('mysql:host=localhost;dbname=inlogcodes;port=3306', $user, $pass);

    $emailadres = $_GET['email'];
    $wachtwoord = $_GET['wachtwoord'];

    if ($emailadres != "" && $wachtwoord != "") {
        $query = "SELECT * FROM accounts WHERE email = :emailadres AND wachtwoord = :wachtwoord";
        $sqlQuery = $dbh->prepare($query);
        $sqlQuery->execute(
            array(
                'emailadres' => $_GET['email'],
                'wachtwoord' => $_GET['wachtwoord']
            )
        );

        $row = $sqlQuery->rowCount();
        if ($row == 0) {
            header("Location: index.html");
            echo "<div>Error! Invalid email and/or password, please try again!";
        } elseif ($row > 0) {
        }
    }
?>