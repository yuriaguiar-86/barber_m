<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * UsersOpeningHour Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $opening_hour_id
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\OpeningHour $opening_hour
 */
class UsersOpeningHour extends Entity
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
        'opening_hour_id' => true,
        'user' => true,
        'opening_hour' => true,
    ];
}
