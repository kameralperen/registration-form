<?php
require_once("baglan.php");
?>

<?php

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

if(isset($_POST["adisoyadi"])){
    $GelenAdiSoyadi         =   Filtrele($_POST["adisoyadi"]);
}else{
    $GelenAdiSoyadi             =   "";
}

if(isset($_POST["email"])){
    $GelenEmail            =   Filtrele($_POST["email"]);
}else{
    $GelenEmail             =   "";
}

    $KontrolSorgusu         =   $veritabaniBaglantisi->prepare("SELECT * FROM uyeler WHERE kullaniciadi = ? OR emailadresi = ?");
    $KontrolSorgusu->execute([$GelenKullaniciAdi, $GelenEmail]);
    $KayitSayisiKontrolu    =   $KontrolSorgusu->rowCount();

    if($KayitSayisiKontrolu>0){
        echo "HATA! <br /> Kullanıcı adı veya e-mail adresi başka bir üye tarafından kullanımdadır. Lütfen tekrar deneyiniz <br />";
        echo "Yeniden kayıt olmak için buraya <a href='uyeol.php'>tıklayınız</a>"; 
    }else{

        $UyeEklemeSorgusu         =   $veritabaniBaglantisi->prepare("INSERT INTO uyeler (kullaniciadi, sifre, adisoyadi, emailadresi, kayittarihi) values (?,?,?,?,?)");
        $UyeEklemeSorgusu->execute([$GelenKullaniciAdi, $GelenSifre, $GelenAdiSoyadi, $GelenEmail, $ZamanDamgasi]);
        $UyeEklemekontrolu        =   $UyeEklemeSorgusu->rowCount();

        if($UyeEklemekontrolu>0){
            echo "TEBRİKLER <br /> Kaydınız başarıyla oluşturuldu. <br /> Ana sayfaya dönmek için buraya <a href='index.php'>tıklayınız</a>";
        }else{
            echo "Kayıt ekleme işlemi sırasında beklenmeyen bir hata oluştu. <br /> Ana sayfaya dönmek için buraya <a href='index.php'>tıklayınız</a>";
        }
    }
    
    $veritabaniBaglantisi       =   null;
?>