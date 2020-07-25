<?php

namespace Risaltte\Blog\InfraStructure\Repository;

use PDO;
use Risaltte\Blog\Domain\Repository\ArticleRepository;

class PdoArticleRepository implements ArticleRepository
{
    private PDO $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function allArticles(): array
    {
        $sqlQuery = "SELECT id, titulo, conteudo FROM artigos;";
        
        $stmt = $this->connection->query($sqlQuery);
        $articles = $stmt->fetchAll();

        return $articles;

    }

    public function findById(int $id): array
    {
        $sqlQuery = "SELECT id, titulo, conteudo FROM artigos WHERE id = ?;";
        $stmt = $this->connection->prepare($sqlQuery);
        $stmt->bindValue(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        $article = $stmt->fetch();

        return $article;
    }

    public function addArticle(string $title, string $content): bool
    {
        $sqlInsert = "INSERT INTO artigos (titulo, conteudo) VALUES (:title, :content);";

        $stmt = $this->connection->prepare($sqlInsert);
        $stmt->bindValue(':title', $title);
        $stmt->bindValue(':content', $content);
        
        return $stmt->execute();
    }

    public function editArticle(int $id, string $title, string $content): bool
    {
        $sqlUpdate = "UPDATE artigos SET titulo = :title, conteudo = :content WHERE id = :id;";

        $stmt = $this->connection->prepare($sqlUpdate);
        $stmt->bindValue(':title', $title);
        $stmt->bindValue(':content', $content);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        return $stmt->execute();
    }

    public function removeArticle(int $id): bool
    {
        $sqlDelete = "DELETE FROM artigos WHERE id = ?;";

        $stmt = $this->connection->prepare($sqlDelete);
        $stmt->bindValue(1, $id, PDO::PARAM_INT);

        return $stmt->execute();
    }
}