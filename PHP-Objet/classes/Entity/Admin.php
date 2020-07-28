<?php


namespace Ajc\Entity;


class Admin extends User
{
    /** @var boolean */
    protected $canCreateUser;

    /**
     * @return bool
     */
    public function isCanCreateUser(): bool
    {
        return $this->canCreateUser;
    }

    /**
     * @param bool $canCreateUser
     * @return Admin
     */
    public function setCanCreateUser(bool $canCreateUser): Admin
    {
        $this->canCreateUser = $canCreateUser;
        return $this;
    }


}