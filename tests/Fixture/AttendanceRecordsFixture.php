<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AttendanceRecordsFixture
 */
class AttendanceRecordsFixture extends TestFixture
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
                'date' => '2023-08-20',
                'check_in_time' => '22:21:29',
                'check_out_time' => '22:21:29',
                'status' => 'Lorem ipsum dolor ',
                'attendance_type' => 'Lorem ipsum dolor ',
                'leave_id' => 1,
                'remarks' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'location' => 'Lorem ipsum dolor sit amet',
                'approval_status' => 'Lorem ipsum dolor ',
                'shift_change' => 1,
                'lateness_duration' => '22:21:29',
                'early_leaving_duration' => '22:21:29',
                'remote_work' => 1,
            ],
        ];
        parent::init();
    }
}
