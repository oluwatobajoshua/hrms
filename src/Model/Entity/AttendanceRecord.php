<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AttendanceRecord Entity
 *
 * @property int $id
 * @property int $employee_id
 * @property \Cake\I18n\FrozenDate $date
 * @property \Cake\I18n\Time|null $check_in_time
 * @property \Cake\I18n\Time|null $check_out_time
 * @property string $status
 * @property string|null $attendance_type
 * @property int|null $leave_id
 * @property string|null $remarks
 * @property string|null $location
 * @property string|null $approval_status
 * @property bool $shift_change
 * @property \Cake\I18n\Time|null $lateness_duration
 * @property \Cake\I18n\Time|null $early_leaving_duration
 * @property bool $remote_work
 *
 * @property \App\Model\Entity\Employee $employee
 * @property \App\Model\Entity\Leave $leave
 */
class AttendanceRecord extends Entity
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
        'date' => true,
        'check_in_time' => true,
        'check_out_time' => true,
        'status' => true,
        'attendance_type' => true,
        'leave_id' => true,
        'remarks' => true,
        'location' => true,
        'approval_status' => true,
        'shift_change' => true,
        'lateness_duration' => true,
        'early_leaving_duration' => true,
        'remote_work' => true,
        'employee' => true,
        'leave' => true,
    ];
}
