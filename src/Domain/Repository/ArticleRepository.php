<?php

namespace Risaltte\Blog\Domain\Repository;

interface ArticleRepository
{
    public function allArticles(): array;
    public function findById(int $id): array;
    public function addArticle(string $title, string $content): bool;
    public function removeArticle(int $id): bool;
    public function editArticle(int $id, string $titulo, string $conteudo): bool;
}
