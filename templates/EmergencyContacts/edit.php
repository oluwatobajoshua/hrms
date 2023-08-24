<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EmergencyContact $emergencyContact
 */
?>
<?php
$this->assign('title', __('Edit Emergency Contact'));
$this->Breadcrumbs->add([
    ['title' => 'Home', 'url' => '/'],
    ['title' => 'List Emergency Contacts', 'url' => ['action' => 'index']],
    ['title' => 'View', 'url' => ['action' => 'view', $emergencyContact->id]],
    ['title' => 'Edit'],
]);
?>

<div class="card card-primary card-outline">
  <?= $this->Form->create($emergencyContact) ?>
  <div class="card-body">
    <?php
      echo $this->Form->control('employee_id', ['options' => $employees]);
      echo $this->Form->control('name');
      echo $this->Form->control('relationship_id', ['options' => $relationships]);
      echo $this->Form->control('phone');
      echo $this->Form->control('email');
    ?>
  </div>

  <div class="card-footer d-flex">
    <div class="">
      <?= $this->Form->postLink(
          __('Delete'),
          ['action' => 'delete', $emergencyContact->id],
          ['confirm' => __('Are you sure you want to delete # {0}?', $emergencyContact->id), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Form->button(__('Save')) ?>
      <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
    </div>
  </div>

  <?= $this->Form->end() ?>
</div>

