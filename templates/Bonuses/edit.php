<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bonus $bonus
 */
?>
<?php
$this->assign('title', __('Edit Bonus'));
$this->Breadcrumbs->add([
    ['title' => 'Home', 'url' => '/'],
    ['title' => 'List Bonuses', 'url' => ['action' => 'index']],
    ['title' => 'View', 'url' => ['action' => 'view', $bonus->id]],
    ['title' => 'Edit'],
]);
?>

<div class="card card-primary card-outline">
  <?= $this->Form->create($bonus) ?>
  <div class="card-body">
    <?php
      echo $this->Form->control('employee_id', ['options' => $employees]);
      echo $this->Form->control('bonus_title');
      echo $this->Form->control('bonus_description');
      echo $this->Form->control('bonus_date');
      echo $this->Form->control('bonus_amount');
      echo $this->Form->control('status_id', ['options' => $statuses]);
    ?>
  </div>

  <div class="card-footer d-flex">
    <div class="">
      <?= $this->Form->postLink(
          __('Delete'),
          ['action' => 'delete', $bonus->id],
          ['confirm' => __('Are you sure you want to delete # {0}?', $bonus->id), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Form->button(__('Save')) ?>
      <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
    </div>
  </div>

  <?= $this->Form->end() ?>
</div>

