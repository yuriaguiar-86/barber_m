<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Schedules Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\DaysOfWorkTable&\Cake\ORM\Association\BelongsTo $DaysOfWork
 * @property \App\Model\Table\TypesOfPaymentsTable&\Cake\ORM\Association\BelongsTo $TypesOfPayments
 * @property \App\Model\Table\TypesOfServicesTable&\Cake\ORM\Association\BelongsToMany $TypesOfServices
 *
 * @method \App\Model\Entity\Schedule get($primaryKey, $options = [])
 * @method \App\Model\Entity\Schedule newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Schedule[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Schedule|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Schedule saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Schedule patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Schedule[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Schedule findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SchedulesTable extends Table {
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);

        $this->setTable('schedules');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'employee_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('DaysOfWork', [
            'foreignKey' => 'days_of_work_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('TypesOfPayments', [
            'foreignKey' => 'types_of_payment_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsToMany('TypesOfServices', [
            'foreignKey' => 'schedule_id',
            'targetForeignKey' => 'types_of_service_id',
            'joinTable' => 'types_of_services_schedules',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator) {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->allowEmptyString('finished');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules) {
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['employee_id'], 'Users'));
        $rules->add($rules->existsIn(['days_of_work_id'], 'DaysOfWork'));
        $rules->add($rules->existsIn(['types_of_payment_id'], 'TypesOfPayments'));

        return $rules;
    }

    public function findTimesRegistered($date, $employee) {
        return $this->find('list', ['valueField' => 'time'])->select('time')->where(['Schedules.date' => $date, 'Schedules.employee_id' => $employee])->toList();
    }
}
