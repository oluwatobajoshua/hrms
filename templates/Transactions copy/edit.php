<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PayrollCalculation $payrollCalculation
 */
?>
<?php
$this->assign('title', __('Edit Payroll Calculation'));
$this->Breadcrumbs->add([
    ['title' => 'Home', 'url' => '/'],
    ['title' => 'List Payroll Calculations', 'url' => ['action' => 'index']],
    ['title' => 'View', 'url' => ['action' => 'view', $payrollCalculation->id]],
    ['title' => 'Edit'],
]);
?>

<div class="card card-primary card-outline">
  <?= $this->Form->create($payrollCalculation) ?>
  <div class="card-body">
    <?php
      echo $this->Form->control('employee_id', ['options' => $employees]);
      echo $this->Form->control('earnings');
      echo $this->Form->control('deductions');
      echo $this->Form->control('additional_earnings');
      echo $this->Form->control('net_pay');
    ?>
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
      <?= $this->Form->button(__('Save')) ?>
      <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
    </div>
  </div>

  <?= $this->Form->end() ?>
</div>

