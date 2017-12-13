<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * FavoriteFixture
 *
 */
class FavoriteFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'favorite';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'photos_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'patron_number' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'favorite_date' => ['type' => 'timestamp', 'length' => null, 'null' => false, 'default' => 'CURRENT_TIMESTAMP', 'comment' => '', 'precision' => null],
        '_indexes' => [
            'patron_number' => ['type' => 'index', 'columns' => ['patron_number'], 'length' => []],
            'photos_id' => ['type' => 'index', 'columns' => ['photos_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'favorite_ibfk_2' => ['type' => 'foreign', 'columns' => ['photos_id'], 'references' => ['photos', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'favorite_ibfk_1' => ['type' => 'foreign', 'columns' => ['patron_number'], 'references' => ['patron', 'number'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
            'id' => 1,
            'photos_id' => 1,
            'patron_number' => 1,
            'favorite_date' => 1510710640
        ],
    ];
}
