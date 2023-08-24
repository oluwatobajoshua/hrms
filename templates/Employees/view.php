<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employee $employee
 */
use Cake\I18n\FrozenTime;

?>

<?php
$this->assign('title', __('Employee Profile'));
$this->Breadcrumbs->add([
    ['title' => 'Home', 'url' => '/'],
    ['title' => 'List Employees', 'url' => ['action' => 'index']],
    ['title' => 'View'],
]);
?>

<!-- Profile Image -->
<div class="card card-primary">
  <div class="card-body">
  <a href="<?php echo $this->Url->build('/employees/employee-profile/'.$employee->id); ?>" class="float-right">
    <i class="far fa-edit"></i>              
  </a>
    <div class="row">
      <div class="col-md-6">
        <!-- <p>left Main</p> -->
        <div class="row">
          <div class="col-md-3">          
            <?= $this->Html->image('CakeLte./AdminLTE/dist/img/avatar.png', array('class' => 'profile-user-img img-fluid img-circle', 'alt' => 'User Image')) ?>
          </div>
          <div class="col-md-9">
            <h4><b><?= h($employee->full_name) ?></b></h4>
            <p class="text-muted"><?= h($employee->designation->name) ?></p>
            <h6>Employee Id:HE-000<?= h($employee->id) ?></h6>
            <p class="text-muted">Date of Join: <?= h($employee->date_joined) ?></p>
            <p class="text-muted">Age: <?= h($employee->date_of_birth->diff(new FrozenTime())->format('%y years old')) ?></p>
            <p class="text-muted text-sm"><b>Employee Status: </b> <?= h($employee->status->name)?></p>
            <p class="text-muted text-sm"><b>Username: </b> <?= h($employee->user->username)?></p>
            <br>
            <!-- <a href="<?= $this->Url->build(['action' => 'employeeBioData',$employee->id]) ?>" class="btn btn-success"><b>Send Message</b></a> -->
          </div>
        </div>
      </div>      
      <div class="col-md-6">
        <dl class="row">
          <!-- <dt class="col-sm-4"><?= __('Work Phone') ?></dt>
          <dd class="col-sm-8"><?= h($employee->work_phone) ?></dd> -->
          <dt class="col-sm-4"><?= __('Work Email') ?></dt>
          <dd class="col-sm-8"><?= h($employee->work_email) ?></dd>
          <dt class="col-sm-4"><?= __('Date Of Birth') ?></dt>
          <dd class="col-sm-8"><?= h($employee->date_of_birth) ?></dd>
          <dt class="col-sm-4"><?= __('Address') ?></dt>
          <dd class="col-sm-8"><?= h($employee->addresses[0]->name) ?></dd>          
          <dt class="col-sm-4"><?= __('Gender') ?></dt>
          <dd class="col-sm-8"><?= h($employee->gender->name); ?></dd>
          <dt class="col-sm-4"><?= __('Cadre') ?></dt>
          <dd class="col-sm-8"><?= h($employee->cadre->name); ?></dd>
          <dt class="col-sm-4"><?= __('Grade') ?></dt>
          <dd class="col-sm-8"><?= h($employee->grade->name); ?></dd>
          <!-- <dt class="col-sm-4"><?= __('Marital Status') ?></dt>
          <dd class="col-sm-8"><?= h($employee->marital_status->name); ?></dd> -->
          <!-- <dt class="col-sm-4"><?= __('Spouse Name') ?></dt>
          <dd class="col-sm-8"><?= h($employee->name_of_spouse); ?></dd>
          <dt class="col-sm-4"><?= __('No of children') ?></dt>
          <dd class="col-sm-8"><?= h($employee->children_details ? count($employee->children_details) : 0); ?></dd> -->
          <dt class="col-sm-4"><?= __('Reporting To') ?></dt>
          <dd class="col-sm-8"><?= $this->Html->image('avatar.png', array('class' => 'img-circle img-size-32 mr-2', 'alt' => 'user-avatar')) ?><?= h($employee->reports_to->full_name) ?></dd>
        </dl>        
      </div>
    </div>
  </div>
  <!-- /.card-body -->
  <ul class="nav nav-pills">
    <li class="nav-item"><a class="nav-link active" href="#biodata" data-toggle="tab">Personal Information</a></li>
    <li class="nav-item"><a class="nav-link" href="#payroll" data-toggle="tab">Payroll</a></li>
    <li class="nav-item"><a class="nav-link" href="#education" data-toggle="tab">Education</a></li>
    <li class="nav-item"><a class="nav-link" href="#work" data-toggle="tab">Work History</a></li>
    <li class="nav-item"><a class="nav-link" href="#children" data-toggle="tab">Children</a></li>
    <li class="nav-item"><a class="nav-link" href="#nextOfKin" data-toggle="tab">Next Of Kin</a></li>
    <li class="nav-item"><a class="nav-link" href="#leave" data-toggle="tab">Leave</a></li>
    <li class="nav-item"><a class="nav-link" href="#salary" data-toggle="tab">Salary</a></li>
  </ul>
