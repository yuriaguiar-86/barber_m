<section>
    <div class="subtitle__button">
        <h1>Horários <small>visualização</small></h1>

        <div class="profile">
            <?= $this->Form->postLink(__('Apagar'), ['controller' => 'TimesOfDay', 'action' => 'delete', $timesOfDay->id], ['class' => 'delete_in_view sweetdelete', 'data-name' => $timesOfDay->time, 'confirm' => __('Tem certeza que deseja apagar o horário {0}?', $timesOfDay->time)]); ?>
            <p><?= $this->Html->link(__('Atualizar'), ['controller' => 'TimesOfDay', 'action' => 'edit', $timesOfDay->id], ['class' => 'update']); ?></p>
            <p><?= $this->Html->link(__('Listagem'), ['controller' => 'TimesOfDay', 'action' => 'index']); ?></p>
        </div>
    </div>

    <div class="data__person">
        <dl>
            <div class="data__row">
                <h4>#</h4>
                <dd><?= $timesOfDay->id; ?></dd>
            </div>

            <div class="data__row">
                <h4>Horário</h4>
                <dd><?= $timesOfDay->time; ?>:00H</dd>
            </div>
        </dl>
    </div>
</section>

<?= $this->Html->script('sweetalert'); ?>

