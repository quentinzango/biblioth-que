<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ReaderDocument $readerDocument
 * @var \Cake\Collection\CollectionInterface|string[] $users
 * @var \Cake\Collection\CollectionInterface|string[] $documents
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Reader Documents'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="readerDocuments form content">
            <?= $this->Form->create($readerDocument) ?>
            <fieldset>
                <legend><?= __('Add Reader Document') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('document_id', ['options' => $documents]);
                    echo $this->Form->control('nomber_download');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
