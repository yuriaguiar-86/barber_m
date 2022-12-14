<?php

use App\Controller\TermsENUM;
?>
<section class="containner">
    <?= $this->Flash->render(); ?>
    <?= $this->Form->create($client); ?>

    <div class="row">
        <label>Nome</label>
        <?= $this->Form->control('name', ['label' => false, 'required', 'autocomplete' => 'off']); ?>
    </div>

    <div class="row">
        <label>E-mail</label>
        <?= $this->Form->control('email', ['label' => false, 'required', 'autocomplete' => 'off']); ?>
    </div>

    <div class="more__inputs">
        <div class="row right">
            <label>Telefone</label>
            <?= $this->Form->control('personal_phone', ['label' => false, 'inputmode' => 'numeric', 'placeholder' => '(99) 99999-9999', 'class' => 'phone', 'required', 'autocomplete' => 'off']); ?>
        </div>

        <div class="row">
            <label>Outro telefone</label>
            <?= $this->Form->control('other_phone', ['label' => false, 'inputmode' => 'numeric', 'placeholder' => '(99) 99999-9999', 'class' => 'phone', 'autocomplete' => 'off']); ?>
        </div>
    </div>

    <div class="row">
        <label>Usuário</label>
        <?= $this->Form->control('username', ['label' => false, 'required', 'autocomplete' => 'off']); ?>
    </div>

    <div class="more__inputs">
        <div class="row right">
            <label>Senha</label>
            <?= $this->Form->control('password', ['label' => false, 'required', 'placeholder' => 'No mínimo 06 caracteres']); ?>
        </div>

        <div class="row">
            <label>Confirmação de senha</label>
            <?= $this->Form->control('confirm_password', ['type' => 'password', 'label' => false, 'required', 'placeholder' => 'Digite a mesma senha']); ?>
        </div>
    </div>

    <div class="input__terms">
        <input type="checkbox" id="box-terms" name="terms" value="<?= TermsENUM::CHECKED; ?>" class="checkbox__terms" />
        <label for="box-terms">Compreendo e aceitos os <span class="conditions">Termos e condições.</span></label>
    </div>

    <?= $this->Form->button(__('Criar conta')); ?>
    <?= $this->Form->end(); ?>

    <p class="router">Já possui cadastro? <?= $this->Html->link(__('Efetuar login'), ['controller' => 'Users', 'action' => 'login']); ?></p>
</section>

<?= $this->Html->script('masks'); ?>
