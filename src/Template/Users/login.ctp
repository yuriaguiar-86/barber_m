<section class="containner">
    <?= $this->Flash->render(); ?>
    <?= $this->Form->create('post'); ?>

    <div class="row">
        <label>Usuário</label>
        <?= $this->Form->control('username', ['label' => false, 'required']); ?>
    </div>

    <div class="row">
        <label>Senha</label>
        <?= $this->Form->control('password', ['label' => false, 'required']); ?>
    </div>

    <p class="recover"><?= $this->Html->link(__('Esqueci minha senha'), ['controller' => 'Users', 'action' => 'recoverPassword']); ?></p>

    <?= $this->Form->button(__('Acessar')); ?>
    <?= $this->Form->end(); ?>

    <p>Ainda não possui cadastro? <?= $this->Html->link(__('Criar conta'), ['controller' => 'Users', 'action' => 'register']); ?></p>
</section>
