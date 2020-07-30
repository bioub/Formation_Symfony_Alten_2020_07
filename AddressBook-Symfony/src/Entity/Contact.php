<?php

namespace App\Entity;

use App\Repository\ContactRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ContactRepository::class)
 */
class Contact
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @Assert\NotBlank(message="First name is mandatory")
     * @Assert\Length(max=40, maxMessage="First name should be less than 40 characters")
     * @ORM\Column(type="string", length=40)
     */
    protected $firstName;

    /**
     * @ORM\Column(type="string", length=40)
     */
    protected $lastName;

    /**
     * @Assert\Email(strict=true)
     * @ORM\Column(type="string", length=80, nullable=true)
     */
    protected $email;

    /**
     * @Assert\Length(max=80)
     * @ORM\Column(type="string", length=80, nullable=true)
     */
    protected $phone;

    /**
     * @var \DateTime
     * @ORM\Column(type="date", nullable=true)
     */
    protected $birthdate;

    /**
     * @var Company
     * @ORM\ManyToOne(targetEntity="App\Entity\Company", inversedBy="contacts")
     */
    protected $company;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Group")
     */
    protected $groups;

    /**
     * @var Contact
     * @ORM\ManyToOne(targetEntity="App\Entity\Contact")
     */
    protected $superior;

    public function __construct()
    {
        $this->groups = new ArrayCollection();
    }



    public function __toString()
    {
        return $this->firstName . ' ' . $this->lastName;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

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

    public function getBirthdate(): ?\DateTimeInterface
    {
        return $this->birthdate;
    }

    public function setBirthdate(?\DateTimeInterface $birthdate): self
    {
        $this->birthdate = $birthdate;

        return $this;
    }

    public function getCompany(): ?Company
    {
        return $this->company;
    }

    public function setCompany(?Company $company): self
    {
        $this->company = $company;

        return $this;
    }

    /**
     * @return Collection|Group[]
     */
    public function getGroups(): Collection
    {
        return $this->groups;
    }

    public function addGroup(Group $group): self
    {
        if (!$this->groups->contains($group)) {
            $this->groups[] = $group;
        }

        return $this;
    }

    public function removeGroup(Group $group): self
    {
        if ($this->groups->contains($group)) {
            $this->groups->removeElement($group);
        }

        return $this;
    }

    public function getSuperior(): ?self
    {
        return $this->superior;
    }

    public function setSuperior(?self $superior): self
    {
        $this->superior = $superior;

        return $this;
    }
}
