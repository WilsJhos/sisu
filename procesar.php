<?php
include 'conexion.php';

$mensaje = "";
$tipoMensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $carretera = htmlspecialchars($_POST['highway']);
    $km = floatval($_POST['km']);
    $ubicacion = htmlspecialchars($_POST['location']);
    $nivel_riesgo = htmlspecialchars($_POST['risk-level']);
    $descripcion = htmlspecialchars($_POST['description']);
    
    if (!empty($carretera) && !empty($km) && !empty($ubicacion) && !empty($nivel_riesgo)) {
        $sql = "INSERT INTO curvas_peligrosas (carretera, kilometro, ubicacion, nivel_riesgo, descripcion)
                VALUES ('$carretera', $km, '$ubicacion', '$nivel_riesgo', '$descripcion')";
        
        if ($conn->query($sql) === TRUE) {
            $mensaje = "Reporte enviado correctamente";
            $tipoMensaje = "success";
        } else {
            $mensaje = "Error al enviar el reporte: " . $conn->error;
            $tipoMensaje = "danger";
        }
    } else {
        $mensaje = "Por favor, complete todos los campos obligatorios";
        $tipoMensaje = "warning";
    }
    
    // Redirigir al index con un mensaje
    header("Location: index.php?mensaje=" . urlencode($mensaje) . "&tipo=" . urlencode($tipoMensaje));
    exit();
}

// Cerrar conexión
$conn->close();
?>