<?php
namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\SpreadsheetComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\SpreadsheetComponent Test Case
 */
class SpreadsheetComponentTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Controller\Component\SpreadsheetComponent
     */
    public $Spreadsheet;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->Spreadsheet = new SpreadsheetComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Spreadsheet);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
