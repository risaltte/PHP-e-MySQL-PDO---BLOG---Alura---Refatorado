<?php

require 'vendor/autoload.php';

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Meu Blog</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div id="container">
        <h1>
            Erro no Sistema!!!
        </h1>
        <h3 style="color: darkred;">
            <?= $_GET['errorMessage']; ?>
        </h3>
        <p>
            Por favor entre em contato e informe a mensagem de erro acima.
        </p>
        <p>
            Telefone: (00) 0000-0000
        </p>
        <p>
            E-mail: suporte@dominio.com
        </p>
        <div>
            <a class="botao botao-block" href="index.php">Voltar</a>
        </div>
    </div>
</body>

</html>
