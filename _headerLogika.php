<?php

include './classes/Baza.class.php';
include './classes/Sesija.class.php';
include './classes/ConfigArray.php';
include './classes/CRUD.class.php';
include './okvir/provjeraKorisnika.php';


#objekti za bazu i forme
$baza = new baza();
$sesija = new Sesija();
$aktivnaSkripta = basename($_SERVER['PHP_SELF']); //aktivna skripta

#PROVJERA SESIJE
$korisnik = provjeraKorisnika();
$crud = new CRUD($korisnik->get_id());
?>
