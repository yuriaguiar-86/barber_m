<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * OpeningHour Entity
 *
 * @property int $id
 * @property int $time_of_week
 *
 * @property \App\Model\Entity\DaysTime[] $days_times
 */
class OpeningHour extends Entity
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
        'time_of_week' => true,
        'days_times' => true,
    ];
}
