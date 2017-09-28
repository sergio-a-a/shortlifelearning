<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PostesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PostesTable Test Case
 */
class PostesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PostesTable
     */
    public $Postes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.postes',
        'app.employes',
        'app.civilites',
        'app.langues',
        'app.immeubles'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Postes') ? [] : ['className' => PostesTable::class];
        $this->Postes = TableRegistry::get('Postes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Postes);

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
