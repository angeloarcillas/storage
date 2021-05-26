<?php

class Connection
{
    
    private static $db_servername ='localhost';
    private static $db_username ='root';
    private static $db_password = '';
    private static $db_name ='el';
    private static $db_conn;

    private function __construct()
    {
        try {

            self::$db_conn = new PDO('mysql:host='.self::$db_servername.';dbname='. self::$db_name , self::$db_username, self::$db_password);
            self::$db_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // dev mode
            // self::$db_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // live mode

            self::$db_conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_NUM);
        } catch (PDOException $e) {
            echo "Mysql Connection Error :" .$e->getMessge();
        }
    }

    protected static function connect()
    {
        if (!self::$db_conn) {
            new Connection();
        }
        return self::$db_conn;
    }
}


/*
TODO: IMPROVE FRONT-END AND REFACTOR + ADD SECURITY


    CRUD_applicant
id
firstName
lastName
email
age
birthdate
address
contact
course
employment
status
token

    CRUD_course
course_id
course_name
course_price
course_status
*/