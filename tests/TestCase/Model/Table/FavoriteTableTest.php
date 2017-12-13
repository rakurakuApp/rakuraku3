<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FavoriteTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FavoriteTable Test Case
 */
class FavoriteTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FavoriteTable
     */
    public $Favorite;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.favorite',
        'app.photos',
        'app.events'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Favorite') ? [] : ['className' => FavoriteTable::class];
        $this->Favorite = TableRegistry::get('Favorite', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Favorite);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
