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

<div class="row">
          <div class="col-md-12">
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">bs-stepper</h3>
              </div>
              <div class="card-body p-0">
                <div class="bs-stepper">
                  <div class="bs-stepper-header" role="tablist">
                    <!-- your steps here -->
                    <div class="step" data-target="#logins-part">
                      <button type="button" class="step-trigger" role="tab" aria-controls="logins-part" id="logins-part-trigger">
                        <span class="bs-stepper-circle">1</span>
                        <span class="bs-stepper-label">Logins</span>
                      </button>
                    </div>
                    <div class="line"></div>
                    <div class="step" data-target="#information-part">
                      <button type="button" class="step-trigger" role="tab" aria-controls="information-part" id="information-part-trigger">
                        <span class="bs-stepper-circle">2</span>
                        <span class="bs-stepper-label">Various information</span>
                      </button>
                    </div>
                  </div>
                  <div class="bs-stepper-content">
                    <!-- your steps content here -->
                    <div id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                    <?= $this->Form->create($employee) ?>
                    <div class="card-body">
                        <div class="row">
                            <?php
                            $this->Form->setTemplates([
                            'inputContainer' => '<div class="form-group input col-md-3 {{type}} {{required}}">{{content}}</div>',
                            ]);
                            echo $this->Form->control('branch_id', ['options' => $branches]);
                            echo $this->Form->control('staff_no');
                            echo $this->Form->control('first_name');
                            echo $this->Form->control('last_name');
                            echo $this->Form->control('phone');
                            echo $this->Form->control('email');
                            echo $this->Form->control('department_id', ['options' => $departments]);
                            echo $this->Form->control('section_id', ['options' => $sections, 'empty' => true]);
                            echo $this->Form->control('cadre_id', ['options' => $cadres]);
                            echo $this->Form->control('gender_id', ['options' => $genders]);
                            echo $this->Form->control('grade_id', ['options' => $grades]);
                            echo $this->Form->control('religion_id', ['options' => $religions]);
                            echo $this->Form->control('state_of_origin_id', ['options' => $stateoforigins]);
                            echo $this->Form->control('local_id', ['options' => $locals]);
                            echo $this->Form->control('physical_posture_id', ['options' => $physicalPostures]);
                            echo $this->Form->control('marital_status_id', ['options' => $maritalStatuses]);
                            echo $this->Form->control('highest_education_id', ['options' => $highestEducations]);
                            echo $this->Form->control('designation_id', ['options' => $designations, 'empty' => true]);
                            echo $this->Form->control('status_id', ['options' => $statuses]);
                            echo $this->Form->control('date_of_birth', ['empty' => true]);
                            echo $this->Form->control('date_joined', ['empty' => true]);
                            echo $this->Form->control('home_town');
                        ?>
                        </div>
                    </div>
                    <div class="card-footer d-flex">
                        <div class="ml-auto">
                            <?= $this->Form->button(__('Save')) ?>
                            <?= $this->Form->end() ?>
                            <button type="button" class="btn btn-primary" onclick="stepper.next()">Next</button>
                        </div>
                    </div>                      
                    </div>
                    <div id="information-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                    <?= $this->Form->create($employee) ?>
                    <div class="card-body">
                        <div class="row">
                            <?php
                            $this->Form->setTemplates([
                            'inputContainer' => '<div class="form-group input col-md-3 {{type}} {{required}}">{{content}}</div>',
                            ]);                          
                            
                            echo $this->Form->control('salary');
                            echo $this->Form->control('bank_id', ['options' => $banks]);
                            echo $this->Form->control('acct_no');
                            echo $this->Form->control('service_charge_bank');
                            echo $this->Form->control('service_charge_number');
                            echo $this->Form->control('transport_allowance');
                            echo $this->Form->control('housing_allowance');
                            echo $this->Form->control('utility_allowance');
                            echo $this->Form->control('leave_allowance');            
                            echo $this->Form->control('domestic_allowance');
                            echo $this->Form->control('tax_number');
                            echo $this->Form->control('tax_relief');
                            echo $this->Form->control('tax_paid_to_date');
                            echo $this->Form->control('pension_no');
                            echo $this->Form->control('medical_allowance');
                            echo $this->Form->control('entertainment_allowance');
                            echo $this->Form->control('other_allowance');
                            echo $this->Form->control('personal_loan');
                            echo $this->Form->control('pers_loan_rep');
                            echo $this->Form->control('pers_loan_paid');
                            echo $this->Form->control('pers_loan_inst');
                            echo $this->Form->control('car_loan');
                            echo $this->Form->control('car_loan_rep');
                            echo $this->Form->control('car_loan_inst');
                            echo $this->Form->control('car_loan_paid');
                            echo $this->Form->control('whl_cics');
                            echo $this->Form->control('pension_control');
                            echo $this->Form->control('salary_advance');
                            echo $this->Form->control('salary_advance_rep');
                            echo $this->Form->control('salary_advance_paid');
                            echo $this->Form->control('salary_advance_inst');
                            echo $this->Form->control('drivers_allowance');
                            echo $this->Form->control('bro_cics');
                            echo $this->Form->control('user_id', ['options' => $users]);
                            echo $this->Form->control('contribution');
                            echo $this->Form->file('file', ['accept' => '.jpg, .png, .pdf', 'id' => 'file-input']);
                            echo '<div id="file-preview" style="display: none;"></div>';
                        ?>
                        </div>
                    </div>
                    <div class="card-footer d-flex">
                        <div class="ml-auto">
                            <?= $this->Form->button(__('Save')) ?>
                            <?= $this->Form->end() ?>
                            <button type="button" class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                            <button type="button" class="btn btn-primary" onclick="stepper.next()">Next</button>
                        </div>
                    </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                Visit <a href="https://github.com/Johann-S/bs-stepper/#how-to-use-it">bs-stepper documentation</a> for more examples and information about the plugin.
              </div>
            </div>
            <!-- /.card -->
          </div>
        </div>

