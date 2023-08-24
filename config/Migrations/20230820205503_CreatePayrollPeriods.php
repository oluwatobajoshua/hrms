<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreatePayrollPeriods extends AbstractMigration
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
        $table = $this->table('payroll_periods');
        $table->addColumn('name', 'string', ['limit' => 255])
              ->addColumn('start_date', 'date')
              ->addColumn('end_date', 'date')
              ->addColumn('created', 'datetime')
              ->addColumn('modified', 'datetime')
              ->create();
    }
}
