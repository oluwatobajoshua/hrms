<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateEmployeeSalaryComponents extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('employee_salary_components');
        $table->addColumn('employee_id', 'integer')
              ->addColumn('salary_component_id', 'integer')
              ->addForeignKey('employee_id', 'employees', 'id', ['delete' => 'CASCADE', 'update' => 'CASCADE'])
              ->addForeignKey('salary_component_id', 'salary_components', 'id', ['delete' => 'CASCADE', 'update' => 'CASCADE'])
              ->addColumn('created', 'datetime')
              ->addColumn('modified', 'datetime')
              ->create();
    }
}
