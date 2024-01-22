<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DocumentComment $documentComment
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Document Comment'), ['action' => 'edit', $documentComment->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Document Comment'), ['action' => 'delete', $documentComment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $documentComment->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Document Comments'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Document Comment'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="documentComments view content">
            <h3><?= h($documentComment->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $documentComment->has('user') ? $this->Html->link($documentComment->user->name, ['controller' => 'Users', 'action' => 'view', $documentComment->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Document') ?></th>
                    <td><?= $documentComment->has('document') ? $this->Html->link($documentComment->document->title, ['controller' => 'Documents', 'action' => 'view', $documentComment->document->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($documentComment->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($documentComment->created) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Comment') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($documentComment->comment)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
