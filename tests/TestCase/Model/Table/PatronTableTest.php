<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PatronTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PatronTable Test Case
 */
class PatronTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PatronTable
     */
    public $Patron;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.patron',
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
        $config = TableRegistry::exists('Patron') ? [] : ['className' => PatronTable::class];
        $this->Patron = TableRegistry::get('Patron', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Patron);

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

    /**
     * Test findAuth method
     *
     * @return void
     */
    public function testFindAuth()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
