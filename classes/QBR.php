<?php

class QBR {

	// Set up protected variables.
	protected $_attempts;
	protected $_completions;
	protected $_yards;
	protected $_touchdowns;
	protected $_interceptions;
	
	// When we use the class, these five (5) variables are the available inputs.  Assign the variables (which in our other file are drawn from the user input into the form) to the protected variables so that the protected variables can be used in our forthcoming methods (functions).
	public function __construct($attempts, $completions, $yards, $touchdowns, $interceptions) {
		$this->_attempts = $attempts;
		$this->_completions = $completions;
		$this->_yards = $yards;
		$this->_touchdowns = $touchdowns;
		$this->_interceptions = $interceptions;
	}
	
	// Because of the nature of the problem, it makes sense to have a single function call the other functions, then do the final manipulations.
	public function qbr() {
		// 5. Sum the four functions that are inputs to QBR: (1) % of completions, (2) avg yards per attempt, (3) TDs per attempt, and (4) % of interceptions.  These functions are built below.
		$qbr = $this->completions() + $this->yards() + $this->touchdowns() + $this->interceptions();
		// 6. Divide #5 by 6
		$qbr /= 6;
		// 7. Multiply #6 by 100
		$qbr *= 100;
		return $qbr;
	}
	
	public function completions() {
		// 1. Percentage of completions
		$completions_calc =  $this->_completions/$this->_attempts;
		// Other NFL QBR specific manipulations
		$completions_calc -= .3;
		if ($completions_calc * 5 < 0) {
			$completions_calc = 0;
		} elseif ($completions_calc * 5 > 2.375) {
			$completions_calc = 2.375;
		} else {
			$completions_calc *=  5;
		}
		return $completions_calc;
	}
	
	public function yards() {
		// 2. Average yards gained per attempt
		$yards_calc = $this->_yards/$this->_attempts;
		// Other NFL QBR specific manipulations
		$yards_calc -= 3;
		if ($yards_calc * .25 < 0) {
			$yards_calc = 0;
		} elseif ($yards_calc * .25 > 2.375) {
			$yards_calc = 2.375;
		} else {
			$yards_calc *= .25;
		}
		return $yards_calc;
	}
	
	function touchdowns() {
		// 3. Touchdown passes per attempt
		$touchdowns_calc = $this->_touchdowns/$this->_attempts;
		// Other NFL QBR specific manipulations
		if ($touchdowns_calc * 20 < 0) {
			$touchdowns_calc = 20;
		} elseif ($touchdowns_calc * 20 > 2.375) {
			$touchdowns_calc = 2.375;
		} else {
			$touchdowns_calc *= 20;
		}
		return $touchdowns_calc;
	}
	
	function interceptions() {
		// 4. Percentage of interceptions
		$interceptions_calc = $this->_interceptions/$this->_attempts;
		// Other NFL QBR specific manipulations
		$interceptions_calc *= 25;
		if (2.375 - $interceptions_calc < 0) {
			$interceptions_calc = 0;
		} else {
			$interceptions_calc = 2.375 - $interceptions_calc;
		}
		return $interceptions_calc;
	}

}

?>