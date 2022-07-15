<?php
//Busca origem para bloquear acesso externo
$origem = $_SERVER['REMOTE_ADDR'];
$ip = explode('.', $origem);

if ($ip[3]< 5) {
    echo "<script>";
    echo "window.location.href='http://www.overtechidro.com.br';";
    echo "</script>";
}
?>
