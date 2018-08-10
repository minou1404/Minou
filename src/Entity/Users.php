<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;


/**
 * @ORM\Entity(repositoryClass="App\Repository\UsersRepository")
 */
class Users implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=70)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=80)
     * * @Assert\Length(
     * min = 8,
     * max = 15,
     * minMessage = "Entrez un mot de passe supérieur à 8 carc.",
     * maxMessage = "Entrez un mot de passe infèrieur à 15 carc."
     * )
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=15, nullable=true)
     */
    private $phone;

    // /**
    //  * @ORM\Column(type="datetime")
    //  */
    // private $created;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updated;

    public function getId()
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getCreated(): ?\DateTimeInterface
    {
        return $this->created;
    }

    public function getUpdated(): ?\DateTimeInterface
    {
        return $this->updated;
    }

    public function setUpdated(): self
    {
        $this->updated = new \DateTime();

        return $this;
    }

    public function getRole()
    {
        return array("ROLE_USER");
    }

    public function getSalt()
    {}

    public function getUsername()
    {
        return $this->getEmail();
    }

    public function eraseCredentials()
    {
        return $this->getEmail();
    }
}
