<?php
$conecta = mysqli_connect("localhost", "root", "") or die ("Erro ao conectar no banco!!!");
$banco = mysqli_select_db($conecta, "syspalestra") or die ("Erro ao selecionar o banco!!!");
mysqli_set_charset($conecta,"utf8");
//End of connection database;
