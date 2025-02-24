<?php
// Verificamos si la sesión no está activa. Si no lo está, la iniciamos.
// Esto es necesario para poder usar variables de sesión ($_SESSION).
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Verificamos si se ha enviado el índice de un estudiante a través del formulario.
// $_POST['index'] contiene el índice del estudiante que se desea borrar.
if (isset($_POST['index'])) {
    // Guardamos el índice del estudiante en la variable $index.
    $index = $_POST['index'];

    // Verificamos si existe un estudiante en la sesión con el índice proporcionado.
    if (isset($_SESSION['estudiantes'][$index])) {
        // Eliminamos al estudiante del array de estudiantes usando unset().
        unset($_SESSION['estudiantes'][$index]);

        // Reindexamos el array de estudiantes para evitar problemas con índices no consecutivos.
        // array_values() reordena los índices del array para que sean consecutivos.
        $_SESSION['estudiantes'] = array_values($_SESSION['estudiantes']);
    }
}

// Redirigimos al usuario de vuelta a la página principal (index.php).
header("Location: index.php");

// Finalizamos la ejecución del script para asegurarnos de que no se ejecute nada más.
exit();
?>