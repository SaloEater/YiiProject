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

    public function __construct($firstName, $lastName, $age, $courseNum, $courseType)
    {
        parent::__construct($firstName, $lastName, $age);
        $this->setCourseNum($courseNum);
        $this->setCourseType($courseType);
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
        if (!count($this->marksList)) return 'Hadn\'t receive marks yet';
        $output = '';
        foreach ($this->marksList as $key=>$item)
        {
            foreach ($item as $mark) {
                $output .= $key . ' marked as ' . $mark . PHP_EOL;
            }
        }
        return $output;
    }

    public function addMark($item, $mark)
    {
        $this->marksList[$item][] = $mark;
    }

    public function getMarks()
    {
        return $this->marksList;
    }

    public function __toString()
    {
        return "Student " . $this->getFullName() . " educating on " . $this->courseType . " " . $this->courseNum ." course";
    }
}
