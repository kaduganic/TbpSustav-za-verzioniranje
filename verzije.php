<?php

include '_headerLogika.php';
include_once('./okvir/korisnik.php');
include_once('./okvir/bazaPodataka.php');
include_once('./okvir/autentikacija.php');
include_once('./okvir/provjeraKorisnika.php');
include './classes/ConfigArray.php';

$naziv = "Verzije";
include '_headerHTML.php';

function verzije() {
    $baza = new baza();
    $ispis ="";

    $korisnik = isset($_SESSION["PzaWeb"]) ? $_SESSION["PzaWeb"]->get_id() : "";
    $upit = "SELECT idverzija, opisverzije, promjene_u_novoj_verziji, kljucne_rijeci, vrijeme_postavljanja, vrijedi_do, projekt FROM verzija";
    $rezultat = $baza->selectDB($upit);
    $ispis .= "<section id='sadrzaj'><caption><h2>Verzije projekta</h2></caption>";
    $ispis .= "<table id='tablicaOstale'><thead><tr><th>Opis verzije</th><th>Promjene s obzirom na staru</th><th>Ključne riječi</th><th>Vrijeme postavljanja</th><th>Vrijedi do</th>";
    while (list($idverzija, $opis, $promjene, $rijeci, $vrijeme, $vrijedi, $projekt) = pg_fetch_array($rezultat)) {
        $ispis.="<tr>";

        $ispis.="<td>$opis</td>";
        $ispis.="<td>$promjene</td>";
        $ispis.="<td>$rijeci</td>";
        $ispis.="<td>$vrijeme</td>";
        $ispis.="<td>$vrijedi</td>";
        $ispis.="<td><a href='editiraj.php?akcija=2&idverzija=$idverzija'>Preuzmi</a></td>";
        $ispis.="<td><a href='editiraj.php?akcija=1&idverzija=$idverzija&projekt=$projekt'>Postavi aktivnom</a></td>";


        $ispis.="</tr>";
    }
    $ispis = $ispis . "<tbody>";
    $ispis.="</tbody></table>";

  
    echo $ispis;
}
?>



    <?php

    verzije();
    ?>
    <input type="button" class="gumb" value="Dodaj novi" onclick="window.location.href = 'verzije.php'" />

</section>

<?php
    include '_footer.php';
?>