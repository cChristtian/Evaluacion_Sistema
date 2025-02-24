<?php
// Verificamos si la sesión no está activa. Si no lo está, la iniciamos.
// Esto es necesario para poder usar variables de sesión ($_SESSION).
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Verificamos si se han enviado calificaciones a través del formulario.
// $_POST['calificaciones'] contiene las calificaciones enviadas.
if (isset($_POST['calificaciones'])) {
    // Recorremos las calificaciones enviadas.
    // $index es el índice del estudiante, y $calificaciones es un array con las calificaciones de ese estudiante.
    foreach ($_POST['calificaciones'] as $index => $calificaciones) {
        // Recorremos las calificaciones de cada materia para el estudiante actual.
        // $materia es el nombre de la materia, y $calificacion es la nota ingresada.
        foreach ($calificaciones as $materia => $calificacion) {
            // Guardamos la calificación en la sesión, asociada al estudiante y la materia correspondiente.
            $_SESSION['estudiantes'][$index]['calificaciones'][$materia] = $calificacion;
        }
    }
}

// Redirigimos al usuario a la página de resumen (resumen.php) después de guardar las calificaciones.
header("Location: resumen.php");

// Finalizamos la ejecución del script para asegurarnos de que no se ejecute nada más.
exit();
?>