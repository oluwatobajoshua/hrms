<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Comment $comment
 */
?>
<?php
$this->assign('title', __('Edit Comment'));
$this->Breadcrumbs->add([
    ['title' => 'Home', 'url' => '/'],
    ['title' => 'List Comments', 'url' => ['action' => 'index']],
    ['title' => 'View', 'url' => ['action' => 'view', $comment->id]],
    ['title' => 'Edit'],
]);
?>

<div class="card card-primary card-outline">
  <?= $this->Form->create($comment) ?>
  <div class="card-body">
    <?php
      echo $this->Form->control('user_id', ['options' => $users]);
      echo $this->Form->control('comment_id');
      echo $this->Form->control('leave_id', ['options' => $leaves, 'empty' => true]);
      echo $this->Form->control('body');
    ?>
  </div>

  <div class="card-footer d-flex">
    <div class="">
      <?= $this->Form->postLink(
          __('Delete'),
          ['action' => 'delete', $comment->id],
          ['confirm' => __('Are you sure you want to delete # {0}?', $comment->id), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Form->button(__('Save')) ?>
      <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
    </div>
  </div>

  <?= $this->Form->end() ?>
</div>

