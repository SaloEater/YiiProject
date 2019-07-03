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

    public function __construct($firstName, $lastName, $age)
    {
        $this->setLastName($lastName);
        $this->setFirstName($firstName);
        $this->setAge($age);
    }
    public function getAge()
    {
        return $this->age;
    }
    public function getFirstName()
    {
        return $this->firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function setAge($age)
    {
        $this->age = $age;
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    public function getFullName()
    {
        return $this->firstName . ' ' . $this->lastName;
    }

    public function __toString()
    {
        return "Human " . $this->getFullName();
    }

}
