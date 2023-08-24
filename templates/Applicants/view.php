<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Applicant $applicant
 */
?>

<?php
$this->assign('title', __('Applicant'));
$this->Breadcrumbs->add([
    ['title' => 'Home', 'url' => '/'],
    ['title' => 'List Applicants', 'url' => ['action' => 'index']],
    ['title' => 'View'],
]);
?>

<div class="view card card-primary card-outline">
  <div class="card-header d-sm-flex">
    <h2 class="card-title"><?= h($applicant->id) ?></h2>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
        <tr>
            <th><?= __('Job Listing') ?></th>
            <td><?= $applicant->has('job_listing') ? $this->Html->link($applicant->job_listing->designation->name, ['controller' => 'JobListings', 'action' => 'view', $applicant->job_listing->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('First Name') ?></th>
            <td><?= h($applicant->first_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Last Name') ?></th>
            <td><?= h($applicant->last_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($applicant->email) ?></td>
        </tr>
        <tr>
            <th><?= __('Phone') ?></th>
            <td><?= h($applicant->phone) ?></td>
        </tr>
        <tr>
            <th><?= __('Gender') ?></th>
            <td><?= $applicant->has('gender') ? $this->Html->link($applicant->gender->name, ['controller' => 'Genders', 'action' => 'view', $applicant->gender->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Marital Status') ?></th>
            <td><?= $applicant->has('marital_status') ? $this->Html->link($applicant->marital_status->name, ['controller' => 'MaritalStatuses', 'action' => 'view', $applicant->marital_status->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Nationality') ?></th>
            <td><?= h($applicant->nationality) ?></td>
        </tr>
        <tr>
            <th><?= __('Resume File Url') ?></th>
            <td><?= h($applicant->resume_file_url) ?></td>
        </tr>
        <tr>
            <th><?= __('Highest Education') ?></th>
            <td><?= $applicant->has('highest_education') ? $this->Html->link($applicant->highest_education->name, ['controller' => 'HighestEducations', 'action' => 'view', $applicant->highest_education->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($applicant->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Date Of Birth') ?></th>
            <td><?= h($applicant->date_of_birth) ?></td>
        </tr>
        <tr>
            <th><?= __('Application Date') ?></th>
            <td><?= h($applicant->application_date) ?></td>
        </tr>
    </table>
  </div>
  <div class="card-footer d-flex">
    <div class="">
      <?= $this->Form->postLink(
          __('Delete'),
          ['action' => 'delete', $applicant->id],
          ['confirm' => __('Are you sure you want to delete # {0}?', $applicant->id), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Html->link(__('Edit'), ['action' => 'edit', $applicant->id], ['class' => 'btn btn-secondary']) ?>
      <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
    </div>
  </div>
</div>

<div class="view text card">
  <div class="card-header">
    <h3 class="card-title"><?= __('Address') ?></h3>
  </div>
  <div class="card-body">
    <?= $this->Text->autoParagraph(h($applicant->address)); ?>
  </div>
</div>

