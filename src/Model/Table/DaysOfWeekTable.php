<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DaysOfWeek Model
 *
 * @method \App\Model\Entity\DaysOfWeek get($primaryKey, $options = [])
 * @method \App\Model\Entity\DaysOfWeek newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\DaysOfWeek[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DaysOfWeek|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DaysOfWeek saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DaysOfWeek patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DaysOfWeek[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\DaysOfWeek findOrCreate($search, callable $callback = null, $options = [])
 */
class DaysOfWeekTable extends Table {
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);

        $this->setTable('days_of_week');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsToMany('TimesOfDay', [
            'foreignKey' => 'day_of_week_id',
            'targetForeignKey' => 'time_of_day_id',
            'joinTable' => 'days_times',
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
            ->scalar('name')
            ->maxLength('name', 220)
            ->requirePresence('name', 'create')
            ->notEmptyString('name', 'O campo nome é obrigatório!');

        return $validator;
    }
}
