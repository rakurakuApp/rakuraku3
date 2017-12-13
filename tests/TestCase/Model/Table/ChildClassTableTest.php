<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ChildClassTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ChildClassTable Test Case
 */
class ChildClassTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ChildClassTable
     */
    public $ChildClass;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
        $config = TableRegistry::exists('ChildClass') ? [] : ['className' => ChildClassTable::class];
        $this->ChildClass = TableRegistry::get('ChildClass', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ChildClass);

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
