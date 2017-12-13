<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ChildrenTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ChildrenTable Test Case
 */
class ChildrenTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ChildrenTable
     */
    public $Children;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.children',
        'app.child_class'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Children') ? [] : ['className' => ChildrenTable::class];
        $this->Children = TableRegistry::get('Children', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Children);

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
