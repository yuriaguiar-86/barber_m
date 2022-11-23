<section class="containner">
    <?= $this->Flash->render(); ?>
    <?= $this->Form->create($user); ?>

    <div class="row">
        <label>Senha</label>
        <?= $this->Form->control('password', ['label' => false, 'required', 'placeholder' => 'No mínimo 06 caracteres']); ?>
    </div>
    <div class="row">
        <label>Confirmação de senha</label>
        <?= $this->Form->control('confirm_password', ['type' => 'password', 'label' => false, 'required', 'placeholder' => 'Digite a mesma senha']); ?>
    </div>

    <?= $this->Form->button(__('Trocar senha')); ?>
    <?= $this->Form->end(); ?>

    <p>Possui os dados de acesso? <?= $this->Html->link(__('Criar conta'), ['controller' => 'Users', 'action' => 'login']); ?></p>
</section>
