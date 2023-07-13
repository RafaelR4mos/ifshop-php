<?php
require("banco.php");
$id_usuario_bd = $_COOKIE['userId'];

$courses_quantity = getCourseQuantity($db, $id_usuario_bd);
$user_course_info = getUserCourses($db, $id_usuario_bd);

$all_courses = getAvailableCourses($db, $id_usuario_bd);

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

function getAvailableCourses($db, $id_usuario)
{
  $query = "SELECT distinct nm_curso, nm_professor, carga_horaria, a.id_curso,
  descricao_curso, img_capa_curso FROM tb_cursos a, tb_aluno_curso b where a.id_curso not in (select id_curso from tb_aluno_curso where id_aluno = $id_usuario)";
  $result = pg_query($db, $query);
  $courses = pg_fetch_all($result);
  return $courses;
}

function subscribeInCourse($db, $id_curso, $id_usuario,)
{
  $query = "INSERT INTO tb_aluno_curso VALUES($id_curso, $id_usuario)";
  pg_query($db, $query);
}
