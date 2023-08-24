<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ModulePermission[]|\Cake\Collection\CollectionInterface $modulePermissions
 */
?>
<?php
$this->assign('title', __('Module Permissions'));
$this->Breadcrumbs->add([
    ['title' => 'Home', 'url' => '/'],
    ['title' => 'List Module Permissions'],
]);
?>

<div class="card card-primary card-outline">
    <div class="card-header d-sm-flex">
        <h2 class="card-title">
            <!-- -->
        </h2>
        <div class="card-toolbox">
            <?= $this->Paginator->limitControl([], null, [
                'label' => false,
                'class' => 'form-control-sm',
            ]); ?>
            <?= $this->Html->link(__('New Module Permission'), ['action' => 'add'], ['class' => 'btn btn-primary btn-sm']) ?>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('role_id') ?></th>
                    <th><?= $this->Paginator->sort('module_id') ?></th>
                    <th><?= $this->Paginator->sort('view') ?></th>
                    <th><?= $this->Paginator->sort('edit') ?></th>
                    <th><?= $this->Paginator->sort('new') ?></th>
                    <th><?= $this->Paginator->sort('remove') ?></th>
                    <th><?= $this->Paginator->sort('import') ?></th>
                    <th><?= $this->Paginator->sort('export') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($modulePermissions as $modulePermission) : ?>
                    <tr>
                        <td><?= $this->Number->format($modulePermission->id) ?></td>
                        <td><?= $modulePermission->has('role') ? $this->Html->link($modulePermission->role->name, ['controller' => 'Roles', 'action' => 'view', $modulePermission->role->id]) : '' ?></td>
                        <td><?= $modulePermission->has('module') ? $this->Html->link($modulePermission->module->name, ['controller' => 'Modules', 'action' => 'view', $modulePermission->module->id]) : '' ?></td>
                        <td><?= ($modulePermission->view) ? __('Yes') : __('No') ?></td>
                        <td><?= ($modulePermission->edit) ? __('Yes') : __('No') ?></td>
                        <td><?= ($modulePermission->new) ? __('Yes') : __('No') ?></td>
                        <td><?= ($modulePermission->remove) ? __('Yes') : __('No') ?></td>
                        <td><?= ($modulePermission->import) ? __('Yes') : __('No') ?></td>
                        <td><?= ($modulePermission->export) ? __('Yes') : __('No') ?></td>
                        <td><?= h($modulePermission->created) ?></td>
                        <td><?= h($modulePermission->modified) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $modulePermission->id], ['class' => 'btn btn-xs btn-outline-primary', 'escape' => false]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $modulePermission->id], ['class' => 'btn btn-xs btn-outline-primary', 'escape' => false]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $modulePermission->id], ['class' => 'btn btn-xs btn-outline-danger', 'escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $modulePermission->id)]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->

    <div class="card-footer d-md-flex paginator">
        <div class="mr-auto" style="font-size:.8rem">
            <?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?>
        </div>
        <ul class="pagination pagination-sm">
            <?= $this->Paginator->first('<i class="fas fa-angle-double-left"></i>', ['escape' => false]) ?>
            <?= $this->Paginator->prev('<i class="fas fa-angle-left"></i>', ['escape' => false]) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next('<i class="fas fa-angle-right"></i>', ['escape' => false]) ?>
            <?= $this->Paginator->last('<i class="fas fa-angle-double-right"></i>', ['escape' => false]) ?>
        </ul>
    </div>
    <!-- /.card-footer -->
</div>
