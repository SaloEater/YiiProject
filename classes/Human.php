<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 03.07.2019
 * Time: 19:09
 */

class Human
{
    protected $lastName,
        $firstName,
        $age;

    public function __construct(string $firstName, string $lastName, int $age)
    {
        $this->setLastName($lastName);
        $this->setFirstName($firstName);
        $this->setAge($age);
    }
    public function getAge() : int
    {
        return $this->age;
    }
    public function getFirstName() : string
    {
        return $this->firstName;
    }

    public function getLastName() : string
    {
        return $this->lastName;
    }

    public function setAge(int $age)
    {
        $this->age = $age;
    }

    public function setFirstName(string $firstName)
    {
        $this->firstName = $firstName;
    }

    public function setLastName(string $lastName)
    {
        $this->lastName = $lastName;
    }

    public function getFullName() : string
    {
        return $this->firstName . ' ' . $this->lastName;
    }

    public function __toString()
    {
        return "Human " . $this->getFullName();
    }

}
