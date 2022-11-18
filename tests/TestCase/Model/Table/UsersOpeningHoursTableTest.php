<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UsersOpeningHoursTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UsersOpeningHoursTable Test Case
 */
class UsersOpeningHoursTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\UsersOpeningHoursTable
     */
    public $UsersOpeningHours;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.UsersOpeningHours',
        'app.Users',
        'app.OpeningHours',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('UsersOpeningHours') ? [] : ['className' => UsersOpeningHoursTable::class];
        $this->UsersOpeningHours = TableRegistry::getTableLocator()->get('UsersOpeningHours', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UsersOpeningHours);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
