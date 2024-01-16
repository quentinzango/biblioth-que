<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DocumentCategory $documentCategory
 * @var \Cake\Collection\CollectionInterface|string[] $documentTypes
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Document Categories'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="documentCategories form content">
            <?= $this->Form->create($documentCategory) ?>
            <fieldset>
                <legend><?= __('Add Document Category') ?></legend>
                <?php
                    echo $this->Form->control('document_type_id', ['options' => $documentTypes]);
                    echo $this->Form->control('name');
                    echo $this->Form->control('description');
                    echo $this->Form->control('deleted');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
