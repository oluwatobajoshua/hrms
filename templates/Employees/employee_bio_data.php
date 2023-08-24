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
        <h3 class="card-title">Bio-Data Information</h3>
        <?= $this->element('progress_bar',['progress'=>20]); ?>
    </div>
    <?= $this->Form->create($employee) ?>
    <div class="card-body">
        <div class="row">
            <?php
            $this->Form->setTemplates([
              'inputContainer' => '<div class="form-group input col-md-3 {{type}} {{required}}">{{content}}</div>',
            ]);
            // echo $this->Form->control('branch_id', ['options' => $branches]);
            // echo $this->Form->control('staff_no');
            // echo $this->Form->control('department_id', ['options' => $departments]);
            // echo $this->Form->control('section_id', ['options' => $sections]);
            //  echo $this->Form->control('religion_id', ['options' => $religions]);
            echo $this->Form->control('state_of_origin_id', ['options' => $stateoforigins]);
            echo $this->Form->control('local_id', ['options' => $locals, 'label' => 'LGA']);
            echo $this->Form->control('physical_posture_id', ['options' => $physicalPostures]);            
            echo $this->Form->control('highest_education_id', ['options' => $highestEducations]);
            // echo $this->Form->control('designation_id', ['options' => $designations]);
            // echo $this->Form->control('status_id', ['options' => $statuses]);
            // echo $this->Form->control('date_of_birth', ['empty' => true]);
            // echo $this->Form->control('date_joined', ['empty' => true]);
            echo $this->Form->control('home_town');
          ?>
        </div>
    </div>

    <div class="card-footer d-flex">
        <div>
        <?= $this->Form->postLink(
                    __('Delete'),
                    ['action' => 'delete', $employee->id],
                    ['confirm' => __('Are you sure you want to delete {0}?', $employee->full_name), 'class' => 'btn btn-danger btn-block']
                ) ?>
        </div>
        <div class="ml-auto">
            <?= $this->Form->button(__('Save')) ?>
            <?= $this->Html->link(__('Next'), ['action' => 'employeePayroll',$employee->id], ['class' => 'btn btn-primary']) ?>
        </div>
    </div>

    <?= $this->Form->end() ?>
</div>
