<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ImmeublesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ImmeublesTable Test Case
 */
class ImmeublesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ImmeublesTable
     */
    public $Immeubles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.immeubles',
        'app.employes',
        'app.civilites',
        'app.langues',
        'app.postes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Immeubles') ? [] : ['className' => ImmeublesTable::class];
        $this->Immeubles = TableRegistry::get('Immeubles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Immeubles);

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
