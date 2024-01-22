<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\ReaderDocument> $readerDocuments
 */
?>
<div class="readerDocuments index content">
    <?= $this->Html->link(__('New Reader Document'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Reader Documents') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('document_id') ?></th>
                    <th><?= $this->Paginator->sort('nomber_download') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($readerDocuments as $readerDocument): ?>
                <tr>
                    <td><?= $this->Number->format($readerDocument->id) ?></td>
                    <td><?= $readerDocument->has('user') ? $this->Html->link($readerDocument->user->name, ['controller' => 'Users', 'action' => 'view', $readerDocument->user->id]) : '' ?></td>
                    <td><?= $readerDocument->has('document') ? $this->Html->link($readerDocument->document->title, ['controller' => 'Documents', 'action' => 'view', $readerDocument->document->id]) : '' ?></td>
                    <td><?= $readerDocument->nomber_download === null ? '' : $this->Number->format($readerDocument->nomber_download) ?></td>
                    <td><?= h($readerDocument->created) ?></td>
                    <td><?= h($readerDocument->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $readerDocument->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $readerDocument->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $readerDocument->id], ['confirm' => __('Are you sure you want to delete # {0}?', $readerDocument->id)]) ?>
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
