<?php
session_start();
session_destroy();
header('Location: \site-tcc-main\login.php');
exit();