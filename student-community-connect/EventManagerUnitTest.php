<?php

    require_once 'EventManager.php';
 
    class EventManagerUnitTest extends PHPUnit_Framework_TestCase {
        private $newevent;
     
        protected function setUp() { $this->newevent = new EventManager(); }
     
        protected function tearDown() { $this->newevent = NULL; }
     
        public function test() {

            require_once 'dbconnect.php';

            $result = $this->newevent->validate("IEMCO", "techincal", "Coding on CodeChef",
                "coder_harshad@gmail.com", $db);

            $this->assertEquals(array(), $result);
        }
    }

?>