<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir Pregunta</title>
    <link rel="stylesheet" href="../public/styles.css">
</head>
<body>
    <div1 class="imagenrh" >
        <img  src="https://academiaroberthooke.com/wp-content/uploads/2023/07/logo-robert-hooke.png" 
        height=75px>
        
    </div1>
    <div class="container">
        <h1>Subir Pregunta</h1>
        <form action="../public/upload.php" method="post" enctype="multipart/form-data" class="form">
            <label for="university">Universidad:</label>
            <select name="university" required>
                <?php
                require_once '../includes/db.php';
                $conn = connect();
                $result = $conn->query("SELECT * FROM universidades");
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='{$row['id']}'>{$row['nombre']}</option>";
                }
                ?>
            </select><br>

            <label for="course">Curso:</label>
            <select name="course" required>
                <?php
                $result = $conn->query("SELECT * FROM cursos");
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='{$row['id']}'>{$row['nombre']}</option>";
                }
                ?>
            </select><br>

            <label for="topic">Tema:</label>
            <select name="topic" required>
                <?php
                $result = $conn->query("SELECT * FROM temas");
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='{$row['id']}'>{$row['nombre']}</option>";
                }
                ?>
            </select><br>

            <label for="level">Nivel:</label>
            <input type="number" name="level" required><br>

            <label for="file">Archivo:</label>
            <input type="file" name="file" required><br>

            <input type="submit" value="Subir" class="btn-submit">
        </form>
    
    </div>

        <div class="data-forms">
            <h2>Añadir Nueva Universidad</h2>
            <form action="../public/add_data.php" method="post" class="form">
                <label for="university_name">Nombre de la Universidad:</label>
                <input type="text" name="university_name" required><br>
                <input type="submit" name="add_university" value="Añadir Universidad" class="btn-submit">
            </form>

            <h2>Añadir Nuevo Curso</h2>
            <form action="../public/add_data.php" method="post" class="form">
                <label for="course_name">Nombre del Curso:</label>
                <input type="text" name="course_name" required><br>
                <label for="university_id">Universidad:</label>
                <select name="university_id" required>
                    <?php
                    $result = $conn->query("SELECT * FROM universidades");
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value ='{$row['id']}'>{$row['nombre']}</option>";
                    }
                    ?>
                </select><br>
                <input type="submit" name="add_course" value="Añadir Curso" class="btn-submit">
            </form>

            <h2>Añadir Nuevo Tema</h2>
            <form action="../public/add_data.php" method="post" class="form">
                <label for="topic_name">Nombre del Tema:</label>
                <input type="text" name="topic_name" required><br>
                <label for="course_id">Curso:</label>
                <select name="course_id" required>
                    <?php
                    $result = $conn->query("SELECT * FROM cursos");
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='{$row['id']}'>{$row['nombre']}</option>";
                    }
                    ?>
                </select><br>
                <label for="level">Nivel:</label>
                <input type="number" name="level" required><br>
                <input type="submit" name="add_topic" value="Añadir Tema" class="btn-submit">
            </form>
        </div>
<div class="listpreg">
    <h2>Ver Preguntas</h2>
    <a href="../public/list_questions.php">Ver Lista de Preguntas</a>
</div>
<div class= "datos">
    <h2>Ver Datos</h2>
    <a href="../public/view_data.php">Ver Datos del Sistema</a>
</div>
</body>
</html>
