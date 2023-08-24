<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AttendanceRecord $attendanceRecord
 */
?>
<?php
$this->assign('title', __('Add Attendance Record'));
$this->Breadcrumbs->add([
    ['title' => 'Home', 'url' => '/'],
    ['title' => 'List Attendance Records', 'url' => ['action' => 'index']],
    ['title' => 'Add'],
]);
?>

<div class="card card-primary card-outline">
  <?= $this->Form->create($attendanceRecord) ?>
  <div class="card-body">
    <?php
      echo $this->Form->control('employee_id', ['options' => $employees]);
      echo $this->Form->control('date');
      echo $this->Form->control('check_in_time', ['empty' => true]);
      echo $this->Form->control('check_out_time', ['empty' => true]);
      echo $this->Form->control('status');
      echo $this->Form->control('attendance_type');
      echo $this->Form->control('leave_id', ['options' => $leaves, 'empty' => true]);
      echo $this->Form->control('remarks');
      echo $this->Form->control('location');
      echo $this->Form->control('approval_status');
      echo $this->Form->control('shift_change', ['custom' => true]);
      echo $this->Form->control('lateness_duration', ['empty' => true]);
      echo $this->Form->control('early_leaving_duration', ['empty' => true]);
      echo $this->Form->control('remote_work', ['custom' => true]);
    ?>
  </div>

  <div class="card-footer d-flex">
    <div class="ml-auto">
      <?= $this->Form->button(__('Save')) ?>
      <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
    </div>
  </div>

  <?= $this->Form->end() ?>
</div>

