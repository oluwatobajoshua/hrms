<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AttendanceRecord[]|\Cake\Collection\CollectionInterface $attendanceRecords
 */
?>
<?php
$this->assign('title', __('Attendance Records'));
$this->Breadcrumbs->add([
    ['title' => 'Home', 'url' => '/'],
    ['title' => 'List Attendance Records'],
]);
?>

<div class="card card-primary card-outline">
    <div class="card-header d-sm-flex">
        <h2 class="card-title">
            <!-- -->
        </h2>
        <div class="card-toolbox">
            <?= $this->Paginator->limitControl([], null, [
                'label' => false,
                'class' => 'form-control-sm',
            ]); ?>
            <?= $this->Html->link(__('New Attendance Record'), ['action' => 'add'], ['class' => 'btn btn-primary btn-sm']) ?>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('employee_id') ?></th>
                    <th><?= $this->Paginator->sort('date') ?></th>
                    <th><?= $this->Paginator->sort('check_in_time') ?></th>
                    <th><?= $this->Paginator->sort('check_out_time') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th><?= $this->Paginator->sort('attendance_type') ?></th>
                    <th><?= $this->Paginator->sort('leave_id') ?></th>
                    <th><?= $this->Paginator->sort('location') ?></th>
                    <th><?= $this->Paginator->sort('approval_status') ?></th>
                    <th><?= $this->Paginator->sort('shift_change') ?></th>
                    <th><?= $this->Paginator->sort('lateness_duration') ?></th>
                    <th><?= $this->Paginator->sort('early_leaving_duration') ?></th>
                    <th><?= $this->Paginator->sort('remote_work') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($attendanceRecords as $attendanceRecord) : ?>
                    <tr>
                        <td><?= $this->Number->format($attendanceRecord->id) ?></td>
                        <td><?= $attendanceRecord->has('employee') ? $this->Html->link($attendanceRecord->employee->name_desc, ['controller' => 'Employees', 'action' => 'view', $attendanceRecord->employee->id]) : '' ?></td>
                        <td><?= h($attendanceRecord->date) ?></td>
                        <td><?= h($attendanceRecord->check_in_time) ?></td>
                        <td><?= h($attendanceRecord->check_out_time) ?></td>
                        <td><?= h($attendanceRecord->status) ?></td>
                        <td><?= h($attendanceRecord->attendance_type) ?></td>
                        <td><?= $attendanceRecord->has('leave') ? $this->Html->link($attendanceRecord->leave->id, ['controller' => 'Leaves', 'action' => 'view', $attendanceRecord->leave->id]) : '' ?></td>
                        <td><?= h($attendanceRecord->location) ?></td>
                        <td><?= h($attendanceRecord->approval_status) ?></td>
                        <td><?= ($attendanceRecord->shift_change) ? __('Yes') : __('No') ?></td>
                        <td><?= h($attendanceRecord->lateness_duration) ?></td>
                        <td><?= h($attendanceRecord->early_leaving_duration) ?></td>
                        <td><?= ($attendanceRecord->remote_work) ? __('Yes') : __('No') ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $attendanceRecord->id], ['class' => 'btn btn-xs btn-outline-primary', 'escape' => false]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $attendanceRecord->id], ['class' => 'btn btn-xs btn-outline-primary', 'escape' => false]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $attendanceRecord->id], ['class' => 'btn btn-xs btn-outline-danger', 'escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $attendanceRecord->id)]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->

    <div class="card-footer d-md-flex paginator">
        <div class="mr-auto" style="font-size:.8rem">
            <?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?>
        </div>
        <ul class="pagination pagination-sm">
            <?= $this->Paginator->first('<i class="fas fa-angle-double-left"></i>', ['escape' => false]) ?>
            <?= $this->Paginator->prev('<i class="fas fa-angle-left"></i>', ['escape' => false]) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next('<i class="fas fa-angle-right"></i>', ['escape' => false]) ?>
            <?= $this->Paginator->last('<i class="fas fa-angle-double-right"></i>', ['escape' => false]) ?>
        </ul>
    </div>
    <!-- /.card-footer -->
</div>