<!-- <div class="card card-primary card-outline">
    <?= $this->Form->create($employee) ?>
    <div class="card-body">
        <div class="row">
            <?php
            $this->Form->setTemplates([
              'inputContainer' => '<div class="form-group input col-md-3 {{type}} {{required}}">{{content}}</div>',
            ]);
            echo $this->Form->control('branch_id', ['options' => $branches]);
            echo $this->Form->control('staff_no');
            echo $this->Form->control('first_name');
            echo $this->Form->control('last_name');
            echo $this->Form->control('phone');
            echo $this->Form->control('email');
            $this->Form->setTemplates([
              'inputContainer' => '<div class="form-group input col-md-3 {{type}} {{required}}">{{content}}</div>',
            ]);
            
            echo $this->Form->control('transport_allowance');
            echo $this->Form->control('housing_allowance');
            echo $this->Form->control('utility_allowance');
            echo $this->Form->control('leave_allowance');
            echo $this->Form->control('department_id', ['options' => $departments, 'empty' => true]);
            echo $this->Form->control('section_id', ['options' => $sections, 'empty' => true]);
            echo $this->Form->control('cadre_id', ['options' => $cadres]);
            echo $this->Form->control('bank_id', ['options' => $banks]);
            echo $this->Form->control('acct_no');
            echo $this->Form->control('service_charge_bank');
            echo $this->Form->control('service_charge_number');
            echo $this->Form->control('gender_id', ['options' => $genders]);
            echo $this->Form->control('religion_id', ['options' => $religions]);
            echo $this->Form->control('local_id', ['options' => $locals]);
            echo $this->Form->control('home_town');
            echo $this->Form->control('state_id', ['options' => $states]);
            echo $this->Form->control('physical_posture_id', ['options' => $physicalPostures]);
            echo $this->Form->control('marital_status_id', ['options' => $maritalStatuses]);
            echo $this->Form->control('highest_education_id', ['options' => $highestEducations]);
            echo $this->Form->control('housing_upfront');
            echo $this->Form->control('designation_id', ['options' => $designations, 'empty' => true]);
            echo $this->Form->control('status_id', ['options' => $statuses]);
            echo $this->Form->control('date_of_birth', ['empty' => true]);
            echo $this->Form->control('date_joined', ['empty' => true]);
            echo $this->Form->control('domestic_allowance');
            echo $this->Form->control('tax_number');
            echo $this->Form->control('tax_relief');
            echo $this->Form->control('tax_paid_to_date');
            echo $this->Form->control('pension_no');
            echo $this->Form->control('medical_allowance');
            echo $this->Form->control('entertainment_allowance');
            echo $this->Form->control('other_allowance');
            echo $this->Form->control('personal_loan');
            echo $this->Form->control('pers_loan_rep');
            echo $this->Form->control('pers_loan_paid');
            echo $this->Form->control('pers_loan_inst');
            echo $this->Form->control('car_loan');
            echo $this->Form->control('car_loan_rep');
            echo $this->Form->control('car_loan_inst');
            echo $this->Form->control('car_loan_paid');
            echo $this->Form->control('whl_cics');
            echo $this->Form->control('pension_control');
            echo $this->Form->control('salary_advance');
            echo $this->Form->control('salary_advance_rep');
            echo $this->Form->control('salary_advance_paid');
            echo $this->Form->control('salary_advance_inst');
            echo $this->Form->control('drivers_allowance');
            echo $this->Form->control('bro_cics');
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('contribution');
            echo $this->Form->file('file', ['accept' => '.jpg, .png, .pdf', 'id' => 'file-input']);
            echo '<div id="file-preview" style="display: none;"></div>';
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
</div> -->

