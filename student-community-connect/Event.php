<?php
 
    class Event {

        public $eventName;
        public $eventType;
        public $details;
        public $organizer;

        function __construct($eventName, $eventType, $details, $organizer) {

            $this->eventName = $eventName;
            $this->eventType = $eventType;
            $this->details = $details;
            $this->organizer = $organizer;

        }

    }

?>