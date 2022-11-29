<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Controllers Model
 *
 * @property \App\Model\Table\ActionsTable&\Cake\ORM\Association\HasMany $Actions
 *
 * @method \App\Model\Entity\Controller get($primaryKey, $options = [])
 * @method \App\Model\Entity\Controller newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Controller[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Controller|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Controller saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Controller patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Controller[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Controller findOrCreate($search, callable $callback = null, $options = [])
 */
class ControllersTable extends Table {
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);

        $this->setTable('controllers');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Actions', [
            'foreignKey' => 'controller_id',
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

        $validator
            ->scalar('surname')
            ->maxLength('surname', 220)
            ->requirePresence('surname', 'create')
            ->notEmptyString('surname', 'O campo apelido é obrigatório!');

        $validator
            ->scalar('description')
            ->allowEmptyString('description');

        return $validator;
    }
}
