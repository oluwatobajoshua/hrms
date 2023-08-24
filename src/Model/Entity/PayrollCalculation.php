<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PayrollCalculation Entity
 *
 * @property int $id
 * @property int $employee_id
 * @property float $earnings
 * @property float $deductions
 * @property float $additional_earnings
 * @property float $net_pay
 *
 * @property \App\Model\Entity\Employee $employee
 */
class PayrollCalculation extends Entity
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
        'earnings' => true,
        'deductions' => true,
        'additional_earnings' => true,
        'net_pay' => true,
        'employee' => true,
    ];
}
