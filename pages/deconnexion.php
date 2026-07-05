
<?php
session_start();
session_destroy();
header('Location: /agrisen/index.php');
exit();
?>
