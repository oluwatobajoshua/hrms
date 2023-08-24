<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * StagesFixture
 */
class StagesFixture extends TestFixture
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
                'job_listing_id' => 1,
                'name' => 'Lorem ipsum dolor sit amet',
                'description' => 1,
                'created' => '2023-08-19',
                'modified' => '2023-08-19',
            ],
        ];
        parent::init();
    }
}
