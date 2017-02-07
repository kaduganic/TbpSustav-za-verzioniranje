<?php

function dnevnik_zapis($tekst) {
    $korisnik = isset($_SESSION["PzaWeb"]) ? $_SESSION["PzaWeb"]->get_id() : "";
    $adresa = $_SERVER["REMOTE_ADDR"];
    $skripta = $_SERVER["REQUEST_URI"];
    $preglednik = $_SERVER["HTTP_USER_AGENT"];
   
    $dbc = pripremiBazuPodataka();

    $sql = "insert into dnevnik (tekst,skripta,adresa, preglednik,vrijeme,datum, korisnik) values " .
            "( '$tekst', '$skripta', '$adresa', '$preglednik',now(),curdate(),'$korisnik')";

    $rs = $dbc->query($sql);
    if (!$rs) {
        trigger_error("Problem kod upisa u bazu podataka!" . $dbc->error, E_USER_ERROR);
    }

    $dbc->close();
}
function dnevnik_zapisnereg($tekst) {
    
    $adresa = $_SERVER["REMOTE_ADDR"];
    $skripta = $_SERVER["REQUEST_URI"];
    $preglednik = $_SERVER["HTTP_USER_AGENT"];
   
    $dbc = pripremiBazuPodataka();

    $sql = "insert into dnevnik (tekst,skripta,adresa, preglednik,vrijeme,datum, korisnik) values " .
            "( '$tekst', '$skripta', '$adresa', '$preglednik',now(),curdate(),NULL)";

    $rs = $dbc->query($sql);
    if (!$rs) {
        trigger_error("Problem kod upisa u bazu podataka!" . $dbc->error, E_USER_ERROR);
    }

    $dbc->close();
}

?>