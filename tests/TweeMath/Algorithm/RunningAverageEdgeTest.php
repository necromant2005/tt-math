<?php
namespace TweeMath\Algorithm;
use PHPUnit_Framework_TestCase;

class RunningAverageEdgeTest extends PHPUnit_Framework_TestCase
{
    public function testFitWindow()
    {
        $input = array(0 => 0, 1 => 2, 3 => 3, 4 => 5, 5 => 3, 6 => 1);
        $output = array(0 =>0, 1 => 1,  4 => 4, 6 => 2);
        $this->assertEquals($output, RunningAverageEdge::apply($input, 2));
        $this->assertEquals(array(0, 1, 4, 6), array_keys(RunningAverageEdge::apply($input, 2)));
    }

    public function testNotFitWindow()
    {
        $input = array(0 => 0, 1 => 2, 3 => 3, 4 => 5, 5 => 3);
        $output = array(0 => 0, 1 => 1,  4 => 4, 5 => 3);
        $this->assertEquals($output, RunningAverageEdge::apply($input, 2));
        $this->assertEquals(array(0, 1, 4, 5), array_keys(RunningAverageEdge::apply($input, 2)));
    }

    public function testNotFitWindow3Elements()
    {
        $input = array(0 => 0, 1 => 2, 3 => 1, 4 => 5, 5 => 3);
        $output = array(0 => 0, 3 => 1, 5 => 4);
        $this->assertEquals($output, RunningAverageEdge::apply($input, 3));
        $this->assertEquals(array(0, 1, 4, 5), array_keys(RunningAverageEdge::apply($input, 2)));
    }
}