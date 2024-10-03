<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['message'])) {
    $message = htmlspecialchars($_POST['message']);

    // Configuración de la solicitud POST para enviar el mensaje al bot en Node.js
    $url = 'http://localhost:3000/send-message';  // URL del servidor Node.js
    $data = json_encode(["message" => $message]);

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json'
    ]);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);
    curl_close($ch);

    if ($response === 'Mensaje enviado a Discord.') {
        echo "<script>
            alert('Mensaje enviado a Discord correctamente.');
            window.location.href = 'index.php';
        </script>";
    } else {
        echo "<script>
            alert('Hubo un problema al enviar el mensaje a Discord.');
            window.location.href = 'index.php';
        </script>";
    }
}
?>
