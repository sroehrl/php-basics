<?php


use Controllers\Advanced;
use PHPUnit\Framework\TestCase;

class AdvancedTest extends TestCase
{

    public function testConstruct()
    {
        $instance = new Advanced();
        // is view set & a string?
        $this->assertIsString($instance->view, '"view" is not a string');
        $this->assertIsArray($instance->topics);
    }
    public function testGetTopics()
    {
        $instance = new Advanced();
        $this->assertIsArray($instance->topics);
        $this->assertArrayHasKey(0,$instance->topics);
        $this->assertIsString($instance->topics[0], 'Topics should be strings');
    }

}
