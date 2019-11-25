<?php
/**
 * Class for Finite State Automata Logic for BPI Test
 * 
 * @author Jimmy La
 * @date 2019.11.22
 **/
class FiniteStateMachine
{	
	private $name;
	const STATES = [  
					'0' =>	0,
					'1' => 0,
					'2' => 0
					];
	const TRANSITIONS = ['0' => ['0' => ['0'], '1' => ['1']], 
						 '1' => ['0' => ['2'], '1' => ['0']],
						 '2' => ['0' => ['1'], '1' => ['2']], 
						];

	private $current_state;
	private $input;
    private $state_path = [];
    private $stop_flag = 1;
	public $binary_input = 0;    
	public $final_state;  

	/** 
	 *  Contstructor
	 *  
	 **/
	 
	public function __construct($name) 
	{ 
		$this->name = $name;				  
	}
	
	/**
	 * Gets the current state
	 **/
		
    public function getState()
    {
        return $this->current_state;
    }
	
	/**
	 * Sets the current state
	 **/
	 
	public function setState($state)
    {
        $this->current_state = $state;
    }
	
	/**
	 * Transition
	 * 
	 * Accepts input 0 or 1 and transitions to the next state based on
	 * the transitions array. Updates the current_state variable.
	 **/
	 	
	private function transition($input)
    {
		$state_num = $this->current_state;

		// If input = 0
		if($input == 0) {	
            $this->setState( $this::TRANSITIONS[$state_num][0][0] );
		} else {
            $this->setState( $this::TRANSITIONS[$state_num][1][0] );
		}
    }
	
	/**
	 * Prepare Binary String
	 * 
	 *  Accepts input and ensures that string submitted is 0 or 1
	 *  i.e. no letter characters. nothing other than 0 or 1
	 *	it will automatically filters it out all non-numeric characters that aren't 0 or 1
	 **/	
	 
	public function prepareInput() {
		//Treat and prepare the string so its a binary 1 or 0 input only
		$this->binary_input = str_replace(" ", "", $this->binary_input); // remove spaces;
        
        $this->binary_input = preg_replace("/[^0-1]/", "", $this->binary_input);
				
		return $this->binary_input;
    }	

	/**
	 * Create the array path/data so we can determine the final state
	 * 
	 **/
	 
	private function createPathArray() {
		/**
		 * Break the entire string into an array
		 * so we can iterate through it
		 **/

		$inputs = str_split($this->binary_input); 

		foreach($inputs as $input) {
			// Transition and add to the state_path
            $this->transition($input);	
            
            //Add this to state path array so we can use this later in final answer
            array_push($this->state_path, "S{$this->current_state} = {$this->current_state}");

			// Stop if the flag is set
			if($this->stop_flag) {
				if($this::STATES[$this->current_state] == 1) {
					break;
				}
			}
		
        }

        return $this->state_path;
	}

	/**
	 * Prepare the the final answer
	 * 
	 * This method will put together the logic to find the final state/result
	 **/

	public function processFinalState() {
        $this->setState(0);
        
        $this->prepareInput();
        
        $this->createPathArray();

		//In BPI's machine all states are final, as noted in questiom
		$this->final_state = $this->state_path[max(array_keys($this->state_path))];
		return $this->final_state;
    }

	/**
	 * Prepare the output display
	 * 
	 * Outputs a sample display/view to BPI of the final state and the transitions tables.
	 * This will returned back to angular client to be displayed
	 **/

	public function createOutput() {
		$output = "\n";
		$output .= "DETAILS for {$this->name}\n";
		$output .= "--------------------------\n";
		$output .= "1.) Input => {$this->binary_input}\n";
		$output .= "2.) Table => State transitions is as follows\n";
        $output .= "(C=Current state, I=Input, R=Result state)\n";		
        $output .= "C | I | R \n";
		foreach ($this::STATES as $state_num => $state_value) {
			$next_state[0] = $this::TRANSITIONS[$state_num][0][0];
			$next_state[1] = $this::TRANSITIONS[$state_num][1][0];

			$output .= "S{$state_num} | 0 | S{$next_state[0]}\n";
			$output .= "S{$state_num} | 1 | S{$next_state[1]}\n";
		}

		$output .= "\n";

		if($this->final_state){ 
			//echo  "\n\n";
			$output .= "3.) Solution => Output for state {$this->final_state}";
		} else {
			$output .= "Error/Invalid";
		}
		
		return $output;
	}
}
	
?>