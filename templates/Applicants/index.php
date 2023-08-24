<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Applicant[]|\Cake\Collection\CollectionInterface $applicants
 */
?>
<?php
$this->assign('title', __('Applicants'));
$this->Breadcrumbs->add([
    ['title' => 'Home', 'url' => '/'],
    ['title' => 'List Applicants'],
]);
?>

<div class="card card-primary card-outline">
    <div class="card-header d-sm-flex">
        <h2 class="card-title">
            <!-- -->
        </h2>
        <div class="card-toolbox">
            <?= $this->Paginator->limitControl([], null, [
                'label' => false,
                'class' => 'form-control-sm',
            ]); ?>
            <?= $this->Html->link(__('New Applicant'), ['action' => 'add'], ['class' => 'btn btn-primary btn-sm']) ?>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('job_listing_id') ?></th>
                    <th><?= $this->Paginator->sort('full name') ?></th>
                    <!-- <th><?= $this->Paginator->sort('last_name') ?></th> -->
                    <!-- <th><?= $this->Paginator->sort('email') ?></th> -->
                    <th><?= $this->Paginator->sort('phone') ?></th>
                    <th><?= $this->Paginator->sort('date_of_birth') ?></th>
                    <th><?= $this->Paginator->sort('gender_id') ?></th>
                    <!-- <th><?= $this->Paginator->sort('marital_status_id') ?></th> -->
                    <th><?= $this->Paginator->sort('application_date') ?></th>
                    <!-- <th><?= $this->Paginator->sort('nationality') ?></th> -->
                    <!-- <th><?= $this->Paginator->sort('resume_file_url') ?></th> -->
                    <th><?= $this->Paginator->sort('highest_education_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($applicants as $applicant) : ?>
                    <tr>
                        <td><?= $this->Number->format($applicant->id) ?></td>
                        <td><?= $applicant->has('job_listing') ? $this->Html->link($applicant->job_listing->designation->name, ['controller' => 'JobListings', 'action' => 'view', $applicant->job_listing->id]) : '' ?></td>
                        <td><?= h($applicant->first_name .' '. $applicant->last_name) ?></td>
                        <!-- <td><?= h($applicant->last_name) ?></td> -->
                        <!-- <td><?= h($applicant->email) ?></td> -->
                        <td><?= h($applicant->phone) ?></td>
                        <td><?= h($applicant->date_of_birth) ?></td>
                        <td><?= $applicant->has('gender') ? $this->Html->link($applicant->gender->name, ['controller' => 'Genders', 'action' => 'view', $applicant->gender->id]) : '' ?></td>
                        <!-- <td><?= $applicant->has('marital_status') ? $this->Html->link($applicant->marital_status->name, ['controller' => 'MaritalStatuses', 'action' => 'view', $applicant->marital_status->id]) : '' ?></td> -->
                        <td><?= h($applicant->application_date) ?></td>
                        <!-- <td><?= h($applicant->nationality) ?></td> -->
                        <!-- <td><?= h($applicant->resume_file_url) ?></td> -->
                        <td><?= $applicant->has('highest_education') ? $this->Html->link($applicant->highest_education->name, ['controller' => 'HighestEducations', 'action' => 'view', $applicant->highest_education->id]) : '' ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $applicant->id], ['class' => 'btn btn-xs btn-outline-primary', 'escape' => false]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $applicant->id], ['class' => 'btn btn-xs btn-outline-primary', 'escape' => false]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $applicant->id], ['class' => 'btn btn-xs btn-outline-danger', 'escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $applicant->id)]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
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
