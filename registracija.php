<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include 'classes/Baza.class.php';
$baza = new Baza();
$baza->spojiDB();

if (isset($_POST['forma'])) {

    $ime = $_POST['ime'];
    $prezime = $_POST['prezime'];
    $email = $_POST['email'];
    $korime = $_POST['korime'];
    $lozinka = $_POST['lozinka'];

    
    }
$naziv = "Registracija";
include './_header.php';
?>

<section id="sadrzaj">

    <form id="forma" method="post" name="forma" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <br>
        <label for="ime" class="poljeLabel">Ime :</label>
        <input type="text" class="polje" name="ime" placeholder="Unesite ime" id="ime" maxlength="30" size="20"><br>
        <label for="prezime" class="poljeLabel">Prezime :</label>    
        <input type="text" class="polje" name="prezime" placeholder="Unesite prezime" id="prezime" maxlength="50" size="20"><br>
        <label for="email" class="poljeLabel">Email adresa :</label>
        <input type="email" class="polje"  id="email" name="email" placeholder="korsnicko_ime@foi.hr" ><br>
        <label for="korime" class="poljeLabel">Korisničko ime: </label>
        <input type="text" class="polje" id="korime" name="korime"  placeholder="Unesi korisničko ime" ><br>
        <label for="lozinka" class="poljeLabel">Lozinka :</label>
        <input type="password"  class="polje" id="lozinka" name="lozinka"  placeholder="Unesi lozinku" ><br>
       

        
        <br><br> <input type="submit" value="Registriraj se" class="gumb polje"  id="submitGumb" name="forma"><br><br>
        <input type="reset" value="Resetiraj" class="gumb polje">

    </form>
</section>
