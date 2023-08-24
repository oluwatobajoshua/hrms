<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateAttendanceRecords extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('attendance_records');
        $table->addColumn('employee_id', 'integer', ['null' => false])
            ->addColumn('date', 'date', ['null' => false])
            ->addColumn('check_in_time', 'time', ['null' => true])
            ->addColumn('check_out_time', 'time', ['null' => true])
            ->addColumn('status', 'string', ['limit' => 20, 'null' => false])
            ->addColumn('attendance_type', 'string', ['limit' => 20, 'null' => true])
            ->addColumn('leave_id', 'integer', ['null' => true])
            ->addColumn('remarks', 'text', ['null' => true])
            ->addColumn('location', 'string', ['limit' => 50, 'null' => true])
            ->addColumn('approval_status', 'string', ['limit' => 20, 'null' => true])
            ->addColumn('shift_change', 'boolean', ['default' => false, 'null' => false])
            ->addColumn('lateness_duration', 'time', ['null' => true])
            ->addColumn('early_leaving_duration', 'time', ['null' => true])
            ->addColumn('remote_work', 'boolean', ['default' => false, 'null' => false])
            ->addIndex('employee_id')
            ->addForeignKey('employee_id', 'employees', 'id', ['delete' => 'CASCADE', 'update' => 'CASCADE'])
            ->create();
    }
}
