<?php
require_once '../includes/db.php';

$conn = connect();

// Consulta para obtener las preguntas junto con sus atributos
$sql = "SELECT p.id, p.contenido, u.nombre AS universidad, c.nombre AS curso, t.nombre AS tema 
        FROM preguntas p
        JOIN universidades u ON p.universidad_id = u.id
        JOIN temas t ON p.tema_id = t.id
        JOIN cursos c ON t.curso_id = c.id";

$result = $conn->query($sql);
if (!$result) {
    die("Error en la consulta: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Preguntas</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Lista de Preguntas</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Contenido</th>
                <th>Universidad</th>
                <th>Curso</th>
                <th>Tema</th>
                <th>Nivel</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['contenido']}</td>
                            <td>{$row['universidad']}</td>
                            <td>{$row['curso']}</td>
                            <td>{$row['tema']}</td>
                            
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No hay preguntas disponibles.</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <a href="index.php">Volver al formulario</a>
</body>
</html>

<?php
$conn->close();
?>