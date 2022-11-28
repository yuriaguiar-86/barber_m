<?php

use App\Controller\TypeRoleENUM;
?>

<section>
    <div class="subtitle__button">
        <h1>Funcionalidades <small>visualização</small></h1>

        <div class="profile">
            <?= $this->Form->postLink(__('Apagar'), ['controller' => 'Actions', 'action' => 'delete', $action->id], ['class' => 'delete_in_view sweetdelete', 'data-name' => $action->surname, 'confirm' => __('Tem certeza que deseja apagar a funcionalidade {0}?', $action->surname)]); ?>
            <p><?= $this->Html->link(__('Atualizar'), ['controller' => 'Actions', 'action' => 'edit', $action->id], ['class' => 'update']); ?></p>
            <p><?= $this->Html->link(__('Listagem'), ['controller' => 'Actions', 'action' => 'index']); ?></p>

            <nav class="primary-navigation nav__view">
                <ul>
                    <li><a href="#" class="header__link">Opções &dtrif;</a>
                        <ul class="dropdown">
                            <li><?= $this->Form->postLink(__('Apagar'), ['controller' => 'Actions', 'action' => 'delete', $action->id], ['class' => 'header__link sweetdelete', 'data-name' => $action->surname, 'confirm' => __('Tem certeza que deseja apagar a funcionalidade {0}?', $action->surname)]); ?></li>
                            <li><?= $this->Html->link(__('Atualizar'), ['controller' => 'Actions', 'action' => 'edit', $action->id], ['class' => 'header__link']); ?></li>
                            <li><?= $this->Html->link(__('Listagem'), ['controller' => 'Actions', 'action' => 'index'], ['class' => 'header__link']); ?></li>
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
                <dd><?= $action->id; ?></dd>
            </div>

            <div class="data__row">
                <h4>Nome</h4>
                <dd><?= $action->action_map; ?></dd>
            </div>

            <div class="data__row">
                <h4>Apelido</h4>
                <dd><?= $action->surname; ?></dd>
            </div>

            <div class="data__row">
                <h4>Controlador</h4>
                <dd><?= $action->controller->name; ?></dd>
            </div>

            <div class="data__row">
                <h4>Descrição</h4>
                <dd><?= !empty($action->description) ? $action->description : '-'; ?></dd>
            </div>
        </dl>
    </div>

    <aside class="toghetter">
        <h2>Tipos de perfis</h2>

        <?php if (!empty($action->roles)) : ?>
            <table class="custom__table">
                <thead>
                    <tr>
                        <th class="px__table">#</th>
                        <th>Nome</th>
                        <th class="px__phone">Permissão</th>
                        <th class="px__big">Description</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($action->roles as $role) : ?>
                        <tr>
                            <td class="px__table"><?= $this->Number->format($role->id) ?></td>
                            <td><?= $role->name; ?></td>
                            <td class="px__phone"><?= TypeRoleENUM::findConstants($role->type); ?></td>
                            <td class="px__big"><?= !empty($role->description) ? $role->description : '-'; ?></td>

                            <td class="actions">
                                <div class="view">
                                    <?= $this->Html->link(__('<i class="fa-solid fa-eye"></i> Visualizar'), ['controller' => 'Roles', 'action' => 'view', $role->id], ['class' => 'action__view', 'escape' => false]); ?>
                                </div>
                                <div class="edit">
                                    <?= $this->Html->link(__('<i class="fa-solid fa-pen-to-square"></i> Editar'), ['controller' => 'Roles', 'action' => 'edit', $role->id], ['class' => 'action__edit', 'escape' => false]); ?>
                                </div>

                                <nav class="primary-navigation nav__actions">
                                    <ul>
                                        <?php if (
                                            $this->AppView->visible('Roles', 'view') ||
                                            $this->AppView->visible('Roles', 'edit')
                                        ) : ?>

                                            <li><a href="#" class="header__link"><i class="fa-solid fa-ellipsis"></i></a>
                                                <ul class="dropdown">
                                                    <?php if ($this->AppView->visible('Roles', 'view')) : ?>
                                                        <li><?= $this->Html->link(__('Visualizar'), ['controller' => 'Roles', 'action' => 'view', $role->id], ['class' => 'header__link']); ?></li>
                                                    <?php endif; ?>

                                                    <?php if ($this->AppView->visible('Roles', 'edit')) : ?>
                                                        <li><?= $this->Html->link(__('Editar'), ['controller' => 'Roles', 'action' => 'edit', $role->id], ['class' => 'header__link']); ?></li>
                                                    <?php endif; ?>
                                                </ul>
                                            </li>
                                        <?php endif; ?>
                                    </ul>
                                </nav>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else : ?>
            <p class="values__empty">Nenhum tipo de perfil vinculado!</p>
        <?php endif; ?>
    </aside>
</section>

<?= $this->Html->script('sweetalert'); ?>
