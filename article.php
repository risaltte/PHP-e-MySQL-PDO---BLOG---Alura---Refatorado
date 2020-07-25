<?php

use Risaltte\Blog\InfraStructure\Persistence\ConnectionCreator;
use Risaltte\Blog\InfraStructure\Repository\PdoArticleRepository;

require 'vendor/autoload.php';

$connection = ConnectionCreator::createConnection();
$articleRepository = new PdoArticleRepository($connection);

$article = $articleRepository->findById($_GET['id']);

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
            <?= $article['titulo']; ?>
        </h1>
        <p>
            <?= nl2br($article['conteudo']); ?>
        </p>
        <div>
            <a class="botao botao-block" href="index.php">Voltar</a>
        </div>
    </div>
</body>

</html>