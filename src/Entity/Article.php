<?php

namespace App\Entity;

class Article
{

	public function __construct(
		private string $title,
		private string $author,
		private string $content,
		private string $img,
		private int $id_categorie,
		private ?int $id = null
	) {
	}

	/**
	 * @return 
	 */
	public function getTitle(): string
	{
		return $this->title;
	}

	/**
	 * @param  $title 
	 * @return self
	 */
	public function setTitle(string $title): self
	{
		$this->title = $title;
		return $this;
	}

	/**
	 * @return 
	 */
	public function getAuthor(): string
	{
		return $this->author;
	}

	/**
	 * @param  $author 
	 * @return self
	 */
	public function setAuthor(string $author): self
	{
		$this->author = $author;
		return $this;
	}

	/**
	 * @return 
	 */
	public function getContent(): string
	{
		return $this->content;
	}

	/**
	 * @param  $content 
	 * @return self
	 */
	public function setContent(string $content): self
	{
		$this->content = $content;
		return $this;
	}

	/**
	 * @return 
	 */
	public function getImg(): string
	{
		return $this->img;
	}

	/**
	 * @param  $img 
	 * @return self
	 */
	public function setImg(string $img): self
	{
		$this->img = $img;
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

	/**
	 * @return 
	 */
	public function getId_categorie(): ?int
	{
		return $this->id_categorie;
	}

	/**
	 * @param  $id_categorie 
	 * @return self
	 */
	public function setId_categorie(?int $id_categorie): self
	{
		$this->id_categorie = $id_categorie;
		return $this;
	}
}