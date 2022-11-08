<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TypesOfServices Model
 *
 * @property \App\Model\Table\SchedulesTable&\Cake\ORM\Association\BelongsToMany $Schedules
 *
 * @method \App\Model\Entity\TypesOfService get($primaryKey, $options = [])
 * @method \App\Model\Entity\TypesOfService newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TypesOfService[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TypesOfService|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TypesOfService saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TypesOfService patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TypesOfService[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TypesOfService findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TypesOfServicesTable extends Table
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

        $this->setTable('types_of_services');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsToMany('Schedules', [
            'foreignKey' => 'types_of_service_id',
            'targetForeignKey' => 'schedule_id',
            'joinTable' => 'types_of_services_schedules',
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
            ->scalar('name')
            ->maxLength('name', 220)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->numeric('price')
            ->requirePresence('price', 'create')
            ->notEmptyString('price');

        $validator
            ->scalar('description')
            ->allowEmptyString('description');

        return $validator;
    }
}
