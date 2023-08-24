<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * EducationsFixture
 */
class EducationsFixture extends TestFixture
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
                'institution' => 'Lorem ipsum dolor sit amet',
                'highest_education_id' => 1,
                'course_of_study' => 'Lorem ipsum dolor sit amet',
                'date' => '2023-08-19',
                'file_url' => 'Lorem ipsum dolor sit amet',
                'created' => '2023-08-19 11:36:15',
                'modified' => '2023-08-19 11:36:15',
            ],
        ];
        parent::init();
    }
}
