<?php
// Configura tu webhook de Discord
define('DISCORD_WEBHOOK_URL', 'TU_WEBHOOK_DE_DISCORD_AQUI');

// Manejo de mensajes
if (isset($_POST['message'])) {
    $message = $_POST['message'];

    // Enviar mensaje a Discord
    sendMessageToDiscord($message);

    // Guardar mensaje en almacenamiento local del navegador
    echo "<script>
        const messages = JSON.parse(localStorage.getItem('messages')) || [];
        messages.push('$message');
        localStorage.setItem('messages', JSON.stringify(messages));
        alert('Mensaje enviado a Discord: $message');
        window.location.href = 'index.php';  // Redirecciona de vuelta a la página principal
    </script>";
}

// Función para enviar mensaje a Discord
function sendMessageToDiscord($message) {
    $data = json_encode(["content" => $message]);

    $options = [
        'http' => [
            'header'  => "Content-Type: application/json\r\n",
            'method'  => 'POST',
            'content' => $data,
        ],
    ];

    $context  = stream_context_create($options);
    file_get_contents(DISCORD_WEBHOOK_URL, false, $context);
}
?>
