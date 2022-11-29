<?php

use App\Controller\TypeRoleENUM;
?>

<section>
    <div class="subtitle__button">
        <h1>Tipos de perfis <small>listagem</small></h1>

        <?php if ($this->AppView->visible('Roles', 'add')) : ?>
            <p><?= $this->Html->link(__('Cadastrar'), ['controller' => 'Roles', 'action' => 'add']); ?></p>
        <?php endif; ?>
    </div>

    <?php if (!empty($roles)) : ?>
        <table class="custom__table">
            <thead>
                <tr>
                    <th class="px__table">#</th>
                    <th>Nome</th>
                    <th class="px__phone">Permissão</th>
                    <th class="px__big">Descrição</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($roles as $role) : ?>
                    <tr>
                        <td class="px__table"><?= $this->Number->format($role->id) ?></td>
                        <td><?= $role->name; ?></td>
                        <td class="px__phone"><?= TypeRoleENUM::findConstants($role->type); ?></td>
                        <td class="px__big"><?= !empty($role->description) ? mb_strimwidth($role->description, 0, 50, '...') : '-'; ?></td>

                        <td class="actions">
                            <?php if ($this->AppView->visible('Roles', 'view')) : ?>
                                <div class="view">
                                    <?= $this->Html->link(__('<i class="fa-solid fa-eye"></i> Visualizar'), ['controller' => 'Roles', 'action' => 'view', $role->id], ['class' => 'action__view', 'escape' => false]); ?>
                                </div>
                            <?php endif; ?>

                            <?php if ($this->AppView->visible('Roles', 'edit')) : ?>
                                <div class="edit">
                                    <?= $this->Html->link(__('<i class="fa-solid fa-pen-to-square"></i> Editar'), ['controller' => 'Roles', 'action' => 'edit', $role->id], ['class' => 'action__edit', 'escape' => false]); ?>
                                </div>
                            <?php endif; ?>

                            <?php if ($this->AppView->visible('Roles', 'delete')) : ?>
                                <div class="delete">
                                    <?= $this->Form->postLink(__('<i class="fa-solid fa-trash"></i> Apagar'), ['controller' => 'Roles', 'action' => 'delete', $role->id], ['class' => 'action__delete sweetdelete', 'data-name' => $role->name, 'escape' => false, 'confirm' => __('Tem certeza que deseja apagar o tipo de perfil {0}?', $role->name)]); ?>
                                </div>
                            <?php endif; ?>

                            <nav class="primary-navigation nav__actions">
                                <ul>
                                    <?php if (
                                        $this->AppView->visible('Roles', 'view') ||
                                        $this->AppView->visible('Roles', 'edit') ||
                                        $this->AppView->visible('Roles', 'delete')
                                    ) : ?>

                                        <li><a href="#" class="header__link"><i class="fa-solid fa-ellipsis"></i></a>
                                            <ul class="dropdown">
                                                <?php if ($this->AppView->visible('Roles', 'view')) : ?>
                                                    <li><?= $this->Html->link(__('Visualizar'), ['controller' => 'Roles', 'action' => 'view', $role->id], ['class' => 'header__link']); ?></li>
                                                <?php endif; ?>

                                                <?php if ($this->AppView->visible('Roles', 'edit')) : ?>
                                                    <li><?= $this->Html->link(__('Editar'), ['controller' => 'Roles', 'action' => 'edit', $role->id], ['class' => 'header__link']); ?></li>
                                                <?php endif; ?>

                                                <?php if ($this->AppView->visible('Roles', 'delete')) : ?>
                                                    <li><?= $this->Form->postLink(__('Apagar'), ['controller' => 'Roles', 'action' => 'delete', $role->id], ['class' => 'header__link sweetdelete', 'data-name' => $role->name, 'escape' => false, 'confirm' => __('Tem certeza que deseja apagar o tipo de perfil {0}?', $role->name)]); ?></li>
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
        <table class="custom__table table__empty">
            <thead>
                <tr>
                    <th>Nenhum tipo de perfil encontrado!</th>
                </tr>
            </thead>
        </table>
    <?php endif; ?>

    <?php if (!empty($roles)) : ?>
        <?= $this->element('pagination'); ?>
    <?php endif; ?>
</section>

<?= $this->Html->script('sweetalert'); ?>
