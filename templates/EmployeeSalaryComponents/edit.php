<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EmployeeSalaryComponent $employeeSalaryComponent
 */
?>
<?php
$this->assign('title', __('Edit Employee Salary Component'));
$this->Breadcrumbs->add([
    ['title' => 'Home', 'url' => '/'],
    ['title' => 'List Employee Salary Components', 'url' => ['action' => 'index']],
    ['title' => 'View', 'url' => ['action' => 'view', $employeeSalaryComponent->id]],
    ['title' => 'Edit'],
]);
?>

<div class="card card-primary card-outline">
  <?= $this->Form->create($employeeSalaryComponent) ?>
  <div class="card-body">
    <?php
      echo $this->Form->control('employee_id', ['options' => $employees]);
      echo $this->Form->control('salary_component_id', ['options' => $salaryComponents]);
    ?>
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
      <?= $this->Form->button(__('Save')) ?>
      <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
    </div>
  </div>

  <?= $this->Form->end() ?>
</div>

