<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ReaderDocument $readerDocument
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Reader Document'), ['action' => 'edit', $readerDocument->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Reader Document'), ['action' => 'delete', $readerDocument->id], ['confirm' => __('Are you sure you want to delete # {0}?', $readerDocument->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Reader Documents'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Reader Document'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="readerDocuments view content">
            <h3><?= h($readerDocument->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $readerDocument->has('user') ? $this->Html->link($readerDocument->user->name, ['controller' => 'Users', 'action' => 'view', $readerDocument->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Document') ?></th>
                    <td><?= $readerDocument->has('document') ? $this->Html->link($readerDocument->document->title, ['controller' => 'Documents', 'action' => 'view', $readerDocument->document->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($readerDocument->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Nomber Download') ?></th>
                    <td><?= $readerDocument->nomber_download === null ? '' : $this->Number->format($readerDocument->nomber_download) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($readerDocument->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($readerDocument->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
