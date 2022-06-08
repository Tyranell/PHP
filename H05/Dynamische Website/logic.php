<?php
    $username = $_GET['inlognaam'];
    $password = $_GET['wachtwoord'];

    if (!isset($username) || !isset($password) || trim($username) == '' || trim($password) == '') {
        print_r("Er zijn niet ingevulde velden. Probeer het opnieuw en vul alle velden in.");
    } elseif (isset($username) && isset($password)) {
        print_r($_GET); 
    }
?>