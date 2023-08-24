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
        <h3 class="card-title">Profile Information</h3>
    </div>
    <?= $this->Form->create($employee) ?>
    <div class="card-body">
        <div class="row">
            <?php
            $this->Form->setTemplates([
              'inputContainer' => '<div class="form-group input col-md-3 {{type}} {{required}}">{{content}}</div>',
            ]);
            echo $this->Html->image($employee->profile_picture ? $employee->profile_picture : 'CakeLte./AdminLTE/dist/img/avatar.png', array('class' => 'profile-user-img img-fluid img-circle', 'alt' => 'User Image'));
            echo $this->Form->file('file', ['accept' => '.jpg, .png, .pdf', 'id' => 'file-input']);
            // echo '<div id="file-preview" style="display: none;"></div>';
            echo $this->Form->control('branch_id', ['options' => $branches,'type'=> 'hidden']);
            echo $this->Form->control('staff_no');
            echo $this->Form->control('first_name');
            echo $this->Form->control('last_name');
            echo $this->Form->control('other_name');
            echo $this->Form->control('work_phone');
            echo $this->Form->control('work_email');
            echo $this->Form->control('email');
            echo $this->Form->control('department_id', ['options' => $departments]);
            echo $this->Form->control('section_id', ['options' => $sections]);
            echo $this->Form->control('cadre_id', ['options' => $cadres]);
            echo $this->Form->control('gender_id', ['options' => $genders]);
            echo $this->Form->control('grade_id', ['options' => $grades]);
            echo $this->Form->control('designation_id', ['options' => $designations]);
            echo $this->Form->control('marital_status_id', ['options' => $maritalStatuses]);
            echo $this->Form->control('name_of_spouse', ['label' => ['Spouse\'s Name']]);
            echo $this->Form->control('reporting_to',['options'=> $reportingTos,'empty' => 'Reporting To']);
            echo $this->Form->control('status_id',['options'=> $statuses]);
            echo $this->Form->control('user_id', ['options' => $users,'empty' => true]);
            echo $this->Form->control('date_of_birth', ['empty' => true]);
            echo $this->Form->control('date_joined', ['empty' => true]);
          ?>
        </div>
    </div>

    <!-- <div class="card-footer d-flex">
        <div>
        <div class="ml-auto">
            <?= $this->Form->button(__('Save')) ?>
        </div>
    </div> -->
    <div class="card-footer d-flex">
        <div>
        <?php if($employee->id): ?>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $employee->id],
                ['confirm' => __('Are you sure you want to delete {0}?', $employee->full_name), 'class' => 'btn btn-danger']
            ) ?>
            <?= $this->Html->link(__('Profile'), ['action' => 'view',$employee->id], ['class' => 'btn btn-success']) ?>
        <?php elseif(!$employee->id): ?>
            <?= $this->Html->link(__('Close'), ['action' => 'index'], ['class' => 'btn btn-secondary']) ?>
        <?php endif ?>
        </div>
        <div class="ml-auto">
            <?= $this->Form->button(__('Save'), ['class' => 'btn btn-success']) ?>
            <?= $this->Html->link(__('Next'), ['action' => 'employeePayroll',$employee->id], ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
    <?= $this->Form->end() ?>
</div>


