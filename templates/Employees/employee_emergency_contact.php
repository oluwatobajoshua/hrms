<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employee $employee
 */
?>
<?php
$this->assign('title', __('Employee Emergency Contacts'));
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
            echo $this->Form->control('emergencyContactCount', ['type' => 'number', 'onChange' => 'document.getElementById("empForm").submit();', 'value' => $emergencyContactCount]);
            ?>
          </div>
        </div>
    <?= $this->Form->end() ?>

<div class="card card-primary card-outline">
    <div class="card-header">
        <h3 class="card-title"><?=$employee['first_name'] ?> <?=$employee['last_name'] ?> - Next Of Kin Information</h3>
        <?= $this->element('progress_bar',['progress'=>60]); ?>
    </div>
    <!-- <?= debug($employee);?> -->
    <?= $this->Form->create($employee) ?>
    <div class="card-body">
        <div class="row">
            <?php
                   
             for ($i = 0; $i < $emergencyContactCount; $i++) {
                
                $this->Form->setTemplates([
                  'inputContainer' => '<div class="form-group input col-md-1 {{type}} {{required}}">{{content}}</div>',
                ]);

                 echo $this->Form->control('emergency_contacts.' . $i . '.S/N', ['readonly'=>true,'value' => $i + 1]);

                $this->Form->setTemplates([
                    'inputContainer' => '<div class="form-group input col-md-2 {{type}} {{required}}">{{content}}</div>',
                  ]);
                  echo $this->Form->control('emergency_contacts.' . $i . '.id');
                  echo $this->Form->control('emergency_contacts.' . $i . '.name');
                  $this->Form->setTemplates([
                    'inputContainer' => '<div class="form-group input col-md-2 {{type}} {{required}}">{{content}}</div>',
                  ]);
                  echo $this->Form->control('emergency_contacts.' . $i . '.relationship_id', ['options' => $relationships]);
                  $this->Form->setTemplates([
                    'inputContainer' => '<div class="form-group input col-md-3 {{type}} {{required}}">{{content}}</div>',
                  ]);
                  echo $this->Form->control('emergency_contacts.' . $i . '.address');
                  
                  $this->Form->setTemplates([
                    'inputContainer' => '<div class="form-group input col-md-2 {{type}} {{required}}">{{content}}</div>',
                  ]);
                  echo $this->Form->control('emergency_contacts.' . $i . '.phone');
                  $this->Form->setTemplates([
                    'inputContainer' => '<div class="form-group input col-md-2 {{type}} {{required}}">{{content}}</div>',
                  ]);
                  echo $this->Form->control('emergency_contacts.' . $i . '.email');
                 
             }           
          ?>
        </div>
    </div>

    <div class="card-footer d-flex">
        <div>
            <?= $this->Html->link(__('Previous'), ['action' => 'employeeAddress',$employee->id], ['class' => 'btn btn-primary']) ?>
            <?= $this->Html->link(__('View'), ['action' => 'view',$employee->id], ['class' => 'btn btn-success']) ?>
        </div>
        <div class="ml-auto">
            
            <?= $this->Form->button(__('Save')) ?>
            <?= $this->Html->link(__('Next'), ['action' => 'employeeWorkHistory',$employee->id], ['class' => 'btn btn-primary']) ?>
        </div>
    </div>

    <?= $this->Form->end() ?>
</div>
