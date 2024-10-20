<?php
session_start();
session_unset();
session_destroy();
header ("Location:/PHP-COETAGRI-SYSTEM-MAIN/index.php");
?>