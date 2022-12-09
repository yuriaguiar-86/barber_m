<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DaysTimes Model
 *
 * @property \App\Model\Table\OpeningHoursTable&\Cake\ORM\Association\BelongsToMany $OpeningHours
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsToMany $Users
 *
 * @method \App\Model\Entity\DaysTime get($primaryKey, $options = [])
 * @method \App\Model\Entity\DaysTime newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\DaysTime[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DaysTime|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DaysTime saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DaysTime patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DaysTime[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\DaysTime findOrCreate($search, callable $callback = null, $options = [])
 */
class DaysTimesTable extends Table {
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);

        $this->setTable('days_times');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsToMany('OpeningHours', [
            'foreignKey' => 'days_time_id',
            'targetForeignKey' => 'opening_hour_id',
            'joinTable' => 'days_times_opening_hours',
        ]);
        $this->belongsToMany('Users', [
            'foreignKey' => 'days_time_id',
            'targetForeignKey' => 'user_id',
            'joinTable' => 'users_days_times',
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
            ->requirePresence('day_of_week', 'create')
            ->notEmptyString('day_of_week', 'O campo dia é obrigatório!');

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
        $rules->add($rules->isUnique(['day_of_week'], 'Dia da semana já foi cadastrado!'));
        return $rules;
    }

    public function getDaysCreated() {
        return $this->find('list', ['valueField' => 'day_of_week'])
            ->select(['day_of_week'])->distinct()->toList();
    }
}
