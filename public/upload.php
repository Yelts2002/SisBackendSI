<?php
require_once '../includes/db.php';
require_once '../includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['file'])) {
    $conn = connect();
    $university_id = $_POST['university'];
    $course_id = $_POST['course'];
    $topic_id = $_POST['topic'];
    $level = $_POST['level'];
    
    // Generar un nombre único para el archivo
    $index = $conn->query("SELECT COUNT(*) as count FROM preguntas WHERE tema_id = $topic_id")->fetch_assoc()['count'] + 1;
    $file_name = generateUniqueName($conn->query("SELECT nombre FROM cursos WHERE id = $course_id")->fetch_assoc()['nombre'], 
                                     $conn->query("SELECT nombre FROM temas WHERE id = $topic_id")->fetch_assoc()['nombre'], 
                                     $level, 
                                     $conn->query("SELECT nombre FROM universidades WHERE id = $university_id")->fetch_assoc()['nombre'], 
                                     $index);
    
    $upload_dir = '../uploads/';
    $file_path = $upload_dir . $file_name . '.' . pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

    // Subir el archivo
    if (uploadFile($_FILES['file'], $file_path)) {
        // Guardar la información del archivo en la base de datos
        $sql = "INSERT INTO preguntas (contenido, examen_id, tema_id, universidad_id) VALUES ('$file_name', NULL, '$topic_id', '$university_id')";
        $conn->query($sql);
    } else {
        echo "Error al subir el archivo.";
    }

    $conn->close();
    header("Location: ../templates/form.php");
    exit();
}
?>