<?php

use Risaltte\Blog\InfraStructure\Persistence\ConnectionCreator;
use Risaltte\Blog\InfraStructure\Repository\PdoArticleRepository;

include __DIR__ . '/../vendor/autoload.php';

try {
    $connection = ConnectionCreator::createConnection();
    $articleRepository = new PdoArticleRepository($connection);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $articleRepository->editArticle($_POST['id'], $_POST['titulo'], $_POST['conteudo']);

        // POST REDIRECT GET
        redirect('/blog2/admin/index.php');
    }

    $article = $articleRepository->findById($_GET['id']);
    
} catch (\Exception $e) {
    $errorMessage = $e->getMessage();
    redirect("/blog2/error-page.php?errorMessage=$errorMessage");
}



?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <meta charset="UTF-8">
    <title>Editar Artigo</title>
</head>

<body>
    <div id="container">
        <h1>Editar Artigo</h1>
        <form action="editar-artigo.php" method="post">
            <p>
                <label for="titulo">Digite o novo título do artigo</label>
                <input class="campo-form" type="text" name="titulo" id="titulo" value="<?= $article['titulo']; ?>" />
            </p>
            <p>
                <label for="conteudo">Digite o novo conteúdo do artigo</label>
                <textarea class="campo-form" type="text" name="conteudo" id="titulo"><?= $article['conteudo']; ?></textarea>
            </p>
            <p>
                <input type="hidden" name="id" value="<?= $article['id']; ?>" />
            </p>
            <p>
                <button class="botao">Salvar</button>
            </p>
        </form>
    </div>
</body>

</html>
