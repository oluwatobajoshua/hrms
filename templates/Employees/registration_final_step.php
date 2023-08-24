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
    <h3 class="card-title"><?=$employeeData['first_name'] ?> <?=$employeeData['last_name'] ?> - Other Information</h3>
    <?= $this->element('progress_bar',['progress'=>100]); ?>
</div>
    <?= $this->Form->create($employee) ?>
    <div class="card-body">
        <div class="row">
            <?php
            $this->Form->setTemplates([
              'inputContainer' => '<div class="form-group input col-md-3 {{type}} {{required}}">{{content}}</div>',
            ]); 
            echo $this->Form->file('file', ['accept' => '.jpg, .png, .pdf', 'id' => 'file-input']);
            echo '<div id="file-preview" style="display: none;"></div>';
          ?>
        </div>
    </div>

    <div class="card-footer d-flex">
        <div class="ml-auto">
            <?= $this->Html->link(__('Previous'), ['action' => 'registrationStep1'], ['class' => 'btn btn-default']) ?>
            <?= $this->Form->button(__('Save')) ?>
        </div>
    </div>

    <?= $this->Form->end() ?>
</div>
