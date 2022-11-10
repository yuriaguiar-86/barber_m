<section>
    <div class="subtitle__button">
        <h1>Dias da semana <small>visualização</small></h1>

        <div class="profile">
            <?= $this->Form->postLink(__('Apagar'), ['controller' => 'DaysOfWeek', 'action' => 'delete', $daysOfWeek->id], ['class' => 'delete_in_view sweetdelete', 'data-name' => $daysOfWeek->name, 'confirm' => __('Tem certeza que deseja apagar o dia da semana {0}?', $daysOfWeek->name)]); ?>
            <p><?= $this->Html->link(__('Atualizar'), ['controller' => 'DaysOfWeek', 'action' => 'edit', $daysOfWeek->id], ['class' => 'update']); ?></p>
            <p><?= $this->Html->link(__('Listagem'), ['controller' => 'DaysOfWeek', 'action' => 'index']); ?></p>
        </div>
    </div>

    <div class="data__person">
        <dl>
            <div class="data__row">
                <h4>#</h4>
                <dd><?= $daysOfWeek->id; ?></dd>
            </div>

            <div class="data__row">
                <h4>Nome</h4>
                <dd><?= $daysOfWeek->name; ?></dd>
            </div>
        </dl>
    </div>
</section>

<?= $this->Html->script('sweetalert'); ?>
