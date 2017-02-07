<?php
define('ADMINISTRATOR', '0');
define('KORISNIK', '1');

$bp_server = 'localhost';
$bp_korisnik = 'postgres';
$bp_lozinka = 'karlo';
$bp_baza = 'postgres';
$bp_znakovi = 'utf8';

function pripremiBazuPodataka() {
    global $bp_server, $bp_korisnik, $bp_lozinka, $bp_baza, $bp_znakovi;

    #$dbc = new mysqli($bp_server, $bp_korisnik, $bp_lozinka, $bp_baza);
    #$dbc = @pg_connect($bp_server, $bp_korisnik, $bp_lozinka, $bp_baza);
    $dbc = @pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=karlo");
    
    if (!$dbc) {
        trigger_error("Problem kod povezivanja na bazu podataka!", E_USER_ERROR);
    }
    
   #$dbc->set_charset($bp_znakovi);    
   
   return $dbc;
}
?>