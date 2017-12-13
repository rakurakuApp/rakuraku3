<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Patron Entity
 *
 * @property int $number
 * @property string $id
 * @property string $password
 * @property string $username
 * @property string $email
 * @property bool $graduated
 * @property bool $deleted
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Child[] $children
 */
class Patron extends Entity
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
        'id' => true,
        'password' => true,
        'username' => true,
        'email' => true,
        'graduated' => true,
        'deleted' => true,
        'created' => true,
        'modified' => true,
        'children' => true
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];
}
