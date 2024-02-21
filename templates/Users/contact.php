<div class="col-md-6 offset-md-3">

    <h1>Contactez Nous</h1>

    <?= $this->Form->create(null, ['url' => ['controller' => 'Users', 'action' => 'contact']]) ?>
    <?= $this->Form->control('Nom', ['label' => 'Nom']) ?>
    <?= $this->Form->control('Email', ['label' => 'Email']) ?>
    <?= $this->Form->control('Message', ['label' => 'Message', 'rows' => '5']) ?>
    <?= $this->Form->button('Envoyer') ?>
    <?= $this->Form->end() ?>
</div>
