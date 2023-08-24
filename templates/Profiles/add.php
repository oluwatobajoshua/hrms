<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Profile $profile
 */
?>
<?php
$this->assign('title', __('Add Profile'));
$this->Breadcrumbs->add([
    ['title' => 'Home', 'url' => '/'],
    ['title' => 'List Profiles', 'url' => ['action' => 'index']],
    ['title' => 'Add'],
]);
?>

<div class="card card-primary card-outline">
  <?= $this->Form->create($profile) ?>
  <div class="card-body">
    <?php
      echo $this->Form->control('last_name');
      echo $this->Form->control('first_name');
      echo $this->Form->control('dob');
      echo $this->Form->control('phone');
      echo $this->Form->control('address');
      echo $this->Form->control('passport');
      echo $this->Form->control('sign');
      echo $this->Form->control('status_id', ['options' => $statuses]);
      echo $this->Form->control('account_id');
      echo $this->Form->control('user_id', ['options' => $users]);
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

