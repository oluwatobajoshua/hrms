<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employee $employee
 */
?>
<?php
$this->assign('title', __('Add Employee'));
$this->Breadcrumbs->add([
    ['title' => 'Home', 'url' => '/'],
    ['title' => 'List Employees', 'url' => ['action' => 'index']],
    ['title' => 'Add'],
]);
?>

<div class="card card-primary card-outline">
    <div class="card-header">
        <h3 class="card-title"><?=$employee['first_name'] ?> <?=$employee['last_name'] ?> - Payroll Information</h3>
        <?= $this->element('progress_bar',['progress'=>30]); ?>
    </div>
    <?= $this->Form->create($employee) ?>
    <div class="card-body">
        <div class="row">
            <?php
            $this->Form->setTemplates([
              'inputContainer' => '<div class="form-group input col-md-3 {{type}} {{required}}">{{content}}</div>',
            ]); 
            echo $this->Form->control('salary');
            echo $this->Form->control('bank_id', ['options' => $banks]);
            echo $this->Form->control('acct_no');
            echo $this->Form->control('service_charge_bank', ['options' => $banks]);
            echo $this->Form->control('service_charge_number');
            echo $this->Form->control('transport_allowance');
            echo $this->Form->control('housing_allowance');
            echo $this->Form->control('utility_allowance');
            echo $this->Form->control('leave_allowance');            
            echo $this->Form->control('domestic_allowance');
            echo $this->Form->control('drivers_allowance');
            echo $this->Form->control('medical_allowance');
            echo $this->Form->control('entertainment_allowance');
            echo $this->Form->control('other_allowance');
            echo $this->Form->control('tax_number');
            echo $this->Form->control('tax_relief');
            echo $this->Form->control('tax_paid_to_date');
            echo $this->Form->control('pension_no');            
            echo $this->Form->control('personal_loan');
            echo $this->Form->control('pers_loan_rep');
            echo $this->Form->control('pers_loan_paid');
            echo $this->Form->control('pers_loan_inst');
            echo $this->Form->control('car_loan');
            echo $this->Form->control('car_loan_rep');
            echo $this->Form->control('car_loan_inst');
            echo $this->Form->control('car_loan_paid');
            echo $this->Form->control('whl_cics');
            echo $this->Form->control('pension_control');
            echo $this->Form->control('salary_advance');
            echo $this->Form->control('salary_advance_rep');
            echo $this->Form->control('salary_advance_paid');
            echo $this->Form->control('salary_advance_inst');            
            echo $this->Form->control('bro_cics');
            // echo $this->Form->control('contribution');
            
          ?>
        </div>
    </div>

    <div class="card-footer d-flex">
        <div>
            <?= $this->Html->link(__('Previous'), ['action' => 'employeeBioData'], ['class' => 'btn btn-primary']) ?>
        </div>
        <div class="ml-auto">
            
            <?= $this->Form->button(__('Save')) ?>
            <?= $this->Html->link(__('Next'), ['action' => 'employeeAddress',$employee->id], ['class' => 'btn btn-primary']) ?>
        </div>
    </div>

    <?= $this->Form->end() ?>
</div>
