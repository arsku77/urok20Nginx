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
            [['salary'], 'number'],
            [['idCode'], 'match', 'pattern' => '/^([0-9]{10})$/'],
        ];
    }

    public function save()
    {
        $sql = "INSERT INTO employee (id, first_name, middle_name, last_name, birthdate, city, hiring_date, position, department, id_code, email) VALUES (null, '{$this->firstName}', '{$this->middleName}', '{$this->lastName}', '{$this->birthDate}', '{$this->city}', '{$this->hiringDate}', '{$this->position}', '{$this->department}', '{$this->idCode}', '{$this->email}')";
        return Yii::$app->db->createCommand($sql)->execute();
    }

    public static function getItem($id)
    {
        $id = intval($id);
        $sql = "SELECT * FROM employee WHERE id = $id";
        //gaunam duomenis is bazes
        return Yii::$app->db->createCommand($sql)->queryOne();
    }


    public static function getEmployeeListSalary($max)
    {
        $max = intval($max);
        $sql = 'SELECT * FROM employee ORDER BY salary DESC LIMIT ' . $max;
        $result = Yii::$app->db->createCommand($sql)->queryAll();

        return $result;//grąžinam jau modifikuotą masyvą - jame pakeistas turinys content
    }

    public static function find()
    {
        $sql = 'SELECT * FROM employee';
        return Yii::$app->db->createCommand($sql)->queryAll();
    }
}
