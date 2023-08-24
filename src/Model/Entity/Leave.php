<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Leave Entity
 *
 * @property int $id
 * @property int $employee_id
 * @property int $days_entitled
 * @property string $reason
 * @property int $previous_outstanding
 * @property int $days_requested
 * @property int $outstanding_days
 * @property \Cake\I18n\FrozenDate $commencement_date
 * @property int $relieving_officer
 * @property int $status_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Employee $employee
 * @property \App\Model\Entity\Status $status
 * @property \App\Model\Entity\Comment[] $comments
 */
class Leave extends Entity
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
        'days_entitled' => true,
        'reason' => true,
        'previous_outstanding' => true,
        'days_requested' => true,
        'outstanding_days' => true,
        'commencement_date' => true,
        'relieving_officer' => true,
        'status_id' => true,
        'created' => true,
        'modified' => true,
        'employee' => true,
        'status' => true,
        'comments' => true,
    ];
}
