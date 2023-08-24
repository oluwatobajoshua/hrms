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
            echo $this->Form->control('addressCount', ['type' => 'number', 'onChange' => 'document.getElementById("empForm").submit();', 'value' => $addressCount]);
            ?>
          </div>
        </div>
    <?= $this->Form->end() ?>

<div class="card card-primary card-outline">
    <div class="card-header">
        <h3 class="card-title"><?=$employee['first_name'] ?> <?=$employee['last_name'] ?> - Address Information</h3>
        <?= $this->element('progress_bar',['progress'=>50]); ?>
    </div>
    <?= $this->Form->create($employee, ['role' => 'form', 'id' => 'emp']) ?>
    <div class="card-body">
        <div class="row">
            <?php
            $this->Form->setTemplates([
                'inputContainer' => '<div class="form-group input col-md-4 {{type}} {{required}}">{{content}}</div>',
              ]);
             
             for ($i = 0; $i < $addressCount; $i++) {

                $this->Form->setTemplates([
                    'inputContainer' => '<div class="form-group input col-md-1 {{type}} {{required}}">{{content}}</div>',
                  ]);
                 echo $this->Form->control('employee.' . $i . '.id');
                 echo $this->Form->control('addresses.' . $i . '.S/N', ['readonly'=>true,'value' => $i + 1]);

                 $this->Form->setTemplates([
                    'inputContainer' => '<div class="form-group input col-md-3 {{type}} {{required}}">{{content}}</div>',
                  ]);                
                 echo $this->Form->control('addresses.' . $i . '.address_type_id', ['options' => $addressTypes]);
                 
                 $this->Form->setTemplates([
                    'inputContainer' => '<div class="form-group input col-md-8 {{type}} {{required}}">{{content}}</div>',
                  ]);
                 echo $this->Form->control('addresses.' . $i . '.id');
                 echo $this->Form->control('addresses.' . $i . '.name', ['label' => 'Address','rows' => 1]);
                 
             }           
          ?>
        </div>
    </div>

    <div class="card-footer d-flex">
        <div>
            <?= $this->Html->link(__('Previous'), ['action' => 'employeePayroll',$employee->id], ['class' => 'btn btn-primary']) ?>
        </div>
        <div class="ml-auto">
            <?= $this->Form->button(__('Save')) ?>
            <?= $this->Html->link(__('Next'), ['action' => 'employeeNextOfKin',$employee->id], ['class' => 'btn btn-primary']) ?>
        </div>
    </div>

    <?= $this->Form->end() ?>
</div>
