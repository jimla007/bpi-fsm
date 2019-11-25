<?php	
    /**
     * Finite State Automata Server Side Processing in PHP
     * 
     * @author Jimmy La
     * @date November 22, 2019
     **/

    require('src/FiniteStateMachine.class.php');
 
    $postdata = file_get_contents("php://input");
    $request = json_decode($postdata);
    @$input = $request->params->input; 

    $state_machine = new FiniteStateMachine('BPI Test App');
    
    $state_machine->binary_input = "$input";

    $state_machine->processFinalState();
    
    
    /**
     * Get the final answer and transitions table response to be displayed in angular client
     **/

    $output = $state_machine->createOutput();	

    $json_array = json_encode(['data' => $output]);
    
    echo $json_array;
?>
