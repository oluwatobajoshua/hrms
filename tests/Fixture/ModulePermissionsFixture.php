<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ModulePermissionsFixture
 */
class ModulePermissionsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'role_id' => 1,
                'module_id' => 1,
                'view' => 1,
                'edit' => 1,
                'new' => 1,
                'remove' => 1,
                'import' => 1,
                'export' => 1,
                'created' => '2023-08-19 10:51:14',
                'modified' => '2023-08-19 10:51:14',
            ],
        ];
        parent::init();
    }
}
