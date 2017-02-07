<?php
function autentikacija($user, $pass) {

    $result = -1;
    $dbc = pripremiBazuPodataka();

    $sql = "select idkorisnik, ime, prezime, lozinka, email FROM korisnik where korisnicko_ime = '$user' ";
    #echo $sql."<br />";
        
    #$rs = $dbc->pg_query($sql);
    $rs = pg_query($sql);
    
    if (!$rs) {
        trigger_error("Problem kod upita na bazu podataka!", E_USER_ERROR);
    }

    #$broj = $rs->num_rows;
    $broj = pg_num_rows($rs);
    #echo $broj;
    
    $korisnik = new Korisnik();

   if ($broj == 1) {
        list($id, $ime, $prezime, $lozinka, $email, ) = pg_fetch_array($rs);
        
        #echo "$id, $prezime, $ime, $lozinka, $tipKorisnika";

        if ($lozinka == $pass) {
            $korisnik->set_podaci($id, $user, $ime, $prezime, $lozinka, $email );

            $result = 1;
        } else {
            $result = 0;
        }
    } else {
        $result = -1;
    }

    
    $korisnik->set_status($result);

    #$dbc->close();
    pg_close($dbc);
    
    

    return $korisnik;
}
?>
