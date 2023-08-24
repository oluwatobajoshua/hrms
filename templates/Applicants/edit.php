<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Applicant $applicant
 */
?>
<?php
$this->assign('title', __('Edit Applicant'));
$this->Breadcrumbs->add([
    ['title' => 'Home', 'url' => '/'],
    ['title' => 'List Applicants', 'url' => ['action' => 'index']],
    ['title' => 'View', 'url' => ['action' => 'view', $applicant->id]],
    ['title' => 'Edit'],
]);
?>

<div class="card card-primary card-outline">
  <?= $this->Form->create($applicant) ?>
  <div class="card-body">
    <?php
      echo $this->Form->control('job_listing_id', ['options' => $jobListings]);
      echo $this->Form->control('first_name');
      echo $this->Form->control('last_name');
      echo $this->Form->control('email');
      echo $this->Form->control('phone');
      echo $this->Form->control('address');
      echo $this->Form->control('date_of_birth');
      echo $this->Form->control('gender_id', ['options' => $genders]);
      echo $this->Form->control('marital_status_id', ['options' => $maritalStatuses]);
      echo $this->Form->control('application_date');
      echo $this->Form->control('nationality');
      echo $this->Form->control('resume_file_url');
      echo $this->Form->control('highest_education_id', ['options' => $highestEducations]);
    ?>
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
      <?= $this->Form->button(__('Save')) ?>
      <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
    </div>
  </div>

  <?= $this->Form->end() ?>
</div>

