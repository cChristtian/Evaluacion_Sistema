<?php
// Verificamos si la sesión no está activa. Si no lo está, la iniciamos.
// Esto es necesario para poder usar variables de sesión ($_SESSION).
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Estudiantes</title>
    <link rel="stylesheet" href="styles.css"> <!-- Enlazamos un archivo CSS para estilos -->
</head>
<body>
    <header>
        Sistema de Registro y Evaluación de Estudiantes <!-- Título de la página -->
    </header>
    <div class="container">
        <!-- Formulario para registrar estudiantes -->
        <form action="registro.php" method="post">
            Nombre: <input type="text" name="nombre" required><br> <!-- Campo para el nombre -->
            Carné: <input type="text" name="carne" required><br> <!-- Campo para el carné -->
            Carrera: <input type="text" name="carrera" required><br> <!-- Campo para la carrera -->
            Materias Inscritas: <input type="text" name="materias" required><br> <!-- Campo para las materias -->
            <input type="submit" value="Registrar"> <!-- Botón para enviar el formulario -->
        </form>

        <h2>Estudiantes Registrados</h2>
        <ul>
            <?php
            // Verificamos si existe la variable de sesión 'estudiantes'.
            // Si existe, mostramos la lista de estudiantes registrados.
            if (isset($_SESSION['estudiantes'])) {
                // Recorremos cada estudiante en la sesión.
                foreach ($_SESSION['estudiantes'] as $index => $estudiante) {
                    // Mostramos el nombre, carné y carrera del estudiante.
                    echo "<li>{$estudiante['nombre']} - {$estudiante['carne']} - {$estudiante['carrera']} 
                          <!-- Formulario para borrar un estudiante -->
                          <form action='borrar.php' method='post' style='display:inline;'>
                              <input type='hidden' name='index' value='$index'> <!-- Enviamos el índice del estudiante a borrar -->
                              <input type='submit' value='Borrar'> <!-- Botón para borrar el estudiante -->
                          </form>
                          </li>";
                }
            }
            ?>
        </ul>
        <!-- Enlace para ir a la página de ingresar calificaciones -->
        <a href="calificaciones.php">Ingresar Calificaciones</a>
    </div>
    <footer>
        Christian Daniel Alfaro Renderos - Ar242630 <!-- Pie de página con el nombre y carné -->
    </footer>
</body>
</html>