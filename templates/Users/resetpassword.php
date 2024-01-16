<div class="users form content">
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Réinitialisation du mot de pass') ?></legend>
        <?= $this->Form->control('email') ?>
        </fieldset>
 <?= $this->Form->button(__('envoyer')); ?>
 <?= $this->Form->end() ?>
 </div>
