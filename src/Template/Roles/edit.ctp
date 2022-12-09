<?php

use App\Controller\TypeRoleENUM;
?>

<section>
    <div class="subtitle__button">
        <h1>Tipos de perfil <small><?= TypeRoleENUM::findConstants($role->type); ?></small></h1>

        <p><?= $this->Html->link(__('Listagem'), ['controller' => 'Roles', 'action' => 'index']); ?></p>
    </div>

    <?= $this->Flash->render(); ?>
    <?= $this->Form->create($role, ['class' => 'all__forms']); ?>

    <p><span class="fields__required">*</span> campos obrigatórios</p>

    <div class="more__fields">
        <div class="row right">
            <label>Nome <span class="fields__required">*</span></label>
            <?= $this->Form->control('name', ['label' => false, 'required', 'autocomplete' => 'off']); ?>
        </div>
    </div>

    <div class="row">
        <label>Descrição</label>
        <?= $this->Form->control('description', ['label' => false]); ?>
    </div>

    <section class="controllers">
        <h2>Controladores de acesso <span class="fields__required">*</span></h2>

        <?php $cont = 0; ?>
        <?php if (!empty($controllers)) : ?>
            <p class="information__roles">Marque as ações no qual o perfil terá acesso, ou clique no nome do controlador para marcar/desmarcar todas.</p>

            <?php foreach ($controllers as $controller) : ?>
                <div class="input__services">
                    <div class="icons__module">
                        <i class="fa-solid fa-check allcheck" aria-hidden="true" title="Marcar todos"></i>
                        <i class="fa-regular fa-square uncheck" aria-hidden="true" title="Desmarcar todos"></i>
                        <h4><?= "Controlador - " . $controller->surname; ?></h4>
                    </div>

                    <?php if (!empty($controller->actions)) : ?>
                        <?php foreach ($controller->actions as $action) : ?>

                            <input type="checkbox" id="box-<?= $action->id; ?>" name="actions[_ids][]" value="<?= $action->id; ?>" class="checkbox__service" checked="<?= in_array($action->id, $actions_roles); ?>" />
                            <label for="box-<?= $action->id; ?>"><?= $action->surname; ?></label>
                            <?php $cont++; ?>

                        <?php endforeach; ?>
                    <?php else : ?>
                        <p class="information__roles">Nenhuma funcionalidade cadastrada neste controlador!</p>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </section>

    <?= $this->Form->button(__('Atualizar'), ['class' => 'button__edit']); ?>
    <?= $this->Form->end(); ?>
</section>

<?= $this->Html->script('roles'); ?>
