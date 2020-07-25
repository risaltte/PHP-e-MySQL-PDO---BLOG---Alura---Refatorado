<?php

use Risaltte\Blog\InfraStructure\Persistence\ConnectionCreator;
use Risaltte\Blog\InfraStructure\Repository\PdoArticleRepository;

require __DIR__ . '/../vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $connection = ConnectionCreator::createConnection();
    $articleRepository = new PdoArticleRepository($connection);

    $articleRepository->removeArticle($_POST['id']);

    // POST REDIRECT GET
    redirect('/blog2/admin/index.php'); 
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <meta charset="UTF-8">
    <title>Excluir Artigo</title>
</head>

<body>
    <div id="container">
        <h1>Você realmente deseja excluir o artigo?</h1>
        <form method="post" action="excluir-artigo.php">
            <p>
                <input type="hidden" name="id" value="<?= $_GET['id']; ?>" />
                <button class="botao">Excluir</button>
            </p>
        </form>
    </div>
</body>

</html>