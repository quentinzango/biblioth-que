<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DocumentCategory $documentCategory
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Document Category'), ['action' => 'edit', $documentCategory->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Document Category'), ['action' => 'delete', $documentCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $documentCategory->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Document Categories'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Document Category'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="documentCategories view content">
            <h3><?= h($documentCategory->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Document Type') ?></th>
                    <td><?= $documentCategory->has('document_type') ? $this->Html->link($documentCategory->document_type->name, ['controller' => 'DocumentTypes', 'action' => 'view', $documentCategory->document_type->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($documentCategory->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Description') ?></th>
                    <td><?= h($documentCategory->description) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($documentCategory->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($documentCategory->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($documentCategory->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Deleted') ?></th>
                    <td><?= $documentCategory->deleted ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
