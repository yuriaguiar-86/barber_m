<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * UsersOpeningHours Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\OpeningHoursTable&\Cake\ORM\Association\BelongsTo $OpeningHours
 *
 * @method \App\Model\Entity\UsersOpeningHour get($primaryKey, $options = [])
 * @method \App\Model\Entity\UsersOpeningHour newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\UsersOpeningHour[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\UsersOpeningHour|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UsersOpeningHour saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UsersOpeningHour patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\UsersOpeningHour[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\UsersOpeningHour findOrCreate($search, callable $callback = null, $options = [])
 */
class UsersOpeningHoursTable extends Table
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

        $this->setTable('users_opening_hours');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('OpeningHours', [
            'foreignKey' => 'opening_hour_id',
            'joinType' => 'INNER',
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

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['opening_hour_id'], 'OpeningHours'));

        return $rules;
    }
}
