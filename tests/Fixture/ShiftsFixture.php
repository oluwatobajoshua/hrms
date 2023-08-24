<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ShiftsFixture
 */
class ShiftsFixture extends TestFixture
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
                'start_time' => '17:24:00',
                'end_time' => '17:24:00',
                'break_start' => '17:24:00',
                'break_end' => '17:24:00',
                'valid_from' => '2023-08-21',
                'valid_to' => '2023-08-21',
                'created' => '2023-08-21 17:24:00',
                'modified' => '2023-08-21 17:24:00',
            ],
        ];
        parent::init();
    }
}
