<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "Student".
 *
 * @property int $id
 * @property string $firstName
 * @property string $lastName
 * @property int $age
 */
class Student extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Student';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['age'], 'required'],
            [['age'], 'integer'],
            [['firstName', 'lastName'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'firstName' => 'First Name',
            'lastName' => 'Last Name',
            'age' => 'Age',
        ];
    }
}
