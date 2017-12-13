<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Face Entity
 *
 * @property string $id
 * @property int $children_id
 * @property int $photos_id
 *
 * @property \App\Model\Entity\Child $child
 * @property \App\Model\Entity\Photo $photo
 */
class Face extends Entity
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
        'children_id' => true,
        'photos_id' => true,
        'child' => true,
        'photo' => true
    ];
}