<div class="row">
    <div class="col-md-12">
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">File Upload</h3>
            </div>
            <div class="card-body">
                <div id="actions" class="row">
                    <div class="col-lg-6">
                        <div class="btn-group w-100">
                            <span class="btn btn-success col fileinput-button">
                                <i class="fas fa-plus"></i>
                                <span>Add files</span>
                            </span>
                            <button type="submit" class="btn btn-primary col start">
                                <i class="fas fa-upload"></i>
                                <span>Start upload</span>
                            </button>
                            <button type="reset" class="btn btn-warning col cancel">
                                <i class="fas fa-times-circle"></i>
                                <span>Cancel upload</span>
                            </button>
                        </div>
                    </div>
                    <div class="col-lg-6 d-flex align-items-center">
                        <div class="fileupload-process w-100">
                            <div id="total-progress" class="progress progress-striped active" role="progressbar"
                                aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table table-striped files" id="previews">
                    <div id="template" class="row mt-2">
                        <div class="col-auto">
                            <span class="preview"><img src="data:," alt="" data-dz-thumbnail /></span>
                        </div>
                        <div class="col d-flex align-items-center">
                            <p class="mb-0">
                                <span class="lead" data-dz-name></span>
                                (<span data-dz-size></span>)
                            </p>
                            <!-- <strong class="error text-danger" data-dz-errormessage></strong> -->
                        </div>
                        <div class="col-4 d-flex align-items-center">
                            <div class="progress progress-striped active w-100" role="progressbar" aria-valuemin="0"
                                aria-valuemax="100" aria-valuenow="0">
                                <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto d-flex align-items-center">
                            <div class="btn-group">
                                <button class="btn btn-primary start">
                                    <i class="fas fa-upload"></i>
                                    <span>Start</span>
                                </button>
                                <button data-dz-remove class="btn btn-warning cancel">
                                    <i class="fas fa-times-circle"></i>
                                    <span>Cancel</span>
                                </button>
                                <button data-dz-remove class="btn btn-danger delete">
                                    <i class="fas fa-trash"></i>
                                    <span>Delete</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card -->
    </div>
</div>