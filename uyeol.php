<?php
require_once("baglan.php");
if(isset($_SESSION["kullanici"])){
    header("Locatin:index.php");
    exit();
}else{
?>
<!DOCTYPE html>
<html lang="tr-TR">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-language" content="tr">
<title>Üye Giriş İşlemi Taslak</title>
</head>
<body>
    <table width="1000" height="600" align="center" cellpadding="0" cellspacing="0" border="0">
        <tr>
            <td colspan="5" height="100" bgcolor="#ffefd5" align="center">HEADER ALANI (BAŞLIK - BANNER - LOGO VS. KOYULACAK YER)</td>                   
        </tr>
        <tr>
        <td colspan="5" height="20">&nbsp;</td>                   
        </tr>
        <tr>
            <td width="200" height="400" bgcolor="#fdf5e6" valign="top" align="center">&nbsp;<a href="index.php" style="text-decoration: none; color: black;">Ana sayfa içerikleri</a></td>
            <td width="10" height="400">&nbsp;</td>  
            <td width="480" height="400" bgcolor="#fdf5e6" valign="top" align="center">Yazılmak istenilen kısımlar</td>
            <td width="10" height="400">&nbsp;</td>  
            <td width="300" height="400" valign="top" bgcolor="#fdf5e6">
                    <form action="uyeolsonuc.php" method="post">
                        <table width="300" cellpadding="0" cellspacing="0" border="0">
                            <tr height="30" style="color: white;">
                                <td colspan="3" bgcolor="#cd5c5c" align="center">&nbsp;Üye Olma Formu</td>
                            </tr>
                            <tr>
                                <td width="100" height="30">&nbsp;Kullanıcı Adı</td>
                                <td width="10" height="30">:</td>
                                <td width="190" height="30"><input type="text" name="kullaniciadi" style="width: 96%;"></td>
                            </tr>
                            <tr>
                                <td width="100" height="30">&nbsp;Şifre</td>
                                <td width="10" height="30">:</td>
                                <td width="190" height="30"><input type="password" name="sifre" style="width: 96%;"></td>
                            </tr>
                            <tr>
                                <td width="100" height="30">&nbsp;Adı Soyadı</td>
                                <td width="10" height="30">:</td>
                                <td width="190" height="30"><input type="text" name="adisoyadi" style="width: 96%;"></td>
                            </tr>
                            <tr>
                                <td width="100" height="30">&nbsp;E-Mail</td>
                                <td width="10" height="30">:</td>
                                <td width="190" height="30"><input type="text" name="email" style="width: 96%;"></td>
                            </tr>
                            <tr>
                                <td colspan="3" align="right"  height="30"><input type="submit" value="Kayıt Ol"></td>
                            </tr>
                        </table>
                    </form>
            </td>
        </tr>
        <tr>
        <td colspan="5" height="20">&nbsp;</td>                   
        </tr>
        <tr>
            <td colspan="5" height="100" bgcolor="#ffefd5" align="center">FOOTER ALANI (TELİF - EMEĞİ GEÇENLER VS. KOYULACAK YER)</td>                   
        </tr>
    </table>
</body>
</html>
<?php }
    $veritabaniBaglantisi       =   null;
?>