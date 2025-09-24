<?php

$host     = "179.155.211.130";
$porta    = 6306;
$usuario  = "ferroviax";
$senha    = "ferroviax";
$banco    = "ferroviax";

$conn = new mysqli($host, $usuario, $senha, $banco, $porta);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

$conn->set_charset("utf8");

date_default_timezone_set("America/Sao_Paulo");
