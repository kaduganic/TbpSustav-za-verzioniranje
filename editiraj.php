<?php
include './_headerLogika.php';

include_once('./okvir/korisnik.php');
include_once('./okvir/bazaPodataka.php');
include_once('./okvir/autentikacija.php');
include_once('./okvir/provjeraKorisnika.php');
include './classes/ConfigArray.php';

$naziv = "Moji projekti";
include '_headerHTML.php';



 
if (isset($_GET['akcija']) && isset($_GET['idverzija']) && isset($_GET['projekt'])) {


    if ($_GET['akcija'] == 1) {

        $upit = "UPDATE verzija SET vrijedi_do='infinity'::TIMESTAMP WHERE idverzija='{$_GET['idverzija']}'";
        $upit1 = "UPDATE verzija SET vrijedi_do=NOW() WHERE vrijedi_do='infinity'::TIMESTAMP AND projekt='{$_GET['projekt']}'";

        $baza->updateDB($upit1);
        $baza->updateDB($upit, "projekti.php");
    }
}

else if (isset($_GET['akcija']) && isset($_GET['idverzija'])) {


    if ($_GET['akcija'] == 2) {

        $upit = "SELECT lo_export(dokument[1], 'C:/xampp/tmp/{$_GET['idverzija']}'||'.txt') FROM verzija WHERE idverzija='{$_GET['idverzija']}'";

        $baza->updateDB($upit, "verzije.php");
    }
}

else if ($_GET['akcija'] == 3 && isset($_GET['idprojekt'])) {
        $baza = new baza();
    $ispis ="";
    $korisnik = isset($_SESSION["PzaWeb"]) ? $_SESSION["PzaWeb"]->get_id() : "";
    $upit = "SELECT idverzija, opisverzije, promjene_u_novoj_verziji, kljucne_rijeci, vrijeme_postavljanja, vrijedi_do, projekt FROM verzija where projekt = '{$_GET['idprojekt']}' ORDER BY 1";
    
    $rezultat = $baza->selectDB($upit);
    $ispis .= "<section id='sadrzaj'><caption><h2>Verzije projekta</h2></caption>";
    $ispis .= "<table id='tablicaOstale'><thead><tr><th>Opis verzije</th><th>Promjene s obzirom na staru</th><th>Ključne riječi</th><th>Vrijeme postavljanja</th><th>Vrijedi do</th>,<th>Projekt ID</th>";
    while (list($idverzija, $opis, $promjene, $rijeci, $vrijeme, $vrijedi, $projekt) = pg_fetch_array($rezultat)) {
        $ispis.="<tr>";

        $ispis.="<td>$idverzija</td>";
        $ispis.="<td>$opis</td>";
        $ispis.="<td>$promjene</td>";
        $ispis.="<td>$rijeci</td>";
        $ispis.="<td>$vrijeme</td>";
        $ispis.="<td>$vrijedi</td>";
        $ispis.="<td>$projekt</td>";
        $ispis.="<td><a href='editiraj.php?akcija=2&idverzija=$idverzija'>Preuzmi</a></td>";
        $ispis.="<td><a href='editiraj.php?akcija=1&idverzija=$idverzija&projekt=$projekt'>Postavi aktivnom</a></td>";


        $ispis.="</tr>";
    }
    $ispis = $ispis . "<tbody>";
    $ispis.="</tbody></table>";
    
    echo $ispis;
    }
 else {
    header("Location: error.php?idGreske=2");
}

