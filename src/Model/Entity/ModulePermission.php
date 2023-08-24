<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ModulePermission Entity
 *
 * @property int $id
 * @property int $role_id
 * @property int $module_id
 * @property bool|null $view
 * @property bool $edit
 * @property bool|null $new
 * @property bool|null $remove
 * @property bool|null $import
 * @property bool|null $export
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Role $role
 * @property \App\Model\Entity\Module $module
 */
class ModulePermission extends Entity
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
        'role_id' => true,
        'module_id' => true,
        'view' => true,
        'edit' => true,
        'new' => true,
        'remove' => true,
        'import' => true,
        'export' => true,
        'created' => true,
        'modified' => true,
        'role' => true,
        'module' => true,
    ];
}
