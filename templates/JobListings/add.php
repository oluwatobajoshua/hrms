<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\JobListing $jobListing
 */
?>
<?php
$this->assign('title', __('Add Job Listing'));
$this->Breadcrumbs->add([
    ['title' => 'Home', 'url' => '/'],
    ['title' => 'List Job Listings', 'url' => ['action' => 'index']],
    ['title' => 'Add'],
]);
?>

<div class="card card-primary card-outline">
  <?= $this->Form->create($jobListing) ?>
  <div class="card-body">
    <?php
      echo $this->Form->control('designation_id', ['options' => $designations]);
      echo $this->Form->control('job_description');
      echo $this->Form->control('requirements');
      echo $this->Form->control('posting_date');
      echo $this->Form->control('closing_date', ['empty' => true]);
      echo $this->Form->control('is_active', ['custom' => true]);
      echo $this->Form->control('applicant_count');
    ?>
  </div>

  <div class="card-footer d-flex">
    <div class="ml-auto">
      <?= $this->Form->button(__('Save')) ?>
      <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
    </div>
  </div>

  <?= $this->Form->end() ?>
</div>

