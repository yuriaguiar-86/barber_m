<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DaysTime Entity
 *
 * @property int $id
 * @property int $day_of_week
 *
 * @property \App\Model\Entity\OpeningHour[] $opening_hours
 * @property \App\Model\Entity\User[] $users
 */
class DaysTime extends Entity
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
        'day_of_week' => true,
        'opening_hours' => true,
        'users' => true,
    ];
}
