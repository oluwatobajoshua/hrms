<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ModulePermission $modulePermission
 */
?>
<?php
$this->assign('title', __('Add Module Permission'));
$this->Breadcrumbs->add([
    ['title' => 'Home', 'url' => '/'],
    ['title' => 'List Module Permissions', 'url' => ['action' => 'index']],
    ['title' => 'Add'],
]);
?>

<div class="card card-primary card-outline">
  <?= $this->Form->create($modulePermission) ?>
  <div class="card-body">
    <?php
      echo $this->Form->control('role_id', ['options' => $roles]);
      echo $this->Form->control('module_id', ['options' => $modules]);
      echo $this->Form->control('view', ['custom' => true]);
      echo $this->Form->control('edit', ['custom' => true]);
      echo $this->Form->control('new', ['custom' => true]);
      echo $this->Form->control('remove', ['custom' => true]);
      echo $this->Form->control('import', ['custom' => true]);
      echo $this->Form->control('export', ['custom' => true]);
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

