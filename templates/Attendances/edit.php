<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Attendance $attendance
 */
?>
<?php
$this->assign('title', __('Edit Attendance'));
$this->Breadcrumbs->add([
    ['title' => 'Home', 'url' => '/'],
    ['title' => 'List Attendances', 'url' => ['action' => 'index']],
    ['title' => 'View', 'url' => ['action' => 'view', $attendance->id]],
    ['title' => 'Edit'],
]);
?>

<div class="card card-primary card-outline">
  <?= $this->Form->create($attendance) ?>
  <div class="card-body">
    <?php
      echo $this->Form->control('employee_id', ['options' => $employees]);
      echo $this->Form->control('check_in');
      echo $this->Form->control('check_out', ['empty' => true]);
      echo $this->Form->control('location_lat');
      echo $this->Form->control('location_lng');
      echo $this->Form->control('check_in_ip');
      echo $this->Form->control('check_out_ip');
    ?>
  </div>

  <div class="card-footer d-flex">
    <div class="">
      <?= $this->Form->postLink(
          __('Delete'),
          ['action' => 'delete', $attendance->id],
          ['confirm' => __('Are you sure you want to delete # {0}?', $attendance->id), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Form->button(__('Save')) ?>
      <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
    </div>
  </div>

  <?= $this->Form->end() ?>
</div>

