<?php
// Configura tu webhook de Discord
define('DISCORD_WEBHOOK_URL', 'https://discord.com/api/webhooks/1291453301618905170/pqbkoC2_0fSUOlK81ePXJg2mufIuE2x86K4tPaViRNxKjrnFMwDN9dvQtRNupDYdB9nD');

// Manejo de mensajes
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['message'])) {
    $message = htmlspecialchars($_POST['message']); // Escapar caracteres especiales para mayor seguridad

    // Enviar mensaje a Discord
    if (sendMessageToDiscord($message)) {
        echo "<script>
            alert('Mensaje enviado a Discord correctamente.');
            window.location.href = 'index.php';  // Redirecciona de vuelta a la página principal
        </script>";
    } else {
        echo "<script>
            alert('Hubo un problema al enviar el mensaje a Discord.');
            window.location.href = 'index.php';  // Redirecciona de vuelta a la página principal
        </script>";
    }
}

// Función para enviar mensaje a Discord
function sendMessageToDiscord($message) {
    $data = json_encode(["content" => $message]);

    $ch = curl_init(DISCORD_WEBHOOK_URL);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    // Verificar si el mensaje se envió correctamente (Discord responde con un 204 No Content)
    return $httpCode === 204;
}
?>
