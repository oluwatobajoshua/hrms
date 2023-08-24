<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Shift $shift
 */
?>

<?php
$this->assign('title', __('Shift'));
$this->Breadcrumbs->add([
    ['title' => 'Home', 'url' => '/'],
    ['title' => 'List Shifts', 'url' => ['action' => 'index']],
    ['title' => 'View'],
]);
?>

<div class="view card card-primary card-outline">
  <div class="card-header d-sm-flex">
    <h2 class="card-title"><?= h($shift->id) ?></h2>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
        <tr>
            <th><?= __('Employee') ?></th>
            <td><?= $shift->has('employee') ? $this->Html->link($shift->employee->name_desc, ['controller' => 'Employees', 'action' => 'view', $shift->employee->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($shift->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Start Time') ?></th>
            <td><?= h($shift->start_time) ?></td>
        </tr>
        <tr>
            <th><?= __('End Time') ?></th>
            <td><?= h($shift->end_time) ?></td>
        </tr>
        <tr>
            <th><?= __('Break Start') ?></th>
            <td><?= h($shift->break_start) ?></td>
        </tr>
        <tr>
            <th><?= __('Break End') ?></th>
            <td><?= h($shift->break_end) ?></td>
        </tr>
        <tr>
            <th><?= __('Valid From') ?></th>
            <td><?= h($shift->valid_from) ?></td>
        </tr>
        <tr>
            <th><?= __('Valid To') ?></th>
            <td><?= h($shift->valid_to) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($shift->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($shift->modified) ?></td>
        </tr>
    </table>
  </div>
  <div class="card-footer d-flex">
    <div class="">
      <?= $this->Form->postLink(
          __('Delete'),
          ['action' => 'delete', $shift->id],
          ['confirm' => __('Are you sure you want to delete # {0}?', $shift->id), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Html->link(__('Edit'), ['action' => 'edit', $shift->id], ['class' => 'btn btn-secondary']) ?>
      <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
    </div>
  </div>
</div>


