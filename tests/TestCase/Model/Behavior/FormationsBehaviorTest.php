<?php
namespace App\Test\TestCase\Model\Behavior;

use App\Model\Behavior\FormationsBehavior;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Behavior\FormationsBehavior Test Case
 */
class FormationsBehaviorTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Behavior\FormationsBehavior
     */
    public $Formations;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->Formations = new FormationsBehavior();
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Formations);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
