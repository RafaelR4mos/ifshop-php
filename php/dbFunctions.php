<?php
require("banco.php");
$id_usuario_bd = $_COOKIE['userId'];

$courses_quantity = getCourseQuantity($db, $id_usuario_bd);
$user_course_info = getUserCourses($db, $id_usuario_bd);

function getCourseQuantity($db, $id_usuario)
{
  $query = "SELECT count(*)course_quantity from  tb_aluno_curso a, tb_cursos b 
	WHERE a.id_aluno = $id_usuario AND b.id_curso = a.id_curso";
  $result = pg_query($db, $query);
  $quantity = pg_fetch_all($result);
  return $quantity;
}

function getUserCourses($db, $id_usuario)
{
  $query = "SELECT nm_curso, nm_professor, carga_horaria, descricao_curso, img_capa_curso
  FROM tb_aluno_curso a, tb_cursos b 
  WHERE a.id_aluno = $id_usuario AND
        b.id_curso = a.id_curso
        ";
  $result = pg_query($db, $query);
  $courses = pg_fetch_all($result);
  return $courses;
}
