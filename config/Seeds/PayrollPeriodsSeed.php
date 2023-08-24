<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

use Cake\ORM\TableRegistry;
use Cake\I18n\FrozenTime;

class PayrollPeriodsSeed extends AbstractSeed
{
    public function run()
    {
        $now = new FrozenTime();

        $data = [
            [
                'name' => 'January 2023',
                'start_date' => '2023-01-01',
                'end_date' => '2023-01-31',
                'created' => $now,
                'modified' => $now,
            ],
            [
                'name' => 'February 2023',
                'start_date' => '2023-02-01',
                'end_date' => '2023-02-28',
                'created' => $now,
                'modified' => $now,
            ],
            // Add more seed data entries here
        ];

        $table = TableRegistry::getTableLocator()->get('PayrollPeriods');
        $entities = $table->newEntities($data);
        foreach ($entities as $entity) {
            $table->save($entity);
        }
    }
}