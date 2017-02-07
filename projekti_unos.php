<?php
include '_headerLogika.php';
include_once('./okvir/korisnik.php');
include_once('./okvir/bazaPodataka.php');
include_once('./okvir/autentikacija.php');
include_once('./okvir/provjeraKorisnika.php');
include './classes/ConfigArray.php';
$naziv = "Unos projekta";
if (isset($_POST['forma'])) {

    $naziv = $_POST['naziv'];
    $cilj_projekta = $_POST['cilj_projekta'];
    $zahtjevi = $_POST['zahtjevi'];
    $narucitelj = $_POST['narucitelj'];
    $budzet = $_POST['budzet'];
    $rok = $_POST['rok'];
    $getKorisnik = $korisnik->get_id();

    $greske = "";

    if ($greske == "") {

        $upit = "INSERT INTO projekt(naziv, vrijeme_kreiranja, osnovne_informacije, korisnik, tip_projekta) VALUES('{$naziv}',NOW(), ROW('{$cilj_projekta}','{$zahtjevi}','{$narucitelj}','{$budzet}','{$rok}'),'{$getKorisnik}',1)";
        
        
        $baza::updateDB($upit, 'KORISNIK_moji_automobili.php');
    }
}

include '_headerHTML.php';
?>

<section id="sadrzaj">

    <form id="forma" method="post" name="forma" action="<?php echo $_SERVER['PHP_SELF'];
        ?>">
        <br>
        <?php
        #echo $greske;
        ?>
        <h3>Dodavanje novog projekta</h3>
        

        <label for="naziv" class="poljeLabel" >Naziv projekta :</label>
        <input type="text"  class="polje" name="naziv" placeholder="Unesite naziv projekta" id="marka" maxlength="30" size="20"><br>

        <label for="cilj_projekta"  class="poljeLabel">Cilj projekta :</label>    
        <input type="text"  class="polje" name="cilj_projekta" placeholder="Unesite cilje projekta" id="model" maxlength="50" size="20"><br>

        <label for="zahtjevi"  class="poljeLabel">Zahtjevi :</label>    
        <input type="text"  class="polje" name="zahtjevi" placeholder="Unesite zahtjeve" id="klasa" maxlength="50" size="20"><br>

        <label for="narucitelj"  class="poljeLabel">Narucitelj :</label>    
        <input type="text" class="polje"  name="narucitelj" placeholder="Unesite narucitelja" id="godinaProizvodnje" maxlength="50" size="20"><br>

        <label for="budzet"  class="poljeLabel">Budzet :</label>    
        <input type="text" class="polje"  name="budzet" placeholder="Unesite budzet" id="boja" maxlength="50" size="20"><br>

        <label for="rok" class="poljeLabel">Rok :</label>    
        <input type="date" class="polje"  name="rok" id="datum" placeholder="Unesite rok"><br>

        
        <input type="submit" class="gumb polje"  value="Nastavi" class="gumb" name="forma">

        </form>
        </section>
        
