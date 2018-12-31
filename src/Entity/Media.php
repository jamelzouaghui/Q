<?php

namespace App\Entity;

use App\Repository\MediaRepository;
use DateTime;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="MediaRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Media {

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string $file
     * @ORM\Column(type="string")
     *
     * @Assert\NotBlank(message="Please, upload an image first.")
     * @Assert\File(mimeTypes={ "image/png", "image/jpeg", "image/jpg" })
     */
    private $file;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $alt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    public function getId() {
        return $this->id;
    }

    public function getCreatedAt() {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTimeInterface $createdAt) {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function __construct() {
        $this->created = new \Datetime();
    }

    /**
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */
    public function updatedTimestamps() {
        $this->setUpdatedAt(new DateTime('now'));

        if ($this->getCreatedAt() == null) {
            $this->setCreatedAt(new DateTime('now'));
        }
    }

    /**
     * @return string
     */
    public function getFile() {
        return $this->file;
    }

    /**
     * @param string $file
     */
    public function setFile($file) {
        if ($file) {
            $this->file = $file;
        }
    }

    /**
     * @return mixed
     */
    public function getAlt() {
        return $this->alt;
    }

    /**
     * @param mixed $alt
     */
    public function setAlt($alt) {
        $this->alt = $alt;
    }

}
