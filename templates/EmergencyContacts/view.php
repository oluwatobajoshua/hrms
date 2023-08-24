<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EmergencyContact $emergencyContact
 */
?>

<?php
$this->assign('title', __('Emergency Contact'));
$this->Breadcrumbs->add([
    ['title' => 'Home', 'url' => '/'],
    ['title' => 'List Emergency Contacts', 'url' => ['action' => 'index']],
    ['title' => 'View'],
]);
?>

<div class="view card card-primary card-outline">
  <div class="card-header d-sm-flex">
    <h2 class="card-title"><?= h($emergencyContact->id) ?></h2>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
        <tr>
            <th><?= __('Employee') ?></th>
            <td><?= $emergencyContact->has('employee') ? $this->Html->link($emergencyContact->employee->name_desc, ['controller' => 'Employees', 'action' => 'view', $emergencyContact->employee->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($emergencyContact->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Relationship') ?></th>
            <td><?= $emergencyContact->has('relationship') ? $this->Html->link($emergencyContact->relationship->name, ['controller' => 'Relationships', 'action' => 'view', $emergencyContact->relationship->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Phone') ?></th>
            <td><?= h($emergencyContact->phone) ?></td>
        </tr>
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($emergencyContact->email) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($emergencyContact->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($emergencyContact->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($emergencyContact->modified) ?></td>
        </tr>
    </table>
  </div>
  <div class="card-footer d-flex">
    <div class="">
      <?= $this->Form->postLink(
          __('Delete'),
          ['action' => 'delete', $emergencyContact->id],
          ['confirm' => __('Are you sure you want to delete # {0}?', $emergencyContact->id), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Html->link(__('Edit'), ['action' => 'edit', $emergencyContact->id], ['class' => 'btn btn-secondary']) ?>
      <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
    </div>
  </div>
</div>


