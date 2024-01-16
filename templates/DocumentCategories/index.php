<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\DocumentCategory> $documentCategories
 */
?>
<div class="documentCategories index content">
    <?= $this->Html->link(__('New Document Category'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Document Categories') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('document_type_id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('description') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th><?= $this->Paginator->sort('deleted') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($documentCategories as $documentCategory): ?>
                <tr>
                    <td><?= $this->Number->format($documentCategory->id) ?></td>
                    <td><?= $documentCategory->has('document_type') ? $this->Html->link($documentCategory->document_type->name, ['controller' => 'DocumentTypes', 'action' => 'view', $documentCategory->document_type->id]) : '' ?></td>
                    <td><?= h($documentCategory->name) ?></td>
                    <td><?= h($documentCategory->description) ?></td>
                    <td><?= h($documentCategory->created) ?></td>
                    <td><?= h($documentCategory->modified) ?></td>
                    <td><?= h($documentCategory->deleted) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $documentCategory->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $documentCategory->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $documentCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $documentCategory->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
