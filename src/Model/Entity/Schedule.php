<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Schedule Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $employee_id
 * @property int $days_of_work_id
 * @property int $types_of_payment_id
 * @property int|null $finished
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\DaysOfWork $days_of_work
 * @property \App\Model\Entity\TypesOfPayment $types_of_payment
 * @property \App\Model\Entity\TypesOfService[] $types_of_services
 */
class Schedule extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'user_id' => true,
        'employee_id' => true,
        'days_of_work_id' => true,
        'types_of_payment_id' => true,
        'finished' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'days_of_work' => true,
        'types_of_payment' => true,
        'types_of_services' => true,
        'date' => true,
        'time' => true
    ];
}
