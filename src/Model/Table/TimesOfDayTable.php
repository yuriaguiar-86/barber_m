<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TimesOfDay Model
 *
 * @method \App\Model\Entity\TimesOfDay get($primaryKey, $options = [])
 * @method \App\Model\Entity\TimesOfDay newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TimesOfDay[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TimesOfDay|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TimesOfDay saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TimesOfDay patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TimesOfDay[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TimesOfDay findOrCreate($search, callable $callback = null, $options = [])
 */
class TimesOfDayTable extends Table
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

        $this->setTable('times_of_day');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
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
            ->integer('time')
            ->requirePresence('time', 'create')
            ->notEmptyString('time');

        return $validator;
    }
}
