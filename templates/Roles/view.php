<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Role $role
 */
?>

<?php
$this->assign('title', __('Role'));
$this->Breadcrumbs->add([
    ['title' => 'Home', 'url' => '/'],
    ['title' => 'List Roles', 'url' => ['action' => 'index']],
    ['title' => 'View'],
]);
?>

<div class="view card card-primary card-outline">
  <div class="card-header d-sm-flex">
    <h2 class="card-title"><?= h($role->name) ?></h2>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($role->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($role->description) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($role->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($role->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($role->modified) ?></td>
        </tr>
    </table>
  </div>
  <div class="card-footer d-flex">
    <div class="">
      <?= $this->Form->postLink(
          __('Delete'),
          ['action' => 'delete', $role->id],
          ['confirm' => __('Are you sure you want to delete # {0}?', $role->id), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Html->link(__('Edit'), ['action' => 'edit', $role->id], ['class' => 'btn btn-secondary']) ?>
      <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
    </div>
  </div>
</div>


<div class="related related-users view card">
  <div class="card-header d-sm-flex">
    <h3 class="card-title"><?= __('Related Users') ?></h3>
    <div class="card-toolbox">
      <?= $this->Html->link(__('New'), ['controller' => 'Users' , 'action' => 'add'], ['class' => 'btn btn-primary btn-sm']) ?>
      <?= $this->Html->link(__('List '), ['controller' => 'Users' , 'action' => 'index'], ['class' => 'btn btn-primary btn-sm']) ?>
    </div>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
      <tr>
          <th><?= __('Id') ?></th>
          <th><?= __('Active') ?></th>
          <th><?= __('Employee Id') ?></th>
          <th><?= __('Role Id') ?></th>
          <th><?= __('Role') ?></th>
          <th><?= __('Username') ?></th>
          <th><?= __('Password') ?></th>
          <th><?= __('Email') ?></th>
          <th><?= __('Last Login') ?></th>
          <th><?= __('Token') ?></th>
          <th><?= __('Token Expires') ?></th>
          <th><?= __('Api Token') ?></th>
          <th><?= __('Activation Date') ?></th>
          <th><?= __('Secret') ?></th>
          <th><?= __('Secret Verified') ?></th>
          <th><?= __('Is Superuser') ?></th>
          <th><?= __('Raw Password') ?></th>
          <th><?= __('Quest One') ?></th>
          <th><?= __('Ans One') ?></th>
          <th><?= __('Quest Two') ?></th>
          <th><?= __('Ans Two') ?></th>
          <th><?= __('PasswdIsValid') ?></th>
          <th><?= __('Created') ?></th>
          <th><?= __('Modified') ?></th>
          <th class="actions"><?= __('Actions') ?></th>
      </tr>
      <?php if (empty($role->users)) { ?>
        <tr>
            <td colspan="25" class="text-muted">
              Users record not found!
            </td>
        </tr>
      <?php }else{ ?>
        <?php foreach ($role->users as $users) : ?>
        <tr>
            <td><?= h($users->id) ?></td>
            <td><?= h($users->active) ?></td>
            <td><?= h($users->employee_id) ?></td>
            <td><?= h($users->role_id) ?></td>
            <td><?= h($users->role) ?></td>
            <td><?= h($users->username) ?></td>
            <td><?= h($users->password) ?></td>
            <td><?= h($users->email) ?></td>
            <td><?= h($users->last_login) ?></td>
            <td><?= h($users->token) ?></td>
            <td><?= h($users->token_expires) ?></td>
            <td><?= h($users->api_token) ?></td>
            <td><?= h($users->activation_date) ?></td>
            <td><?= h($users->secret) ?></td>
            <td><?= h($users->secret_verified) ?></td>
            <td><?= h($users->is_superuser) ?></td>
            <td><?= h($users->raw_password) ?></td>
            <td><?= h($users->quest_one) ?></td>
            <td><?= h($users->ans_one) ?></td>
            <td><?= h($users->quest_two) ?></td>
            <td><?= h($users->ans_two) ?></td>
            <td><?= h($users->passwdIsValid) ?></td>
            <td><?= h($users->created) ?></td>
            <td><?= h($users->modified) ?></td>
            <td class="actions">
              <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id], ['class'=>'btn btn-xs btn-outline-primary']) ?>
              <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->id], ['class'=>'btn btn-xs btn-outline-primary']) ?>
              <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['class'=>'btn btn-xs btn-outline-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $users->id)]) ?>
            </td>
        </tr>
        <?php endforeach; ?>
      <?php } ?>
    </table>
  </div>
</div>

