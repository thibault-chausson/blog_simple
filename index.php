<?php
include 'php/menu.php';
include 'php/sql.php';
ConnectDatabase();

$connecte=CheckLogin();

echo "<p>Tu es connecté en tant que : $username</p>";







include 'php/footer.php';

?>