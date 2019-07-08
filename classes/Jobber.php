<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 03.07.2019
 * Time: 19:09
 */

include_once "Human.php";

class Jobber extends Human
{
    private $salary,
        $payedSalary;

    public function __construct($firstName, $lastName, $age, $salary)
    {
        parent::__construct($firstName, $lastName, $age);
        $this->setSalary($salary);
        $this->payedSalary = [];
    }

    public function setSalary($salary)
    {
        $this->salary = $salary;
    }

    public function payOther($date, $salary)
    {
        $this->payedSalary[$date][] = $salary;
    }

    public function pay($date)
    {
        $this->payedSalary[$date][] = $this->salary;
    }

    public function getSalaryList()
    {
        if (!count($this->payedSalary)) return 'Hadn\'t receive salary yet';
        $output = '';
        foreach ($this->payedSalary as $date=>$arr)
        {
            foreach ($arr as $value) {
                $output .= "Received " . $value . " on " . $date . PHP_EOL;
            }
        }
        return $output;
    }

    public function __toString()
    {
        return "Worker " . $this->getFullName() . " with salary " . $this->salary . "$";
    }
}
