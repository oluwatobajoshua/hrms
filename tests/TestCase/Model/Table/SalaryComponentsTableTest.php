<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SalaryComponentsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SalaryComponentsTable Test Case
 */
class SalaryComponentsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SalaryComponentsTable
     */
    protected $SalaryComponents;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.SalaryComponents',
        'app.Employees',
        'app.EmployeeSalaryComponents',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('SalaryComponents') ? [] : ['className' => SalaryComponentsTable::class];
        $this->SalaryComponents = $this->getTableLocator()->get('SalaryComponents', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->SalaryComponents);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\SalaryComponentsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\SalaryComponentsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
