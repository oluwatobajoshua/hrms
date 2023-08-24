<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Transaction $transaction
 */
?>
<?php
$this->assign('title', __('Add Transaction'));
$this->Breadcrumbs->add([
    ['title' => 'Home', 'url' => '/'],
    ['title' => 'List Transactions', 'url' => ['action' => 'index']],
    ['title' => 'Add'],
]);
?>

<div class="card card-primary card-outline">
  <?= $this->Form->create($transaction) ?>
  <div class="card-body">
    <div class="row">
    <?php

                $union_due          = $employeed->salary/12 *($employeed->cadre->union_due * 0.01);
                $pension            = ($employeed->salary + $employeed->housing_allowance + $employeed->transport_allowance)/12*($employeed->cadre->pension * 0.01);
                $paye               = $employeed->salary/12 *($employeed->cadre->tax_due * 0.01);  
                $transaction->ctcs  = $employeed->whl_cics + $employeed->bro_cics; 
                         
                echo '<div class="col-md-3">';
                echo $this->Form->control('employee_id', ['options' => $employee]);
                echo $this->Form->control('company_id', ['value'=>$company->id, 'type'=>'hidden']);
                echo $this->Form->Control('date', ['value' => $company->date, 'readonly'=>true]);                             
                echo $this->Form->control('basic_salary',['value' => round($employeed->salary/12,2)]);                
                echo $this->Form->control('transport_allowance',['value' => round($employeed->transport_allowance/12,2),'places'=>2]); 
                echo $this->Form->control('pension_deduction',['value' => round(($pension),2)]);               
                echo $this->Form->control('domestic_allowance',['value' => round($employeed->domestic_allowance/12,2)]);                                           
                echo $this->Form->control('living_in_allowance',['value' => round($employeed->living_allowance/12,2)]);
                echo $this->Form->control('medical_allowance',['value' => round($employeed->medical_allowance/12,2)]);                                
                echo '</div>';            
                echo '<div class="col-md-3">';
                echo $this->Form->control('utility_allowance',['value' => round($employeed->utility_allowance/12,2)]);
                echo $this->Form->control('entertainment_allowance',['value' => round($employeed->entertainment_allowance/12,2)]);
                echo $this->Form->control('other_allowance',['value' => round($employeed->other_allowance/12,2)]);
                echo $this->Form->control('ctcs',['value' => round($employeed->whl_cics + $employeed->bro_cics,2)]);                
                echo $this->Form->control('other_deduction');
                echo $this->Form->control('salary_advance',['value' => round($employeed->salary_advance_rep,2)]);
                echo $this->Form->control('drivers_allowance',['value' => round($employeed->drivers_allowance/12,2)]);
                echo '</div>';                          
                echo '<div class="col-md-3">';
                echo $this->Form->control('bar_account');
                echo $this->Form->control('union_due',['value' => round($union_due,2)]);                                                       
                echo $this->Form->control('housing_allowance',['value' => round($employeed->housing_allowance/12,2)]);                
                echo $this->Form->control('paye',['value' => round($paye,2)]);
                echo $this->Form->control('arrears');
                echo $this->Form->control('sc_deduction');
                echo $this->Form->control('ileya_xmas_bonus');                
                echo '</div>';                          
                echo '<div class="col-md-3">';
                echo $this->Form->control('end_of_year_bonus');
                echo $this->Form->control('leave_allowance');
                echo $this->Form->control('personal_loan',['value' => round($employeed->pers_loan_rep,2)]);
                echo $this->Form->control('surcharge'); 
                echo '</div>';  
              ?>
    </div>
  </div>

  <div class="card-footer d-flex">
    <div class="ml-auto">
      <?= $this->Form->button(__('Save')) ?>
      <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
    </div>
  </div>

  <?= $this->Form->end() ?>
</div>

