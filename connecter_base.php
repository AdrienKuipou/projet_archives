<?php
$host = 'archive.cjrj1sqxtvei.us-east-1.rds.amazonaws.com';
$dbname = 'mon_projet';
$user = 'root';
$password = 'madrida7';
$base = new PDO("mysql:host=$host;dbname=$dbname", $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
?>
