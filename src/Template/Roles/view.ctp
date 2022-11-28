<?php

use App\Controller\TypeRoleENUM;
?>

<section>
    <div class="subtitle__button">
        <h1>Tipos de perfis <small>visualização</small></h1>

        <div class="profile">
            <?= $this->Form->postLink(__('Apagar'), ['controller' => 'Roles', 'action' => 'delete', $role->id], ['class' => 'delete_in_view sweetdelete', 'data-name' => $role->name, 'confirm' => __('Tem certeza que deseja apagar o tipo de perfil {0}?', $role->name)]); ?>
            <p><?= $this->Html->link(__('Atualizar'), ['controller' => 'Roles', 'action' => 'edit', $role->id], ['class' => 'update']); ?></p>
            <p><?= $this->Html->link(__('Listagem'), ['controller' => 'Roles', 'action' => 'index']); ?></p>

            <nav class="primary-navigation nav__view">
                <ul>
                    <li><a href="#" class="header__link">Opções &dtrif;</a>
                        <ul class="dropdown">
                            <li><?= $this->Form->postLink(__('Apagar'), ['controller' => 'Roles', 'action' => 'delete', $role->id], ['class' => 'header__link sweetdelete', 'data-name' => $role->name, 'confirm' => __('Tem certeza que deseja apagar o tipo de perfil {0}?', $role->name)]); ?></li>
                            <li><?= $this->Html->link(__('Atualizar'), ['controller' => 'Roles', 'action' => 'edit', $role->id], ['class' => 'header__link']); ?></li>
                            <li><?= $this->Html->link(__('Listagem'), ['controller' => 'Roles', 'action' => 'index'], ['class' => 'header__link']); ?></li>
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
                <dd><?= $role->id; ?></dd>
            </div>

            <div class="data__row">
                <h4>Nome</h4>
                <dd><?= $role->name; ?></dd>
            </div>

            <div class="data__row">
                <h4>Apelido</h4>
                <dd><?= TypeRoleENUM::findConstants($role->type); ?></dd>
            </div>

            <div class="data__row">
                <h4>Descrição</h4>
                <dd><?= !empty($role->description) ? $role->description : '-'; ?></dd>
            </div>
        </dl>
    </div>

    <aside class="toghetter">
        <h2>Funcionalidades</h2>

        <?php if (!empty($role->actions)) : ?>
            <table class="custom__table">
                <thead>
                    <tr>
                        <th class="px__table">#</th>
                        <th class="px__phone">Nome</th>
                        <th>Apelido</th>
                        <th class="px__big">Description</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($role->actions as $action) : ?>
                        <tr>
                            <td class="px__table"><?= $this->Number->format($action->id) ?></td>
                            <td class="px__phone"><?= $action->action_map; ?></td>
                            <td><?= $action->surname; ?></td>
                            <td class="px__big"><?= !empty($action->description) ? $action->description : '-'; ?></td>

                            <td class="actions">
                                <div class="view">
                                    <?= $this->Html->link(__('<i class="fa-solid fa-eye"></i> Visualizar'), ['controller' => 'Actions', 'action' => 'view', $action->id], ['class' => 'action__view', 'escape' => false]); ?>
                                </div>
                                <div class="edit">
                                    <?= $this->Html->link(__('<i class="fa-solid fa-pen-to-square"></i> Editar'), ['controller' => 'Actions', 'action' => 'edit', $action->id], ['class' => 'action__edit', 'escape' => false]); ?>
                                </div>
                                <div class="delete">
                                    <?= $this->Form->postLink(__('<i class="fa-solid fa-trash"></i> Apagar'), ['controller' => 'Actions', 'action' => 'delete', $action->id], ['class' => 'action__delete sweetdelete', 'data-name' => $action->surname, 'escape' => false, 'confirm' => __('Tem certeza que deseja apagar o controlador {0}?', $action->surname)]); ?>
                                </div>

                                <nav class="primary-navigation nav__actions">
                                    <ul>
                                        <?php if (
                                            $this->AppView->visible('Actions', 'view') ||
                                            $this->AppView->visible('Actions', 'edit') ||
                                            $this->AppView->visible('Actions', 'delete')
                                        ) : ?>

                                            <li><a href="#" class="header__link"><i class="fa-solid fa-ellipsis"></i></a>
                                                <ul class="dropdown">
                                                    <?php if ($this->AppView->visible('Actions', 'view')) : ?>
                                                        <li><?= $this->Html->link(__('Visualizar'), ['controller' => 'Actions', 'action' => 'view', $action->id], ['class' => 'header__link']); ?></li>
                                                    <?php endif; ?>

                                                    <?php if ($this->AppView->visible('Actions', 'edit')) : ?>
                                                        <li><?= $this->Html->link(__('Editar'), ['controller' => 'Actions', 'action' => 'edit', $action->id], ['class' => 'header__link']); ?></li>
                                                    <?php endif; ?>

                                                    <?php if ($this->AppView->visible('Actions', 'delete')) : ?>
                                                        <li><?= $this->Form->postLink(__('Apagar'), ['controller' => 'Actions', 'action' => 'delete', $action->id], ['class' => 'header__link sweetdelete', 'data-name' => $action->surname, 'escape' => false, 'confirm' => __('Tem certeza que deseja apagar a funcionalidade {0}?', $action->surname)]); ?></li>
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
            <p class="values__empty">Nenhuma funcionalidade vinculada!</p>
        <?php endif; ?>
    </aside>
</section>

<?= $this->Html->script('sweetalert'); ?>
