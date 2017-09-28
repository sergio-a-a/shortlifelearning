<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LanguesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LanguesTable Test Case
 */
class LanguesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\LanguesTable
     */
    public $Langues;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.langues',
        'app.employes',
        'app.civilites',
        'app.immeubles',
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
        $config = TableRegistry::exists('Langues') ? [] : ['className' => LanguesTable::class];
        $this->Langues = TableRegistry::get('Langues', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Langues);

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
