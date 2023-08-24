<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Shift Entity
 *
 * @property int $id
 * @property int $employee_id
 * @property \Cake\I18n\Time $start_time
 * @property \Cake\I18n\Time $end_time
 * @property \Cake\I18n\Time|null $break_start
 * @property \Cake\I18n\Time|null $break_end
 * @property \Cake\I18n\FrozenDate $valid_from
 * @property \Cake\I18n\FrozenDate|null $valid_to
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Employee $employee
 */
class Shift extends Entity
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
        'start_time' => true,
        'end_time' => true,
        'break_start' => true,
        'break_end' => true,
        'valid_from' => true,
        'valid_to' => true,
        'created' => true,
        'modified' => true,
        'employee' => true,
    ];
}
