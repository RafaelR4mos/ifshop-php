<?php
require("./banco.php");
$selectDinamico = "(select max(id_aluno)+1 from tb_aluno)";

$connString = "host=$bd_host port=5432 dbname=$base_de_dados user=$bd_usuario password=$bd_senha";
$db = pg_connect($connString) or die("Could not connect");

$nomeInput = $_POST['nome'];
$emailInput = $_POST['email'];
$senhaInput = $_POST['senha'];

$query = "INSERT INTO tb_aluno VALUES($selectDinamico, '{$nomeInput}', '{$emailInput}','{$senhaInput}')";
$result = pg_query($db, $query);

if ($result) {
  echo "<script>alert('Usuário cadastro com sucesso!')</script>";
  header('Location: /ifshop-php/login.html');
} else {
  echo "Erro na entrada dos dados\n";
}
