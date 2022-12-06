<section>
    <div class="subtitle__button">
        <h1>Horários <small>visualização</small></h1>

        <div class="profile">
            <?php if ($this->AppView->visible('OpeningHours', 'delete')) : ?>
                <?= $this->Form->postLink(__('Apagar'), ['controller' => 'OpeningHours', 'action' => 'delete', $openingHour->id], ['class' => 'delete_in_view sweetdelete', 'data-name' => 'o horário das '.$openingHour->time_of_week.':00H', 'confirm' => __('Tem certeza que deseja apagar o horário {0}:00H?', $openingHour->time_of_week)]); ?>
            <?php endif; ?>

            <?php if ($this->AppView->visible('OpeningHours', 'edit')) : ?>
                <p><?= $this->Html->link(__('Atualizar'), ['controller' => 'OpeningHours', 'action' => 'edit', $openingHour->id], ['class' => 'update']); ?></p>
            <?php endif; ?>

            <p><?= $this->Html->link(__('Listagem'), ['controller' => 'OpeningHours', 'action' => 'index']); ?></p>

            <nav class="primary-navigation nav__view">
                <ul>
                    <li><a href="#" class="header__link">Opções &dtrif;</a>
                        <ul class="dropdown">
                            <?php if ($this->AppView->visible('OpeningHours', 'delete')) : ?>
                                <li><?= $this->Form->postLink(__('Apagar'), ['controller' => 'OpeningHours', 'action' => 'delete', $openingHour->id], ['class' => 'header__link sweetdelete', 'data-name' => 'o horário das '.$openingHour->time_of_week.':00H', 'confirm' => __('Tem certeza que deseja apagar o horário {0}:00H?', $openingHour->time_of_week)]); ?></li>
                            <?php endif; ?>

                            <?php if ($this->AppView->visible('OpeningHours', 'edit')) : ?>
                                <li><?= $this->Html->link(__('Atualizar'), ['controller' => 'OpeningHours', 'action' => 'edit', $openingHour->id], ['class' => 'header__link']); ?></li>
                            <?php endif; ?>

                            <li><?= $this->Html->link(__('Listagem'), ['controller' => 'OpeningHours', 'action' => 'index'], ['class' => 'header__link']); ?></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    <div class="data__person">
        <dl>
            <div class="data__row">
                <h4>#</h4>
                <dd><?= $openingHour->id; ?></dd>
            </div>

            <div class="data__row">
                <h4>Horário</h4>
                <dd><?= $openingHour->time_of_week; ?>:00H</dd>
            </div>
        </dl>
    </div>
</section>

<?= $this->Html->script('sweetalert'); ?>
