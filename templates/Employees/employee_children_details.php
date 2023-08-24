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
            echo $this->Form->control('childCount', ['type' => 'number', 'onChange' => 'document.getElementById("empForm").submit();', 'value' => $childCount]);
            ?>
          </div>
        </div>
    <?= $this->Form->end() ?>

<div class="card card-primary card-outline">
    <div class="card-header">
        <h3 class="card-title"><?=$employee['first_name'] ?> <?=$employee['last_name'] ?> - Children Information</h3>
        <?= $this->element('progress_bar',['progress'=>30]); ?>
    </div>
    <?= $this->Form->create($employee) ?>
    <div class="card-body">
        <div class="row">
            <?php
                   
             for ($i = 0; $i < $childCount; $i++) {
                
              $this->Form->setTemplates([
                'inputContainer' => '<div class="form-group input col-md-6 {{type}} {{required}}">{{content}}</div>',
              ]);
              echo $this->Form->control('employee.id');
              echo $this->Form->control('children_details.' . $i . '.id');
              echo $this->Form->control('children_details.' . $i . '.name',['label'=>$i+1 .'. Name']);
              $this->Form->setTemplates([
                'inputContainer' => '<div class="form-group input col-md-4 {{type}} {{required}}">{{content}}</div>',
              ]);
              echo $this->Form->control('children_details.' . $i . '.gender_id', ['options' => $genders]); 
              $this->Form->setTemplates([
                'inputContainer' => '<div class="form-group input col-md-4 {{type}} {{required}}">{{content}}</div>',
              ]);             
              echo $this->Form->control('children_details.' . $i . '.date_of_birth', ['minYear' => 1900]);              
              
             }           
          ?>
        </div>
    </div>

    <div class="card-footer d-flex">
        <div>
          <?= $this->Html->link(__('Previous'), ['action' => 'employeeWorkHistory',$employee->id], ['class' => 'btn btn-primary']) ?>
        </div>
        <div class="ml-auto">
            
            <?= $this->Form->button(__('Save')) ?>
            <?= $this->Html->link(__('Next'), ['action' => 'employeeEducationHistory',$employee->id], ['class' => 'btn btn-primary']) ?>
        </div>
    </div>

    <?= $this->Form->end() ?>
</div>
