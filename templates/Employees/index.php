<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employee[]|\Cake\Collection\CollectionInterface $employees
 */
use Cake\I18n\FrozenTime;

?>
<?php
$this->assign('title', __('Employees'));
$this->Breadcrumbs->add([
    ['title' => 'Home', 'url' => '/'],
    ['title' => 'List Employees'],
]);
?>


<div class="card card-primary card-outline">
    <div class="card-header d-sm-flex">
        <h2 class="card-title">
            <!-- -->
        </h2>
        <div class="card-toolbox">
            <?= $this->Paginator->limitControl(['3'=>'3','6'=>'6','1'=>'9'], null, [
                'label' => false,
                'class' => 'form-control-sm',
            ]); ?>
            <?= $this->Html->link(__('New Employee'), ['action' => 'employeeProfile'], ['class' => 'btn btn-success btn-sm']) ?>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
                <div class="row">
                      <div class="col-12 col-sm-12">
                        <div class="card card-primary card-outline card-outline-tabs">
                          <div class="card-header p-0 border-bottom-0">
                            <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                              <li class="nav-item">
                                <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Grid</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Table</a>
                              </li>
                            </ul>
                          </div>
                          <div class="card-body">
                            <div class="tab-content" id="custom-tabs-four-tabContent">
                              <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                              <div class="row">
                              <?php foreach ($employees as $employee) : ?>
                                  <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                                    <div class="card bg-light d-flex flex-fill">
                                      <div class="card-header text-muted border-bottom-0">
                                        <?= $employee->designation->name?>
                                      </div>
                                      <div class="card-body pt-0">
                                        <div class="row">
                                          <div class="col-8">
                                            <h6 class=""><b><?= $employee->full_name?></b></h6>                                          
                                            <!-- <p class="text-muted text-sm"><b>About: </b> Web Designer / UX / Graphic Artist / Coffee Lover </p> -->
                                            <ul class="ml-4 mb-0 fa-ul text-muted">
                                              <!-- <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span>Address: <?= $employee->addresses[0]->name?></li> -->
                                              <li class="small"><span class="fa-li"><i class="fas fa-lg fa-calendar"></i></span> Date Joined: <?= $employee->date_joined?></li>
                                            </ul>
                                            <br>  
                                            <p class="text-muted"><b>Age:</b> <?= h($employee->date_of_birth->diff(new FrozenTime())->format('%y years old')) ?></p>                                          
                                            <p class="text-muted text-sm"><b>Reporting To: </b> <br> <?= h($employee->reports_to->full_name)?></p>
                                            <p class="text-muted text-sm"><b>Employee Status: </b> <?= h($employee->status->name)?></p>                                            
                                          </div>
                                          <div class="col-4 text-center">
                                            <!-- <img src="../../dist/img/user1-128x128.jpg" alt="user-avatar" class="img-circle img-fluid"> -->
                                            <?= $this->Html->image('avatar.png', array('class' => 'img-circle img-fluid', 'alt' => 'user-avatar')) ?>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="card-footer">
                                        <div class="text-right">
                                          <!-- <a href="#" class="btn btn-sm bg-teal">
                                            <i class="fas fa-comments"></i>
                                          </a> -->
                                          <a href="<?= $this->url->build(['action' => 'view', $employee->id])?>" class="btn btn-sm btn-success">
                                            <i class="fas fa-user"></i> View Profile
                                          </a>
                                          <!-- <?= $this->Html->link(__('View'), ['action' => 'view', $employee->id], ['class' => 'btn btn-xs btn-outline-primary', 'escape' => false]) ?> -->
                                        </div>
                                      </div>
                                    </div>
                                  </div>     
                                  <?php endforeach; ?>
                              </div>
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                    <table class="table table-striped text-nowrap">
                      <thead>
                        <tr>
                          <th scope="col"><?= $this->Paginator->sort('Id') ?></th>
                          <th scope="col"><?= $this->Paginator->sort('staff No') ?></th>
                          <th scope="col"><?= $this->Paginator->sort('Full Name') ?></th>
                          <th scope="col"><?= $this->Paginator->sort('salary') ?></th>
                          <!--<th scope="col"><?= $this->Paginator->sort('bank_id') ?></th>-->
                          <!--<th scope="col"><?= $this->Paginator->sort('acct_no') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('service_charge_number') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('service_charge_bank') ?></th>-->
                          <th scope="col"><?= $this->Paginator->sort('cadre_id') ?></th>
                          <th scope="col"><?= $this->Paginator->sort('section_id') ?></th>
                          <!--<th scope="col"><?= $this->Paginator->sort('branch_id') ?></th>-->
                          <th scope="col"><?= $this->Paginator->sort('grade_id') ?></th>
                          <th scope="col"><?= $this->Paginator->sort('status_id') ?></th>
                          <!--<th scope="col"><?= $this->Paginator->sort('housing_allowance') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('housing_upfront') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('designation_id') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('cadre_id') ?></th>                  
                            <th scope="col"><?= $this->Paginator->sort('utility_allowance') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('transport_allowance') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('domestic_allowance') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('tax_number') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('tax_relief') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('tax_paid_to_date') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('pension_no') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('medical_allowance') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('entertainment_allowance') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('other_allowance') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('personal_loan') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('pers_loan_rep') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('pers_loan_paid') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('pers_loan_inst') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('car_loan') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('car_loan_rep') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('car_loan_inst') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('car_loan_paid') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('whl_cics') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('pension_control') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('salary_advance') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('salary_advance_rep') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('salary_advance_paid') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('salary_advance_inst') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('drivers_allowance') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('bro_HCICS') ?></th>-->
                          <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($employees as $employee) : ?>
                          <tr>
                            <td><?= $this->Number->format($employee->id) ?></td>
                            <td><?= $this->Number->format($employee->staff_no) ?></td>
                            <td><?= $this->Html->image('avatar.png', array('class' => 'img-circle img-size-32 mr-2', 'alt' => 'user-avatar')) ?><?= h($employee->full_name) ?></td>
                            <td><?= $this->Number->format($employee->salary, ['places' => 2]) ?></td>
                            <!--<td><?= $employee->has('bank') ? $this->Html->link($employee->bank->bank_desc, ['controller' => 'Banks', 'action' => 'view', $employee->bank->id]) : '' ?></td>-->
                            <!--<td><?= h($employee->acct_no) ?></td>
                            <td><?= h($employee->service_charge_number) ?></td>
                            <td><?= $this->Number->format($employee->service_charge_bank) ?></td>-->
                            <td><?= $employee->has('cadre') ? $this->Html->link($employee->cadre->name, ['controller' => 'Cadres', 'action' => 'view', $employee->cadre->id]) : '' ?></td>
                            <td><?= $employee->has('section') ? $this->Html->link($employee->section->name, ['controller' => 'Sections', 'action' => 'view', $employee->section->id]) : '' ?></td>
                            <!--<td><?= $employee->has('branch') ? $this->Html->link($employee->branch->name, ['controller' => 'Branches', 'action' => 'view', $employee->branch->id]) : '' ?></td>-->
                            <td><?= $employee->has('grade') ? $this->Html->link($employee->grade->name, ['controller' => 'Grades', 'action' => 'view', $employee->grade->id]) : '' ?></td>
                            <td><?= $employee->has('status') ? $this->Html->link($employee->status->name, ['controller' => 'Statuses', 'action' => 'view', $employee->status->id]) : '' ?></td>                  <!--
                            <td><?= $this->Number->format($employee->housing_allowance) ?></td>
                            <td><?= h($employee->housing_upfront) ?></td>
                            <td><?= $employee->has('designation') ? $this->Html->link($employee->designation->name, ['controller' => 'Designations', 'action' => 'view', $employee->designation->id]) : '' ?></td>
                            
                            <td><?= $employee->has('cadre') ? $this->Html->link($employee->cadre->name, ['controller' => 'Cadres', 'action' => 'view', $employee->cadre->id]) : '' ?></td>                  
                            <td><?= $this->Number->format($employee->utility_allowance, ['places' => 2]) ?></td>
                            <td><?= $this->Number->format($employee->transport_allowance) ?></td>
                            <td><?= $this->Number->format($employee->domestic_allowance) ?></td>
                            <td><?= h($employee->tax_number) ?></td>
                            <td><?= $this->Number->format($employee->tax_relief) ?></td>
                            <td><?= $this->Number->format($employee->tax_paid_to_date) ?></td>
                            <td><?= h($employee->pension_no) ?></td>
                            <td><?= $this->Number->format($employee->medical_allowance) ?></td>
                            <td><?= $this->Number->format($employee->entertainment_allowance) ?></td>
                            <td><?= $this->Number->format($employee->other_allowance) ?></td>
                            <td><?= $this->Number->format($employee->personal_loan) ?></td>
                            <td><?= $this->Number->format($employee->pers_loan_rep) ?></td>
                            <td><?= $this->Number->format($employee->pers_loan_paid) ?></td>
                            <td><?= $this->Number->format($employee->pers_loan_inst) ?></td>
                            <td><?= $this->Number->format($employee->car_loan) ?></td>
                            <td><?= $this->Number->format($employee->car_loan_rep) ?></td>
                            <td><?= $this->Number->format($employee->car_loan_inst) ?></td>
                            <td><?= $this->Number->format($employee->car_loan_paid) ?></td>
                            <td><?= $this->Number->format($employee->whl_cics) ?></td>
                            <td><?= $this->Number->format($employee->pension_control) ?></td>
                            <td><?= $this->Number->format($employee->salary_advance) ?></td>
                            <td><?= $this->Number->format($employee->salary_advance_rep) ?></td>
                            <td><?= $this->Number->format($employee->salary_advance_paid) ?></td>
                            <td><?= $this->Number->format($employee->salary_advance_inst) ?></td>
                            <td><?= $this->Number->format($employee->drivers_allowance) ?></td>
                            <td><?= $this->Number->format($employee->bro_HCICS) ?></td>-->
                            <td class="actions text-right">
                              <?= $this->Html->link(__('View'), ['action' => 'view', $employee->id], ['class' => 'btn btn-xs btn-outline-primary', 'escape' => false]) ?>
                              <?= $this->Html->link(__('Edit'), ['action' => 'employeeBioData', $employee->id], ['class' => 'btn btn-xs btn-outline-primary', 'escape' => false]) ?>
                              <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $employee->id], ['confirm' => __('Are you sure you want to delete # {0}?', $employee->name_desc), 'class' => 'btn btn-xs btn-outline-danger', 'escape' => false]) ?>
                            </td>
                          </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <!-- /.card -->
            </div>
          </div>
        </div>        
    </div>
    <!-- /.card-body -->

    <div class="card-footer d-md-flex paginator">
        <div class="mr-auto" style="font-size:.8rem">
            <?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?>
        </div>
        <ul class="pagination pagination-sm">
            <?= $this->Paginator->first('<i class="fas fa-angle-double-left"></i>', ['escape' => false]) ?>
            <?= $this->Paginator->prev('<i class="fas fa-angle-left"></i>', ['escape' => false]) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next('<i class="fas fa-angle-right"></i>', ['escape' => false]) ?>
            <?= $this->Paginator->last('<i class="fas fa-angle-double-right"></i>', ['escape' => false]) ?>
        </ul>
    </div>
    <!-- /.card-footer -->
</div>