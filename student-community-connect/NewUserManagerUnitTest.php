<?php

    require_once 'NewUserManager.php';
 
    class NewUserManagerUnitTest extends PHPUnit_Framework_TestCase {
        private $newuser;
     
        protected function setUp() { $this->newuser = new NewUserManager(); }
     
        protected function tearDown() { $this->newuser = NULL; }
     
        public function test() {

            require_once 'dbconnect.php';

            $result = $this->newuser->validate("Harshad",
                "coder_hardshad@gmail.com", "1234", 22, "male", "student",
                "", "IEM", "Exide", $db
                );
            $this->assertEquals(array(), $result);
        }
    }

?>