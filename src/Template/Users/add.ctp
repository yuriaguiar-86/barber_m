<?php

use App\Controller\DaysOfWeekENUM;
?>

<section>
    <div class="subtitle__button">
        <h1>Usuários <small>cadastro</small></h1>

        <p><?= $this->Html->link(__('Listagem'), ['controller' => 'Users', 'action' => 'index']); ?></p>
    </div>

    <?= $this->Flash->render(); ?>
    <?= $this->Form->create($user, ['class' => 'all__forms']); ?>

    <p><span class="fields__required">*</span> campos obrigatórios</p>

    <div class="row">
        <label>Nome <span class="fields__required">*</span></label>
        <?= $this->Form->control('name', ['label' => false, 'required']); ?>
    </div>

    <div class="row">
        <label>E-mail <span class="fields__required">*</span></label>
        <?= $this->Form->control('email', ['label' => false, 'required']); ?>
    </div>

    <div class="more__fields">
        <div class="row right">
            <label>Telefone <span class="fields__required">*</span></label>
            <?= $this->Form->control('personal_phone', ['label' => false, 'required', 'inputmode' => 'numeric', 'class' => 'phone', 'placeholder' => '(99) 99999-9999']); ?>
        </div>
        <div class="row right">
            <label>Outro telefone</label>
            <?= $this->Form->control('other_phone', ['label' => false, 'class' => 'phone', 'inputmode' => 'numeric', 'placeholder' => '(99) 99999-9999']); ?>
        </div>
        <div class="row">
            <label>Tipo de perfil <span class="fields__required">*</span></label>
            <?= $this->Form->control('role_id', [['options' => $roles], 'label' => false, 'required', 'class' => 'type__role']); ?>
        </div>
    </div>

    <section class="controllers">
        <h2>Dados de acesso</h2>

        <div class="more__fields">
            <div class="row right">
                <label>Usuário <span class="fields__required">*</span></label>
                <?= $this->Form->control('username', ['label' => false, 'required']); ?>
            </div>
            <div class="row right">
                <label>Senha <span class="fields__required">*</span></label>
                <?= $this->Form->control('password', ['label' => false, 'required', 'placeholder' => 'No mínimo 06 caracteres']); ?>
            </div>
            <div class="row">
                <label>Confirmação de senha <span class="fields__required">*</span></label>
                <?= $this->Form->control('confirm_password', ['type' => 'password', 'label' => false, 'required', 'placeholder' => 'Digite a mesma senha']); ?>
            </div>
        </div>
    </section>

    <section class="controllers times__employee">
        <h2>Controladores de atendimento <span class="fields__required">*</span></h2>
        <p class="information__roles">Marque os horários no qual o profissional estará trabalhando durante a semana, ou clique no dia da semana para marcar/desmarcar todas.</p>

        <?php $daysWeek = DaysOfWeekENUM::findConstants(); ?>
        <?php foreach ($daysWeek as $day) : ?>
            <div class="input__services">
                <div class="icons__module">
                    <i class="fa-solid fa-check allcheck" aria-hidden="true" title="Marcar todos"></i>
                    <i class="fa-regular fa-square uncheck" aria-hidden="true" title="Desmarcar todos"></i>
                    <h4><?= $day; ?></h4>
                </div>

                <?php foreach ($daysTimes as $hour) : ?>
                    <?php foreach ($hour->days_times as $day_week) : ?>
                        <?php if ($day_week->day_of_week == DaysOfWeekENUM::findConstants($day)) : ?>

                            <input type="checkbox" id="box-<?= $hour->id; ?>" name="opening_hours[_ids][]" value="<?= $hour->id; ?>" class="checkbox__service" />
                            <label for="box-<?= $hour->id; ?>"><?= $hour->time_of_week; ?>:00H</label>

                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
    </section>

    <?= $this->Form->button(__('Cadastrar'), ['class' => 'button__save']); ?>
    <?= $this->Form->end(); ?>
</section>

<?= $this->Html->script(['users', 'masks']); ?>

