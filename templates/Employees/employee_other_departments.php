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
            echo $this->Form->control('otherDepartmentCount', ['type' => 'number', 'onChange' => 'document.getElementById("empForm").submit();', 'value' => $otherDepartmentCount]);
            ?>
          </div>
        </div>
    <?= $this->Form->end() ?>

<div class="card card-primary card-outline">
    <div class="card-header">
        <h3 class="card-title"><?=$employee['first_name'] ?> <?=$employee['last_name'] ?> - Other Department</h3>
        <?= $this->element('progress_bar',['progress'=>90]); ?>
    </div>
    <?= $this->Form->create($employee) ?>
    <div class="card-body">
        <div class="row">
            <?php
                   
             for ($od = 0; $od < $otherDepartmentCount; $od++) {
                
              $this->Form->setTemplates([
                'inputContainer' => '<div class="form-group input col-md-4 {{type}} {{required}}">{{content}}</div>',
              ]);
                echo $this->Form->control('other_departments.' . $od . '.id');
                echo $this->Form->control('other_departments.' . $od . '.department_id', ['options' => $departments, 'empty' => 'Other department', 'label' => 'Other Department']);
                $this->Form->setTemplates([
                  'inputContainer' => '<div class="form-group input col-md-8 {{type}} {{required}}">{{content}}</div>',
                ]);
                echo $this->Form->control('other_departments.' . $od . '.comment', ['label' => 'Comment/Reason']);           
              
             }           
          ?>
        </div>
    </div>

    <div class="card-footer d-flex">
      <div>
        <?= $this->Html->link(__('Previous'), ['action' => 'employeeEducationHistory',$employee->id], ['class' => 'btn btn-primary']) ?>
      </div>
        <div class="ml-auto">
            
            <?= $this->Form->button(__('Save'), ['class' => 'btn btn-success']) ?>
            <?= $this->Html->link(__('Close'), ['action' => 'view',$employee->id], ['class' => 'btn btn-primary']) ?>
        </div>
    </div>

    <?= $this->Form->end() ?>
</div>
