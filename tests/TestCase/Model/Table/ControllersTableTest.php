<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ControllersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ControllersTable Test Case
 */
class ControllersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ControllersTable
     */
    public $Controllers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Controllers',
        'app.Actions',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Controllers') ? [] : ['className' => ControllersTable::class];
        $this->Controllers = TableRegistry::getTableLocator()->get('Controllers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Controllers);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
