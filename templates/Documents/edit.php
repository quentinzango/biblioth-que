<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Document $document
 * @var string[]|\Cake\Collection\CollectionInterface $users
 * @var string[]|\Cake\Collection\CollectionInterface $documentCategories
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $document->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $document->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Documents'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="documents form content">
            <?= $this->Form->create($document,['type' => 'file']) ?>
            <fieldset>
                <legend><?= __('Edit Document') ?></legend>
                <?php
                     echo $this->Form->control('user_id',['option' => $users]);
                    echo $this->Form->control('document_categorie_id', ['options' => $documentCategories]);
                    echo $this->Form->control('title');
                    echo $this->Form->control('author');
                    echo $this->Form->control('editor');
                    echo $this->Form->control('cover_photo', ['type' => 'file']);
                    echo $this->Form->control('exemplary_document', ['type' => 'file']);
                    echo $this->Form->control('slug');
                    echo $this->Form->control('description');
                    echo $this->Form->control('published');
                    echo $this->Form->control('deleted');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
