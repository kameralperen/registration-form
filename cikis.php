<?php
require_once("baglan.php");

unset($_SESSION["kullanici"]);
session_destroy();

header("Location:index.php");
exit();
?>
