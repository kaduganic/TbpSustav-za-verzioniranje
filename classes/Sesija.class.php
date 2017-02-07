<?php

class Sesija {

    const ID = "ID";
    const MAIL = "mail";
    const KOR_IME = "username";
    const IME = "ime";
    const PREZIME = "prezime";
    const TIP = "tip";
    const SESSION_NAME = "prijava_sesija";

    static function kreirajSesiju($id, $kor_ime, $ime, $prezime, $mail, $tip) {
        session_name(self::SESSION_NAME);

        if(session_id() == ""){
            session_start();
        }

        $_SESSION[self::ID] = $id;
        $_SESSION[self::MAIL] = $mail;
        $_SESSION[self::KOR_IME] = $kor_ime;
        $_SESSION[self::IME] = $ime;
        $_SESSION[self::PREZIME] = $prezime;
        $_SESSION[self::TIP] = $tip;
    }


    static function provjeriSesiju() {
        session_name(self::SESSION_NAME);

        if(session_id() == ""){
            session_start();
        }

        if (isset($_SESSION[self::ID])) {
            $id = $_SESSION[self::ID];
        } else {
            return null;
        }
        return $id;
    }


    static function obrisiSesiju() {
        session_name(self::SESSION_NAME);


        
        if(session_id() == ""){
            session_start();
        }
        
        session_unset();
        session_destroy();
    }
    
    

}
