<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

/**
 * SalaryComponents seed.
 */
class SalaryComponentsSeed extends AbstractSeed
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
                'name' => 'Basic Salary',
                'type' => 'Earnings',
                'amount' => 5000.00,
                'frequency' => 'Monthly',
                'taxable' => true,
                'priority' => 1,
                'calculation_formula' => 'Amount * 12',
                'description' => 'Monthly salary before deductions',
                'active' => true,
                'effective_start_date' => $now,
                'effective_end_date' => null,
                'currency' => 'USD',
                'localization' => json_encode(['en' => ['name' => 'Basic Salary']]),
                'attachments' => null,
                'approval_required' => false,
                'default_currency' => true,
                'taxable_default' => true,
                'tax_rate' => 10.0,
                'tax_deduction' => 500.00,
                'nigerian_taxable' => true,
                'nigerian_tax_rate' => 7.5,
                'pension_deduction' => 300.00,
                'nhf_deduction' => 150.00,
                'created' => $now,
                'modified' => $now,
            ],
            [
                'name' => 'Overtime Pay',
                'type' => 'Earnings',
                'amount' => 1000.00,
                'frequency' => 'Monthly',
                'taxable' => true,
                'priority' => 2,
                'calculation_formula' => 'Amount * 1.5',
                'description' => 'Extra pay for overtime hours',
                'active' => true,
                'effective_start_date' => $now,
                'effective_end_date' => null,
                'currency' => 'USD',
                'localization' => json_encode(['en' => ['name' => 'Overtime Pay']]),
                'attachments' => null,
                'approval_required' => false,
                'default_currency' => true,
                'taxable_default' => true,
                'tax_rate' => 10.0,
                'tax_deduction' => 100.00,
                'nigerian_taxable' => true,
                'nigerian_tax_rate' => 7.5,
                'pension_deduction' => 50.00,
                'nhf_deduction' => 25.00,
                'created' => $now,
                'modified' => $now,
            ],
            [
                'name' => 'Tax Deduction',
                'type' => 'Deduction',
                'amount' => 200.00,
                'frequency' => 'Monthly',
                'taxable' => true,
                'priority' => 3,
                'calculation_formula' => 'Amount * 0.1',
                'description' => 'Monthly tax deduction',
                'active' => true,
                'effective_start_date' => $now,
                'effective_end_date' => null,
                'currency' => 'USD',
                'localization' => json_encode(['en' => ['name' => 'Tax Deduction']]),
                'attachments' => null,
                'approval_required' => false,
                'default_currency' => true,
                'taxable_default' => true,
                'tax_rate' => 10.0,
                'tax_deduction' => 50.00,
                'nigerian_taxable' => true,
                'nigerian_tax_rate' => 7.5,
                'pension_deduction' => 20.00,
                'nhf_deduction' => 10.00,
                'created' => $now,
                'modified' => $now,
            ],
            [
                'name' => 'Bonus',
                'type' => 'Earnings',
                'amount' => 750.00,
                'frequency' => 'Yearly',
                'taxable' => true,
                'priority' => 4,
                'calculation_formula' => 'Amount * 0.5',
                'description' => 'Annual performance bonus',
                'active' => true,
                'effective_start_date' => $now,
                'effective_end_date' => null,
                'currency' => 'USD',
                'localization' => json_encode(['en' => ['name' => 'Bonus']]),
                'attachments' => null,
                'approval_required' => false,
                'default_currency' => true,
                'taxable_default' => true,
                'tax_rate' => 10.0,
                'tax_deduction' => 75.00,
                'nigerian_taxable' => true,
                'nigerian_tax_rate' => 7.5,
                'pension_deduction' => 30.00,
                'nhf_deduction' => 15.00,
                'created' => $now,
                'modified' => $now,
            ],
            [
                'name' => 'Health Insurance',
                'type' => 'Deduction',
                'amount' => 50.00,
                'frequency' => 'Monthly',
                'taxable' => false,
                'priority' => 5,
                'calculation_formula' => null,
                'description' => 'Monthly health insurance deduction',
                'active' => true,
                'effective_start_date' => $now,
                'effective_end_date' => null,
                'currency' => 'USD',
                'localization' => json_encode(['en' => ['name' => 'Health Insurance']]),
                'attachments' => null,
                'approval_required' => false,
                'default_currency' => true,
                'taxable_default' => false,
                'tax_rate' => null,
                'tax_deduction' => null,
                'nigerian_taxable' => false,
                'nigerian_tax_rate' => null,
                'pension_deduction' => null,
                'nhf_deduction' => null,
                'created' => $now,
                'modified' => $now,
            ],
        ];

        $table = $this->table('salary_components');
        $table->insert($data)->save();
    }
}
