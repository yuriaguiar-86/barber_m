<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DaysTimesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DaysTimesTable Test Case
 */
class DaysTimesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DaysTimesTable
     */
    public $DaysTimes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.DaysTimes',
        'app.OpeningHours',
        'app.Users',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('DaysTimes') ? [] : ['className' => DaysTimesTable::class];
        $this->DaysTimes = TableRegistry::getTableLocator()->get('DaysTimes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DaysTimes);

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
