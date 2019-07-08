<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 03.07.2019
 * Time: 19:09
 */

include_once "Human.php";

class Student extends Human
{
    const COURSE_FULL = 'fulltime',
        COURSE_EXTRA = 'extramural';

    private $courseNum, $courseType;

    const MARK_MATH = "math",
        MARK_PHYS = 'phys',
        MARK_ECON = 'econ';

    private $marksList;

    public function __construct(string $firstName, string $lastName, int $age, $courseNum, $courseType)
    {
        parent::__construct($firstName, $lastName, $age);
        $this->setCourseNum($courseNum);
        $this->setCourseType($courseType);
        $this->marksList = [];
    }

    public function setCourseNum(string $courseNum)
    {
        $this->courseNum = $courseNum;
    }

    public function setCourseType(int $courseType)
    {
        $this->courseType = $courseType;
    }

    public function getMarksList() : array
    {
        return $this->marksList;
    }

    public function AddMark(string $item, $value)
    {
        $this->marksList[$item] = $value;
    }

    public function GetMarks() : array
    {
        return $this->marksList;
    }

    public function __toString()
    {
        return "Student " . $this->getFullName() . " educating on " . $this->courseType . " " . $this->courseNum ." course";
    }
}
