<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FaceTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FaceTable Test Case
 */
class FaceTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FaceTable
     */
    public $Face;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.face',
        'app.children',
        'app.child_class',
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
        $config = TableRegistry::exists('Face') ? [] : ['className' => FaceTable::class];
        $this->Face = TableRegistry::get('Face', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Face);

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
