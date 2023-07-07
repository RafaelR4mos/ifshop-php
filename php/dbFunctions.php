<?php
function getUserCourseQuantity($id_usuario, $db)
{
  $query = "SELECT count(*)total FROM Tb_Aluno_Curso where id_usuario = $id_usuario";
  $result = pg_connect($db, $query) or die("Could not connect");
  return $result;
}

function getUserCourse($id_usuario, $db)
{
  $query = "SELECT * FROM tb_aluno_curso a, tb_curso where a.id_curso = b.id_curso";
  $result = pg_connect($db, $query) or die("Could not connect");
  return $result;
}
