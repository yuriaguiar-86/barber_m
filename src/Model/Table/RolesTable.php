<?php
namespace App\Model\Table;

use App\Controller\TypeRoleENUM;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Roles Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\HasMany $Users
 * @property \App\Model\Table\ActionsTable&\Cake\ORM\Association\BelongsToMany $Actions
 *
 * @method \App\Model\Entity\Role get($primaryKey, $options = [])
 * @method \App\Model\Entity\Role newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Role[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Role|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Role saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Role patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Role[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Role findOrCreate($search, callable $callback = null, $options = [])
 */
class RolesTable extends Table {
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);

        $this->setTable('roles');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Users', [
            'foreignKey' => 'role_id',
        ]);
        $this->belongsToMany('Actions', [
            'foreignKey' => 'role_id',
            'targetForeignKey' => 'action_id',
            'joinTable' => 'actions_roles',
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
            ->requirePresence('type', 'create')
            ->notEmptyString('type', 'O campo tipo de acesso é obrigatório!');

        $validator
            ->scalar('description')
            ->allowEmptyString('description');

        return $validator;
    }

    public function getRolesCreated() {
        return $this->find('list', ['valueField' => 'type'])->select(['type'])->distinct()->where([
            'type !=' => TypeRoleENUM::OTHERS
        ])->toList();
    }
}
