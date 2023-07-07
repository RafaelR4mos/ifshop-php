<?php
// $bd_host = "192.168.20.18"; //Internal
$bd_host = "200.19.1.18"; //External
$base_de_dados = "rafaelsantos";
$bd_usuario = "rafaelsantos";
$bd_senha = "123456";
$port = "5432";

$connString = "host=$bd_host port=$port dbname=$base_de_dados user=$bd_usuario password=$bd_senha";
$db = pg_connect($connString) or die("Could not connect");
