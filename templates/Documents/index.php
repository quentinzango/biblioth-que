<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Document> $documents
 */
?>
<div class="documents index content">
    <?= $this->Html->link(__('New Document'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Documents') ?></h3>

    <?= $this->Form->create(null,['type'=>'get']) ?>
    <?= $this->Form->control('key',['label'=>'search', 'value'=>$this->request->getquery('key')]) ?>
    <?= $this->Form->submit() ?>
    <?= $this->Form->end() ?>

    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('document_categorie_id') ?></th>
                    <th><?= $this->Paginator->sort('title') ?></th>
                    <th><?= $this->Paginator->sort('author') ?></th>
                    <th><?= $this->Paginator->sort('editor') ?></th>
                    <th><?= $this->Paginator->sort('cover_photo') ?></th>
                    <th><?= $this->Paginator->sort('slug') ?></th>
                    <th><?= $this->Paginator->sort('published') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th><?= $this->Paginator->sort('deleted') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($documents as $document): ?>
                <tr>
                    <td><?= $this->Number->format($document->id) ?></td>
                    <td><?= $document->has('user') ? $this->Html->link($document->user->name, ['controller' => 'Users', 'action' => 'view', $document->user->id]) : '' ?></td>
                    <td><?= $document->has('document_category') ? $this->Html->link($document->document_category->name, ['controller' => 'DocumentCategories', 'action' => 'view', $document->document_category->id]) : '' ?></td>
                    <td><?= h($document->title) ?></td>
                    <td><?= h($document->author) ?></td>
                    <td><?= h($document->editor) ?></td>
                    <td><?= h($document->cover_photo) ?></td>
                    <td><?= h($document->slug) ?></td>
                    <td><?= h($document->published) ?></td>
                    <td><?= h($document->created) ?></td>
                    <td><?= h($document->modified) ?></td>
                    <td><?= h($document->deleted) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $document->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $document->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $document->id], ['confirm' => __('Are you sure you want to delete # {0}?', $document->id)]) ?>
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
