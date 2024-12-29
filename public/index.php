<?php
session_start(); // Iniciar sesión para manejar mensajes

// Mostrar mensajes de éxito o error
if (isset($_SESSION['message'])) {
    echo "<div class='message'>{$_SESSION['message']}</div>";
    unset($_SESSION['message']); // Limpiar el mensaje después de mostrarlo
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Sistema de Gestión de Preguntas</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Sistema de Gestión de Preguntas de Examen</h1>
    <p>Bienvenido al sistema de gestión de preguntas de examen. Aquí puedes subir preguntas de diferentes universidades, materias y niveles académicos.</p>
    
    <h2>Subir Nueva Pregunta</h2>
    <?php include '../templates/form.php'; ?>
</body>
</html>


