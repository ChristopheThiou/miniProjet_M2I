<?php

namespace App\Entity;

class Comment
{

    public function __construct(
        private string $comment,
        private int $id_article,
        private ?int $id = null
    ) {
    }

    /**
     * @return 
     */
    public function getComment(): string
    {
        return $this->comment;
    }

    /**
     * @param  $comment 
     * @return self
     */
    public function setComment(string $comment): self
    {
        $this->comment = $comment;
        return $this;
    }

    /**
     * @return 
     */
    public function getId_article(): int
    {
        return $this->id_article;
    }

    /**
     * @param  $id_article 
     * @return self
     */
    public function setId_article(int $id_article): self
    {
        $this->id_article = $id_article;
        return $this;
    }

    /**
     * @return 
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param  $id 
     * @return self
     */
    public function setId(?int $id): self
    {
        $this->id = $id;
        return $this;
    }
}