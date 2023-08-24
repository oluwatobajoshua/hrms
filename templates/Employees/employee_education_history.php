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
            echo $this->Form->control('educationCount', ['type' => 'number', 'onChange' => 'document.getElementById("empForm").submit();', 'value' => $educationCount]);
            ?>
          </div>
        </div>
    <?= $this->Form->end() ?>

<div class="card card-primary card-outline">
    <div class="card-header">
        <h3 class="card-title"><?=$employee['first_name'] ?> <?=$employee['last_name'] ?> - Education Information</h3>
        <?= $this->element('progress_bar',['progress'=>80]); ?>
    </div>
    <?= $this->Form->create($employee) ?>
    <div class="card-body">
        <div class="row">
            <?php
                   
             for ($e = 0; $e < $educationCount; $e++) {
                
              $this->Form->setTemplates([
                'inputContainer' => '<div class="form-group input col-md-4 {{type}} {{required}}">{{content}}</div>',
              ]);
              echo $this->Form->control('educations.' . $e . '.id');
              echo $this->Form->control('educations.' . $e . '.institution',['label'=>$e+1 .'. Institution']);
              $this->Form->setTemplates([
                'inputContainer' => '<div class="form-group input col-md-2 {{type}} {{required}}">{{content}}</div>',
              ]);
              echo $this->Form->control('educations.' . $e . '.highest_education_id', ['options' => $highestEducations]);
              $this->Form->setTemplates([
                'inputContainer' => '<div class="form-group input col-md-3 {{type}} {{required}}">{{content}}</div>',
              ]);
              echo $this->Form->control('educations.' . $e . '.course_of_study');
              $this->Form->setTemplates([
                'inputContainer' => '<div class="form-group input col-md-3 {{type}} {{required}}">{{content}}</div>',
              ]);
              echo $this->Form->control('educations.' . $e . '.date', ['minYear' => 1900]);  
              $this->Form->setTemplates([
                'inputContainer' => '<div class="form-group input col-md-12 {{type}} {{required}}">{{content}}</div>',
              ]);
              echo $this->Form->control('educations.' . $e . '.file_url', ['type' => 'file']);          
              
             }           
          ?>
        </div>
    </div>

    <div class="card-footer d-flex">
        <div>
        <?= $this->Html->link(__('Previous'), ['action' => 'employeeChildrenDetails',$employee->id], ['class' => 'btn btn-primary']) ?>
        </div>
        <div class="ml-auto">            
            <?= $this->Form->button(__('Save')) ?>
            <?= $this->Html->link(__('Next'), ['action' => 'employeeOtherDepartments',$employee->id], ['class' => 'btn btn-primary']) ?>
        </div>
    </div>

    <?= $this->Form->end() ?>
</div>
