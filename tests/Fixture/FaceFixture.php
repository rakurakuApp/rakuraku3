<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * FaceFixture
 *
 */
class FaceFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'face';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'string', 'length' => 100, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'children_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'photos_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'children_id' => ['type' => 'index', 'columns' => ['children_id'], 'length' => []],
            'photos_id' => ['type' => 'index', 'columns' => ['photos_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'face_ibfk_2' => ['type' => 'foreign', 'columns' => ['photos_id'], 'references' => ['photos', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'face_ibfk_1' => ['type' => 'foreign', 'columns' => ['children_id'], 'references' => ['children', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
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
            'id' => '57408c7a-3932-459a-b579-39ea775db9a1',
            'children_id' => 1,
            'photos_id' => 1
        ],
    ];
}
