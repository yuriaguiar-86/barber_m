<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DaysOfWorkTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DaysOfWorkTable Test Case
 */
class DaysOfWorkTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DaysOfWorkTable
     */
    public $DaysOfWork;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.DaysOfWork',
        'app.Schedules',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('DaysOfWork') ? [] : ['className' => DaysOfWorkTable::class];
        $this->DaysOfWork = TableRegistry::getTableLocator()->get('DaysOfWork', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DaysOfWork);

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
