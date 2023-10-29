<?php
 
    class Achievement {

        public $collegeName;
        public $details;
        public $owner;

        function __construct($collegeName, $details, $owner) {

            $this->collegeName = $collegeName;
            $this->details = $details;
            $this->owner = $owner;

        }

        public function create($db) {

			$query = "INSERT INTO Achievement (collegeName, details, owner) 
                    VALUES('$this->collegeName', '$this->details', '$this->owner')";
            
            mysqli_query($db, $query);
            header("location: done.php");
		  	
            return true;
	    
        }

    }

?>