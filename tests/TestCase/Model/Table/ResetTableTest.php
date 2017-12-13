<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ResetTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ResetTable Test Case
 */
class ResetTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ResetTable
     */
    public $Reset;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.reset'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Reset') ? [] : ['className' => ResetTable::class];
        $this->Reset = TableRegistry::get('Reset', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Reset);

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
}
