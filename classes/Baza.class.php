<?php

class baza {

    const server = "localhost";
    const baza = "postgres";
    const korisnik = "postgres";
    const lozinka = 'karlo';
  
    function spojiDB() {
        $pg_connect =  pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=karlo")or die('Neuspjesno');
       
        return $pg_connect;
    }

    function prekiniDB($veza) {
        pg_close($veza);
    }

    function selectDB($upit) {

        $veza = self::spojiDB();
        $rezultat = pg_query($upit) or trigger_error("Greška kod upita: {$upit} - Greška: " . $veza->error . '' . E_USER_ERROR);

        if (!$rezultat) {
            $rezultat = null;
        }

        self::prekiniDB($veza);
        return $rezultat;
    }

    function updateDB($upit, $skripta = '') {
        $veza = self::spojiDB();
        if ($rezultat = pg_query($upit)) {

            self::prekiniDB($veza);
            if ($skripta != '') {
                header("Location: {$skripta}");
            } else {
                return $rezultat;
            }
        } else {
            self::prekiniDB($veza);
            return $rezultat;
        }
    }

    function sudjeluje($upit) {
        $veza = self::spojiDB();
        if ($rezultat = $veza->query($upit)) {

            self::prekiniDB($veza);

            return $rezultat;
        } else {
            echo "Pogreška: " . $veza->error;
            self::prekiniDB($veza);
            return $rezultat;
        }
    }

    function dohvati($upit) {
        $podaci = array();
        $dbc = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=karlo")or die('Neuspjesno');
        if ($dbc) {
            $rs = pg_query($dbc, $upit) or die('neuspjesno');
            if (!$rs) {
                echo "Problem kod postavljanja upita bazi podataka!<br>";
                exit;
            } else {
                while ($row = pg_fetch_assoc($rs)) {
                    $podaci[] = $row;
                }
            }
        } else {
            echo "Neuspjelo spajanje na bazu podataka" . pg_errormessage($dbc);
        }
        pg_close($dbc);
        return $podaci;
    }

}

?>