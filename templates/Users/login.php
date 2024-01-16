<div class="users form content">
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Connexion') ?></legend>
        <?= $this->Form->control('email') ?>
        <?= $this->Form->control('password') ?>
    </fieldset>
    <?= $this->Form->button(__('Login')); ?>
    <?= $this->Form->end() ?>
    <?= $this->Html->link("Ajouter un utilisateur", ['action' => 'add']) ?>
    <?= $this->Html->link("Mot de pass oublié ?", ['action' => 'resetpassword'],['class' => ' float-right'])?>
</div>
