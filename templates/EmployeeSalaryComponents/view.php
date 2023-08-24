<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EmployeeSalaryComponent $employeeSalaryComponent
 */
?>

<?php
$this->assign('title', __('Employee Salary Component'));
$this->Breadcrumbs->add([
    ['title' => 'Home', 'url' => '/'],
    ['title' => 'List Employee Salary Components', 'url' => ['action' => 'index']],
    ['title' => 'View'],
]);
?>

<div class="view card card-primary card-outline">
  <div class="card-header d-sm-flex">
    <h2 class="card-title"><?= h($employeeSalaryComponent->id) ?></h2>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
        <tr>
            <th><?= __('Employee') ?></th>
            <td><?= $employeeSalaryComponent->has('employee') ? $this->Html->link($employeeSalaryComponent->employee->name_desc, ['controller' => 'Employees', 'action' => 'view', $employeeSalaryComponent->employee->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Salary Component') ?></th>
            <td><?= $employeeSalaryComponent->has('salary_component') ? $this->Html->link($employeeSalaryComponent->salary_component->name, ['controller' => 'SalaryComponents', 'action' => 'view', $employeeSalaryComponent->salary_component->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($employeeSalaryComponent->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($employeeSalaryComponent->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($employeeSalaryComponent->modified) ?></td>
        </tr>
    </table>
  </div>
  <div class="card-footer d-flex">
    <div class="">
      <?= $this->Form->postLink(
          __('Delete'),
          ['action' => 'delete', $employeeSalaryComponent->id],
          ['confirm' => __('Are you sure you want to delete # {0}?', $employeeSalaryComponent->id), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Html->link(__('Edit'), ['action' => 'edit', $employeeSalaryComponent->id], ['class' => 'btn btn-secondary']) ?>
      <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
    </div>
  </div>
</div>


