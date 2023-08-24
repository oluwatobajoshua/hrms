<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DesignationsFixture
 */
class DesignationsFixture extends TestFixture
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
                'name' => 'Lorem ipsum dolor sit amet',
                'department_id' => 1,
                'created' => '2023-08-19 06:44:04',
                'modified' => '2023-08-19 06:44:04',
            ],
        ];
        parent::init();
    }
}
