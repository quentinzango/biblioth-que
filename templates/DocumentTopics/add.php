<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DocumentTopic $documentTopic
 * @var \Cake\Collection\CollectionInterface|string[] $documents
 * @var \Cake\Collection\CollectionInterface|string[] $topics
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Document Topics'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="documentTopics form content">
            <?= $this->Form->create($documentTopic) ?>
            <fieldset>
                <legend><?= __('Add Document Topic') ?></legend>
                <?php
                    echo $this->Form->control('document_id', ['options' => $documents]);
                    echo $this->Form->control('topic_id', ['options' => $topics]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
