<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * NextOfKinsFixture
 */
class NextOfKinsFixture extends TestFixture
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
                'employee_id' => 1,
                'name' => 'Lorem ipsum dolor sit amet',
                'relationship_id' => 1,
                'address' => 'Lorem ipsum dolor sit amet',
                'phone' => 'Lorem ips',
                'email' => 'Lorem ipsum dolor sit amet',
                'created' => '2023-08-08 22:10:28',
                'modified' => '2023-08-08 22:10:28',
            ],
        ];
        parent::init();
    }
}
