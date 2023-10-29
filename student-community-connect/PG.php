<?php
 
    class PG {

        public $pgName;
        public $pgType;
        public $location;
        public $rent;
        public $vacancy;
        public $owner;

        function __construct($pgName, $pgType, $location, $rent, $vacancy, $owner) {

            $this->pgName = $pgName;
            $this->pgType = $pgType;
            $this->location = $location;
            $this->rent = $rent;
            $this->vacancy = $vacancy;
            $this->owner = $owner;

        }

        public function postPGVacancy($db) {
            
            $query = "INSERT INTO PGVacancy (pgName, pgType, location, rent, vacancy, owner) 
                      VALUES('$this->pgName', '$this->pgType', '$this->location',
                        $this->rent, $this->vacancy, '$this->owner')";
            mysqli_query($db, $query);
            $loc = urlencode($this->location);
            $pgt = urlencode($this->pgType);
            header("location: SuggestNeedPG.php?location=$loc&pgType=$pgt");

        }

        public function createNeedPG($db) {
            
            $query = "INSERT INTO NeedPG (pgType, location, rent, vacancy, owner) 
                      VALUES('$this->pgType', '$this->location',
                        $this->rent, $this->vacancy, '$this->owner')";
            $loc = urlencode($this->location);
            $pgt = urlencode($this->pgType);
            header("location: SuggestPGVacancy.php?location=$loc&pgType=$pgt");

        }



    }

?>