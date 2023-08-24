<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SalaryComponent[]|\Cake\Collection\CollectionInterface $salaryComponents
 */
?>
<?php
$this->assign('title', __('Salary Components'));
$this->Breadcrumbs->add([
    ['title' => 'Home', 'url' => '/'],
    ['title' => 'List Salary Components'],
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
            <?= $this->Html->link(__('New Salary Component'), ['action' => 'add'], ['class' => 'btn btn-primary btn-sm']) ?>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('employee_id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('type') ?></th>
                    <th><?= $this->Paginator->sort('amount') ?></th>
                    <th><?= $this->Paginator->sort('frequency') ?></th>
                    <th><?= $this->Paginator->sort('taxable') ?></th>
                    <th><?= $this->Paginator->sort('priority') ?></th>
                    <th><?= $this->Paginator->sort('calculation_formula') ?></th>
                    <th><?= $this->Paginator->sort('active') ?></th>
                    <th><?= $this->Paginator->sort('effective_start_date') ?></th>
                    <th><?= $this->Paginator->sort('effective_end_date') ?></th>
                    <th><?= $this->Paginator->sort('currency') ?></th>
                    <th><?= $this->Paginator->sort('approval_required') ?></th>
                    <th><?= $this->Paginator->sort('default_currency') ?></th>
                    <th><?= $this->Paginator->sort('taxable_default') ?></th>
                    <th><?= $this->Paginator->sort('tax_rate') ?></th>
                    <th><?= $this->Paginator->sort('tax_deduction') ?></th>
                    <th><?= $this->Paginator->sort('nigerian_taxable') ?></th>
                    <th><?= $this->Paginator->sort('nigerian_tax_rate') ?></th>
                    <th><?= $this->Paginator->sort('pension_deduction') ?></th>
                    <th><?= $this->Paginator->sort('nhf_deduction') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th><?= $this->Paginator->sort('created_by') ?></th>
                    <th><?= $this->Paginator->sort('modified_by') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($salaryComponents as $salaryComponent) : ?>
                    <tr>
                        <td><?= $this->Number->format($salaryComponent->id) ?></td>
                        <td><?= $salaryComponent->has('employee') ? $this->Html->link($salaryComponent->employee->name_desc, ['controller' => 'Employees', 'action' => 'view', $salaryComponent->employee->id]) : '' ?></td>
                        <td><?= h($salaryComponent->name) ?></td>
                        <td><?= h($salaryComponent->type) ?></td>
                        <td><?= $this->Number->format($salaryComponent->amount) ?></td>
                        <td><?= h($salaryComponent->frequency) ?></td>
                        <td><?= ($salaryComponent->taxable) ? __('Yes') : __('No') ?></td>
                        <td><?= $this->Number->format($salaryComponent->priority) ?></td>
                        <td><?= h($salaryComponent->calculation_formula) ?></td>
                        <td><?= ($salaryComponent->active) ? __('Yes') : __('No') ?></td>
                        <td><?= h($salaryComponent->effective_start_date) ?></td>
                        <td><?= h($salaryComponent->effective_end_date) ?></td>
                        <td><?= h($salaryComponent->currency) ?></td>
                        <td><?= ($salaryComponent->approval_required) ? __('Yes') : __('No') ?></td>
                        <td><?= h($salaryComponent->default_currency) ?></td>
                        <td><?= ($salaryComponent->taxable_default) ? __('Yes') : __('No') ?></td>
                        <td><?= $this->Number->format($salaryComponent->tax_rate) ?></td>
                        <td><?= $this->Number->format($salaryComponent->tax_deduction) ?></td>
                        <td><?= ($salaryComponent->nigerian_taxable) ? __('Yes') : __('No') ?></td>
                        <td><?= $this->Number->format($salaryComponent->nigerian_tax_rate) ?></td>
                        <td><?= $this->Number->format($salaryComponent->pension_deduction) ?></td>
                        <td><?= $this->Number->format($salaryComponent->nhf_deduction) ?></td>
                        <td><?= h($salaryComponent->created) ?></td>
                        <td><?= h($salaryComponent->modified) ?></td>
                        <td><?= $this->Number->format($salaryComponent->created_by) ?></td>
                        <td><?= $this->Number->format($salaryComponent->modified_by) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $salaryComponent->id], ['class' => 'btn btn-xs btn-outline-primary', 'escape' => false]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $salaryComponent->id], ['class' => 'btn btn-xs btn-outline-primary', 'escape' => false]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $salaryComponent->id], ['class' => 'btn btn-xs btn-outline-danger', 'escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $salaryComponent->id)]) ?>
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
