<?php

$bd_host = "200.19.1.18"; //External: 200.19.1.18 | Internal: 
$base_de_dados = "rafaelsantos";
$bd_usuario = "rafaelsantos";
$bd_senha = "123456";

$connString = "host=$bd_host port=5432 dbname=$base_de_dados user=$bd_usuario password=$bd_senha";
$db = pg_connect($connString) or die("Could not connect");

$query = "SELECT * FROM tb_usuarios";
$result = pg_query($db, $query);

if (!$result) {
  die("Erro na consulta");
}

$names = pg_fetch_all($result);

if (!$names) {
  die("Nenhum dado encontrado");
}

echo "<h2>Select all</h2>";
foreach ($names as $row) {
  // Access individual columns by their names
  echo "ID: " . $row['id'] . "<br>";
  echo "Nome: " . $row['nome'] . "<br>";
  echo "<br>";
}

echo "<h2>Select filtered name</h2>";
