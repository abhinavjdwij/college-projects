<?php

    require_once 'AchievementManager.php';
 
    class AchievementManagerUnitTest extends PHPUnit_Framework_TestCase {
        private $newachievement;
     
        protected function setUp() { $this->newachievement = new AchievementManager(); }
     
        protected function tearDown() { $this->newachievement = NULL; }
     
        public function test() {

            require_once 'dbconnect.php';

            $result = $this->newachievement->validate("IEM", "Bla.. Bla.. Bla..",
                "sanchitcv@gmail.com", $db);

            $this->assertEquals(array(), $result);
        }
    }

?>