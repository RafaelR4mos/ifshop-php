<?php
require_once('../banco.php');


$userName = '';
$userEmail = '';


foreach ($userData as $row) {
  // Access individual columns by their names
  $userName =  $row['nome_usuario'];
  $userEmail = $row['email_usuario'];
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Área logada</title>
</head>

<body>
  <header>
    <img src="../assets/ifsul-logo.svg" alt="logo ifsul">
    <nav>
      <button onclick="logoutUser()">Logout</button>
    </nav>
  </header>

  <main>
  <?php
  echo '<h1>' . 'Bem vindo, ' . $userName . '</h1>'
  ?>
  <h2>Confira os nossos cursos</h2>

  <div>

  </div>
  </main>

  <!-- <footer>
    <p>Todos os direitos reservados</p>
  </footer> -->
  
  <script>
      function logoutUser() {
        window.location.href = '/ifshop-php/' 
      }
  </script>
</body>

</html>