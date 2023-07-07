<?php
require("../php/banco.php");
if (!isset($_COOKIE['userName']) || !isset($_COOKIE['userId'])) {
  header('location: login.php');
} else {
  $userName = $_COOKIE["userName"];
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Área logada</title>
  <link rel="stylesheet" href="../styles/global.css">
  <link rel="stylesheet" href="../styles/meus-cursos.css">
</head>

<body>
  <header class="header-container">
    <img src="../assets/ifsul-logo.svg" alt="logo ifsul">
    <div class="header-btn-container">
      <a href="" class="link">Meus Cursos</a>
      <button class="button"><a href="#" class="link">Adquira cursos!</a></button>
      <button onclick="logoutUser()" class="button secondary"><span class="link">Logout</span></button>

    </div>
  </header>

  <main class="page-container">
    <div class="page-info">
      <?php
      echo '<h1>' . 'Bem vindo, ' . $userName . '!' . '</h1>';
      echo '<span>' . 'Seus cursos: ' . '2' . '</span>';
      ?>
    </div>

    <h2>Confira os nossos cursos</h2>
    <div class="courses-container">
      <div class="course">
        <img src="" alt="">
        <div class="course-header">
          <div>
            <h3>Banco de dados</h3>
            <span>Luis Fernando</span>
          </div>
          <span>CH: 40h</span>
        </div>
        <p>
          Lorem ipsum, dolor sit amet consectetur adipisicing elit.
          Quasi suscipit exercitationem cumque accusantium assumenda laudantium incidunt architecto aspernatur accusamus deleniti officiis,
          dolorem, iure numquam sunt ullam earum, esse nam ut facere omnis sapiente?
        </p>
      </div>
    </div>
  </main>



  <!-- <footer>
    <p>Todos os direitos reservados</p>
  </footer> -->

  <script>
    function logoutUser() {
      window.location.href = '/ifshop-php/'
      document.cookie = "userName=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
      document.cookie = "userId=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
    }
  </script>
</body>

</html>