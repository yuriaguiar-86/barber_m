<?php

use App\Controller\DaysOfWeekENUM;
?>

<section>
    <div class="subtitle__button">
        <h1>Dias da semana <small>edição</small></h1>

        <p><?= $this->Html->link(__('Listagem'), ['controller' => 'OpeningHours', 'action' => 'index']); ?></p>
    </div>

    <?= $this->Flash->render(); ?>
    <?= $this->Form->create($openingHour, ['class' => 'all__forms']); ?>

    <p><span class="fields__required">*</span> campos obrigatórios</p>

    <div class="row">
        <label>Nome <span class="fields__required">*</span></label>
        <?= $this->Form->control('day_of_week', ['options' => DaysOfWeekENUM::findConstants(), 'label' => false, 'required']); ?>
    </div>

    <section class="controllers">
        <h2>Horários de atendimento <span class="fields__required">*</span></h2>

        <?php if (!empty($times)) : ?>
            <p class="information__roles">Marque os horários em que o estabelecimento estará em funcionamento.</p>

            <?php foreach ($times as $clock) : ?>
                <div class="input__services">

                    <input type="checkbox" id="box-<?= $clock->id; ?>" name="times_of_day[_ids][]" value="<?= $clock->id; ?>" class="checkbox__service" />
                    <label for="box-<?= $clock->id; ?>"><?= $clock->time; ?>:00H</label>

                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p class="information__roles">Nenhum horário cadastrado!</p>
        <?php endif; ?>

        <?= $this->Form->button(__('Atualizar'), ['class' => 'button__edit']); ?>
        <?= $this->Form->end(); ?>
    </section>

    <?= $this->Html->script('roles'); ?>
