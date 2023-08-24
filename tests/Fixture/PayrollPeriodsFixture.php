<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PayrollPeriodsFixture
 */
class PayrollPeriodsFixture extends TestFixture
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
                'start_date' => '2023-08-20',
                'end_date' => '2023-08-20',
                'created' => '2023-08-20 20:56:56',
                'modified' => '2023-08-20 20:56:56',
            ],
        ];
        parent::init();
    }
}
