const express = require('express');
const nodemailer = require('nodemailer');
const app = express();

// Configuração do servidor de e-mail
const transporter = nodemailer.createTransport({
  host: 'smtp.outlook.com',
  port: 587,
  secure: false, // ou true para usar SSL
  auth: {
    user: 'alan_fraga_@outlook.com',
    pass: 'Bl4ckScorpyon94@'
  }
});

// Função para enviar e-mail
function enviarEmail(respostas) {
  const mailOptions = {
    from: 'alan_fraga_@outlook.com',
    to: 'alan_fraga_@outlook.com',
    subject: 'Respostas do questionário',
    text: `Olá! Aqui estão as respostas do questionário:\n\n${respostas}`
  };

  transporter.sendMail(mailOptions, (error, info) => {
    if (error) {
      console.log(error);
    } else {
      console.log('E-mail enviado com sucesso!');
    }
  });
}

// Rota para receber as respostas do questionário
app.post('/enviar-respostas', (req, res) => {
  const respostas = req.body;
  enviarEmail(respostas);
  res.send('Respostas enviadas com sucesso!');
});

// Inicia o servidor
const porta = 3000;
app.listen(porta, () => {
  console.log(`Servidor iniciado na porta ${porta}`);
});