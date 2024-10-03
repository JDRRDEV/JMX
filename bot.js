const { Client, GatewayIntentBits } = require('discord.js');
const express = require('express');

// Inicializar el bot de Discord
const client = new Client({ intents: [GatewayIntentBits.Guilds, GatewayIntentBits.GuildMessages] });

// Token de tu bot de Discord
const BOT_TOKEN = 'MTE5NjkwNDQyNTUyMDg5ODA2OQ.GF1kAF.5gZ1AiHesdlmjQe-fA5EQZA0N80nIBL0J5B560';

// ID del canal de Discord donde se enviarán los mensajes
const CHANNEL_ID = '1291453058764767282';

// Iniciar el bot de Discord
client.once('ready', () => {
    console.log(`Bot conectado como ${client.user.tag}`);
});

// Función para enviar mensajes a un canal de Discord
function sendMessageToDiscord(message) {
    const channel = client.channels.cache.get(CHANNEL_ID);
    if (channel) {
        channel.send(message);
    } else {
        console.error('No se pudo encontrar el canal.');
    }
}

// Iniciar sesión con el bot
client.login(MTE5NjkwNDQyNTUyMDg5ODA2OQ.GF1kAF.5gZ1AiHesdlmjQe-fA5EQZA0N80nIBL0J5B560);

// Crear una app express para comunicarse con el frontend
const app = express();
app.use(express.json());

// Endpoint para recibir mensajes desde la página web
app.post('/send-message', (req, res) => {
    const message = req.body.message;
    if (message) {
        sendMessageToDiscord(message);
        res.status(200).send('Mensaje enviado a Discord.');
    } else {
        res.status(400).send('No se recibió ningún mensaje.');
    }
});

// Escuchar en el puerto 3000
app.listen(3000, () => {
    console.log('Servidor escuchando en el puerto 3000');

const BOT_TOKEN = 'MTE5NjkwNDQyNTUyMDg5ODA2OQ.GF1kAF.5gZ1AiHesdlmjQe-fA5EQZA0N80nIBL0J5B560';

});
