<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Topic $topic
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Topic'), ['action' => 'edit', $topic->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Topic'), ['action' => 'delete', $topic->id], ['confirm' => __('Are you sure you want to delete # {0}?', $topic->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Topics'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Topic'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="topics view content">
            <h3><?= h($topic->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($topic->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($topic->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($topic->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Deleted') ?></th>
                    <td><?= $topic->deleted ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Description') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($topic->description)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Document Topics') ?></h4>
                <?php if (!empty($topic->document_topics)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Document Id') ?></th>
                            <th><?= __('Topic Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($topic->document_topics as $documentTopics) : ?>
                        <tr>
                            <td><?= h($documentTopics->id) ?></td>
                            <td><?= h($documentTopics->document_id) ?></td>
                            <td><?= h($documentTopics->topic_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'DocumentTopics', 'action' => 'view', $documentTopics->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'DocumentTopics', 'action' => 'edit', $documentTopics->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'DocumentTopics', 'action' => 'delete', $documentTopics->id], ['confirm' => __('Are you sure you want to delete # {0}?', $documentTopics->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
