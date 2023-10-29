<?php

    require_once 'User.php';
 
    class Student extends User {

        public $address;
        public $college;

        function __construct($name, $emailID, $password, $age, $gender, $type, $address, $college) {

            parent::__construct($name, $emailID, $password, $age, $gender, $type);

            $this->address = $address;
            $this->college = $college;

        }

    }

?>