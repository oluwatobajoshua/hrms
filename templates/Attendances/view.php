<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Attendance $attendance
 */
?>

<?php
$this->assign('title', __('Attendance'));
$this->Breadcrumbs->add([
    ['title' => 'Home', 'url' => '/'],
    ['title' => 'List Attendances', 'url' => ['action' => 'index']],
    ['title' => 'View'],
]);
?>

<div class="view card card-primary card-outline">
  <div class="card-header d-sm-flex">
    <h2 class="card-title"><?= h($attendance->id) ?></h2>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
        <tr>
            <th><?= __('Employee') ?></th>
            <td><?= $attendance->has('employee') ? $this->Html->link($attendance->employee->name_desc, ['controller' => 'Employees', 'action' => 'view', $attendance->employee->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Check In Ip') ?></th>
            <td><?= h($attendance->check_in_ip) ?></td>
        </tr>
        <tr>
            <th><?= __('Check Out Ip') ?></th>
            <td><?= h($attendance->check_out_ip) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($attendance->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Location Lat') ?></th>
            <td><?= $this->Number->format($attendance->location_lat) ?></td>
        </tr>
        <tr>
            <th><?= __('Location Lng') ?></th>
            <td><?= $this->Number->format($attendance->location_lng) ?></td>
        </tr>
        <tr>
            <th><?= __('Check In') ?></th>
            <td><?= h($attendance->check_in) ?></td>
        </tr>
        <tr>
            <th><?= __('Check Out') ?></th>
            <td><?= h($attendance->check_out) ?></td>
        </tr>
    </table>
  </div>
  <div class="card-footer d-flex">
    <div class="">
      <?= $this->Form->postLink(
          __('Delete'),
          ['action' => 'delete', $attendance->id],
          ['confirm' => __('Are you sure you want to delete # {0}?', $attendance->id), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Html->link(__('Edit'), ['action' => 'edit', $attendance->id], ['class' => 'btn btn-secondary']) ?>
      <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
    </div>
  </div>
</div>


