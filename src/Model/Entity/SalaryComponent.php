<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SalaryComponent Entity
 *
 * @property int $id
 * @property int $employee_id
 * @property string $name
 * @property string $type
 * @property string $amount
 * @property string|null $frequency
 * @property bool $taxable
 * @property int $priority
 * @property string|null $calculation_formula
 * @property string|null $description
 * @property bool $active
 * @property \Cake\I18n\FrozenDate|null $effective_start_date
 * @property \Cake\I18n\FrozenDate|null $effective_end_date
 * @property string|null $currency
 * @property string|null $localization
 * @property string|null $attachments
 * @property bool $approval_required
 * @property string|null $default_currency
 * @property bool $taxable_default
 * @property string|null $tax_rate
 * @property string|null $tax_deduction
 * @property bool $nigerian_taxable
 * @property string|null $nigerian_tax_rate
 * @property string|null $pension_deduction
 * @property string|null $nhf_deduction
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int|null $created_by
 * @property int|null $modified_by
 *
 * @property \App\Model\Entity\Employee $employee
 * @property \App\Model\Entity\EmployeeSalaryComponent[] $employee_salary_components
 */
class SalaryComponent extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'employee_id' => true,
        'name' => true,
        'type' => true,
        'amount' => true,
        'frequency' => true,
        'taxable' => true,
        'priority' => true,
        'calculation_formula' => true,
        'description' => true,
        'active' => true,
        'effective_start_date' => true,
        'effective_end_date' => true,
        'currency' => true,
        'localization' => true,
        'attachments' => true,
        'approval_required' => true,
        'default_currency' => true,
        'taxable_default' => true,
        'tax_rate' => true,
        'tax_deduction' => true,
        'nigerian_taxable' => true,
        'nigerian_tax_rate' => true,
        'pension_deduction' => true,
        'nhf_deduction' => true,
        'created' => true,
        'modified' => true,
        'created_by' => true,
        'modified_by' => true,
        'employee' => true,
        'employee_salary_components' => true,
    ];
}
