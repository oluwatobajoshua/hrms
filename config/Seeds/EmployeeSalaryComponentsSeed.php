<?php
declare(strict_types=1);

use Cake\I18n\FrozenTime;
use Cake\ORM\TableRegistry;
use Migrations\AbstractSeed;

/**
 * EmployeeSalaryComponents seed.
 */
class EmployeeSalaryComponentsSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'employee_id' => 5,
                'salary_component_id' => 1, // Basic Salary
                'created' => FrozenTime::now(),
                'modified' => FrozenTime::now(),
            ],
            [
                'employee_id' => 5,
                'salary_component_id' => 2, // Overtime Pay
                'created' => FrozenTime::now(),
                'modified' => FrozenTime::now(),
            ],
            // Add more employee-salary component associations
        ];

        $table = $this->table('employee_salary_components');
        $table->insert($data)->save();
    }
}
