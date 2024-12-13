<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Capturar os dados enviados pelo formulário
    $empresa = htmlspecialchars($_POST['empresa'] ?? '');
    $contato = htmlspecialchars($_POST['contato'] ?? '');
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $telefone = htmlspecialchars($_POST['telefone'] ?? '');
    $objetivo = htmlspecialchars($_POST['objetivo'] ?? '');

    // Verificar se o campo de e-mail é válido
    if (!$email) {
        echo "E-mail inválido!";
        exit;
    }

    // Definir o destinatário e o assunto do e-mail
    $destinatario = "alan_fraga_@outlook.com"; // Substitua pelo seu endereço de e-mail
    $assunto = "Novo Formulário Enviado - Desenvolvimento de Website/App";

    // Corpo do e-mail
    $mensagem = "Empresa: $empresa\n";
    $mensagem .= "Nome do Contato: $contato\n";
    $mensagem .= "E-mail: $email\n";
    $mensagem .= "Telefone: $telefone\n";
    $mensagem .= "Objetivo do Projeto: $objetivo\n";

    // Headers do e-mail
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Enviar o e-mail
    if (mail($destinatario, $assunto, $mensagem, $headers)) {
        echo "E-mail enviado com sucesso!";
    } else {
        echo "Falha ao enviar o e-mail.";
    }
} else {
    echo "Método inválido.";
}
?>
