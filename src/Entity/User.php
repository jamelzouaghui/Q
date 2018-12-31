<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Serializable;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User implements UserInterface, Serializable {

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255,unique=true, nullable=false)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="boolean",  nullable=true)
     */
    private $status;

    /**
     * @ORM\OneToOne(targetEntity="Media",cascade={"persist","remove"} )
     * @ORM\JoinColumn(name="photo_id", referencedColumnName="id" , nullable=true)
     */
    protected $photo;

    public function getId() {
        return $this->id;
    }

    public function __construct() {
        $this->createdAt = new \DateTime("now");
    }

    public function getUsername() {
        return $this->username;
    }

    public function setUsername(string $username): self {
        $this->username = $username;

        return $this;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword(string $password): self {
        $this->password = $password;

        return $this;
    }

    public function getRoles() {
        return [
            'ROLE_ADMIN'
        ];
    }

    public function getSalt() {
        
    }

    public function eraseCredentials() {
        
    }

    public function serialize() {
        return serialize([
            $this->id,
            $this->username,
            $this->password,
        ]);
    }

    public function unserialize($serialized) {
        list(
                $this->id,
                $this->username,
                $this->password,
                ) = unserialize($serialized, ['allowed_classes' => false]);
    }

    public function getFirstname() {
        return $this->firstname;
    }

    public function setFirstname(string $firstname) {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname() {
        return $this->lastname;
    }

    public function setLastname(string $lastname) {
        $this->lastname = $lastname;

        return $this;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail(string $email) {
        $this->email = $email;

        return $this;
    }

    public function getCreatedAt() {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt) {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus(bool $status) {
        $this->status = $status;

        return $this;
    }

}
