<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\JobListingsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\JobListingsTable Test Case
 */
class JobListingsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\JobListingsTable
     */
    protected $JobListings;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.JobListings',
        'app.Designations',
        'app.Applicants',
        'app.Stages',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('JobListings') ? [] : ['className' => JobListingsTable::class];
        $this->JobListings = $this->getTableLocator()->get('JobListings', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->JobListings);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\JobListingsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\JobListingsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
