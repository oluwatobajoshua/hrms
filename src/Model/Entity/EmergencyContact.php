<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * EmergencyContact Entity
 *
 * @property int $id
 * @property int $employee_id
 * @property string $name
 * @property int $relationship_id
 * @property string $phone
 * @property string $email
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 *
 * @property \App\Model\Entity\Employee $employee
 * @property \App\Model\Entity\Relationship $relationship
 */
class EmergencyContact extends Entity
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
        'relationship_id' => true,
        'phone' => true,
        'email' => true,
        'address' => true,
        'created' => true,
        'modified' => true,
        'employee' => true,
        'relationship' => true,
    ];
}
