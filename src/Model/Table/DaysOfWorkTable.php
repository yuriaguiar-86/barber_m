<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DaysOfWork Model
 *
 * @property \App\Model\Table\SchedulesTable&\Cake\ORM\Association\HasMany $Schedules
 *
 * @method \App\Model\Entity\DaysOfWork get($primaryKey, $options = [])
 * @method \App\Model\Entity\DaysOfWork newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\DaysOfWork[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DaysOfWork|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DaysOfWork saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DaysOfWork patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DaysOfWork[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\DaysOfWork findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DaysOfWorkTable extends Table {
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);

        $this->setTable('days_of_work');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Schedules', [
            'foreignKey' => 'days_of_work_id',
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
            ->date('not_work')
            ->requirePresence('not_work', 'create')
            ->notEmptyDate('not_work', 'O campo data é obrigatório!');

        $validator
            ->scalar('description')
            ->requirePresence('description', 'create')
            ->notEmptyString('description', 'O campo descrição é obrigatório!');

        return $validator;
    }
}
