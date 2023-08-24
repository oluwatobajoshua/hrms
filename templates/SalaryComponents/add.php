<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SalaryComponent $salaryComponent
 */
?>
<?php
$this->assign('title', __('Add Salary Component'));
$this->Breadcrumbs->add([
    ['title' => 'Home', 'url' => '/'],
    ['title' => 'List Salary Components', 'url' => ['action' => 'index']],
    ['title' => 'Add'],
]);
?>

<div class="card card-primary card-outline">
  <?= $this->Form->create($salaryComponent) ?>
  <div class="card-body">
    <?php
      echo $this->Form->control('employee_id', ['options' => $employees]);
      echo $this->Form->control('name');
      echo $this->Form->control('type');
      echo $this->Form->control('amount');
      echo $this->Form->control('frequency');
      echo $this->Form->control('taxable', ['custom' => true]);
      echo $this->Form->control('priority');
      echo $this->Form->control('calculation_formula');
      echo $this->Form->control('description');
      echo $this->Form->control('active', ['custom' => true]);
      echo $this->Form->control('effective_start_date', ['empty' => true]);
      echo $this->Form->control('effective_end_date', ['empty' => true]);
      echo $this->Form->control('currency');
      echo $this->Form->control('localization');
      echo $this->Form->control('attachments');
      echo $this->Form->control('approval_required', ['custom' => true]);
      echo $this->Form->control('default_currency');
      echo $this->Form->control('taxable_default', ['custom' => true]);
      echo $this->Form->control('tax_rate');
      echo $this->Form->control('tax_deduction');
      echo $this->Form->control('nigerian_taxable', ['custom' => true]);
      echo $this->Form->control('nigerian_tax_rate');
      echo $this->Form->control('pension_deduction');
      echo $this->Form->control('nhf_deduction');
      echo $this->Form->control('created_by');
      echo $this->Form->control('modified_by');
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

