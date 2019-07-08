<?php

include "DBSample.php";

class Query
{
    private $conditions;

    private $columns,
        $tables;

    public function __construct()
    {
        $this->columns = [];
        $this->conditions = [];
        $this->tables = [];
    }

    public function addColumn($name)
    {
        if (in_array($name, $this->columns)) {
            return;
        }
        $this->columns[]=$name;
    }

    public function removeColumn($name)
    {
        if (!in_array($name, $this->columns)) {
            return;
        }
        foreach ($this->columns as $key=>$column) {
            if ($column==$name) {
                unset($this->columns[$key]);
            }
        }
    }

    public function addTable($name)
    {
        if (in_array($name, $this->tables)) {
            return;
        }
        $this->tables[]=$name;
    }

    public function removeTable($name)
    {
        if (!in_array($name, $this->tables)) {
            return;
        }
        foreach ($this->tables as $key=>$table) {
            if ($table==$name) {
                unset($this->tables[$key]);
            }
        }
    }

    private function getConditionIndexByCondition($condition)
    {
        foreach ($this->conditions as $key=>$condition_) {
            if ($condition == $condition_->getCondition()) {
                return $key;
            }
        }
        return -1;
    }

    public function addCondition($condition, $joiner = "AND")
    {
        if ($this->getConditionIndexByCondition($condition) != -1) {
            return;
        }

        $conditionObj = new Condition();
        $conditionObj->setCondition($condition);
        $conditionObj->setJoiner($joiner);

        $this->conditions[] = $conditionObj;

    }

    public function removeCondition($condition)
    {
        if ($index = $this->getConditionIndexByCondition($condition) == -1) {
            return;
        }

        unset($this->conditions[$index]);
    }

    public function getQuery()
    {
        $query = "SELECT " . (count($this->columns) > 0 ? implode(',', array_values($this->columns)) : '*'). ' ';
        $query .= "FROM " . implode(',', array_values($this->tables)) . ' ';
        if (count($this->conditions) > 0) {
            $query .= "WHERE ";
            for($i = 0; $i < count($this->conditions) - 1; $i++) {
                $condition = $this->conditions[$i];
                $query .= $condition->getCondition() . ' ' . $condition->getJoiner() . ' ';
            }
            $query .= $this->conditions[count($this->conditions)-1]->getCondition();
        }
        return $query;
    }



}

class Condition
{
    private $condition,
        $joiner;

    /**
     * @param mixed $condition
     */
    public function setCondition($condition)
    {
        $this->condition = $condition;
    }

    /**
     * @return mixed
     */
    public function getCondition()
    {
        return $this->condition;
    }

    /**
     * @param mixed $joiner
     */
    public function setJoiner($joiner = "AND")
    {
        $this->joiner = $joiner;
    }

    /**
     * @return mixed
     */
    public function getJoiner()
    {
        return $this->joiner;
    }
}

$query = new Query();
$db = DBSample::instance();
$query->addColumn("id");
$query->addColumn("name");

$query->addTable("films");

print_r($db->select($query->getQuery()));

$query->addCondition("id=1", "OR");

print_r($db->select($query->getQuery()));

$query->addCondition("id=2");

print_r($db->select($query->getQuery()));

