<?php

namespace Ajc\Entity;

class Company
{
    protected $id;
    protected $name;
    protected $city;

    /** @var Contact[] */
    protected $contacts = [];

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Company
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return Company
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     * @return Company
     */
    public function setCity($city)
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @return Contact[]
     */
    public function getContacts(): array
    {
        return $this->contacts;
    }

    /**
     * @param Contact $contact
     * @return Company
     */
    public function addContact(Contact $contact): Company
    {
        $this->contacts[] = $contact; // ajoute à la fin du tableau
        return $this;
    }


}