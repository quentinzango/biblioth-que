<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Topic> $topics
 */
?>
<div class="topics index content">
    <?= $this->Html->link(__('New Topic'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Topics') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('deleted') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($topics as $topic): ?>
                <tr>
                    <td><?= $this->Number->format($topic->id) ?></td>
                    <td><?= h($topic->name) ?></td>
                    <td><?= h($topic->created) ?></td>
                    <td><?= h($topic->deleted) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $topic->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $topic->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $topic->id], ['confirm' => __('Are you sure you want to delete # {0}?', $topic->id)]) ?>
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
