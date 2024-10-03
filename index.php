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
    <form action="form_handler.php" method="POST">
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
