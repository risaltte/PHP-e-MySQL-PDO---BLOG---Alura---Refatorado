<?php

include 'vendor/autoload.php';

use Risaltte\Blog\InfraStructure\Persistence\ConnectionCreator;
use Risaltte\Blog\InfraStructure\Repository\PdoArticleRepository;

try {
    $connection = ConnectionCreator::createConnection();
    $articleRepository = new PdoArticleRepository($connection);
    
    $articles = $articleRepository->allArticles();
    
} catch (\Exception $e) {
    $errorMessage = $e->getMessage();
    redirect("/blog2/error-page.php?errorMessage=$errorMessage");
}

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
        <h1>Meu Blog</h1>
            <?php foreach ($articles as $article): ?>
            <h2>
                <a href="article.php?id=<?= $article['id']; ?>">
                    <?= $article['titulo']; ?>
                </a>
            </h2>
            <p>
                <?= nl2br($article['conteudo']); ?>
            </p>
        <?php endforeach ?>
    </div>
</body>

</html>
