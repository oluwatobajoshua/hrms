<?php
declare(strict_types=1);

use Migrations\AbstractSeed;
use Cake\I18n\Date;
use Cake\I18n\FrozenTime;
use Cake\ORM\TableRegistry;

/**
 * AttendanceRecords seed.
 */
class AttendanceRecordsSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $now = new FrozenTime();

        $data = [
            [
                'employee_id' => 5,
                'date' => $now,
                'status' => 'present',
            ],
            [
                'employee_id' => 6,
                'date' => $now,
                'status' => 'absent',
            ],
            // Add more records as needed
        ];

        $table = $this->table('attendance_records');
        $table->insert($data)->save();
    }
}
