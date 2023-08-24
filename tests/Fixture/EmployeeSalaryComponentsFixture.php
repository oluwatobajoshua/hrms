<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * EmployeeSalaryComponentsFixture
 */
class EmployeeSalaryComponentsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'employee_id' => 1,
                'salary_component_id' => 1,
                'created' => '2023-08-20 21:33:32',
                'modified' => '2023-08-20 21:33:32',
            ],
        ];
        parent::init();
    }
}
