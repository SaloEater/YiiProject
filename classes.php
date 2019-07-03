<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 03.07.2019
 * Time: 10:18
 */

class Human
{
    protected $lastName,
        $firstName,
        $age;

    public function __constructor($firstName, $lastName, $age)
    {
        $this->lastName = $lastName;
        $this->firstName = $firstName;
        $this->age = $age;
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
        return $this->getFullName();
    }

}

class Student extends Human
{
    const COURSE_FULL = 'fulltime',
        COURSE_EXTRA = 'extramural';

    private $courseNum, $courseType;

    const MARK_MATH = "math",
        MARK_PHYS = 'phys',
        MARK_ECON = 'econ';

    private $marksList;

    public function __constructor2($firstName, $lastName, $age, $courseNum, $courseType)
    {
        parent::__constructor($firstName, $lastName, $age);
        $this->courseNum = $courseNum;
        $this->courseType = $courseType;
        $this->marksList = [];
    }

    public function setCourseNum($courseNum)
    {
        $this->courseNum = $courseNum;
    }

    public function setCourseType($courseType)
    {
        $this->courseType = $courseType;
    }

    public function getMarksList()
    {
        return $this->marksList;
    }

    public function AddMark($item, $value)
    {
        $this->marksList[$item] = $value;
    }

    public function GetMarks()
    {
        return $this->marksList;
    }
}

class Worrker extends Human
{
    private $salary,
        $payedSalary;

    public function __constructor2($firstName, $lastName, $age, $salary)
    {
        parent::__constructor($firstName, $lastName, $age);
        $this->salary = $salary;
        $this->payedSalary = [];
    }

    public function SetSalary($salary)
    {
        $this->salary = $salary;
        return $this;
    }

    public function PaySalary($date, $salary)
    {
        $this->payedSalary[] = [$date=>$salary];
        return $this;
    }

    public function Pay($date)
    {
        $this->payedSalary[] = [$date=>$this->salary];
        return $this;
    }

    public function GetSalaryList()
    {
        if (!count($this->payedSalary)) return 'Hadn\'t receive salary yet';
        $output = '';
        foreach ($this->payedSalary as $key => $value)
        {
            $output .= $key . ':' . $this->payedSalary[$key] . PHP_EOL;
        }
        return $output;
    }

    public function __toString()
    {
        return "Worker " . $this->getFullName();
    }
}

class Manager extends Worrker
{
    private $employees;

    public function __constructor2($firstName, $lastName, $age, $salary)
    {
        parent::__constructor2($firstName, $lastName, $age, $salary);
        $this->employees = [];
    }

    public function AddEmployer($employer)
    {
        $this->employees[] = $employer;
    }

    public function RemoveEmployer($lastName)
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

    public function GetEmployerSurnames()
    {
        if($this->employees == [])return [];

        $output = '';

        foreach($this->employees as $employee)
        {
            $output .= $employee . PHP_EOL;
        }

        return $output;
    }

    public function GetEmployers()
    {
        return $this->employees;
    }
}