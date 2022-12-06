<?php
namespace App\Model\Table;

use App\Controller\FinishedENUM;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TypesOfPayments Model
 *
 * @property \App\Model\Table\SchedulesTable&\Cake\ORM\Association\HasMany $Schedules
 *
 * @method \App\Model\Entity\TypesOfPayment get($primaryKey, $options = [])
 * @method \App\Model\Entity\TypesOfPayment newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TypesOfPayment[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TypesOfPayment|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TypesOfPayment saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TypesOfPayment patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TypesOfPayment[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TypesOfPayment findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TypesOfPaymentsTable extends Table {
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);

        $this->setTable('types_of_payments');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Schedules', [
            'foreignKey' => 'types_of_payment_id',
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
            ->scalar('description')
            ->allowEmptyString('description');

        return $validator;
    }

    public function sumPaymentsRealize() {
        $query = $this->find('all')
            ->innerJoin('schedules', 'schedules.types_of_payment_id = TypesOfPayments.id')
            ->innerJoin('types_of_services_schedules', 'types_of_services_schedules.schedule_id = schedules.id')
            ->innerJoin('types_of_services', 'types_of_services.id = types_of_services_schedules.types_of_service_id');

        return $query->select([
            'TypesOfPayments.id', 'TypesOfPayments.name',
            'sum' => $query->func()->sum('types_of_services.price')
        ])->where([
            'schedules.finished' => FinishedENUM::FINISHED
        ])->group('TypesOfPayments.id')->toList();
    }
}
