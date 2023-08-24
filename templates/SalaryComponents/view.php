<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SalaryComponent $salaryComponent
 */
?>

<?php
$this->assign('title', __('Salary Component'));
$this->Breadcrumbs->add([
    ['title' => 'Home', 'url' => '/'],
    ['title' => 'List Salary Components', 'url' => ['action' => 'index']],
    ['title' => 'View'],
]);
?>

<div class="view card card-primary card-outline">
  <div class="card-header d-sm-flex">
    <h2 class="card-title"><?= h($salaryComponent->name) ?></h2>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
        <tr>
            <th><?= __('Employee') ?></th>
            <td><?= $salaryComponent->has('employee') ? $this->Html->link($salaryComponent->employee->name_desc, ['controller' => 'Employees', 'action' => 'view', $salaryComponent->employee->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($salaryComponent->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Type') ?></th>
            <td><?= h($salaryComponent->type) ?></td>
        </tr>
        <tr>
            <th><?= __('Frequency') ?></th>
            <td><?= h($salaryComponent->frequency) ?></td>
        </tr>
        <tr>
            <th><?= __('Calculation Formula') ?></th>
            <td><?= h($salaryComponent->calculation_formula) ?></td>
        </tr>
        <tr>
            <th><?= __('Currency') ?></th>
            <td><?= h($salaryComponent->currency) ?></td>
        </tr>
        <tr>
            <th><?= __('Default Currency') ?></th>
            <td><?= h($salaryComponent->default_currency) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($salaryComponent->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Amount') ?></th>
            <td><?= $this->Number->format($salaryComponent->amount) ?></td>
        </tr>
        <tr>
            <th><?= __('Priority') ?></th>
            <td><?= $this->Number->format($salaryComponent->priority) ?></td>
        </tr>
        <tr>
            <th><?= __('Tax Rate') ?></th>
            <td><?= $this->Number->format($salaryComponent->tax_rate) ?></td>
        </tr>
        <tr>
            <th><?= __('Tax Deduction') ?></th>
            <td><?= $this->Number->format($salaryComponent->tax_deduction) ?></td>
        </tr>
        <tr>
            <th><?= __('Nigerian Tax Rate') ?></th>
            <td><?= $this->Number->format($salaryComponent->nigerian_tax_rate) ?></td>
        </tr>
        <tr>
            <th><?= __('Pension Deduction') ?></th>
            <td><?= $this->Number->format($salaryComponent->pension_deduction) ?></td>
        </tr>
        <tr>
            <th><?= __('Nhf Deduction') ?></th>
            <td><?= $this->Number->format($salaryComponent->nhf_deduction) ?></td>
        </tr>
        <tr>
            <th><?= __('Created By') ?></th>
            <td><?= $this->Number->format($salaryComponent->created_by) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified By') ?></th>
            <td><?= $this->Number->format($salaryComponent->modified_by) ?></td>
        </tr>
        <tr>
            <th><?= __('Effective Start Date') ?></th>
            <td><?= h($salaryComponent->effective_start_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Effective End Date') ?></th>
            <td><?= h($salaryComponent->effective_end_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($salaryComponent->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($salaryComponent->modified) ?></td>
        </tr>
        <tr>
            <th><?= __('Taxable') ?></th>
            <td><?= $salaryComponent->taxable ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th><?= __('Active') ?></th>
            <td><?= $salaryComponent->active ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th><?= __('Approval Required') ?></th>
            <td><?= $salaryComponent->approval_required ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th><?= __('Taxable Default') ?></th>
            <td><?= $salaryComponent->taxable_default ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th><?= __('Nigerian Taxable') ?></th>
            <td><?= $salaryComponent->nigerian_taxable ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
  </div>
  <div class="card-footer d-flex">
    <div class="">
      <?= $this->Form->postLink(
          __('Delete'),
          ['action' => 'delete', $salaryComponent->id],
          ['confirm' => __('Are you sure you want to delete # {0}?', $salaryComponent->id), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Html->link(__('Edit'), ['action' => 'edit', $salaryComponent->id], ['class' => 'btn btn-secondary']) ?>
      <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
    </div>
  </div>
</div>

<div class="view text card">
  <div class="card-header">
    <h3 class="card-title"><?= __('Description') ?></h3>
  </div>
  <div class="card-body">
    <?= $this->Text->autoParagraph(h($salaryComponent->description)); ?>
  </div>
</div>
<div class="view text card">
  <div class="card-header">
    <h3 class="card-title"><?= __('Localization') ?></h3>
  </div>
  <div class="card-body">
    <?= $this->Text->autoParagraph(h($salaryComponent->localization)); ?>
  </div>
</div>
<div class="view text card">
  <div class="card-header">
    <h3 class="card-title"><?= __('Attachments') ?></h3>
  </div>
  <div class="card-body">
    <?= $this->Text->autoParagraph(h($salaryComponent->attachments)); ?>
  </div>
</div>

<div class="related related-employeeSalaryComponents view card">
  <div class="card-header d-sm-flex">
    <h3 class="card-title"><?= __('Related Employee Salary Components') ?></h3>
    <div class="card-toolbox">
      <?= $this->Html->link(__('New'), ['controller' => 'EmployeeSalaryComponents' , 'action' => 'add'], ['class' => 'btn btn-primary btn-sm']) ?>
      <?= $this->Html->link(__('List '), ['controller' => 'EmployeeSalaryComponents' , 'action' => 'index'], ['class' => 'btn btn-primary btn-sm']) ?>
    </div>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
      <tr>
          <th><?= __('Id') ?></th>
          <th><?= __('Employee Id') ?></th>
          <th><?= __('Salary Component Id') ?></th>
          <th><?= __('Created') ?></th>
          <th><?= __('Modified') ?></th>
          <th class="actions"><?= __('Actions') ?></th>
      </tr>
      <?php if (empty($salaryComponent->employee_salary_components)) { ?>
        <tr>
            <td colspan="6" class="text-muted">
              Employee Salary Components record not found!
            </td>
        </tr>
      <?php }else{ ?>
        <?php foreach ($salaryComponent->employee_salary_components as $employeeSalaryComponents) : ?>
        <tr>
            <td><?= h($employeeSalaryComponents->id) ?></td>
            <td><?= h($employeeSalaryComponents->employee_id) ?></td>
            <td><?= h($employeeSalaryComponents->salary_component_id) ?></td>
            <td><?= h($employeeSalaryComponents->created) ?></td>
            <td><?= h($employeeSalaryComponents->modified) ?></td>
            <td class="actions">
              <?= $this->Html->link(__('View'), ['controller' => 'EmployeeSalaryComponents', 'action' => 'view', $employeeSalaryComponents->id], ['class'=>'btn btn-xs btn-outline-primary']) ?>
              <?= $this->Html->link(__('Edit'), ['controller' => 'EmployeeSalaryComponents', 'action' => 'edit', $employeeSalaryComponents->id], ['class'=>'btn btn-xs btn-outline-primary']) ?>
              <?= $this->Form->postLink(__('Delete'), ['controller' => 'EmployeeSalaryComponents', 'action' => 'delete', $employeeSalaryComponents->id], ['class'=>'btn btn-xs btn-outline-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $employeeSalaryComponents->id)]) ?>
            </td>
        </tr>
        <?php endforeach; ?>
      <?php } ?>
    </table>
  </div>
</div>

