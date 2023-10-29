<?php
 
    class Job {

        public $location;
        public $type;
        public $salary;
        public $daysPerWeek;
        public $hoursPerDay;
        public $owner;

        function __construct($location, $type, $salary, $daysPerWeek, $hoursPerDay, $owner) {

            $this->location = $location;
            $this->type = $type;
            $this->salary = $salary;
            $this->daysPerWeek = $daysPerWeek;
            $this->hoursPerDay = $hoursPerDay;
            $this->owner = $owner;

        }

        public function createJob($db) {

            $query = "INSERT INTO JobVacancy (location, type, salary, daysPerWeek, hoursPerDay, owner) 
                      VALUES('$this->location', '$this->type', $this->salary, $this->daysPerWeek, $this->hoursPerDay, '$this->owner')";

            mysqli_query($db, $query);
            $loc = urlencode($this->location);
            $abc = urlencode($this->type);
            header("location: SuggestNeedJob.php?location=$loc&type=$abc");

            return true;

        }

        public function createNeedJob($db) {

            $query = "INSERT INTO NeedJob (location, interest, workingHours, owner) 
                      VALUES('$this->location', '$this->type', $this->hoursPerDay, '$this->owner')";
                      
            mysqli_query($db, $query);
            $loc = urlencode($this->location);
            $abc = urlencode($this->type);
            header("location: SuggestJobVacancy.php?location=$loc&type=$abc");

            return true;

        }

    }

?>