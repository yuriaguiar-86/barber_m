<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TimesOfDayTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TimesOfDayTable Test Case
 */
class TimesOfDayTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TimesOfDayTable
     */
    public $TimesOfDay;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.TimesOfDay',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('TimesOfDay') ? [] : ['className' => TimesOfDayTable::class];
        $this->TimesOfDay = TableRegistry::getTableLocator()->get('TimesOfDay', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TimesOfDay);

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
