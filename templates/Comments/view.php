<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Comment $comment
 */
?>

<?php
$this->assign('title', __('Comment'));
$this->Breadcrumbs->add([
    ['title' => 'Home', 'url' => '/'],
    ['title' => 'List Comments', 'url' => ['action' => 'index']],
    ['title' => 'View'],
]);
?>

<div class="view card card-primary card-outline">
  <div class="card-header d-sm-flex">
    <h2 class="card-title"><?= h($comment->id) ?></h2>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $comment->has('user') ? $this->Html->link($comment->user->id, ['controller' => 'Users', 'action' => 'view', $comment->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Leave') ?></th>
            <td><?= $comment->has('leave') ? $this->Html->link($comment->leave->id, ['controller' => 'Leaves', 'action' => 'view', $comment->leave->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($comment->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Comment Id') ?></th>
            <td><?= $this->Number->format($comment->comment_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($comment->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($comment->modified) ?></td>
        </tr>
    </table>
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
      <?= $this->Html->link(__('Edit'), ['action' => 'edit', $comment->id], ['class' => 'btn btn-secondary']) ?>
      <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
    </div>
  </div>
</div>

<div class="view text card">
  <div class="card-header">
    <h3 class="card-title"><?= __('Body') ?></h3>
  </div>
  <div class="card-body">
    <?= $this->Text->autoParagraph(h($comment->body)); ?>
  </div>
</div>

<div class="related related-comments view card">
  <div class="card-header d-sm-flex">
    <h3 class="card-title"><?= __('Related Comments') ?></h3>
    <div class="card-toolbox">
      <?= $this->Html->link(__('New'), ['controller' => 'Comments' , 'action' => 'add'], ['class' => 'btn btn-primary btn-sm']) ?>
      <?= $this->Html->link(__('List '), ['controller' => 'Comments' , 'action' => 'index'], ['class' => 'btn btn-primary btn-sm']) ?>
    </div>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
      <tr>
          <th><?= __('Id') ?></th>
          <th><?= __('User Id') ?></th>
          <th><?= __('Comment Id') ?></th>
          <th><?= __('Leave Id') ?></th>
          <th><?= __('Body') ?></th>
          <th><?= __('Created') ?></th>
          <th><?= __('Modified') ?></th>
          <th class="actions"><?= __('Actions') ?></th>
      </tr>
      <?php if (empty($comment->comments)) { ?>
        <tr>
            <td colspan="8" class="text-muted">
              Comments record not found!
            </td>
        </tr>
      <?php }else{ ?>
        <?php foreach ($comment->comments as $comments) : ?>
        <tr>
            <td><?= h($comments->id) ?></td>
            <td><?= h($comments->user_id) ?></td>
            <td><?= h($comments->comment_id) ?></td>
            <td><?= h($comments->leave_id) ?></td>
            <td><?= h($comments->body) ?></td>
            <td><?= h($comments->created) ?></td>
            <td><?= h($comments->modified) ?></td>
            <td class="actions">
              <?= $this->Html->link(__('View'), ['controller' => 'Comments', 'action' => 'view', $comments->id], ['class'=>'btn btn-xs btn-outline-primary']) ?>
              <?= $this->Html->link(__('Edit'), ['controller' => 'Comments', 'action' => 'edit', $comments->id], ['class'=>'btn btn-xs btn-outline-primary']) ?>
              <?= $this->Form->postLink(__('Delete'), ['controller' => 'Comments', 'action' => 'delete', $comments->id], ['class'=>'btn btn-xs btn-outline-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $comments->id)]) ?>
            </td>
        </tr>
        <?php endforeach; ?>
      <?php } ?>
    </table>
  </div>
</div>

