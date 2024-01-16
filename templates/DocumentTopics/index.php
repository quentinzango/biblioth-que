<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\DocumentTopic> $documentTopics
 */
?>
<div class="documentTopics index content">
    <?= $this->Html->link(__('New Document Topic'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Document Topics') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('document_id') ?></th>
                    <th><?= $this->Paginator->sort('topic_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($documentTopics as $documentTopic): ?>
                <tr>
                    <td><?= $this->Number->format($documentTopic->id) ?></td>
                    <td><?= $documentTopic->has('document') ? $this->Html->link($documentTopic->document->title, ['controller' => 'Documents', 'action' => 'view', $documentTopic->document->id]) : '' ?></td>
                    <td><?= $documentTopic->has('topic') ? $this->Html->link($documentTopic->topic->name, ['controller' => 'Topics', 'action' => 'view', $documentTopic->topic->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $documentTopic->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $documentTopic->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $documentTopic->id], ['confirm' => __('Are you sure you want to delete # {0}?', $documentTopic->id)]) ?>
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