</div>
<!-- /.card -->

<div class="">
  <div class="tab-content">
    <div class="active tab-pane" id="biodata">
      <!-- Post -->
      <div class="row">
        <div class="col-md-6">
          <div class="related related-educations view card">
            <div class="card-header d-sm-flex">
                <h3 class="card-title"><?= __('Personal Information') ?></h3>
                <div class="card-toolbox">
                  <a href="<?php echo $this->Url->build('/employees/employee-bio-data/'.$employee->id); ?>" class="float-right">
                    <i class="far fa-edit"></i>              
                  </a>
                </div>
            </div>
            <div class="card-body table-responsive p-0">
              <table class="table">
                <tr>
                      <th><?= __('Phone') ?></th>
                      <td><?= h($employee->phone) ?></td>
                <tr>
                    <th><?= __('Email') ?></th>
                  <td><?= h($employee->email) ?></td>
                </tr>                                            
                <!-- <tr>
                    <th><?= __('Passport Number') ?></th>
                    <td><?= h($employee->passport_no) ?></td>
                </tr>
                <tr>
                    <th><?= __('Passport Exp Date') ?></th>
                    <td><?= h($employee->passport_exp_date) ?></td>
                </tr>                                                                    -->
                <!-- <tr>
                    <th><?= __('Gender') ?></th>
                    <td><?= h($employee->gender->name); ?></td>
                </tr>  -->
                <tr>
                    <th><?= __('Nationality') ?></th>
                    <td><?= h($employee->nationality) ?></td>
                </tr> 
                <tr>
                    <th><?= __('Religion') ?></th>
                    <td><?= h($employee->religion->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Marital Status') ?></th>
                    <td><?= h($employee->marital_status->name)?></td>
                </tr>
                <tr>
                    <th><?= __('Spouse\'s Name') ?></th>
                    <td><?= h($employee->name_of_spouse)?></td>
                </tr>
                <tr>
                    <!-- <th><?= __('No of Children') ?></th> -->
                    <!-- <td><?= h($employee->children_details ? count($employee->children_details) : 0)?></td> -->
                </tr>                           
              </table>
            </div>
          </div> 
        </div> 
         
        <div class="col-md-6">
          <div class="related related-educations view card">
            <div class="card-header d-sm-flex">
                <h3 class="card-title"><?= __('Emergency Contact') ?></h3>
                <div class="card-toolbox">
                  <a href="<?php echo $this->Url->build('/employees/employee-emergency-contact/'.$employee->id); ?>" class="float-right">
                    <i class="far fa-edit"></i>              
                  </a>
                </div>
            </div>
            <div class="card-body table-responsive p-0">
              <?php if(count($employee->emergency_contacts) == 0):?>              
                <table class="table">
                  <!-- <th><h6>Secondary</h6> </th>                                                                                -->
                  <td colspan="10" class="text-muted">
                    Emergency contact nof found!
                  </td>                    
                </table>
                <?php endif;?>
              <?php if(count($employee->emergency_contacts)> 0):?>
                
                <table class="table">   
                  <!-- <th><h6>Primary</h6></th>                                                                             -->
                  <tr>
                      <th><?= __('1. Name') ?></th>
                      <td><?= h($employee->emergency_contacts[0]->name) ?></td>
                  </tr>
                  <tr>
                      <th><?= __('Relationship') ?></th>
                      <td><?= h($employee->emergency_contacts[0]->relationship->name) ?></td>
                  </tr>  
                  <tr>
                      <th><?= __('Phone') ?></th>
                      <td><?= h($employee->emergency_contacts[0]->phone) ?></td>
                  </tr>                         
                </table>
              <?php endif;?>
              <?php if(count($employee->emergency_contacts)> 1):?>                
                <table class="table">
                  <!-- <th><h6>Secondary</h6> </th>                                                                                -->
                  <tr>
                      <th><?= __('2. Name') ?></th>
                      <td><?= h($employee->emergency_contacts[1]->name) ?></td>
                  </tr>  
                  <tr>
                      <th><?= __('Relationship') ?></th>
                      <td><?= h($employee->emergency_contacts[1]->relationship->name) ?></td>
                  </tr>  
                  <tr>
                      <th><?= __('Phone') ?></th>
                      <td><?= h($employee->emergency_contacts[1]->phone) ?></td>
                  </tr>                        
                </table>
              <?php endif;?>
            </div>
          </div> 
        </div>   
        
        <div class="col-md-6">
          <div class="related related-educations view card">
            <div class="card-header d-sm-flex">
                <h3 class="card-title"><?= __('Next of Kin') ?></h3>
                <div class="card-toolbox">
                  <a href="<?php echo $this->Url->build('/employees/employee-next-of-kin/'.$employee->id); ?>" class="float-right">
                    <i class="far fa-edit"></i>              
                  </a>
                </div>
            </div>
            <div class="card-body table-responsive p-0">
              <table class="table">                                              
      
                <?php if (empty($employee->next_of_kins)) { ?>
              <tr>
                  <td colspan="10" class="text-muted">
                    Next Of Kins record not found!
                  </td>
              </tr>
            <?php }else{ ?>
              <?php foreach ($employee->next_of_kins as $nextOfKins) : ?>
                <div>
                <tr>
                    <th><?= __('Next of Kin Id') ?></th>
                    <td><?= h($nextOfKins->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($nextOfKins->name) ?></td>
                </tr>   
                <tr>
                    <th><?= __('Relationship') ?></th>
                    <td><?= h($nextOfKins->relationship->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Address') ?></th>
                    <td><?= h($nextOfKins->address) ?></td>
                </tr>
                <tr>
                    <th><?= __('Phone') ?></th>
                    <td><?= h($nextOfKins->phone) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($nextOfKins->email) ?></td>
                </tr>
                </div>
            <?php endforeach; ?>       
              <?php } ?>                
              </table>
            </div>
          </div> 
        </div>
        <div class="col-md-6">
          <div class="related related-educations view card">
            <div class="card-header d-sm-flex">
                <h3 class="card-title"><?= __('Bank Information') ?></h3>
                <div class="card-toolbox">
                  <a href="<?php echo $this->Url->build('/employees/employee-payroll/'.$employee->id); ?>" class="float-right">
                    <i class="far fa-edit"></i>              
                  </a>
                </div>
            </div>
            <div class="card-body table-responsive p-0">
              <table class="table">                                              
                <tr>
                    <th><?= __('Bank Name') ?></th>
                    <td><?= h($employee->bank->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Account Number') ?></th>
                    <td><?= h($employee->acct_no) ?></td>
                </tr>   
                <tr>
                    <th><?= __('Service Charge Bank Name') ?></th>
                    <td><?= h($employee->service_charge ? $employee->service_charge->name : '') ?></td>
                </tr>
                <tr>
                    <th><?= __('Account Number') ?></th>
                    <td><?= h($employee->service_charge_number) ?></td>
                </tr>                       
              </table>
            </div>
          </div> 
        </div> 
                
      </div>      
      <!-- /.post -->
    </div>
    <!-- /.tab-pane -->
  <div class="tab-pane" id="payroll">
    <div class="row">
      <!-- The timeline -->
      <div class="col-md-6">
          <div class="related related-educations view card">
            <div class="card-header d-sm-flex">
                <h3 class="card-title"><?= __('Payroll Allowance/Bonus') ?></h3>
                <div class="card-toolbox">
                  <a href="<?php echo $this->Url->build('/employees/employee-payroll/'.$employee->id); ?>" class="float-right">
                    <i class="far fa-edit"></i>              
                  </a>
                </div>
            </div>
            <div class="card-body table-responsive p-0">
              <table class="table">                                              
                <tr>
                    <th><?= __('Salary') ?></th>
                    <td><?= $this->Number->format($employee->salary) ?></td>
                </tr>
                <tr>
                    <th><?= __('Transport Allowance') ?></th>
                    <td><?= $this->Number->format($employee->transport_allowance) ?></td>
                </tr>
                <tr>
                    <th><?= __('Housing Allowance') ?></th>
                    <td><?= $this->Number->format($employee->housing_allowance) ?></td>
                </tr>
                <tr>
                    <th><?= __('Utility Allowance') ?></th>
                    <td><?= $this->Number->format($employee->utility_allowance) ?></td>
                </tr>
                <tr>
                    <th><?= __('Leave Allowance') ?></th>
                    <td><?= $this->Number->format($employee->leave_allowance) ?></td>
                </tr>
                <tr>
                    <th><?= __('Domestic Allowance') ?></th>
                    <td><?= $this->Number->format($employee->domestic_allowance) ?></td>
                </tr>
                <tr>
                    <th><?= __('Medical Allowance') ?></th>
                    <td><?= $this->Number->format($employee->medical_allowance) ?></td>
                </tr>
                <tr>
                    <th><?= __('Entertainment Allowance') ?></th>
                    <td><?= $this->Number->format($employee->entertainment_allowance) ?></td>
                </tr>
                <tr>
                    <th><?= __('Other Allowance') ?></th>
                    <td><?= $this->Number->format($employee->other_allowance) ?></td>
                </tr>              
                <tr>
                    <th><?= __('Drivers Allowance') ?></th>
                    <td><?= $this->Number->format($employee->drivers_allowance) ?></td>
                </tr>                                   
              </table>
            </div>
          </div> 
      </div> 
      <div class="col-md-6">
          <div class="related related-educations view card">
            <div class="card-header d-sm-flex">
                <h3 class="card-title"><?= __('Payroll Deductions') ?></h3>
                <div class="card-toolbox">
                  <a href="<?php echo $this->Url->build('/employees/employee-payroll/'.$employee->id); ?>" class="float-right">
                    <i class="far fa-edit"></i>              
                  </a>
                </div>
            </div>
            <div class="card-body table-responsive p-0">
              <table class="table">                                                                             
                <tr>
                    <th><?= __('Pers Loan Rep') ?></th>
                    <td><?= $this->Number->format($employee->pers_loan_rep) ?></td>
                </tr>                                            
                <tr>
                    <th><?= __('Car Loan Rep') ?></th>
                    <td><?= $this->Number->format($employee->car_loan_rep) ?></td>
                </tr>
                <tr>
                    <th><?= __('Whl Cics') ?></th>
                    <td><?= $this->Number->format($employee->whl_cics) ?></td>
                </tr>
                <tr>
                    <th><?= __('Salary Advance Rep') ?></th>
                    <td><?= $this->Number->format($employee->salary_advance_rep) ?></td>
                </tr>                               
                <tr>
                    <th><?= __('Bro Cics') ?></th>
                    <td><?= $this->Number->format($employee->bro_cics) ?></td>
                </tr>                                   
              </table>
            </div>
          </div> 
      </div> 
    </div>
  </div>
    <!-- /.tab-pane -->
    <div class="tab-pane" id="children">
      <div class="related related-childrenDetails view card">
        <div class="card-header d-sm-flex">
          <h3 class="card-title"><?= __('Related Children Details') ?></h3>
          <div class="card-toolbox">
            <?= $this->Html->link(__('New'), ['action' => 'employeeChildrenDetails',$employee->id], ['class' => 'btn btn-success btn-sm']) ?>
            <!-- <?= $this->Html->link(__('List '), ['controller' => 'ChildrenDetails' , 'action' => 'index'], ['class' => 'btn btn-success btn-sm']) ?> -->
          </div>
        </div>
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Date Of Birth') ?></th>
                <th><?= __('Gender Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php if (empty($employee->children_details)) { ?>
              <tr>
                  <td colspan="8" class="text-muted">
                    Children Details record not found!
                  </td>
              </tr>
            <?php }else{ ?>
              <?php foreach ($employee->children_details as $childrenDetails) : ?>
              <tr>
                  <td><?= h($childrenDetails->id) ?></td>
                  <td><?= h($childrenDetails->name) ?></td>
                  <td><?= h($childrenDetails->date_of_birth) ?></td>
                  <td><?= h($childrenDetails->gender->name) ?></td>
                  <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ChildrenDetails', 'action' => 'view', $childrenDetails->id], ['class'=>'btn btn-xs btn-outline-primary']) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ChildrenDetails', 'action' => 'edit', $childrenDetails->id], ['class'=>'btn btn-xs btn-outline-primary']) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ChildrenDetails', 'action' => 'delete', $childrenDetails->id], ['class'=>'btn btn-xs btn-outline-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $childrenDetails->id)]) ?>
                  </td>
              </tr>
              <?php endforeach; ?>
            <?php } ?>
          </table>
        </div>
      </div>                     
    </div>
    <!-- education -->
    <div class="tab-pane" id="education">
      <div class="related related-educations view card">
        <div class="card-header d-sm-flex">
          <h3 class="card-title"><?= __('Education Record') ?></h3>
          <div class="card-toolbox">
            <?= $this->Html->link(__('New'), ['controller' => 'Educations' , 'action' => 'add'], ['class' => 'btn btn-success btn-sm']) ?>
            <?= $this->Html->link(__('List '), ['controller' => 'Educations' , 'action' => 'index'], ['class' => 'btn btn-success btn-sm']) ?>
          </div>
        </div>
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Institution') ?></th>
                <th><?= __('Highest Education Id') ?></th>
                <th><?= __('Course Of Study') ?></th>
                <th><?= __('Date') ?></th>
                <th><?= __('Created') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php if (empty($employee->educations)) { ?>
              <tr>
                  <td colspan="9" class="text-muted">
                    Educations record not found!
                  </td>
              </tr>
            <?php }else{ ?>
              <?php foreach ($employee->educations as $educations) : ?>
              <tr>
                  <td><?= h($educations->id) ?></td>
                  <td><?= h($educations->institution) ?></td>
                  <td><?= h($educations->highest_education_id) ?></td>
                  <td><?= h($educations->course_of_study) ?></td>
                  <td><?= h($educations->date) ?></td>
                  <td><?= h($educations->created) ?></td>
                  <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Educations', 'action' => 'view', $educations->id], ['class'=>'btn btn-xs btn-outline-primary']) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Educations', 'action' => 'edit', $educations->id], ['class'=>'btn btn-xs btn-outline-primary']) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Educations', 'action' => 'delete', $educations->id], ['class'=>'btn btn-xs btn-outline-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $educations->id)]) ?>
                  </td>
              </tr>
              <?php endforeach; ?>
            <?php } ?>
          </table>
        </div>
      </div>            
    </div>
    <!-- /education -->
    <div class="tab-pane" id="work">
      <div class="related related-workDetails view card">
        <div class="card-header d-sm-flex">
          <h3 class="card-title"><?= __('Related Work Details') ?></h3>
          <div class="card-toolbox">
            <?= $this->Html->link(__('New'), ['action' => 'employeeWorkHistory',$employee->id], ['class' => 'btn btn-success btn-sm']) ?>
            <!-- <?= $this->Html->link(__('List '), ['controller' => 'WorkDetails' , 'action' => 'index'], ['class' => 'btn btn-success btn-sm']) ?> -->
          </div>
        </div>
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Organization') ?></th>
                <th><?= __('Department') ?></th>
                <th><?= __('Job Title') ?></th>
                <th><?= __('Job Class') ?></th>
                <th><?= __('Start Date') ?></th>
                <th><?= __('End Date') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php if (empty($employee->work_details)) { ?>
              <tr>
                  <td colspan="11" class="text-muted">
                    Work Details record not found!
                  </td>
              </tr>
            <?php }else{ ?>
              <?php foreach ($employee->work_details as $workDetails) : ?>
              <tr>
                  <td><?= h($workDetails->id) ?></td>
                  <td><?= h($workDetails->organization) ?></td>
                  <td><?= h($workDetails->department) ?></td>
                  <td><?= h($workDetails->job_title) ?></td>
                  <td><?= h($workDetails->job_class) ?></td>
                  <td><?= h($workDetails->start_date) ?></td>
                  <td><?= h($workDetails->end_date) ?></td>
                  <td><?= h($workDetails->created) ?></td>
                  <td><?= h($workDetails->modified) ?></td>
                  <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'WorkDetails', 'action' => 'view', $workDetails->id], ['class'=>'btn btn-xs btn-outline-primary']) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'WorkDetails', 'action' => 'edit', $workDetails->id], ['class'=>'btn btn-xs btn-outline-primary']) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'WorkDetails', 'action' => 'delete', $workDetails->id], ['class'=>'btn btn-xs btn-outline-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $workDetails->id)]) ?>
                  </td>
              </tr>
              <?php endforeach; ?>
            <?php } ?>
          </table>
        </div>
      </div>
    </div>

    <!-- next of kin -->
    <div class="tab-pane" id="nextOfKin">
      <div class="related related-nextOfKins view card">
        <div class="card-header d-sm-flex">
          <h3 class="card-title"><?= __('Related Next Of Kins') ?></h3>
          <div class="card-toolbox">
            <?= $this->Html->link(__('New'), ['controller' => 'Employees' , 'action' => 'employeeNextOfKin',$employee->id], ['class' => 'btn btn-success btn-sm']) ?>
            <?= $this->Html->link(__('List '), ['controller' => 'NextOfKins' , 'action' => 'index'], ['class' => 'btn btn-success btn-sm']) ?>
          </div>
        </div>
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Relationship') ?></th>
                <th><?= __('Address') ?></th>
                <th><?= __('Phone') ?></th>
                <th><?= __('Email') ?></th>
                <th><?= __('Created') ?></th>
                <!-- <th><?= __('Modified') ?></th> -->
                <!-- <th class="actions"><?= __('Actions') ?></th> -->
            </tr>
            <?php if (empty($employee->next_of_kins)) { ?>
              <tr>
                  <td colspan="10" class="text-muted">
                    Next Of Kins record not found!
                  </td>
              </tr>
            <?php }else{ ?>
              <?php foreach ($employee->next_of_kins as $nextOfKins) : ?>
              <tr>
                  <td><?= h($nextOfKins->id) ?></td>
                  <td><?= h($nextOfKins->name) ?></td>
                  <td><?= h($nextOfKins->relationship->name) ?></td>
                  <td><?= h($nextOfKins->address) ?></td>
                  <td><?= h($nextOfKins->phone) ?></td>
                  <td><?= h($nextOfKins->email) ?></td>
                  <!-- <td><?= h($nextOfKins->created) ?></td> -->
                  <!-- <td><?= h($nextOfKins->modified) ?></td> -->
                  <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'NextOfKins', 'action' => 'view', $nextOfKins->id], ['class'=>'btn btn-xs btn-outline-primary']) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'NextOfKins', 'action' => 'edit', $nextOfKins->id], ['class'=>'btn btn-xs btn-outline-primary']) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'NextOfKins', 'action' => 'delete', $nextOfKins->id], ['class'=>'btn btn-xs btn-outline-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $nextOfKins->id)]) ?>
                  </td>
              </tr>
              <?php endforeach; ?>
            <?php } ?>
          </table>
        </div>
      </div>
    </div>

    <div class="tab-pane" id="leave">
      <div class="related related-leaves view card">
        <div class="card-header d-sm-flex">
          <h3 class="card-title"><?= __('Related Leaves') ?></h3>
          <div class="card-toolbox">
            <?= $this->Html->link(__('New'), ['controller' => 'Leaves' , 'action' => 'add'], ['class' => 'btn btn-success btn-sm']) ?>
            <?= $this->Html->link(__('List '), ['controller' => 'Leaves' , 'action' => 'index'], ['class' => 'btn btn-success btn-sm']) ?>
          </div>
        </div>
        <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('days_entitled') ?></th>
                    <th><?= $this->Paginator->sort('previous_outstanding') ?></th>
                    <th><?= $this->Paginator->sort('days_requested') ?></th>
                    <th><?= $this->Paginator->sort('outstanding_days') ?></th>
                    <th><?= $this->Paginator->sort('commencement_date') ?></th>
                    <th><?= $this->Paginator->sort('relieving_officer') ?></th>
                    <th><?= $this->Paginator->sort('status_id') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($employee->leaves as $leave) : ?>
                    <tr>
                        <td><?= $this->Number->format($leave->id) ?></td>
                        <td><?= $this->Number->format($leave->days_entitled) ?></td>
                        <td><?= $this->Number->format($leave->previous_outstanding) ?></td>
                        <td><?= $this->Number->format($leave->days_requested) ?></td>
                        <td><?= $this->Number->format($leave->outstanding_days) ?></td>
                        <td><?= h($leave->commencement_date) ?></td>
                        <td><?= $this->Number->format($leave->relieving_officer) ?></td>
                        <td><?= $leave->has('status') ? $this->Html->link($leave->status->name, ['controller' => 'Statuses', 'action' => 'view', $leave->status->id]) : '' ?></td>
                        <td><?= h($leave->created) ?></td>
                        <td><?= h($leave->modified) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $leave->id], ['class' => 'btn btn-xs btn-outline-primary', 'escape' => false]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $leave->id], ['class' => 'btn btn-xs btn-outline-primary', 'escape' => false]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $leave->id], ['class' => 'btn btn-xs btn-outline-danger', 'escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $leave->id)]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        </div>
      </div>
    </div>

    <!-- other department -->
      <div class="tab-pane" id="salary">
        
        <div class="related related-transactions view card">
          <div class="card-header d-sm-flex">
            <h3 class="card-title"><?= __('Related Transactions') ?></h3>
            <div class="card-toolbox">
              <?= $this->Html->link(__('New Transaction'), ['controller' => 'transactions', 'action' => 'add', $employee->id], ['class' => 'btn btn-success btn-sm']) ?>
              <?= $this->Html->link(__('List '), ['controller' => 'Transactions' , 'action' => 'index'], ['class' => 'btn btn-success btn-sm']) ?>
            </div>
          </div>
          <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
              <tr>
              <th scope="col"><?= $this->Paginator->sort('id') ?></th>
              <th scope="col"><?= $this->Paginator->sort('date') ?></th>
              <th scope="col"><?= $this->Paginator->sort('basic_salary') ?></th>  
              <th scope="col"><?= $this->Paginator->sort('gross') ?></th> 
              <th scope="col"><?= $this->Paginator->sort('total_deduction') ?></th>         
              <th scope="col"><?= $this->Paginator->sort('net_pay') ?></th>  
                          
              <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
              </tr>
              <?php if (empty($employee->transactions)) { ?>
                <tr>
                    <td colspan="36" class="text-muted">
                      Transactions record not found!
                    </td>
                </tr>
              <?php }else{ ?>
                <?php foreach ($employee->transactions as $transaction) : ?>
                  <?php 
                    $transaction->gross =   $transaction->basic_salary + 
                                        $transaction->transport_allowance + 
                                        $transaction->housing_allowance + 
                                        $transaction->utility_allowance + 
                                        $transaction->leave_allowance + 
                                        $transaction->entertainment_allowance + 
                                        $transaction->medical_allowance + 
                                        $transaction->arrears + 
                                        $transaction->other_allowance;

                    $transaction->total_deduction   =   $transaction->paye + 
                                        $transaction->personal_loan + 
                                        $transaction->ctcs +
                                        $transaction->salary_advance + 
                                        $transaction->surcharge + 
                                        $transaction->union_due + 
                                        $transaction->pension_deduction + 
                                        $transaction->bar_account + 
                                        $transaction->other_deduction;
                    //debug($transaction->total_deduction);
                    $transaction->net_pay  =  $transaction->gross - $transaction->total_deduction;   
                ?>
                <tr>
                  <td><?= h($transaction->id) ?></td>
                  <td><?= h($transaction->date) ?></td>
                  <td><?= $this->Number->format($transaction->basic_salary, ['places' => 2, 'pattern'=> 0,000.00,'before'=>'₦']) ?></td>                  
                  <td><?= $this->Number->format($transaction->gross, ['places' => 2, 'pattern'=> 0,000.00,'before'=>'₦']) ?></td>                 
                  <td><?= $this->Number->format($transaction->total_deduction, ['places' => 2, 'pattern'=> 0,000.00,'before'=>'₦']) ?></td>
                  <td><?= $this->Number->format($transaction->net_pay, ['places' => 2, 'pattern'=> 0,000.00,'before'=>'₦']) ?></td>                             
                  <td class="actions text-right">
                      <?= $this->Html->link(__('View'), ['action' => 'view', $transaction->id], ['class'=>'btn btn-info btn-xs']) ?>
                      <?= $this->Html->link(__('Edit'), ['action' => 'edit', $transaction->id], ['class'=>'btn btn-warning btn-xs']) ?>
                      <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $transaction->id], ['confirm' => __('Are you sure you want to delete # {0}?', $transaction->id), 'class'=>'btn btn-danger btn-xs']) ?>
                  </td>
                </tr>
                <?php endforeach; ?>
              <?php } ?>
            </table>
          </div>
        </div>
      </div>

    <!-- /.tab-pane -->
  </div>
  <!-- /.tab-content -->
</div><!-- /.card-body -->




