<?php
include '_headerLogika.php';
include_once('./okvir/korisnik.php');
include_once('./okvir/bazaPodataka.php');
include_once('./okvir/autentikacija.php');
include_once('./okvir/provjeraKorisnika.php');
include './classes/ConfigArray.php';

if (isset($_POST['forma'])) {

    $opis = $_POST['opis'];
    $novo = $_POST['novo'];
    $rijeci = $_POST['rijeci'];
    $dokument = $_POST['dokument'];
    $getkorisnik = $korisnik->get_id();
    $projekt = $_POST['projekt'];

    $greske = "";

    if ($greske == "") {

        $upit = "INSERT INTO verzija(opisverzije, promjene_u_novoj_verziji, kljucne_rijeci, vrijeme_postavljanja, dokument, projekt) VALUES('{$opis}','{$novo}','{$rijeci}',NOW(),ARRAY[lo_import('{$dokument}')],'{$projekt}')";
        $upit1 = "INSERT INTO radi_na VALUES((SELECT idverzija FROM verzija ORDER BY vrijeme_postavljanja DESC LIMIT 1),'{$getkorisnik}')";
        
        $baza::updateDB($upit, 'unos_nove_verzije.php');
        $baza::updateDB($upit1, 'unos_nove_verzije.php');
    }
}

include '_headerHTML.php';
?>

<section id="sadrzaj">

    <form id="forma" method="post" name="forma" action="<?php echo $_SERVER['PHP_SELF'];
        ?>">
        <br>
        <h3>Dodavanje verzije:</h3>
        

        <label for="opis" class="poljeLabel" >Opis nove verzije :</label>
        <input type="text"  class="polje" name="opis" placeholder="Unesite opis verzije" id="marka" maxlength="30" size="20"><br>

        <label for="novo"  class="poljeLabel">Promjene s obzirom na prethodnu verziju:</label>    
        <input type="text"  class="polje" name="novo" placeholder="Unesite promjene" id="model" maxlength="50" size="20"><br>

        <label for="rijeci"  class="poljeLabel">Ključne riječi :</label>    
        <input type="text"  class="polje" name="rijeci" placeholder="Unesite ključne riječi" id="klasa" maxlength="50" size="20"><br>

        <label for="dokument"  class="poljeLabel">Postavite dokument :</label>    
        <input type="text" class="polje"  name="dokument" id="godinaProizvodnje"><br>
        
        <label for="projekt" class="poljeLabel" >Projekt</label>
        <?php
        $upit = "SELECT idprojekt, naziv FROM projekt";
        $result = baza::dohvati($upit);

        
        print " <select id='projekt' name='projekt' class='polje'>";
        print "<option value='' selected> ...  </option>";
        foreach ($result as $kor) {
            print "<option value='" . $kor['idprojekt'] . "'>" . $kor['naziv'] . "</option>";
        }
        print "</select>";
        ?>

        
        <input type="submit" class="gumb polje"  value="Nastavi" class="gumb" name="forma">

        </form>
        </section>
        

