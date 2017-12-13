<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ResetFixture
 *
 */
class ResetFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'reset';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'patron_number' => ['type' => 'integer', 'length' => 255, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'uuid' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['patron_number', 'uuid'], 'length' => []],
            'reset_ibfk_1' => ['type' => 'foreign', 'columns' => ['patron_number'], 'references' => ['patron', 'number'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
            'patron_number' => 1,
            'uuid' => '591b3bda-c0b3-41b7-afd4-1721f65f77a4'
        ],
    ];
}
