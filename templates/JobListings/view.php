<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\JobListing $jobListing
 */
?>

<?php
$this->assign('title', __('Job Listing'));
$this->Breadcrumbs->add([
    ['title' => 'Home', 'url' => '/'],
    ['title' => 'List Job Listings', 'url' => ['action' => 'index']],
    ['title' => 'View'],
]);
?>

<div class="view card card-primary card-outline">
  <div class="card-header d-sm-flex">
    <h2 class="card-title"><?= h($jobListing->id) ?></h2>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
        <tr>
            <th><?= __('Designation') ?></th>
            <td><?= $jobListing->has('designation') ? $this->Html->link($jobListing->designation->name, ['controller' => 'Designations', 'action' => 'view', $jobListing->designation->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($jobListing->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Applicant Count') ?></th>
            <td><?= $this->Number->format($jobListing->applicant_count) ?></td>
        </tr>
        <tr>
            <th><?= __('Posting Date') ?></th>
            <td><?= h($jobListing->posting_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Closing Date') ?></th>
            <td><?= h($jobListing->closing_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Is Active') ?></th>
            <td><?= $jobListing->is_active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
  </div>
  <div class="card-footer d-flex">
    <div class="">
      <?= $this->Form->postLink(
          __('Delete'),
          ['action' => 'delete', $jobListing->id],
          ['confirm' => __('Are you sure you want to delete # {0}?', $jobListing->id), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Html->link(__('Edit'), ['action' => 'edit', $jobListing->id], ['class' => 'btn btn-secondary']) ?>
      <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
    </div>
  </div>
</div>

<div class="view text card">
  <div class="card-header">
    <h3 class="card-title"><?= __('Job Description') ?></h3>
  </div>
  <div class="card-body">
    <?= $this->Text->autoParagraph(h($jobListing->job_description)); ?>
  </div>
</div>
<div class="view text card">
  <div class="card-header">
    <h3 class="card-title"><?= __('Requirements') ?></h3>
  </div>
  <div class="card-body">
    <?= $this->Text->autoParagraph(h($jobListing->requirements)); ?>
  </div>
</div>

<div class="related related-applicants view card">
  <div class="card-header d-sm-flex">
    <h3 class="card-title"><?= __('Related Applicants') ?></h3>
    <div class="card-toolbox">
      <?= $this->Html->link(__('New'), ['controller' => 'Applicants' , 'action' => 'add'], ['class' => 'btn btn-primary btn-sm']) ?>
      <?= $this->Html->link(__('List '), ['controller' => 'Applicants' , 'action' => 'index'], ['class' => 'btn btn-primary btn-sm']) ?>
    </div>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
      <tr>
          <th><?= __('Id') ?></th>
          <th><?= __('Job Listing Id') ?></th>
          <th><?= __('First Name') ?></th>
          <th><?= __('Last Name') ?></th>
          <th><?= __('Email') ?></th>
          <th><?= __('Phone') ?></th>
          <th><?= __('Address') ?></th>
          <th><?= __('Date Of Birth') ?></th>
          <th><?= __('Gender Id') ?></th>
          <th><?= __('Marital Status Id') ?></th>
          <th><?= __('Application Date') ?></th>
          <th><?= __('Nationality') ?></th>
          <th><?= __('Resume File Url') ?></th>
          <th><?= __('Highest Education Id') ?></th>
          <th class="actions"><?= __('Actions') ?></th>
      </tr>
      <?php if (empty($jobListing->applicants)) { ?>
        <tr>
            <td colspan="15" class="text-muted">
              Applicants record not found!
            </td>
        </tr>
      <?php }else{ ?>
        <?php foreach ($jobListing->applicants as $applicants) : ?>
        <tr>
            <td><?= h($applicants->id) ?></td>
            <td><?= h($applicants->job_listing_id) ?></td>
            <td><?= h($applicants->first_name) ?></td>
            <td><?= h($applicants->last_name) ?></td>
            <td><?= h($applicants->email) ?></td>
            <td><?= h($applicants->phone) ?></td>
            <td><?= h($applicants->address) ?></td>
            <td><?= h($applicants->date_of_birth) ?></td>
            <td><?= h($applicants->gender_id) ?></td>
            <td><?= h($applicants->marital_status_id) ?></td>
            <td><?= h($applicants->application_date) ?></td>
            <td><?= h($applicants->nationality) ?></td>
            <td><?= h($applicants->resume_file_url) ?></td>
            <td><?= h($applicants->highest_education_id) ?></td>
            <td class="actions">
              <?= $this->Html->link(__('View'), ['controller' => 'Applicants', 'action' => 'view', $applicants->id], ['class'=>'btn btn-xs btn-outline-primary']) ?>
              <?= $this->Html->link(__('Edit'), ['controller' => 'Applicants', 'action' => 'edit', $applicants->id], ['class'=>'btn btn-xs btn-outline-primary']) ?>
              <?= $this->Form->postLink(__('Delete'), ['controller' => 'Applicants', 'action' => 'delete', $applicants->id], ['class'=>'btn btn-xs btn-outline-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $applicants->id)]) ?>
            </td>
        </tr>
        <?php endforeach; ?>
      <?php } ?>
    </table>
  </div>
</div>

<div class="related related-stages view card">
  <div class="card-header d-sm-flex">
    <h3 class="card-title"><?= __('Related Stages') ?></h3>
    <div class="card-toolbox">
      <?= $this->Html->link(__('New'), ['controller' => 'Stages' , 'action' => 'add'], ['class' => 'btn btn-primary btn-sm']) ?>
      <?= $this->Html->link(__('List '), ['controller' => 'Stages' , 'action' => 'index'], ['class' => 'btn btn-primary btn-sm']) ?>
    </div>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
      <tr>
          <th><?= __('Id') ?></th>
          <th><?= __('Job Listing Id') ?></th>
          <th><?= __('Name') ?></th>
          <th><?= __('Description') ?></th>
          <th><?= __('Created') ?></th>
          <th><?= __('Modified') ?></th>
          <th class="actions"><?= __('Actions') ?></th>
      </tr>
      <?php if (empty($jobListing->stages)) { ?>
        <tr>
            <td colspan="7" class="text-muted">
              Stages record not found!
            </td>
        </tr>
      <?php }else{ ?>
        <?php foreach ($jobListing->stages as $stages) : ?>
        <tr>
            <td><?= h($stages->id) ?></td>
            <td><?= h($stages->job_listing_id) ?></td>
            <td><?= h($stages->name) ?></td>
            <td><?= h($stages->description) ?></td>
            <td><?= h($stages->created) ?></td>
            <td><?= h($stages->modified) ?></td>
            <td class="actions">
              <?= $this->Html->link(__('View'), ['controller' => 'Stages', 'action' => 'view', $stages->id], ['class'=>'btn btn-xs btn-outline-primary']) ?>
              <?= $this->Html->link(__('Edit'), ['controller' => 'Stages', 'action' => 'edit', $stages->id], ['class'=>'btn btn-xs btn-outline-primary']) ?>
              <?= $this->Form->postLink(__('Delete'), ['controller' => 'Stages', 'action' => 'delete', $stages->id], ['class'=>'btn btn-xs btn-outline-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $stages->id)]) ?>
            </td>
        </tr>
        <?php endforeach; ?>
      <?php } ?>
    </table>
  </div>
</div>

