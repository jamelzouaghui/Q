<?php

namespace App\Entity;

use App\Repository\GroupeRepository;
use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GroupeRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Groupe {

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $raison;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $slug;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $url;

    /**
     * @ORM\Column(type="integer",nullable=true)
     */
    private $statut;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $photoCouverture;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $photoGroupe;

    /**
     * @ORM\Column(type="text")
     */
    private $description1;

    /**
     * @ORM\Column(type="text")
     */
    private $description2;

    /**
     *  @ORM\ManyToOne(targetEntity="Animateur")
     *  @ORM\JoinColumn(name="animateur_id", referencedColumnName="id")
     */
    private $animateur;

    /**
     *  @ORM\ManyToOne(targetEntity="User")
     *  @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName(string $name) {
        $this->name = $name;

        return $this;
    }

    public function getRaison() {
        return $this->raison;
    }

    public function setRaison(string $raison) {
        $this->raison = $raison;

        return $this;
    }

    public function getCreatedAt() {
        return $this->createdAt;
    }

    public function setCreatedAt($createdAt) {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt() {
        return $this->updatedAt;
    }

    public function setUpdatedAt($updatedAt) {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getSlug() {
        return $this->slug;
    }

    public function setSlug(string $slug) {
        $this->slug = $slug;

        return $this;
    }

    public function getUrl() {
        return $this->url;
    }

    public function setUrl(string $url) {
        $this->url = $url;

        return $this;
    }

    public function getStatut() {
        return $this->statut;
    }

    public function setStatut(int $statut) {
        $this->statut = $statut;

        return $this;
    }

    public function getPhotoCouverture() {
        return $this->photoCouverture;
    }

    public function setPhotoCouverture(string $photoCouverture) {
        $this->photoCouverture = $photoCouverture;

        return $this;
    }

    public function getPhotoGroupe() {
        return $this->photoGroupe;
    }

    public function setPhotoGroupe(string $photoGroupe) {
        $this->photoGroupe = $photoGroupe;

        return $this;
    }

    public function getDescription1() {
        return $this->description1;
    }

    public function setDescription1(string $description1) {
        $this->description1 = $description1;

        return $this;
    }

    public function getDescription2() {
        return $this->description2;
    }

    public function setDescription2(string $description2) {
        $this->description2 = $description2;

        return $this;
    }

    /**
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */
    public function updatedTimestamps(): void {
        $dateTimeNow = new DateTime('now');
        $this->setUpdatedAt($dateTimeNow);
        if ($this->getCreatedAt() === null) {
            $this->setCreatedAt($dateTimeNow);
        }
    }

    public function getAnimateur() {
        return $this->animateur;
    }

    public function setAnimateur($animateur) {
        $this->animateur = $animateur;

        return $this;
    }

    public function getUser() {
        return $this->user;
    }

    public function setUser($user) {
        $this->user = $user;

        return $this;
    }

}
