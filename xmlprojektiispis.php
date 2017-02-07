
<?php
include '_headerLogika.php';
include_once('./okvir/korisnik.php');
include_once('./okvir/bazaPodataka.php');
include_once('./okvir/autentikacija.php');
include_once('./okvir/provjeraKorisnika.php');
include './classes/ConfigArray.php';

$naziv = "Moji projekti";
include '_headerHTML.php';

header("Cache-control: private");
$baza = new Baza();
$baza->spojiDB();
$upit = "SELECT idprojekt, naziv, vrijeme_kreiranja, zadnja_izmjena, osnovne_informacije FROM projekt";
$rezultat = pg_query($upit);
$XML = "";
$NumFields = pg_num_fields($rezultat);
$XML .= "<?xml version='1.0' encoding='iso-8859-1'?>\n<entries>\n";
$row = true;
while ($row = pg_fetch_row($rezultat)){
	$XML .= "<entry>";
	for ($i=0; $i < $NumFields; $i++)
    {   
	    $XML .= "<" . pg_field_name($rezultat, $i) . ">" . $row[$i] . "</" . pg_field_name($rezultat, $i) . ">";
    }
	$XML .= "</entry>\n";
}
$XML .= "</entries>";


 $oXML = simplexml_load_string($XML);  
 if (!$oXML) {  
      die('xml format not valid or simplexml module missing.');  
 }  
   
 $oXmlRoot = $oXML; // or can be [$oXML->food]  
   
 echo xmlToHtmlTable($oXmlRoot);  
   
   
 function xmlToHtmlTable($p_oXmlRoot) {  
      $bIsHeaderProceessed = false;  
        
      $sTHead = '';  
      $sTBody = '';       
      foreach ($p_oXmlRoot as $oNode) {  
           $sTBody .= '<tr>';  
           foreach ($oNode as $sName => $oValue){  
                if (!$bIsHeaderProceessed) {  
                     $sTHead .= "<th>{$sName}</th>";  
                }  
                $sValue = (string)$oValue;  
                $sTBody .= "<td>{$sValue}</td>";                 
           }  
           $bIsHeaderProceessed = true;  
           $sTBody .= '</tr>';  
      }  
        
      $sHTML = "<table border=1>  
                     <thead><tr>{$sTHead}</tr></thead>  
                     <tbody>{$sTBody}</tbody>  
                </table>";  
      return $sHTML;  
 }  




pg_free_result($rezultat);