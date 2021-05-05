<?php
session_start();
session_destroy();
echo 'Vous avez été déconnecté. <a href="../views/login.php"> Revenir en arrière </a>';