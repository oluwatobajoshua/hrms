<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Module $module
 */
?>

<?php
$this->assign('title', __('Module'));
$this->Breadcrumbs->add([
    ['title' => 'Home', 'url' => '/'],
    ['title' => 'List Modules', 'url' => ['action' => 'index']],
    ['title' => 'View'],
]);
?>

<div class="view card card-primary card-outline">
  <div class="card-header d-sm-flex">
    <h2 class="card-title"><?= h($module->name) ?></h2>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($module->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($module->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($module->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($module->modified) ?></td>
        </tr>
    </table>
  </div>
  <div class="card-footer d-flex">
    <div class="">
      <?= $this->Form->postLink(
          __('Delete'),
          ['action' => 'delete', $module->id],
          ['confirm' => __('Are you sure you want to delete # {0}?', $module->id), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Html->link(__('Edit'), ['action' => 'edit', $module->id], ['class' => 'btn btn-secondary']) ?>
      <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
    </div>
  </div>
</div>


<div class="related related-modulePermissions view card">
  <div class="card-header d-sm-flex">
    <h3 class="card-title"><?= __('Related Module Permissions') ?></h3>
    <div class="card-toolbox">
      <?= $this->Html->link(__('New'), ['controller' => 'ModulePermissions' , 'action' => 'add'], ['class' => 'btn btn-primary btn-sm']) ?>
      <?= $this->Html->link(__('List '), ['controller' => 'ModulePermissions' , 'action' => 'index'], ['class' => 'btn btn-primary btn-sm']) ?>
    </div>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
      <tr>
          <th><?= __('Id') ?></th>
          <th><?= __('Role Id') ?></th>
          <th><?= __('Module Id') ?></th>
          <th><?= __('Read') ?></th>
          <th><?= __('Write') ?></th>
          <th><?= __('Create') ?></th>
          <th><?= __('Delete') ?></th>
          <th><?= __('Import') ?></th>
          <th><?= __('Export') ?></th>
          <th><?= __('Created') ?></th>
          <th><?= __('Modified') ?></th>
          <th class="actions"><?= __('Actions') ?></th>
      </tr>
      <?php if (empty($module->module_permissions)) { ?>
        <tr>
            <td colspan="12" class="text-muted">
              Module Permissions record not found!
            </td>
        </tr>
      <?php }else{ ?>
        <?php foreach ($module->module_permissions as $modulePermissions) : ?>
        <tr>
            <td><?= h($modulePermissions->id) ?></td>
            <td><?= h($modulePermissions->role_id) ?></td>
            <td><?= h($modulePermissions->module_id) ?></td>
            <td><?= h($modulePermissions->read) ?></td>
            <td><?= h($modulePermissions->write) ?></td>
            <td><?= h($modulePermissions->create) ?></td>
            <td><?= h($modulePermissions->delete) ?></td>
            <td><?= h($modulePermissions->import) ?></td>
            <td><?= h($modulePermissions->export) ?></td>
            <td><?= h($modulePermissions->created) ?></td>
            <td><?= h($modulePermissions->modified) ?></td>
            <td class="actions">
              <?= $this->Html->link(__('View'), ['controller' => 'ModulePermissions', 'action' => 'view', $modulePermissions->id], ['class'=>'btn btn-xs btn-outline-primary']) ?>
              <?= $this->Html->link(__('Edit'), ['controller' => 'ModulePermissions', 'action' => 'edit', $modulePermissions->id], ['class'=>'btn btn-xs btn-outline-primary']) ?>
              <?= $this->Form->postLink(__('Delete'), ['controller' => 'ModulePermissions', 'action' => 'delete', $modulePermissions->id], ['class'=>'btn btn-xs btn-outline-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $modulePermissions->id)]) ?>
            </td>
        </tr>
        <?php endforeach; ?>
      <?php } ?>
    </table>
  </div>
</div>

