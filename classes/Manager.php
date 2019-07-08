<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 03.07.2019
 * Time: 19:09
 */

include "Jobber.php";

class Manager extends Jobber
{
    private $employees;

    public function __construct(string $firstName, string $lastName, int $age, int $salary)
    {
        parent::__construct($firstName, $lastName, $age, $salary);
        $this->employees = [];
    }

    public function addEmployer(Jobber $employer)
    {
        $this->employees[] = $employer;
    }

    public function removeEmployer(string $lastName)
    {
        $removed = false;
        foreach($this->employees as $employee)
        {
            if($employee->lastName==$lastName)
            {
                $removed = true;
                unset($employee);
                break;
            }
        }
        return $removed;
    }

    public function getEmployerSurnames() : string
    {
        if($this->employees == [])return "none";

        $output = PHP_EOL;

        foreach($this->employees as $employee)
        {
            $output .= $employee . PHP_EOL;
        }

        return $output;
    }

    public function getEmployers() : array
    {
        return $this->employees;
    }

    public function __toString()
    {
        return "Manager " . $this->getFullName() . " manage " . count($this->employees) . " employees";
    }
}