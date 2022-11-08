<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Action Entity
 *
 * @property int $id
 * @property string $action_map
 * @property string $surname
 * @property string|null $description
 * @property int $controller_id
 *
 * @property \App\Model\Entity\Controller $controller
 * @property \App\Model\Entity\Role[] $roles
 */
class Action extends Entity
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
        'action_map' => true,
        'surname' => true,
        'description' => true,
        'controller_id' => true,
        'controller' => true,
        'roles' => true,
    ];
}
