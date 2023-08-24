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

    <?= $this->Form->create(null, ['id' => 'empForm']) ?>
        <div class="callout callout-info">
          <div class="row">
            <?php
            $this->Form->setTemplates([
              'inputContainer' => '<div class="form-group input col-md-3 col-xs-6 {{type}} {{required}}">{{content}}</div>'
            ]);
            echo $this->Form->control('workCount', ['type' => 'number', 'onChange' => 'document.getElementById("empForm").submit();', 'value' => $workCount]);
            ?>
          </div>
        </div>
    <?= $this->Form->end() ?>

<div class="card card-primary card-outline">
    <div class="card-header">
        <h3 class="card-title"><?=$employee['first_name'] ?> <?=$employee['last_name'] ?> - Work History</h3>
        <?= $this->element('progress_bar',['progress'=>70]); ?>
    </div>
    <?= $this->Form->create($employee) ?>
    <div class="card-body">
        <div class="row">
            <?php
                   
             for ($w = 0; $w < $workCount; $w++) {
                
              $this->Form->setTemplates([
                'inputContainer' => '<div class="form-group input col-md-2 {{type}} {{required}}">{{content}}</div>',
              ]);
              echo $this->Form->control('work_details.' . $w . '.id');
              echo $this->Form->control('work_details.' . $w . '.organization',['label'=>$w+1 .'. Organization']);
              echo $this->Form->control('work_details.' . $w . '.department');
              echo $this->Form->control('work_details.' . $w . '.job_title');    
              echo $this->Form->control('work_details.' . $w . '.job_class');              
              echo $this->Form->control('work_details.' . $w . '.start_date', ['minYear' => 1900]);         
              echo $this->Form->control('work_details.' . $w . '.end_date', ['minYear' => 1900]);
             }           
          ?>
        </div>
    </div>

    <div class="card-footer d-flex">
        <div>
            <?= $this->Html->link(__('Previous'), ['action' => 'employeeNextOfKin',$employee->id], ['class' => 'btn btn-primary']) ?>
        </div>
        <div class="ml-auto">
            
            <?= $this->Form->button(__('Save')) ?>
            <?= $this->Html->link(__('Next'), ['action' => 'employeeChildrenDetails',$employee->id], ['class' => 'btn btn-primary']) ?>
        </div>
    </div>

    <?= $this->Form->end() ?>
</div>
