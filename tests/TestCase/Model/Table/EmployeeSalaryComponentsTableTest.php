<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EmployeeSalaryComponentsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EmployeeSalaryComponentsTable Test Case
 */
class EmployeeSalaryComponentsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\EmployeeSalaryComponentsTable
     */
    protected $EmployeeSalaryComponents;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.EmployeeSalaryComponents',
        'app.Employees',
        'app.SalaryComponents',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('EmployeeSalaryComponents') ? [] : ['className' => EmployeeSalaryComponentsTable::class];
        $this->EmployeeSalaryComponents = $this->getTableLocator()->get('EmployeeSalaryComponents', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->EmployeeSalaryComponents);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\EmployeeSalaryComponentsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\EmployeeSalaryComponentsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
