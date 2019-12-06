<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CompetenceRepository")
 */
class Competence
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="integer")
     */
    private $seuilMini;

    /**
     * @ORM\Column(type="integer")
     */
    private $seuilIntermediaire;

    /**
     * @ORM\Column(type="integer")
     */
    private $seuilMaxi;

    /**
     * @ORM\Column(type="integer")
     */
    private $MaxParcours;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getSeuilMini(): ?int
    {
        return $this->seuilMini;
    }

    public function setSeuilMini(int $seuilMini): self
    {
        $this->seuilMini = $seuilMini;

        return $this;
    }

    public function getSeuilIntermediaire(): ?int
    {
        return $this->seuilIntermediaire;
    }

    public function setSeuilIntermediaire(int $seuilIntermediaire): self
    {
        $this->seuilIntermediaire = $seuilIntermediaire;

        return $this;
    }

    public function getSeuilMaxi(): ?int
    {
        return $this->seuilMaxi;
    }

    public function setSeuilMaxi(int $seuilMaxi): self
    {
        $this->seuilMaxi = $seuilMaxi;

        return $this;
    }

    public function getMaxParcours(): ?int
    {
        return $this->MaxParcours;
    }

    public function setMaxParcours(int $MaxParcours): self
    {
        $this->MaxParcours = $MaxParcours;

        return $this;
    }
}
