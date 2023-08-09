<?php
require_once("baglan.php");


if(isset($_POST["kullaniciadi"])){
    $GelenKullaniciAdi      =   Filtrele($_POST["kullaniciadi"]);
}else{
    $GelenKullaniciAdi      =   "";
}

if(isset($_POST["sifre"])){
    $GelenSifre             =   Filtrele($_POST["sifre"]);
}else{
    $GelenSifre             =   "";
}

    $GirisSorgusu       =   $veritabaniBaglantisi->prepare("SELECT * FROM uyeler WHERE kullaniciadi=? AND sifre=? LIMIT 1");
    $GirisSorgusu->execute([$GelenKullaniciAdi,  $GelenSifre]);
    $KayitSayisi        =   $GirisSorgusu->rowCount();


    if($KayitSayisi>0){
        $_SESSION["kullanici"]  =   $GelenKullaniciAdi;
        header("Location:index.php");
        exit();
    }else{
        echo "İlgili kullanıcı adı veya şifre ile eşleşen bir kayıt bulunmuyor! Lütfen bir daha deneyiniz. <br /> Ana sayfaya dönmek için buraya <a href='index.php'>tıklayınız</a>";
    }
?>
