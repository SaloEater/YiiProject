<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 03.07.2019
 * Time: 19:09
 */

include_once "Manager.php";
include_once "Jobber.php";
include_once "Student.php";
include_once "Human.php";

$human = new Human("Vasiliy", "Kojemyako", 19);
echo $human . PHP_EOL;
$human->setLastName("Kojemyakin");
echo $human . PHP_EOL;

$student = new Student("Aleksandr", "Petrov", 17, 0, Student::COURSE_EXTRA);
echo $student . PHP_EOL;
$student->setCourseNum(1);
$student->setCourseType(Student::COURSE_FULL);
$student->AddMark(Student::MARK_MATH, 5);
$student->AddMark(Student::MARK_ECON, 5);
echo $student->getMarksList();
echo $student . PHP_EOL;

$worker = new Jobber("Ivan", "Klichko", 32, 35000);
echo $worker . PHP_EOL;
echo $worker->GetSalaryList() . PHP_EOL;
$worker->Pay("27.03.2019");
echo $worker->GetSalaryList() . PHP_EOL;
$worker->PayOther("27.03.2019", 5000);
echo $worker->GetSalaryList() . PHP_EOL;

$manager = new Manager("Dimitry", "Klichko", 45, 999999);
echo "Employees: ". $manager->GetEmployerSurnames() . PHP_EOL;;
$manager->AddEmployer($student);
echo "Employees: ". $manager->GetEmployerSurnames() . PHP_EOL;;
$manager->AddEmployer($worker);
echo "Employees: ". $manager->GetEmployerSurnames() . PHP_EOL;;


