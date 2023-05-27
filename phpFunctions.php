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

echo "<h2>Dados form: </h2>";
echo $_POST['email'];
echo '<br>';
echo $_POST['password'];

$query = "SELECT * FROM tb_usuarios WHERE email_usuario ilike '{$emailInput}'";
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
  echo "Nome: " . $row['nome_usuario'] . "<br>";
  echo "email: " . $row['email_usuario'] . "<br>";
  echo "senha: " . $row['senha_usuario'] . "<br>";
  echo "<br>";

  validateLogin($row['email_usuario'], $row['senha_usuario'], $row['id_usuario']);
}

function validateLogin($email, $senha, $id_usuario)
{
  $emailInput = $_POST['email'];
  $senhaInput = $_POST['password'];

  

  if ($email === $emailInput && $senha === $senhaInput) {
    echo
    "<script>
    window.location.href = '/ifshop-php/pages/areaLogada.php'
    localStorage.setItem('token', idToken)
    </script>";
  } else {
    echo "
    <script>
    alert('Dados do login incorretos!') 
    </script>";
  }
}
