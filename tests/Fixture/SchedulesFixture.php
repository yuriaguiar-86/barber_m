<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SchedulesFixture
 */
class SchedulesFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'user_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'employee_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'days_of_work_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'types_of_payment_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'finished' => ['type' => 'tinyinteger', 'length' => 4, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_schedules_has_types_of_services_users1_idx' => ['type' => 'index', 'columns' => ['user_id'], 'length' => []],
            'fk_schedules_has_types_of_services_users2_idx' => ['type' => 'index', 'columns' => ['employee_id'], 'length' => []],
            'fk_schedules_types_of_payments1_idx' => ['type' => 'index', 'columns' => ['types_of_payment_id'], 'length' => []],
            'fk_schedules_days_of_work1_idx' => ['type' => 'index', 'columns' => ['days_of_work_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_schedules_days_of_work1' => ['type' => 'foreign', 'columns' => ['days_of_work_id'], 'references' => ['days_of_work', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_schedules_has_types_of_services_users1' => ['type' => 'foreign', 'columns' => ['user_id'], 'references' => ['users', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_schedules_has_types_of_services_users2' => ['type' => 'foreign', 'columns' => ['employee_id'], 'references' => ['users', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_schedules_types_of_payments1' => ['type' => 'foreign', 'columns' => ['types_of_payment_id'], 'references' => ['types_of_payments', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_swedish_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd
    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'id' => 1,
                'user_id' => 1,
                'employee_id' => 1,
                'days_of_work_id' => 1,
                'types_of_payment_id' => 1,
                'finished' => 1,
                'created' => '2022-11-08 14:58:21',
                'modified' => '2022-11-08 14:58:21',
            ],
        ];
        parent::init();
    }
}
