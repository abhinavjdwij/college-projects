<?php

    require_once 'ItemManager.php';
 
    class ItemManagerUnitTest extends PHPUnit_Framework_TestCase {
        private $newitem;
     
        protected function setUp() { $this->newitem = new ItemManager(); }
     
        protected function tearDown() { $this->newitem = NULL; }
     
        public function test() {

            require_once 'dbconnect.php';

            $result = $this->newitem->validateSell("CLRS",
                "books", 5, 2000,
                "sanchitcv@gmail.com", $db);

            $this->assertEquals(array(), $result);
        }
    }

?>