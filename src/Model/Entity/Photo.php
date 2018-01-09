<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Photo Entity
 *
 * @property int $id
 * @property string $path
 * @property int $events_id
 * @property bool $gathered
 * @property bool $deleted
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $uploaded
 * @property bool $authentication_image
 *
 * @property \App\Model\Entity\Event $event
 */
class Photo extends Entity
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
        'path' => true,
        'events_id' => true,
        'gathered' => true,
        'deleted' => true,
        'created' => true,
        'uploaded' => true,
        'authentication_image' => true,
        'event' => true
    ];
}
