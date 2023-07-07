<?php
require("./banco.php");

$emailInput = $_POST['email'];
$senhaInput = $_POST['password'];

$query = "SELECT * FROM tb_aluno WHERE email_aluno ilike '{$emailInput}'";
$result = pg_query($db, $query);

if (!$result) {
  die("Erro na consulta");
}

$filteredUser = pg_fetch_all($result);

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
    header('Location: /ifshop-php/pages/areaLogada.php');
    setcookie("userName", $nmAluno, time() + (86400 * 30), "/");
    setcookie("userId", $idUsuario, time() + (86400 * 30), "/");
  } else {
    echo "
    <script>
    alert('Dados do login incorretos!') 
    window.location.href = '/ifshop-php/pages/login.html'
    </script>";
  }
}
