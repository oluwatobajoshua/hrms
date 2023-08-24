<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Attendance Entity
 *
 * @property int $id
 * @property int $employee_id
 * @property \Cake\I18n\FrozenTime $check_in
 * @property \Cake\I18n\FrozenTime|null $check_out
 * @property string|null $location_lat
 * @property string|null $location_lng
 * @property string|null $check_in_ip
 * @property string|null $check_out_ip
 *
 * @property \App\Model\Entity\Employee $employee
 */
class Attendance extends Entity
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
        'check_in' => true,
        'check_out' => true,
        'location_lat' => true,
        'location_lng' => true,
        'check_in_ip' => true,
        'check_out_ip' => true,
        'employee' => true,
    ];
}
