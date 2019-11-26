<?php
declare(strict_types=1);

require "./src/FiniteStateMachine.class.php";

use PHPUnit\Framework\TestCase;

final class FiniteStateMachineTest extends TestCase
{

    protected $state_machine;
    /**
     * FiniteStateMachine class instance
     *
     */

    /**
     *  setUp
     *
     * @test
     * @return void
     */
    public function setUp()
    {
        $this->state_machine = new FiniteStateMachine('BPI TestCase App');
    }

    /**
     *  testGetStateZero
     *
     * @test
     * @return void
     */
    public function testGetStateZero()
    {
        $this->state_machine->setState(0);

        $this->assertEquals("0", $this->state_machine->getState());
    }

    /**
     * testGetStateOne
     *
     * @test
     * @return void
     */
    public function testGetStateOne()
    {
        $this->state_machine->setState(1);

        $this->assertEquals("1", $this->state_machine->getState());
    }

    /**
     * testPrepareInputSpaces
     *
     * @test
     * @return void
     */
    public function testPrepareInputSpaces()
    {
        $this->state_machine->binary_input = "1 0 1";

        $this->assertEquals("101", $this->state_machine->prepareInput());
    }

    /**
     * testPrepareInputWithNoZeroOne
     *
     * @test
     * @return void
     */
    public function testPrepareInputWithNoZeroOne()
    {
        $this->state_machine->binary_input = "12021";

        $this->assertEquals("101", $this->state_machine->prepareInput());
    }

    /**
     * testPrepareInputWithNonNumber
     *
     * @test
     * @return void
     */
    public function testPrepareInputWithNonNumber()
    {
        $this->state_machine->binary_input = "12A02B1@Q";

        $this->assertEquals("101", $this->state_machine->prepareInput());
    }

    /**
     * testCreatePathArray
     *
     * @test
     * @return void
     */
    /*public function testCreatePathArray()
    {
        $this->state_machine->binary_input = "110";

        $this->state_machine->setState(0);

        $this->state_machine->prepareInput();

        $this->assertEquals(["S1 = 1", "S0 = 0", "S0 = 0"], $this->state_machine->createPathArray());
    }*/

    /**
     * testProcessFinalStateCase1
     *
     * @test
     * @return void
     */
    public function testProcessFinalStateCase1()
    {
        $this->state_machine->binary_input = "110";

        $this->assertEquals("S0 = 0", $this->state_machine->processFinalState());
    }

    /**
     * testProcessFinalStateCase2
     *
     * @test
     * @return void
     */
    public function testProcessFinalStateCase2()
    {
        $this->state_machine->binary_input = "1010";

        $this->assertEquals("S1 = 1", $this->state_machine->processFinalState());
    }

    /**
     * testProcessFinalStateCase3
     *
     * @test
     * @return void
     */
    public function testProcessFinalStateCase3()
    {
        $this->state_machine->binary_input = "1011";

        $this->assertEquals("S2 = 2", $this->state_machine->processFinalState());
    }

    //If we need to Test private/protected methods
    public function invokeMethod(&$object, $methodName, array $parameters = array())
    {
        $reflection = new \ReflectionClass(get_class($object));
        $method = $reflection->getMethod($methodName);
        $method->setAccessible(true);
    
        return $method->invokeArgs($object, $parameters);
    }

}
