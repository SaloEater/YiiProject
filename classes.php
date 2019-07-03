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

    function setAge($age)
    {
        $this->age = $age;
        return $this;
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
        return $this;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
        return $this;
    }

}

class Student
{
    const COURSE_FULL = 'fulltime',
        COURSE_EXTRA = 'extramural';

    private $courseNum, $courseType;

    const MARK_MATH = "math",
        MARK_PHYS = 'phys',
        MARK_ECON = 'econ';

    private $marksList;

    public function __constructor()
    {
        $this->courseNum = 1;
        $this->courseType = self::COURSE_FULL;
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

class Worrker
{
    private $salary,
        $payedSalary;

    public function constructor()
    {
        $this->salary = 0;
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
        if ($this->payedSalary == []) return 'Hadn\'t receive salary yet';
        $output = '';
        foreach ($this->payedSalary as $key => $value)
        {
            $output .= $key . ':' . $this->payedSalary[$key] . PHP_EOL;
        }
        return $output;
    }
}

class Manager
{
    private $employees;

    public function constructor()
    {
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