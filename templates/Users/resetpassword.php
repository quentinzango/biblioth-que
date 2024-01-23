<div class="users form content">
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Entrer votre adresse Email') ?></legend>
        <?= $this->Form->control('email') ?>
        </fieldset>
 <?= $this->Form->button(__('envoyer')); ?>
 <?= $this->Form->end() ?>
 </div>
