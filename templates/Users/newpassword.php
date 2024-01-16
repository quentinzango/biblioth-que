<div class="users form content">
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __(' le mot de pass') ?></legend>
        <?= $this->Form->control('nouveau mot de pass') ?>
        </fieldset>
 <?= $this->Form->button(__('envoyer')); ?>
 <?= $this->Form->end() ?>
 </div>
