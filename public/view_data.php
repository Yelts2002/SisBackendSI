<?php
require_once '../includes/db.php';

$conn = connect();

// Consultas para obtener los datos
$universidades = $conn->query("SELECT * FROM universidades");
$cursos = $conn->query("SELECT c.id, c.nombre, u.nombre AS universidad FROM cursos c JOIN universidades u ON c.universidad_id = u.id");
$temas = $conn->query("SELECT t.id, t.nombre, t.nivel, c.nombre AS curso FROM temas t JOIN cursos c ON t.curso_id = c.id");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ver Datos</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Datos del Sistema</h1>

    <h2>Universidades</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($universidades->num_rows > 0) {
                while ($row = $universidades->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['nombre']}</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='2'>No hay universidades disponibles.</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <h2>Cursos</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Universidad</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($cursos->num_rows > 0) {
                while ($row = $cursos->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['nombre']}</td>
                            <td>{$row['universidad']}</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='3'>No hay cursos disponibles.</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <h2>Temas</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Nivel</th>
                <th>Curso</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($temas->num_rows > 0) {
                while ($row = $temas->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['nombre']}</td>
                            <td>{$row['nivel']}</td>
                            <td>{$row['curso']}</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No hay temas disponibles.</td></tr>";
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