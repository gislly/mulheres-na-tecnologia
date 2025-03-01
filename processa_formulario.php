<?php
// Verifica se o formulário foi enviado via método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Define o endereço de email para onde você quer enviar as respostas
    $to = "eal3@aluno.ifal.edu.br";

    // Assunto do email
    $subject = "Respostas do Questionário";

    // Monta o corpo do email com base nos dados recebidos do formulário
    $message = "Respostas do Questionário:\n\n";

    // Itera sobre os dados recebidos do formulário
    foreach ($_POST as $key => $value) {
        // Verifica se o valor é um array (caso das respostas do quiz)
        if (is_array($value)) {
            // Formata as respostas do quiz
            $message .= "$key:\n";
            foreach ($value as $answer) {
                $message .= "- $answer\n";
            }
        } else {
            // Filtra e sanitiza os dados recebidos (importante para segurança)
            $key = htmlspecialchars(trim($key));
            $value = htmlspecialchars(trim($value));

            // Adiciona cada resposta ao corpo do email
            $message .= "$key: $value\n";
        }
    }

    // Cabeçalhos adicionais para o email
    $headers = "From: webmaster@example.com" . "\r\n" .
               "Reply-To: webmaster@example.com" . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    // Converte quebras de linha para o formato correto no cabeçalho
    $headers .= "\r\nContent-Type: text/plain; charset=UTF-8\r\n";

    // Envia o email
    if (mail($to, $subject, $message, $headers)) {
        echo "O email foi enviado com sucesso.";
    } else {
        echo "Erro ao enviar o email.";
    }
} else {
    // Se não for uma requisição POST, redireciona para a página inicial ou exibe uma mensagem de erro
    echo "Erro: O formulário deve ser enviado via método POST.";
}
?>

