<?php
// Verificamos si la sesión no está activa. Si no lo está, la iniciamos.
// Esto es necesario para poder usar variables de sesión ($_SESSION).
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Definimos una función llamada calcular_promedio que recibe un array de calificaciones.
// La función calcula el promedio sumando todas las calificaciones y dividiendo por la cantidad de materias.
function calcular_promedio($calificaciones) {
    return array_sum($calificaciones) / count($calificaciones);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resumen de Estudiantes</title>
    <link rel="stylesheet" href="styles.css"> <!-- Enlazamos un archivo CSS para estilos -->
</head>
<body>
    <header>
       Estudiantes <!-- Título de la página -->
    </header>
    <div class="container">
        <?php
        // Verificamos si existe la variable de sesión 'estudiantes'.
        // Si existe, mostramos el resumen de cada estudiante.
        if (isset($_SESSION['estudiantes'])) {
            // Recorremos cada estudiante en la sesión.
            foreach ($_SESSION['estudiantes'] as $estudiante) {
                // Calculamos el promedio del estudiante usando la función calcular_promedio.
                $promedio = calcular_promedio($estudiante['calificaciones']);

                // Determinamos si el estudiante está aprobado o reprobado.
                // Si el promedio es mayor o igual a 7, está aprobado; de lo contrario, reprobado.
                $estado = $promedio >= 7 ? "Aprobado" : "Reprobado";

                // Mostramos el nombre, carné, promedio y estado del estudiante.
                echo "<h3>{$estudiante['nombre']} ({$estudiante['carne']})</h3>";
                echo "Promedio: $promedio - Estado: $estado<br>";
            }
        }
        ?>
    </div>
    <footer>
        Christian Daniel Alfaro Renderos - Ar242630 <!-- Pie de página con el nombre y carné -->
    </footer>
</body>
</html>