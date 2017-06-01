<?php

namespace frontend\models;
use Yii;
use yii\base\Model;

class Employee extends Model
{

    const SCENARIO_EMPLOYEE_REGISTER = 'employee_register';
    const SCENARIO_EMPLOYEE_UPDATE = 'employee_update';

    public $firstName;
    public $lastName;
    public $middleName;
    public $birthDate;
    public $hiringDate;
    public $salary;
    public $department;
    public $city;
    public $position;
    public $idCode;
    public $email;

    public function scenarios()
    {

        return [
            self::SCENARIO_EMPLOYEE_REGISTER => ['firstName', 'lastName', 'middleName', 'birthDate', 'hiringDate', 'salary', 'department', 'city', 'position', 'idCode', 'email',],
            self::SCENARIO_EMPLOYEE_UPDATE => ['firstName', 'lastName', 'middleName',],
        ];
    }

    public function rules()
    {
        return [
            [['firstName', 'lastName', 'email', 'hiringDate', 'position', 'idCode'], 'required'],
            [['firstName'], 'string', 'min' => 2],
            [['lastName'], 'string', 'min' => 3],
            [['email'], 'email'],
            [['middleName'], 'required', 'on' => self::SCENARIO_EMPLOYEE_UPDATE],
            [['birthDate', 'hiringDate'], 'date', 'format' => 'php:Y-m-d'],
            [['city'], 'string'],
            [['position'], 'string'],
            [['idCode'], 'match', 'pattern' => '/^([0-9]{10})$/'],
        ];
    }

    public function save()
    {
        $sql = "INSERT INTO employee (id, first_name, middle_name, last_name, birthdate, city, hiring_date, position, department, id_code, email) VALUES (null, '{$this->firstName}', '{$this->middleName}', '{$this->lastName}', '{$this->birthDate}', '{$this->city}', '{$this->hiringDate}', '{$this->position}', '{$this->department}', '{$this->idCode}', '{$this->email}')";
        return Yii::$app->db->createCommand($sql)->execute();
    }
}
