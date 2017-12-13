<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Inquiry Entity
 *
 * @property int $id
 * @property int $patron_number
 * @property int $photos_id
 * @property int $reason_id
 * @property bool $already
 * @property \Cake\I18n\FrozenTime $created
 *
 * @property \App\Model\Entity\Photo $photo
 * @property \App\Model\Entity\Reason $reason
 */
class Inquiry extends Entity
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
        'patron_number' => true,
        'photos_id' => true,
        'reason_id' => true,
        'already' => true,
        'created' => true,
        'photo' => true,
        'reason' => true
    ];
}
