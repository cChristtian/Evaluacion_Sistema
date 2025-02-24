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
    <title>Ingresar Calificaciones</title>
    <link rel="stylesheet" href="styles.css"> <!-- Enlazamos un archivo CSS para estilos -->
</head>
<body>
    <header>
        Ingresar Calificaciones <!-- Título de la página -->
    </header>
    <div class="container">
        <!-- Formulario para ingresar calificaciones -->
        <form action="procesar_calificaciones.php" method="post">
            <?php
            // Verificamos si existe la variable de sesión 'estudiantes'.
            // Si existe, mostramos los estudiantes y sus materias para ingresar calificaciones.
            if (isset($_SESSION['estudiantes'])) {
                // Recorremos cada estudiante en la sesión.
                foreach ($_SESSION['estudiantes'] as $index => $estudiante) {
                    // Mostramos el nombre y carné del estudiante.
                    echo "<h3>{$estudiante['nombre']} ({$estudiante['carne']})</h3>";

                    // Recorremos las materias inscritas por el estudiante.
                    foreach ($estudiante['materias'] as $materia) {
                        // Creamos un campo de entrada para la calificación de cada materia.
                        // El nombre del campo es un array asociativo: calificaciones[índice][materia].
                        echo "$materia: <input type='number' name='calificaciones[$index][$materia]' min='0' max='100' required><br>";
                    }
                }
            }
            ?>
            <!-- Botón para enviar el formulario y guardar las calificaciones -->
            <input type="submit" value="Guardar Calificaciones">
        </form>
    </div>
    <footer>
        Christian Daniel Alfaro Renderos - Ar242630 <!-- Pie de página con el nombre y carné -->
    </footer>
</body>
</html>