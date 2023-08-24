<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bonus $bonus
 */
?>

<?php
$this->assign('title', __('Bonus'));
$this->Breadcrumbs->add([
    ['title' => 'Home', 'url' => '/'],
    ['title' => 'List Bonuses', 'url' => ['action' => 'index']],
    ['title' => 'View'],
]);
?>

<div class="view card card-primary card-outline">
  <div class="card-header d-sm-flex">
    <h2 class="card-title"><?= h($bonus->id) ?></h2>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
        <tr>
            <th><?= __('Employee') ?></th>
            <td><?= $bonus->has('employee') ? $this->Html->link($bonus->employee->name_desc, ['controller' => 'Employees', 'action' => 'view', $bonus->employee->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Bonus Title') ?></th>
            <td><?= h($bonus->bonus_title) ?></td>
        </tr>
        <tr>
            <th><?= __('Status') ?></th>
            <td><?= $bonus->has('status') ? $this->Html->link($bonus->status->name, ['controller' => 'Statuses', 'action' => 'view', $bonus->status->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($bonus->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Bonus Amount') ?></th>
            <td><?= $this->Number->format($bonus->bonus_amount) ?></td>
        </tr>
        <tr>
            <th><?= __('Bonus Date') ?></th>
            <td><?= h($bonus->bonus_date) ?></td>
        </tr>
    </table>
  </div>
  <div class="card-footer d-flex">
    <div class="">
      <?= $this->Form->postLink(
          __('Delete'),
          ['action' => 'delete', $bonus->id],
          ['confirm' => __('Are you sure you want to delete # {0}?', $bonus->id), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Html->link(__('Edit'), ['action' => 'edit', $bonus->id], ['class' => 'btn btn-secondary']) ?>
      <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
    </div>
  </div>
</div>

<div class="view text card">
  <div class="card-header">
    <h3 class="card-title"><?= __('Bonus Description') ?></h3>
  </div>
  <div class="card-body">
    <?= $this->Text->autoParagraph(h($bonus->bonus_description)); ?>
  </div>
</div>

