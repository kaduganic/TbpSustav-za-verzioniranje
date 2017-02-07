<?php
include '_header.php';
?>
<!DOCTYPE html>
<section id="sadrzaj">
    <?php
    $e = $_GET["e"];
    $message = "";
    switch ($e) {
        case -1: $message = "Korisnik ne postoji.";
            break;
        case 0: $message = "Neispravno korisničko ime/lozinka.";
            break;
        case 2: $message = "Neautorizirani pristup.";
            break;
        case 3: $message = "Ne postoji email u bazi.";
            break;
        
        default: $message = "Nepoznata pogreska.";
            break;
    }
   print $message;
    ?>
</section>
    <?php include '_footer.php'; ?>