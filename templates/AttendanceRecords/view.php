<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AttendanceRecord $attendanceRecord
 */
?>

<?php
$this->assign('title', __('Attendance Record'));
$this->Breadcrumbs->add([
    ['title' => 'Home', 'url' => '/'],
    ['title' => 'List Attendance Records', 'url' => ['action' => 'index']],
    ['title' => 'View'],
]);
?>

<div class="view card card-primary card-outline">
  <div class="card-header d-sm-flex">
    <h2 class="card-title"><?= h($attendanceRecord->id) ?></h2>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
        <tr>
            <th><?= __('Employee') ?></th>
            <td><?= $attendanceRecord->has('employee') ? $this->Html->link($attendanceRecord->employee->name_desc, ['controller' => 'Employees', 'action' => 'view', $attendanceRecord->employee->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Status') ?></th>
            <td><?= h($attendanceRecord->status) ?></td>
        </tr>
        <tr>
            <th><?= __('Attendance Type') ?></th>
            <td><?= h($attendanceRecord->attendance_type) ?></td>
        </tr>
        <tr>
            <th><?= __('Leave') ?></th>
            <td><?= $attendanceRecord->has('leave') ? $this->Html->link($attendanceRecord->leave->id, ['controller' => 'Leaves', 'action' => 'view', $attendanceRecord->leave->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Location') ?></th>
            <td><?= h($attendanceRecord->location) ?></td>
        </tr>
        <tr>
            <th><?= __('Approval Status') ?></th>
            <td><?= h($attendanceRecord->approval_status) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($attendanceRecord->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Date') ?></th>
            <td><?= h($attendanceRecord->date) ?></td>
        </tr>
        <tr>
            <th><?= __('Check In Time') ?></th>
            <td><?= h($attendanceRecord->check_in_time) ?></td>
        </tr>
        <tr>
            <th><?= __('Check Out Time') ?></th>
            <td><?= h($attendanceRecord->check_out_time) ?></td>
        </tr>
        <tr>
            <th><?= __('Lateness Duration') ?></th>
            <td><?= h($attendanceRecord->lateness_duration) ?></td>
        </tr>
        <tr>
            <th><?= __('Early Leaving Duration') ?></th>
            <td><?= h($attendanceRecord->early_leaving_duration) ?></td>
        </tr>
        <tr>
            <th><?= __('Shift Change') ?></th>
            <td><?= $attendanceRecord->shift_change ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th><?= __('Remote Work') ?></th>
            <td><?= $attendanceRecord->remote_work ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
  </div>
  <div class="card-footer d-flex">
    <div class="">
      <?= $this->Form->postLink(
          __('Delete'),
          ['action' => 'delete', $attendanceRecord->id],
          ['confirm' => __('Are you sure you want to delete # {0}?', $attendanceRecord->id), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Html->link(__('Edit'), ['action' => 'edit', $attendanceRecord->id], ['class' => 'btn btn-secondary']) ?>
      <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
    </div>
  </div>
</div>

<div class="view text card">
  <div class="card-header">
    <h3 class="card-title"><?= __('Remarks') ?></h3>
  </div>
  <div class="card-body">
    <?= $this->Text->autoParagraph(h($attendanceRecord->remarks)); ?>
  </div>
</div>

