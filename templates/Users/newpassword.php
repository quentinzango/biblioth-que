<div class="users form content">
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('veuillez entré le nouveau mot de passe') ?></legend>
        <?= $this->Form->control('newpassword', ['type' => 'password']) ?>
        </fieldset>
 <?= $this->Form->button(__('envoyer')); ?>
 <?= $this->Form->end() ?>
 </div>
