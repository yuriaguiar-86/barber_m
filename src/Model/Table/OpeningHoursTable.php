<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * OpeningHours Model
 *
 * @property \App\Model\Table\DaysTimesTable&\Cake\ORM\Association\BelongsToMany $DaysTimes
 *
 * @method \App\Model\Entity\OpeningHour get($primaryKey, $options = [])
 * @method \App\Model\Entity\OpeningHour newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\OpeningHour[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\OpeningHour|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OpeningHour saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OpeningHour patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\OpeningHour[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\OpeningHour findOrCreate($search, callable $callback = null, $options = [])
 */
class OpeningHoursTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('opening_hours');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsToMany('DaysTimes', [
            'foreignKey' => 'opening_hour_id',
            'targetForeignKey' => 'days_time_id',
            'joinTable' => 'days_times_opening_hours',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->integer('time_of_week')
            ->requirePresence('time_of_week', 'create')
            ->notEmptyString('time_of_week');

        return $validator;
    }
}
