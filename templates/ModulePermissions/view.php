<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ModulePermission $modulePermission
 */
?>

<?php
$this->assign('title', __('Module Permission'));
$this->Breadcrumbs->add([
    ['title' => 'Home', 'url' => '/'],
    ['title' => 'List Module Permissions', 'url' => ['action' => 'index']],
    ['title' => 'View'],
]);
?>

<div class="view card card-primary card-outline">
  <div class="card-header d-sm-flex">
    <h2 class="card-title"><?= h($modulePermission->id) ?></h2>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
        <tr>
            <th><?= __('Role') ?></th>
            <td><?= $modulePermission->has('role') ? $this->Html->link($modulePermission->role->name, ['controller' => 'Roles', 'action' => 'view', $modulePermission->role->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Module') ?></th>
            <td><?= $modulePermission->has('module') ? $this->Html->link($modulePermission->module->name, ['controller' => 'Modules', 'action' => 'view', $modulePermission->module->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($modulePermission->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($modulePermission->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($modulePermission->modified) ?></td>
        </tr>
        <tr>
            <th><?= __('View') ?></th>
            <td><?= $modulePermission->view ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th><?= __('Edit') ?></th>
            <td><?= $modulePermission->edit ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th><?= __('New') ?></th>
            <td><?= $modulePermission->new ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th><?= __('Remove') ?></th>
            <td><?= $modulePermission->remove ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th><?= __('Import') ?></th>
            <td><?= $modulePermission->import ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th><?= __('Export') ?></th>
            <td><?= $modulePermission->export ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
  </div>
  <div class="card-footer d-flex">
    <div class="">
      <?= $this->Form->postLink(
          __('Delete'),
          ['action' => 'delete', $modulePermission->id],
          ['confirm' => __('Are you sure you want to delete # {0}?', $modulePermission->id), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Html->link(__('Edit'), ['action' => 'edit', $modulePermission->id], ['class' => 'btn btn-secondary']) ?>
      <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
    </div>
  </div>
</div>


