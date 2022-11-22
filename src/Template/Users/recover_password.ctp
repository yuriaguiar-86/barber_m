<section class="containner">
    <?= $this->Flash->render(); ?>
    <?= $this->Form->create($user); ?>

    <div class="row">
        <label>E-mail</label>
        <?= $this->Form->control('email', ['label' => false, 'placeholder' => 'Informe o e-mail cadastrado', 'required']); ?>
    </div>

    <?= $this->Form->button(__('Acessar')); ?>
    <?= $this->Form->end(); ?>

    <p>Possui os dados de acesso? <?= $this->Html->link(__('Efetuar login'), ['controller' => 'Users', 'action' => 'login']); ?></p>
</section>
