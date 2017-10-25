<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StatussTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StatussTable Test Case
 */
class StatussTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\StatussTable
     */
    public $Statuss;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.statuss'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Statuss') ? [] : ['className' => StatussTable::class];
        $this->Statuss = TableRegistry::get('Statuss', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Statuss);

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
