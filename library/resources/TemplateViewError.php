<?php
// Verifica se o título e a mensagem de erro foram passados
$title = isset($title) ? htmlspecialchars($title, ENT_QUOTES, 'UTF-8') : 'Erro';
$message = isset($message) ? htmlspecialchars($message, ENT_QUOTES, 'UTF-8') : 'Ocorreu um erro inesperado.';

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h1 {
            font-size: 2em;
            margin: 0;
            color: #e74c3c;
        }
        p {
            font-size: 1.2em;
            margin: 20px 0;
        }
        a {
            color: #3498db;
            text-decoration: none;
            font-weight: bold;
        }
        a:hover {
            text-decoration: underline;
        }
        .button {
            background-color: #3498db;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 10px 20px;
            font-size: 1em;
            cursor: pointer;
            text-decoration: none;
        }
        .button:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1><?php echo $title; ?></h1>
        <p><?php echo $message; ?></p>
        <button class="button" onclick="window.location.reload();">Recarregar a página</button>
    </div>
</body>
</html>
