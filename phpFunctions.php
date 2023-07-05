<?php
session_start();
$bd_host = "192.168.20.18"; //External: 200.19.1.18 | Internal:  http://192.168.20.18/
$base_de_dados = "rafaelsantos";
$bd_usuario = "rafaelsantos";
$bd_senha = "123456";

$connString = "host=$bd_host port=5432 dbname=$base_de_dados user=$bd_usuario password=$bd_senha";
$db = pg_connect($connString) or die("Could not connect");

$emailInput = $_POST['email'];
$senhaInput = $_POST['password'];

$query = "SELECT * FROM tb_aluno WHERE email_aluno ilike '{$emailInput}'";
$result = pg_query($db, $query);

if (!$result) {
  die("Erro na consulta");
}

$filteredUser = pg_fetch_all($result);
$_SESSION["filteredUser"] = $filteredUser;


if (!$filteredUser) {
  die("Nenhum dado encontrado");
}
foreach ($filteredUser as $row) {

  validateLogin($row['email_aluno'], $row['senha_aluno'], $row['id_aluno'], $row['nm_aluno']);
}

function validateLogin($email, $senha, $idUsuario, $nmAluno)
{
  $emailInput = $_POST['email'];
  $senhaInput = $_POST['password'];


  if ($email === $emailInput && $senha === $senhaInput) {
    echo
    "<script>
    window.location.href = '/ifshop-php/pages/areaLogada.php'
    </script>";
    setcookie("userName", $nmAluno, time() + (86400 * 30), "/"); 
    setcookie("userId", $idUsuario, time() + (86400 * 30), "/"); 
  } else {
    echo "
    <script>
    alert('Dados do login incorretos!') 
    window.location.href = '/ifshop-php/pages/login.php'
    </script>";
  }
}
