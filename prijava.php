<?php
include_once('./okvir/korisnik.php');
include_once('./okvir/bazaPodataka.php');
include_once('./okvir/autentikacija.php');
include_once('./okvir/provjeraKorisnika.php');

include './classes/ConfigArray.php';


if (isset($_POST['f_user'])) {

    $f_user = $_POST["f_user"];
    $f_pass = $_POST["f_pass"];

    $korisnik = autentikacija($f_user, $f_pass);


    if ($korisnik->get_status() == 1) {
        session_start();
        $_SESSION["PzaWeb"] = $korisnik;
        $adresa = 'pocetna.php';
       
        header("Location: $adresa");
        exit();
    } else {
        $adresa = 'error.php?e=';
      
        header("Location: $adresa" . $korisnik->get_status());
        exit();
    }
}


$aktivnaSkripta = basename($_SERVER['PHP_SELF']);
$naziv = "Prijava korisnika";

include_once '_header.php';
?>

<section id="sadrzaj">
    
    <form id="forma" method="post"  action='<?php echo $aktivnaSkripta; ?>'>



        <label for="korisnickoIme" class="poljeLabel">Korisničko ime: </label>
        <input type="text" class="polje" id="korisnickoIme" autofocus="" placeholder="Unesi korisničko ime" required="" name='f_user' ><br>
        <label for="lozinka"  class="poljeLabel">Lozinka :</label>
        <input type="password" class="polje" id="lozinka" required="" placeholder="Unesi lozinka" name='f_pass' ><br>
        <input type="submit" value="Prijava" class="gumb polje"><br><br>

    </form>
</section>
    
