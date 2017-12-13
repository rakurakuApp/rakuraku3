<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Child Entity
 *
 * @property int $id
 * @property int $patron_number
 * @property string $username
 * @property int $age
 * @property int $child_class_id
 * @property bool $graduated
 * @property bool $deleted
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\ChildClas $child_clas
 */
class Child extends Entity
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
        'age' => true,
        'child_class_id' => true,
        'graduated' => true,
        'deleted' => true,
        'created' => true,
        'modified' => true,
        'child_clas' => true
    ];
}
