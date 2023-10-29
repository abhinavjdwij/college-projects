<?php

    require_once 'User.php';
 
    class CollegeRepresentative extends User {

        public $collegeName;

        function __construct($name, $emailID, $password, $age, $gender, $type, $collegeName) {

            parent::__construct($name, $emailID, $age, $gender, $type);

            $this->collegeName = $collegeName;

        }

    }

?>