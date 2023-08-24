<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PayrollCalculation $payrollCalculation
 */
?>

<?php
$this->assign('title', __('Payroll Calculation'));
$this->Breadcrumbs->add([
    ['title' => 'Home', 'url' => '/'],
    ['title' => 'List Payroll Calculations', 'url' => ['action' => 'index']],
    ['title' => 'View'],
]);
?>

<div class="view card card-primary card-outline">
  <div class="card-header d-sm-flex">
    <h2 class="card-title"><?= h($payrollCalculation->id) ?></h2>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
        <tr>
            <th><?= __('Employee') ?></th>
            <td><?= $payrollCalculation->has('employee') ? $this->Html->link($payrollCalculation->employee->name_desc, ['controller' => 'Employees', 'action' => 'view', $payrollCalculation->employee->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($payrollCalculation->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Earnings') ?></th>
            <td><?= $this->Number->format($payrollCalculation->earnings) ?></td>
        </tr>
        <tr>
            <th><?= __('Deductions') ?></th>
            <td><?= $this->Number->format($payrollCalculation->deductions) ?></td>
        </tr>
        <tr>
            <th><?= __('Additional Earnings') ?></th>
            <td><?= $this->Number->format($payrollCalculation->additional_earnings) ?></td>
        </tr>
        <tr>
            <th><?= __('Net Pay') ?></th>
            <td><?= $this->Number->format($payrollCalculation->net_pay) ?></td>
        </tr>
    </table>
  </div>
  <div class="card-footer d-flex">
    <div class="">
      <?= $this->Form->postLink(
          __('Delete'),
          ['action' => 'delete', $payrollCalculation->id],
          ['confirm' => __('Are you sure you want to delete # {0}?', $payrollCalculation->id), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Html->link(__('Edit'), ['action' => 'edit', $payrollCalculation->id], ['class' => 'btn btn-secondary']) ?>
      <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
    </div>
  </div>
</div>


