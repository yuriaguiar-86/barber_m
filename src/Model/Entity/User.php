<?php
namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string|null $reset_password
 * @property string $name
 * @property string $email
 * @property string $personal_phone
 * @property string|null $other_phone
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property int $role_id
 *
 * @property \App\Model\Entity\Role $role
 * @property \App\Model\Entity\Schedule[] $schedules
 * @property \App\Model\Entity\DaysTime[] $days_times
 */
class User extends Entity
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
        'username' => true,
        'password' => true,
        'reset_password' => true,
        'name' => true,
        'email' => true,
        'personal_phone' => true,
        'other_phone' => true,
        'created' => true,
        'modified' => true,
        'role_id' => true,
        'role' => true,
        'schedules' => true,
        'opening_hours' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password',
    ];

    protected function _setPassword($password) {
        if($password > 0){
            return (new DefaultPasswordHasher())->hash($password);
        }
    }
}
