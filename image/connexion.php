<?php
    $hote = 'localhost';
    $base = 'projet';
    $user = 'root';
    $pass = '';
    $cnx = mysql_connect($hote, $user, $pass);
    $ret = mysql_select_db($base);
?>