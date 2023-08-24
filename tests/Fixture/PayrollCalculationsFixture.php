<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PayrollCalculationsFixture
 */
class PayrollCalculationsFixture extends TestFixture
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
                'earnings' => 1,
                'deductions' => 1,
                'additional_earnings' => 1,
                'net_pay' => 1,
            ],
        ];
        parent::init();
    }
}
