<?php
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

$query = "SELECT * FROM tb_usuarios WHERE email = '{$emailInput}'";
$result = pg_query($db, $query);

if (!$result) {
  die("Erro na consulta");
}

$filteredUser = pg_fetch_all($result);

if (!$filteredUser) {
  die("Nenhum dado encontrado");
}

echo "<h2>Select all</h2>";
foreach ($filteredUser as $row) {
  // Access individual columns by their names
  echo "Nome: " . $row['nome'] . "<br>";
  echo "email: " . $row['email'] . "<br>";
  echo "senha: " . $row['senha'] . "<br>";
  echo "<br>";
  validateLogin($row['email'], $row['senha']);
}

function validateLogin($email, $senha)
{
  $emailInput = $_POST['email'];
  $senhaInput = $_POST['password'];

  if ($email === $emailInput && $senha === $senhaInput) {
    echo "<script>alert('Autenticado com sucesso!')</script>";
  } else {
    echo "
    <script>
    alert('Senha incorreta!') 
    window.location.href= '/trabalho-final/'
    </script>";
  }
}
