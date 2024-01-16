<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DocumentType $documentType
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Document Type'), ['action' => 'edit', $documentType->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Document Type'), ['action' => 'delete', $documentType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $documentType->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Document Types'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Document Type'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="documentTypes view content">
            <h3><?= h($documentType->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($documentType->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($documentType->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($documentType->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($documentType->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Deleted') ?></th>
                    <td><?= $documentType->deleted ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Document Categories') ?></h4>
                <?php if (!empty($documentType->document_categories)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Document Type Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('Deleted') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($documentType->document_categories as $documentCategories) : ?>
                        <tr>
                            <td><?= h($documentCategories->id) ?></td>
                            <td><?= h($documentCategories->document_type_id) ?></td>
                            <td><?= h($documentCategories->name) ?></td>
                            <td><?= h($documentCategories->description) ?></td>
                            <td><?= h($documentCategories->created) ?></td>
                            <td><?= h($documentCategories->modified) ?></td>
                            <td><?= h($documentCategories->deleted) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'DocumentCategories', 'action' => 'view', $documentCategories->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'DocumentCategories', 'action' => 'edit', $documentCategories->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'DocumentCategories', 'action' => 'delete', $documentCategories->id], ['confirm' => __('Are you sure you want to delete # {0}?', $documentCategories->id)]) ?>
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
