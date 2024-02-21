<div class="row" style="background-image:  url('<?= $this->Path->getBaseUrl() ?>assets/img/p1.jpg'); background-size: cover ;">
            <div class="col-md-6 offset-md-3">
                <div class="users form content">

                    <?= $this->Form->create() ?>

                    <fieldset>
                        <legend><?= __('Connexion') ?></legend>
                        <?= $this->Form->control('email') ?>
                        <?= $this->Form->control('password') ?>
                    </fieldset>
                    <?= $this->Form->button(__('Connexion')); ?>
                    <?= $this->Form->end() ?>
                    <?= $this->Html->link("Crée un compte", ['action' => 'registration']) ?>
                    <?= $this->Html->link("Mot de pass oublié ?", ['action' => 'resetpassword'], ['class' => ' float-right']) ?>
                </div>
            </div>
    </div>
</div>
