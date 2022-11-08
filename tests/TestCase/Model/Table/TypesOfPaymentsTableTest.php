<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TypesOfPaymentsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TypesOfPaymentsTable Test Case
 */
class TypesOfPaymentsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TypesOfPaymentsTable
     */
    public $TypesOfPayments;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.TypesOfPayments',
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
        $config = TableRegistry::getTableLocator()->exists('TypesOfPayments') ? [] : ['className' => TypesOfPaymentsTable::class];
        $this->TypesOfPayments = TableRegistry::getTableLocator()->get('TypesOfPayments', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TypesOfPayments);

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
