<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AttendancesFixture
 */
class AttendancesFixture extends TestFixture
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
                'check_in' => '2023-08-19 11:27:45',
                'check_out' => '2023-08-19 11:27:45',
                'location_lat' => 1.5,
                'location_lng' => 1.5,
                'check_in_ip' => 'Lorem ipsum dolor sit amet',
                'check_out_ip' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
