<?php

class CRUD {

    private static $korisnikID;
    public static $trenutni;
    private static $tipKorisnika;

    public static $imena = array(
        'korisnici' => "Korisnici",
        'prijava' => "Prijava korisnika",
        'odjava' => "Odjava korisnika",
    );

    function __construct($sesijaID = '', $korisnikTip = '') {
        self::$korisnikID = $sesijaID;
        self::$tipKorisnika = $korisnikTip;
    }

    function kreirajOkomitiMeni() {

        $preskociDatoteke = Array("_footer.php", "_header.php", "prijava.php", "odjava.php", "aktivacija.php", "registracija.php", "editiraj.php", "_headerHTML.php", "_headerLogika.php", "error.php");
        $dopušteniLinkovi = Array();
        $sadrzaj = glob("*.php");


       
            $dopušteniLinkovi = Array();
            ?>
            <nav class="navigacija">
                <ul>
                    <li><a href="#">Prijavljeni ste kao: <?php echo self::$trenutni ?></a></li>
                    <li><a href="pocetna.php">Početna</a></li>
                    <li><a href="projekti.php">Moji projekti</a></li>
                    <li><a href="projekti_unos.php">Unos novog projekta</a></li>
                    <li><a href="unos_nove_verzije.php">Unos nove verzije</a></li>
                    <li><a href="verzije.php">Postavljene verzije</a></li>
                    <li><a href="xmlprojektiispis.php">XML projekti</a></li>
                    <li><a href="xmlverzijeispis.php">XML verzije</a></li>
                    <li><a href="odjava.php">Odjava</a></li>

                </ul>
            </nav>
            <?php
        

      

     
    }



}
?>