<?php
// Configura tu webhook de Discord
define('DISCORD_WEBHOOK_URL', 'https://discord.com/api/webhooks/1291453301618905170/pqbkoC2_0fSUOlK81ePXJg2mufIuE2x86K4tPaViRNxKjrnFMwDN9dvQtRNupDYdB9nD');

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

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enviar Mensaje a Discord</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            transition: background-color 0.5s, color 0.5s;
        }
        .dark-mode {
            background-color: #333;
            color: #f4f4f4;
        }
        form {
            margin: 20px 0;
        }
        input[type="submit"], textarea {
            padding: 10px;
            margin: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #5cb85c;
            color: white;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #4cae4c;
        }
        #toggle-theme {
            margin: 20px;
        }
    </style>
</head>
<body>
    <button id="toggle-theme">Cambiar a modo oscuro</button>
    <h2>Enviar Mensaje</h2>
    <form action="" method="POST">
        <textarea name="message" rows="4" cols="50" placeholder="Escribe tu mensaje aquí..." required></textarea>
        <br>
        <input type="submit" value="Enviar Mensaje">
    </form>
    <script>
        const toggleThemeButton = document.getElementById('toggle-theme');
        toggleThemeButton.onclick = function () {
            document.body.classList.toggle('dark-mode');
            toggleThemeButton.innerText = document.body.classList.contains('dark-mode') ? 'Cambiar a modo claro' : 'Cambiar a modo oscuro';
        }
    </script>
</body>
</html>
