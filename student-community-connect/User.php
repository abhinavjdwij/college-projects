<?php
 
    class User {

        public $name;
        public $emailID;
        public $password;
        public $age;
        public $gender;
        public $type;

        function __construct($name, $emailID, $password, $age, $gender, $type) {

            $this->name = $name;
            $this->emailID = $emailID;
            $this->password = $password;
            $this->$age = $age;
            $this->gender = $gender;
            $this->type = $type;

        }

    }

?>