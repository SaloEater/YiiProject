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

    public function __construct(string $firstName, string $lastName, int $age, int $salary)
    {
        parent::__construct($firstName, $lastName, $age);
        $this->setSalary($salary);
        $this->payedSalary = [];
    }

    public function SetSalary(string $salary)
    {
        $this->salary = $salary;
    }

    public function PayOther(string$date, int $salary)
    {
        $this->payedSalary[] = [$date=>$salary];
    }

    public function Pay(string $date)
    {
        $this->payedSalary[] = [$date=>$this->salary];
    }

    public function GetSalaryList() : string
    {
        if (!count($this->payedSalary)) return 'Hadn\'t receive salary yet';
        $output = '';
        foreach ($this->payedSalary as $key => $value)
        {
            $output .= ($key + 1) . ':' . $value[array_keys($value)[0]] . PHP_EOL;
        }
        return $output;
    }

    public function __toString()
    {
        return "Worker " . $this->getFullName() . " with salary " . $this->salary . "$";
    }
}
