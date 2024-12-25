<?php
// Habilitar la visualización de errores
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Configuración de la base de datos
$servername = "localhost";
$username = "root";  // Usuario por defecto en XAMPP
$password = "";      // Contraseña por defecto en XAMPP
$dbname = "kakiweb_db"; // Nombre de la base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Depuración: Verificar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "Formulario enviado"; // Verificar si el formulario llega aquí

    // Obtener los datos del formulario
    $nombre_completo = $_POST['name'];
    $email = $_POST['email'];
    $contrasena = password_hash($_POST['password'], PASSWORD_DEFAULT); // Encriptar la contraseña
    $nombre_estudio = $_POST['studio-name'];
    $telefono = $_POST['phone'];

    // Depuración: Mostrar los valores antes de la inserción
    echo "Nombre: " . $nombre_completo . "<br>";
    echo "Email: " . $email . "<br>";
    echo "Contraseña: " . $_POST['password'] . "<br>";
    echo "Estudio: " . $nombre_estudio . "<br>";
    echo "Teléfono: " . $telefono . "<br>";

    // Insertar los datos en la base de datos
    $sql = "INSERT INTO usuarios (nombre_completo, email, contrasena, nombre_estudio, telefono)
            VALUES ('$nombre_completo', '$email', '$contrasena', '$nombre_estudio', '$telefono')";

    if ($conn->query($sql) === TRUE) {
        // Depuración: Mostrar mensaje antes de redirigir
        echo "Registro exitoso";
        // Redirigir a la página de login después de un registro exitoso
        header("Location: login.html");
        exit(); // Asegurarse de que no se ejecute ningún código posterior
    } else {
        // Mostrar mensaje de error si la inserción falla
        echo "Error en la inserción: " . $conn->error;
    }
}

// Cerrar la conexión
$conn->close();
?>
