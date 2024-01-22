<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DocumentComment $documentComment
 * @var string[]|\Cake\Collection\CollectionInterface $users
 * @var string[]|\Cake\Collection\CollectionInterface $documents
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $documentComment->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $documentComment->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Document Comments'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="documentComments form content">
            <?= $this->Form->create($documentComment) ?>
            <fieldset>
                <legend><?= __('Edit Document Comment') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('document_id', ['options' => $documents]);
                    echo $this->Form->control('comment');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
