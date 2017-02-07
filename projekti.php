<?php

include '_headerLogika.php';
include_once('./okvir/korisnik.php');
include_once('./okvir/bazaPodataka.php');
include_once('./okvir/autentikacija.php');
include_once('./okvir/provjeraKorisnika.php');
include './classes/ConfigArray.php';

$naziv = "Moji projekti";
include '_headerHTML.php';

function projekti() {
    $baza = new baza();
    $ispis = "";

    $korisnik = isset($_SESSION["PzaWeb"]) ? $_SESSION["PzaWeb"]->get_id() : "";
    $upit = "SELECT DISTINCT projekt.idprojekt, projekt.naziv, projekt.vrijeme_kreiranja, projekt.zadnja_izmjena, projekt.osnovne_informacije, verzija.idverzija FROM projekt, korisnik, verzija WHERE projekt.korisnik = '{$korisnik}' AND projekt.idprojekt=verzija.projekt AND verzija.vrijedi_do='infinity'";
    $rezultat = $baza->selectDB($upit);
    $ispis .= "<section id='sadrzaj'><caption><h2>Moji projekti</h2></caption>";
    $ispis .= "<table id='tablicaOstale'><thead><tr><th>Naziv projekta</th><th>Vrijeme kreiranja</th><th>Zadnja izmjena</th><th>Osnovne informacije</th><th>Aktivna verzija</th>";
    while (list($idprojekt, $naziv, $vrijeme_kreiranja, $zadnja_izmjena, $osnovne_informacije, $verzija) = pg_fetch_array($rezultat)) {
        $ispis.="<tr>";
        
        $ispis.="<td>$idprojekt</td>";
        $ispis.="<td>$naziv</td>";
        $ispis.="<td>$vrijeme_kreiranja</td>";
        $ispis.="<td>$zadnja_izmjena</td>";
        $ispis.="<td>$osnovne_informacije</td>";
        $ispis.="<td>$verzija</td>";
        $ispis.="<td><a href='editiraj.php?akcija=3&idprojekt=$idprojekt'>Prikaži verzije</a></td>";


        $ispis.="</tr>";
    }
    $ispis = $ispis . "<tbody>";
    $ispis.="</tbody></table>";

  
    echo $ispis;
}
?>




    <?php

    projekti();
    ?>
    <input type="button" class="gumb" value="Dodaj novi" onclick="window.location.href = 'projekti_unos.php'" />

</section>

<?php
    include '_footer.php';
?>