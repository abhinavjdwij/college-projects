<?php

    require_once 'SearchAchievementManager.php';
 
    class SearchAchievementManagerUnitTest extends PHPUnit_Framework_TestCase {
        private $newachievement;
     
        protected function setUp() { $this->newachievement = new SearchAchievementManager(); }
     
        protected function tearDown() { $this->newachievement = NULL; }
     
        public function test() {

            require_once 'dbconnect.php';

            $result = $this->newachievement->search("IEM", $db);

            $this->assertNotEquals(array(), $result);
        }
    }

?>