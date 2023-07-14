<?php
require('../php/dbFunctions.php');

if (!isset($_COOKIE['userName']) || !isset($_COOKIE['userId'])) {
  header('location: login.php');
} else {
  $userName = $_COOKIE['userName'];
  $id_usuario = $_COOKIE['userId'];
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="SVG" href="../assets/ifsul-logo.svg" />
  <title>Adquira cursos!</title>
  <link rel="stylesheet" href="../styles/global.css">
  <link rel="stylesheet" href="../styles/meus-cursos.css">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
  <header class="header-container">
    <img src="../assets/ifsul-logo.svg" alt="logo ifsul">
    <div class="header-btn-container">
      <a href="./areaLogada.php" class="link" id="my-courses-link">Meus Cursos</a>
      <button class="button"><a href="./acquireCourse.php" class="link">Adquira cursos!</a></button>
      <button onclick="logoutUser()" class="button secondary"><span class="link">Logout</span></button>

    </div>
  </header>

  <main class="page-container">
    <form class="page-info">
      <?php
      echo '<h1>' . 'Bem vindo, ' . $userName . '!' . '</h1>';
      echo '<span>' . 'Cursos adquiridos ' . $courses_quantity[0]['course_quantity'] . '</span>';
      ?>
    </form>

    <h2>Adquira outros cursos</h2>
    <div class="courses-container">

      <?php
      foreach ($all_courses as $course) {
        echo
        '
      <form action="acquireCourse.php?id=' . $course["id_curso"] . '"  class="course" method="POST">
      <img src="' . $course["img_capa_curso"] . '" class="card-img">
      <div class="course-header">
        <div>
          <h3>' . $course["nm_curso"] . '</h3>
          <span>' . $course["nm_professor"] . '</span>
        </div>
        <span>CH: ' . $course["carga_horaria"] . '</span>
      </div>
      <p>' . $course["descricao_curso"] . '</p>
      <button type="submit" class="button acquire-course">Adquirir curso</button>
    </form>
      ';
      }
      ?>

    </div>
  </main>

  <!-- <footer>
    <p>Todos os direitos reservados</p>
  </footer> -->

  <script src="../js/areaLogada.js"></script>
</body>

</html>

<?php
if (isset($_GET['id'])) {
  $id_curso = $_GET['id'];
  global $db;
  subscribeInCourse($db, $id_curso, $id_usuario);
  echo
  '
    <script>
      alert("Curso adicionado com sucesso!");
      window.location.href = "acquireCourse.php";
    </script>
  ';
}
?>