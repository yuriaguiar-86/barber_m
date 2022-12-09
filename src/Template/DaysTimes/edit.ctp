<?php

use App\Controller\DaysOfWeekENUM;
?>

<section>
    <div class="subtitle__button">
        <h1>Dia da semana <small><?= DaysOfWeekENUM::findConstants($daysTime->day_of_week); ?></small></h1>

        <p><?= $this->Html->link(__('Listagem'), ['controller' => 'DaysTimes', 'action' => 'index']); ?></p>
    </div>

    <?= $this->Flash->render(); ?>
    <?= $this->Form->create($daysTime, ['class' => 'all__forms']); ?>

    <p><span class="fields__required">*</span> campos obrigatórios</p>

    <section class="controllers">
        <h2>Horários disponíveis <span class="fields__required">*</span></h2>

        <?php if (!empty($openingHours)) : ?>
            <p class="information__roles">Marque os horários em que o estabelecimento estará em funcionamento.</p>

            <?php foreach ($openingHours as $hour) : ?>
                <div class="input__services">

                    <input type="checkbox" id="box-<?= $hour->id; ?>" name="opening_hours[_ids][]" value="<?= $hour->id; ?>" class="checkbox__service" />
                    <label for="box-<?= $hour->id; ?>"><?= $hour->time_of_week; ?>:00H</label>

                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p class="information__roles">Nenhum horário cadastrado!</p>
        <?php endif; ?>
    </section>

    <?= $this->Form->button(__('Atualizar'), ['class' => 'button__edit']); ?>
    <?= $this->Form->end(); ?>
</section>

<?= $this->Html->script('roles'); ?>
