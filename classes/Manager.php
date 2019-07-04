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

    public function __construct($firstName, $lastName, $age, $salary)
    {
        parent::__construct($firstName, $lastName, $age, $salary);
        $this->employees = [];
    }

    public function addEmployer($employer)
    {
        $this->employees[] = $employer;
    }

    public function removeEmployer($lastName)
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

    public function getEmployerSurnames()
    {
        if($this->employees == [])return "none";

        $output = PHP_EOL;

        foreach($this->employees as $employee)
        {
            $output .= $employee . PHP_EOL;
        }

        return $output;
    }

    public function getEmployers()
    {
        return $this->employees;
    }

    public function __toString()
    {
        return "Manager " . $this->getFullName() . " manage " . count($this->employees) . " employees";
    }
}