<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\DocumentComment> $documentComments
 */
?>
<div class="documentComments index content">
    <?= $this->Html->link(__('New Document Comment'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Document Comments') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('document_id') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($documentComments as $documentComment): ?>
                <tr>
                    <td><?= $this->Number->format($documentComment->id) ?></td>
                    <td><?= $documentComment->has('user') ? $this->Html->link($documentComment->user->name, ['controller' => 'Users', 'action' => 'view', $documentComment->user->id]) : '' ?></td>
                    <td><?= $documentComment->has('document') ? $this->Html->link($documentComment->document->title, ['controller' => 'Documents', 'action' => 'view', $documentComment->document->id]) : '' ?></td>
                    <td><?= h($documentComment->created) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $documentComment->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $documentComment->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $documentComment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $documentComment->id)]) ?>
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
