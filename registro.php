<?php
// Verificamos si la sesión no está activa. Si no lo está, la iniciamos.
// Esto es necesario para poder usar variables de sesión ($_SESSION).
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Verificamos si la variable de sesión 'estudiantes' no existe.
// Si no existe, la inicializamos como un array vacío.
if (!isset($_SESSION['estudiantes'])) {
    $_SESSION['estudiantes'] = [];
}

// Creamos un array llamado $estudiante con los datos enviados por el formulario.
// Los datos se obtienen de $_POST, que contiene la información enviada por el usuario.
$estudiante = [
    'nombre' => $_POST['nombre'], // Guardamos el nombre del estudiante.
    'carne' => $_POST['carne'],   // Guardamos el carné del estudiante.
    'carrera' => $_POST['carrera'], // Guardamos la carrera del estudiante.
    'materias' => explode(",", $_POST['materias']) // Convertimos las materias (en formato de texto separado por comas) en un array.
];

// Añadimos el array $estudiante al array de estudiantes en la sesión.
$_SESSION['estudiantes'][] = $estudiante;

// Redirigimos al usuario de vuelta a la página principal (index.php).
header("Location: index.php");

// Finalizamos la ejecución del script para asegurarnos de que no se ejecute nada más.
exit();
?>