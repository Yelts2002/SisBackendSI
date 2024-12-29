<?php
require_once '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conn = connect();

    // Añadir Universidad
    if (isset($_POST['add_university'])) {
        $university_name = $_POST['university_name'];
        $sql = "INSERT INTO universidades (nombre) VALUES ('$university_name')";
        $conn->query($sql);
    }

    // Añadir Curso
    if (isset($_POST['add_course'])) {
        $course_name = $_POST['course_name'];
        $university_id = $_POST['university_id'];
        $sql = "INSERT INTO cursos (nombre, universidad_id) VALUES ('$course_name', '$university_id')";
        $conn->query($sql);
    }

    // Añadir Tema
    if (isset($_POST['add_topic'])) {
        $topic_name = $_POST['topic_name'];
        $course_id = $_POST['course_id'];
        $level = $_POST['level'];
        $sql = "INSERT INTO temas (nombre, nivel, curso_id) VALUES ('$topic_name', '$level', '$course_id')";
        $conn->query($sql);
    }

    $conn->close();
    header("Location: ../templates/form.php");
    exit();
}
?>