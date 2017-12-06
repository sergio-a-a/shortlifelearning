<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DebutRappelsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DebutRappelsTable Test Case
 */
class DebutRappelsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DebutRappelsTable
     */
    public $DebutRappels;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.debut_rappels'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('DebutRappels') ? [] : ['className' => DebutRappelsTable::class];
        $this->DebutRappels = TableRegistry::get('DebutRappels', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DebutRappels);

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
