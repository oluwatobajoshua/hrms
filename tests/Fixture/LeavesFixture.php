<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * LeavesFixture
 */
class LeavesFixture extends TestFixture
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
                'days_entitled' => 1,
                'reason' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'previous_outstanding' => 1,
                'days_requested' => 1,
                'outstanding_days' => 1,
                'commencement_date' => '2023-08-19',
                'relieving_officer' => 1,
                'status_id' => 1,
                'created' => '2023-08-19 07:19:46',
                'modified' => '2023-08-19 07:19:46',
            ],
        ];
        parent::init();
    }
}
