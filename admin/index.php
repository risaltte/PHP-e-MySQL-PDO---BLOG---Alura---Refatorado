<?php

include __DIR__ . '/../vendor/autoload.php';

use Risaltte\Blog\InfraStructure\Persistence\ConnectionCreator;
use Risaltte\Blog\InfraStructure\Repository\PdoArticleRepository;

$connection = ConnectionCreator::createConnection();
$articleRepository = new PdoArticleRepository($connection);

$articles = $articleRepository->allArticles();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Página administrativa</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../style.css">
</head>

<body>
    <div id="container">
        <h1>Página Administrativa</h1>
        <div>
            <?php foreach ($articles as $article): ?>
                <div id="artigo-admin">
                    <p><?= $article['titulo']; ?></p>
                    <nav>
                        <a class="botao" href="editar-artigo.php?id=<?= $article['id']; ?>">Editar</a>
                        <a class="botao" href="excluir-artigo.php?id=<?= $article['id']; ?>">Excluir</a>
                    </nav>
                </div>
            <?php endforeach ?>
        </div>
        <a class="botao botao-block" href="adicionar-artigo.php">Adicionar Artigo</a>
    </div>
</body>

</html>