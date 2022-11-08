<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DaysOfWeekTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DaysOfWeekTable Test Case
 */
class DaysOfWeekTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DaysOfWeekTable
     */
    public $DaysOfWeek;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.DaysOfWeek',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('DaysOfWeek') ? [] : ['className' => DaysOfWeekTable::class];
        $this->DaysOfWeek = TableRegistry::getTableLocator()->get('DaysOfWeek', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DaysOfWeek);

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
