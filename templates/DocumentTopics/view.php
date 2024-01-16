<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DocumentTopic $documentTopic
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Document Topic'), ['action' => 'edit', $documentTopic->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Document Topic'), ['action' => 'delete', $documentTopic->id], ['confirm' => __('Are you sure you want to delete # {0}?', $documentTopic->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Document Topics'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Document Topic'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="documentTopics view content">
            <h3><?= h($documentTopic->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Document') ?></th>
                    <td><?= $documentTopic->has('document') ? $this->Html->link($documentTopic->document->title, ['controller' => 'Documents', 'action' => 'view', $documentTopic->document->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Topic') ?></th>
                    <td><?= $documentTopic->has('topic') ? $this->Html->link($documentTopic->topic->name, ['controller' => 'Topics', 'action' => 'view', $documentTopic->topic->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($documentTopic->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
