<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Shift $shift
 */
?>
<?php
$this->assign('title', __('Edit Shift'));
$this->Breadcrumbs->add([
    ['title' => 'Home', 'url' => '/'],
    ['title' => 'List Shifts', 'url' => ['action' => 'index']],
    ['title' => 'View', 'url' => ['action' => 'view', $shift->id]],
    ['title' => 'Edit'],
]);
?>

<div class="card card-primary card-outline">
  <?= $this->Form->create($shift) ?>
  <div class="card-body">
    <?php
      echo $this->Form->control('employee_id', ['options' => $employees]);
      echo $this->Form->control('start_time');
      echo $this->Form->control('end_time');
      echo $this->Form->control('break_start', ['empty' => true]);
      echo $this->Form->control('break_end', ['empty' => true]);
      echo $this->Form->control('valid_from');
      echo $this->Form->control('valid_to', ['empty' => true]);
    ?>
  </div>

  <div class="card-footer d-flex">
    <div class="">
      <?= $this->Form->postLink(
          __('Delete'),
          ['action' => 'delete', $shift->id],
          ['confirm' => __('Are you sure you want to delete # {0}?', $shift->id), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Form->button(__('Save')) ?>
      <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
    </div>
  </div>

  <?= $this->Form->end() ?>
</div>

