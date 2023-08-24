<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EmergencyContactsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EmergencyContactsTable Test Case
 */
class EmergencyContactsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\EmergencyContactsTable
     */
    protected $EmergencyContacts;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.EmergencyContacts',
        'app.Employees',
        'app.Relationships',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('EmergencyContacts') ? [] : ['className' => EmergencyContactsTable::class];
        $this->EmergencyContacts = $this->getTableLocator()->get('EmergencyContacts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->EmergencyContacts);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\EmergencyContactsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\EmergencyContactsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
