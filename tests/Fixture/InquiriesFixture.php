<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * InquiriesFixture
 *
 */
class InquiriesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'patron_number' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'photos_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'reason_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'already' => ['type' => 'boolean', 'length' => null, 'null' => true, 'default' => '0', 'comment' => '', 'precision' => null],
        'created' => ['type' => 'timestamp', 'length' => null, 'null' => false, 'default' => 'CURRENT_TIMESTAMP', 'comment' => '', 'precision' => null],
        '_indexes' => [
            'parents_number' => ['type' => 'index', 'columns' => ['patron_number'], 'length' => []],
            'inquiries_ibfk_2' => ['type' => 'index', 'columns' => ['photos_id'], 'length' => []],
            'reason_id' => ['type' => 'index', 'columns' => ['reason_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'inquiries_ibfk_4' => ['type' => 'foreign', 'columns' => ['reason_id'], 'references' => ['reason', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'inquiries_ibfk_2' => ['type' => 'foreign', 'columns' => ['photos_id'], 'references' => ['photos', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'inquiries_ibfk_3' => ['type' => 'foreign', 'columns' => ['patron_number'], 'references' => ['patron', 'number'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'latin1_swedish_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'patron_number' => 1,
            'photos_id' => 1,
            'reason_id' => 1,
            'already' => 1,
            'created' => 1510547553
        ],
    ];
}
