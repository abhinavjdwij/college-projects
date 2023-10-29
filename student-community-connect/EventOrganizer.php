<?php

    require_once 'User.php';
 
    class EventOrganizer extends User {

        public $organizerName;

        function __construct($name, $emailID, $password, $age, $gender, $type, $organizerName) {

            parent::__construct($name, $emailID, $age, $gender, $type);

            $this->organizerName = $organizerName;

        }

    }

?>