<?php
namespace App\Model\Table;

use App\Controller\FinishedENUM;
use App\Controller\TypeRoleENUM;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \App\Model\Table\RolesTable&\Cake\ORM\Association\BelongsTo $Roles
 * @property \App\Model\Table\SchedulesTable&\Cake\ORM\Association\HasMany $Schedules
 * @property \App\Model\Table\DaysTimesTable&\Cake\ORM\Association\BelongsToMany $DaysTimes
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table {
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);

        $this->setTable('users');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Roles', [
            'foreignKey' => 'role_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Schedules', [
            'foreignKey' => 'user_id',
        ]);
        $this->belongsToMany('OpeningHours', [
            'foreignKey' => 'user_id',
            'targetForeignKey' => 'opening_hour_id',
            'joinTable' => 'users_opening_hours',
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
            ->scalar('username')
            ->maxLength('username', 220)
            ->requirePresence('username', 'create')
            ->notEmptyString('username', 'O campo usu??rio ?? obrigat??rio!')
            ->add('username', 'unique', [
                'rule' => 'validateUnique',
                'provider' => 'table',
                'message' => 'Este usu??rio j?? est?? sendo utilizado!'
            ]);

        $validator
            ->scalar('password')
            ->maxLength('password', 180)
            ->requirePresence('password', 'create')
            ->notEmptyString('password', 'O campo senha ?? obrigat??rio!')
            ->add('password', [
                'length' => [
                    'rule' => ['minLength', 6],
                    'message' => 'A senha deve conter no m??nimo 06 caracteres!',
                ]
            ]);

        $validator
            ->scalar('reset_password')
            ->maxLength('reset_password', 180)
            ->allowEmptyString('reset_password');

        $validator
            ->scalar('name')
            ->maxLength('name', 220)
            ->requirePresence('name', 'create')
            ->notEmptyString('name', 'O campo nome ?? obrigat??rio!');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email', 'O campo e-mail ?? obrigat??rio!');

        $validator
            ->scalar('personal_phone')
            ->maxLength('personal_phone', 15)
            ->requirePresence('personal_phone', 'create')
            ->notEmptyString('personal_phone', 'O campo telefone ?? obrigat??rio!');

        $validator
            ->scalar('other_phone')
            ->maxLength('other_phone', 15)
            ->allowEmptyString('other_phone');

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
        $rules->add($rules->isUnique(['username']));
        $rules->add($rules->isUnique(['email'], 'Este e-mail j?? foi cadastrado!'));
        $rules->add($rules->existsIn(['role_id'], 'Roles'));

        return $rules;
    }

    public function findAuth($query, array $options) {
        return $query->contain(['Roles' => ['Actions' => 'Controllers']]);
    }

    public function getUserData($user_id) {
        return $this->find()->select(['id', 'name', 'email'])->where(['Users.id' => $user_id])->first();
    }

    public function getForgetPassword($email) {
        return $this->find()->select(['id', 'username', 'name', 'email', 'reset_password'])->where([
            'Users.email' => $email
        ])->first();
    }

    public function getUpdatePassword($token) {
        return $this->find()->select(['id'])->where([
            'Users.reset_password' => $token
        ])->first();
    }

    public function usersSchedulesInsideDate($day_free) {
        return $this->find('all')
            ->innerJoin('schedules', 'schedules.user_id = Users.id')
            ->where(['schedules.date' => $day_free])
            ->toList();
    }

    public function getUsersEmployees() {
        return $this->find('all')->where([
            'Users.role_id' => TypeRoleENUM::EMPLOYEE
        ])->toList();
    }
}
