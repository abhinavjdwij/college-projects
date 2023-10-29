<?php
	function compare_sort_factor($x, $y) {
		$a = $x["sort_factor"];
		$b = $y["sort_factor"];
	    if ($a == $b) { return 0; }
    	return ($a < $b) ? -1 : 1;
	}

?>