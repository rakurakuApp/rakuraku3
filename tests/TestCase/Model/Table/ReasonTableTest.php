<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ReasonTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ReasonTable Test Case
 */
class ReasonTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ReasonTable
     */
    public $Reason;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.reason',
        'app.inquiries',
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
        $config = TableRegistry::exists('Reason') ? [] : ['className' => ReasonTable::class];
        $this->Reason = TableRegistry::get('Reason', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Reason);

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
