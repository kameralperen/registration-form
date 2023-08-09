<?php
session_start(); ob_start();

try{
    $veritabaniBaglantisi   =   new PDO("mysql:host=localhost;dbname=uskumru;charset=UTF8;", "root" , "");
}catch(PDOException $hata){
    echo "Veritabanı bağlantı hatası!! <br />" . $hata->getmessage();
    die();
}

function Filtrele($Deger){
    $bir    =   trim($Deger);
    $iki    =   strip_tags($bir);
    $uc     =   htmlspecialchars($iki, ENT_QUOTES);
    $Sonuc  =   $uc;
    return $Sonuc;
}

if(isset($_SESSION["kullanici"])){
    
    $UyeSorgusu       =   $veritabaniBaglantisi->prepare("SELECT * FROM uyeler WHERE kullaniciadi=?");
    $UyeSorgusu->execute([$_SESSION["kullanici"]]);
    $UyeSayisi        =   $UyeSorgusu->rowCount();
    $UyeKaydi         =   $UyeSorgusu->fetch(PDO::FETCH_ASSOC);

    if($UyeSayisi>0){
        $UyeninAdiSoyadi    =   $UyeKaydi["adisoyadi"];
    }else{
        $UyeninAdiSoyadi    =   "";
    }
}

$ZamanDamgasi   =   time();

?>