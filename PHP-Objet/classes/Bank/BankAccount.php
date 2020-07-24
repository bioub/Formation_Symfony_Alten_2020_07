<?php
namespace Ajc\Bank;

use Ajc\Entity\Contact;
use Exception;

class BankAccount
{
    /** @var Contact */
    protected $owner;
    protected $balance = 0;

    /**
     * @return Contact
     */
    public function getOwner(): Contact
    {
        return $this->owner;
    }

    /**
     * @param Contact $owner
     * @return BankAccount
     */
    public function setOwner(Contact $owner): BankAccount
    {
        $this->owner = $owner;
        return $this;
    }



    /**
     * @return mixed
     */
    public function getBalance()
    {
        return $this->balance;
    }

    /**
     * @param mixed $amount
     * @return BankAccount
     */
    public function credit($amount)
    {
        $this->testAmount($amount);
        $this->balance += $amount;
        return $this;
    }

    /**
     * @param mixed $amount
     * @return BankAccount
     */
    public function debit($amount)
    {
        $this->testAmount($amount);
        $this->balance -= $amount;
        return $this;
    }

    protected function testAmount($amount) {
        if ($amount < 0) {
            throw new Exception('amount must be positive');
        }
    }
}