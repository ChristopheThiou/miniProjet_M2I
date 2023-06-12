<?php

namespace App\Entity;

class Categorie
{

    public function __construct(
        private string $categorie,
        private ?int $id = null
    ) {
    }

    /**
     * @return 
     */
    public function getCategorie(): string
    {
        return $this->categorie;
    }

    /**
     * @param  $categorie 
     * @return self
     */
    public function setCategorie(string $categorie): self
    {
        $this->categorie = $categorie;
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