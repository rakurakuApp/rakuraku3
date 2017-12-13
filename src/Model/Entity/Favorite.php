<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Favorite Entity
 *
 * @property int $id
 * @property int $photos_id
 * @property int $patron_number
 * @property \Cake\I18n\FrozenTime $favorite_date
 *
 * @property \App\Model\Entity\Photo $photo
 */
class Favorite extends Entity
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
        'photos_id' => true,
        'patron_number' => true,
        'favorite_date' => true,
        'photo' => true
    ];
}
