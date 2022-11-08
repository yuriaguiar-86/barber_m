<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TypesOfServicesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TypesOfServicesTable Test Case
 */
class TypesOfServicesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TypesOfServicesTable
     */
    public $TypesOfServices;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.TypesOfServices',
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
        $config = TableRegistry::getTableLocator()->exists('TypesOfServices') ? [] : ['className' => TypesOfServicesTable::class];
        $this->TypesOfServices = TableRegistry::getTableLocator()->get('TypesOfServices', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TypesOfServices);

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
