include-connexion
<?php
define('DB_HOST', 'sql301.infinityfree.com');
define('DB_USER', 'if0_41820138');
define('DB_PASS', '0qGQ2D3WFA8');
define('DB_NAME', 'if0_41820138_agrisen');

$connexion = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if (!$connexion) {
die("Erreur de connexion : " . mysqli_connect_error());
}

mysqli_set_charset($connexion, 'utf8');
?>
