<?php

namespace App\Entity;

use App\Repository\RecipeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RecipeRepository::class)
 */
class Recipe
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $content;

    /**
     * @ORM\Column(type="integer")
     */
    private $preparation_Time;

    /**
     * @ORM\Column(type="integer")
     */
    private $preparation_Cook;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ingredients;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $steps;

    /**
     * @ORM\Column(type="string",nullable = true, length=255)
     */
    private $allergens;

    /**
     * @ORM\Column(type="string",nullable = true, length=255)
     */
    private $regimes;

    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getPreparationTime(): ?int
    {
        return $this->preparation_Time;
    }

    public function setPreparationTime(int $preparation_Time): self
    {
        $this->preparation_Time = $preparation_Time;

        return $this;
    }

    public function getPreparationCook(): ?int
    {
        return $this->preparation_Cook;
    }

    public function setPreparationCook(int $preparation_Cook): self
    {
        $this->preparation_Cook = $preparation_Cook;

        return $this;
    }

    public function getIngredients(): ?string
    {
        return $this->ingredients;
    }

    public function setIngredients(string $ingredients): self
    {
        $this->ingredients = $ingredients;

        return $this;
    }

    public function getSteps(): ?string
    {
        return $this->steps;
    }

    public function setSteps(string $steps): self
    {
        $this->steps = $steps;

        return $this;
    }

    public function getAllergens(): ?string
    {
        return $this->allergens;
    }

    public function setAllergens(string $allergens): self
    {
        $this->allergens = $allergens;

        return $this;
    }

    /**
     * Get the value of regimes
     */ 
    public function getRegimes()
    {
        return $this->regimes;
    }

    /**
     * Set the value of regimes
     *
     * @return  self
     */ 
    public function setRegimes($regimes)
    {
        $this->regimes = $regimes;

        return $this;
    }

}