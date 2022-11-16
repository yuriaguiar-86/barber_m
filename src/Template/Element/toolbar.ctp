<header>
    <h3><?= $this->Html->link(__('Manos barber'), ['controller' => 'Users', 'action' => 'home'], ['class' => 'header__link']); ?></h3>

    <nav role="navigation" class="primary-navigation">
        <ul>
            <li><?= $this->Html->link(__('Meu perfil'), ['controller' => 'Users', 'action' => 'profile'], ['class' => 'header__link']); ?></li>

            <?php if (
                $this->AppView->visible('DaysOfWork', 'index') ||
                $this->AppView->visible('TypesOfPayments', 'index') ||
                $this->AppView->visible('TypesOfServices', 'index') ||
                $this->AppView->visible('Users', 'dashboard')
            ) : ?>

                <li><a href="#" class="header__link">Configurações &dtrif;</a>
                    <ul class="dropdown">
                        <?php if ($this->AppView->visible('DaysOfWork', 'index')) : ?>
                            <li><?= $this->Html->link(__('Dias de folga'), ['controller' => 'DaysOfWork', 'action' => 'index'], ['class' => 'header__link']); ?></li>
                        <?php endif; ?>

                        <?php if ($this->AppView->visible('TypesOfPayments', 'index')) : ?>
                            <li><?= $this->Html->link(__('Tipos de pagamento'), ['controller' => 'TypesOfPayments', 'action' => 'index'], ['class' => 'header__link']); ?></li>
                        <?php endif; ?>

                        <?php if ($this->AppView->visible('TypesOfServices', 'index')) : ?>
                            <li><?= $this->Html->link(__('Tipos de serviço'), ['controller' => 'TypesOfServices', 'action' => 'index'], ['class' => 'header__link']); ?></li>
                        <?php endif; ?>

                        <?php if ($this->AppView->visible('Users', 'dashboard')) : ?>
                            <li><?= $this->Html->link(__('Dashboard'), ['controller' => 'Users', 'action' => 'dashboard'], ['class' => 'header__link']); ?></li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>


            <?php if (
                $this->AppView->visible('Users', 'index') ||
                $this->AppView->visible('DaysOfWeek', 'index') ||
                $this->AppView->visible('TimesOfDay', 'index') ||
                $this->AppView->visible('Roles', 'index') ||
                $this->AppView->visible('Actions', 'index') ||
                $this->AppView->visible('Controllers', 'index')
            ) : ?>
                <li><a href="#" class="header__link">Administrativo &dtrif;</a>
                    <ul class="dropdown">
                        <?php if ($this->AppView->visible('Users', 'index')) : ?>
                            <li><?= $this->Html->link(__('Usuários'), ['controller' => 'Users', 'action' => 'index'], ['class' => 'header__link']); ?></li>
                        <?php endif; ?>

                        <?php if ($this->AppView->visible('DaysOfWeek', 'index')) : ?>
                            <li><?= $this->Html->link(__('Dias da semana'), ['controller' => 'DaysOfWeek', 'action' => 'index'], ['class' => 'header__link']); ?></li>
                        <?php endif; ?>

                        <?php if ($this->AppView->visible('TimesOfDay', 'index')) : ?>
                            <li><?= $this->Html->link(__('Horários de funcionamento'), ['controller' => 'TimesOfDay', 'action' => 'index'], ['class' => 'header__link']); ?></li>
                        <?php endif; ?>

                        <?php if ($this->AppView->visible('Roles', 'index')) : ?>
                            <li><?= $this->Html->link(__('Tipos de perfis'), ['controller' => 'Roles', 'action' => 'index'], ['class' => 'header__link']); ?></li>
                        <?php endif; ?>

                        <?php if ($this->AppView->visible('Actions', 'index')) : ?>
                            <li><?= $this->Html->link(__('Funcionalidades'), ['controller' => 'Actions', 'action' => 'index'], ['class' => 'header__link']); ?></li>
                        <?php endif; ?>

                        <?php if ($this->AppView->visible('Controllers', 'index')) : ?>
                            <li><?= $this->Html->link(__('Controladores'), ['controller' => 'Controllers', 'action' => 'index'], ['class' => 'header__link']); ?></li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if ($this->AppView->visible('Schedules', 'index')) : ?>
                <li><?= $this->Html->link(__('Agenda'), ['controller' => 'Schedules', 'action' => 'index'], ['class' => 'header__link']); ?></li>
            <?php endif; ?>

            <li><?= $this->Html->link(__('Sair'), ['controller' => 'Users', 'action' => 'logout'], ['class' => 'header__link']); ?></li>
        </ul>
    </nav>
</header>
