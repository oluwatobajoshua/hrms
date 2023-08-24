<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateSalaryComponents extends AbstractMigration
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
        $table = $this->table('salary_components');
        $table->addColumn('name', 'string', ['limit' => 255])
              ->addColumn('type', 'string', ['limit' => 50])
              ->addColumn('amount', 'decimal', ['precision' => 10, 'scale' => 2])
              ->addColumn('frequency', 'string', ['limit' => 50, 'null' => true])
              ->addColumn('taxable', 'boolean', ['default' => true])
              ->addColumn('priority', 'integer', ['default' => 1])
              ->addColumn('calculation_formula', 'string', ['limit' => 255, 'null' => true])
              ->addColumn('description', 'text', ['null' => true])
              ->addColumn('active', 'boolean', ['default' => true])
              ->addColumn('effective_start_date', 'date', ['null' => true])
              ->addColumn('effective_end_date', 'date', ['null' => true])
              ->addColumn('currency', 'string', ['limit' => 50, 'null' => true])
              ->addColumn('localization', 'json', ['null' => true])
              ->addColumn('attachments', 'text', ['null' => true])
              ->addColumn('approval_required', 'boolean', ['default' => false])
              ->addColumn('default_currency', 'string', ['limit' => 50, 'null' => true])
              ->addColumn('taxable_default', 'boolean', ['default' => true])
              ->addColumn('tax_rate', 'decimal', ['precision' => 5, 'scale' => 2, 'null' => true])
              ->addColumn('tax_deduction', 'decimal', ['precision' => 10, 'scale' => 2, 'null' => true])
              ->addColumn('nigerian_taxable', 'boolean', ['default' => true])
              ->addColumn('nigerian_tax_rate', 'decimal', ['precision' => 5, 'scale' => 2, 'null' => true])
              ->addColumn('pension_deduction', 'decimal', ['precision' => 10, 'scale' => 2, 'null' => true])
              ->addColumn('nhf_deduction', 'decimal', ['precision' => 10, 'scale' => 2, 'null' => true])
              ->addColumn('created', 'datetime')
              ->addColumn('modified', 'datetime')
              ->addColumn('created_by', 'integer', ['null' => true])
              ->addColumn('modified_by', 'integer', ['null' => true])
              ->addIndex(['name'], ['unique' => true])
              ->create();
    }
}
