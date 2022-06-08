<?php
    function loginFunction($emailadres, $wachtwoord) {
        $checked = 0;
        $accounts = array(
            array("piet@worldonline.nl", "doetje123"),
            array("klaas@carpets.nl", "snoepje777"),
            array("truushendriks@wegweg.nl", "arkiearkie201")
        );
        
        for($i = 0; $i < 3; $i++) {
            if ($checked != 1){
                if($emailadres === $accounts[$i][0] && $wachtwoord === $accounts[$i][1]) {
                    $checked = 1;
                    return true;
                }
            }
        }

        if ($checked == 0) {
            return false;
        }
    }

    $emailadres = $_GET['email'];
    $wachtwoord = $_GET['wachtwoord'];

    if(loginFunction($emailadres, $wachtwoord) == true) {
        print_r("Welkom");
    } elseif(loginFunction($emailadres, $wachtwoord) == false) {
        print_r("Sorry, geen toegang!");
    }
?>