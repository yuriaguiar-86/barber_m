<section>
    <div class="subtitle__button">
        <h1>Dias de folga <small>visualização</small></h1>

        <div class="profile">
            <?php if ($this->AppView->visible('DaysOfWork', 'delete')) : ?>
                <?= $this->Form->postLink(__('Apagar'), ['controller' => 'DaysOfWork', 'action' => 'delete', $daysOfWork->id], ['class' => 'delete_in_view sweetdelete', 'data-name' => 'o dia de folga '.$daysOfWork->not_work->format('d/m/Y'), 'confirm' => __('Tem certeza que deseja apagar a folga do dia {0}?', $daysOfWork->not_work->format('d/m/Y'))]); ?>
            <?php endif; ?>

            <?php if ($this->AppView->visible('DaysOfWork', 'edit')) : ?>
                <p><?= $this->Html->link(__('Atualizar'), ['controller' => 'DaysOfWork', 'action' => 'edit', $daysOfWork->id], ['class' => 'update']); ?></p>
            <?php endif; ?>

            <p><?= $this->Html->link(__('Listagem'), ['controller' => 'DaysOfWork', 'action' => 'index']); ?></p>
        </div>
    </div>

    <div class="data__person">
        <dl>
            <div class="data__row">
                <h4>#</h4>
                <dd><?= $daysOfWork->id; ?></dd>
            </div>

            <div class="data__row">
                <h4>Dia</h4>
                <dd><?= $daysOfWork->not_work->format('d/m/Y'); ?></dd>
            </div>

            <div class="data__row">
                <h4>Descrição</h4>
                <dd><?= !empty($daysOfWork->description) ? $daysOfWork->description : '-'; ?></dd>
            </div>
        </dl>
    </div>
</section>

<?= $this->Html->script('sweetalert'); ?>
