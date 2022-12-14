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
                $this->AppView->visible('DaysTimes', 'index') ||
                $this->AppView->visible('OpeningHours', 'index') ||
                $this->AppView->visible('Roles', 'index') ||
                $this->AppView->visible('Actions', 'index') ||
                $this->AppView->visible('Controllers', 'index')
            ) : ?>
                <li><a href="#" class="header__link">Administrativo &dtrif;</a>
                    <ul class="dropdown">
                        <?php if ($this->AppView->visible('Users', 'index')) : ?>
                            <li><?= $this->Html->link(__('Usuários'), ['controller' => 'Users', 'action' => 'index'], ['class' => 'header__link']); ?></li>
                        <?php endif; ?>

                        <?php if ($this->AppView->visible('DaysTimes', 'index')) : ?>
                            <li><?= $this->Html->link(__('Dias da semana'), ['controller' => 'DaysTimes', 'action' => 'index'], ['class' => 'header__link']); ?></li>
                        <?php endif; ?>

                        <?php if ($this->AppView->visible('OpeningHours', 'index')) : ?>
                            <li><?= $this->Html->link(__('Horários'), ['controller' => 'OpeningHours', 'action' => 'index'], ['class' => 'header__link']); ?></li>
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


    <!-- MENU HAMBURGUER -->
    <section class="hamburger__menu">
        <input id="menu__toggle" type="checkbox" />
        <label class="menu__btn" for="menu__toggle">
            <span></span>
        </label>

        <ul class="menu__box">
            <li><?= $this->Html->link(__('Meu perfil'), ['controller' => 'Users', 'action' => 'profile'], ['class' => 'menu__item']); ?></li>


            <?php if (
                $this->AppView->visible('DaysOfWork', 'index') ||
                $this->AppView->visible('TypesOfPayments', 'index') ||
                $this->AppView->visible('TypesOfServices', 'index') ||
                $this->AppView->visible('Users', 'dashboard')
            ) : ?>
                <details class="summary__hamburguer">
                    <summary>Configurações &dtrif;</summary>

                    <?php if ($this->AppView->visible('Users', 'index')) : ?>
                        <li><?= $this->Html->link(__('Usuários'), ['controller' => 'Users', 'action' => 'index']); ?></li>
                    <?php endif; ?>

                    <?php if ($this->AppView->visible('DaysOfWork', 'index')) : ?>
                        <li><?= $this->Html->link(__('Dias de folga'), ['controller' => 'DaysOfWork', 'action' => 'index']); ?></li>
                    <?php endif; ?>

                    <?php if ($this->AppView->visible('OpeningHours', 'index')) : ?>
                        <li><?= $this->Html->link(__('Horários'), ['controller' => 'OpeningHours', 'action' => 'index']); ?></li>
                    <?php endif; ?>

                    <?php if ($this->AppView->visible('Roles', 'index')) : ?>
                        <li><?= $this->Html->link(__('Tipos de perfis'), ['controller' => 'Roles', 'action' => 'index']); ?></li>
                    <?php endif; ?>

                    <?php if ($this->AppView->visible('Actions', 'index')) : ?>
                        <li><?= $this->Html->link(__('Funcionalidades'), ['controller' => 'Actions', 'action' => 'index']); ?></li>
                    <?php endif; ?>

                    <?php if ($this->AppView->visible('Controllers', 'index')) : ?>
                        <li><?= $this->Html->link(__('Controladores'), ['controller' => 'Controllers', 'action' => 'index']); ?></li>
                    <?php endif; ?>
                </details>
            <?php endif; ?>


            <?php if (
                $this->AppView->visible('Users', 'index') ||
                $this->AppView->visible('DaysTimes', 'index') ||
                $this->AppView->visible('OpeningHours', 'index') ||
                $this->AppView->visible('Roles', 'index') ||
                $this->AppView->visible('Actions', 'index') ||
                $this->AppView->visible('Controllers', 'index')
            ) : ?>
                <details class="summary__hamburguer">
                    <summary>Administrativo &dtrif;</summary>

                    <?php if ($this->AppView->visible('Users', 'index')) : ?>
                        <li><?= $this->Html->link(__('Usuários'), ['controller' => 'Users', 'action' => 'index']); ?></li>
                    <?php endif; ?>

                    <?php if ($this->AppView->visible('DaysTimes', 'index')) : ?>
                        <li><?= $this->Html->link(__('Dias da semana'), ['controller' => 'DaysTimes', 'action' => 'index']); ?></li>
                    <?php endif; ?>

                    <?php if ($this->AppView->visible('OpeningHours', 'index')) : ?>
                        <li><?= $this->Html->link(__('Horários'), ['controller' => 'OpeningHours', 'action' => 'index']); ?></li>
                    <?php endif; ?>

                    <?php if ($this->AppView->visible('Roles', 'index')) : ?>
                        <li><?= $this->Html->link(__('Tipos de perfis'), ['controller' => 'Roles', 'action' => 'index']); ?></li>
                    <?php endif; ?>

                    <?php if ($this->AppView->visible('Actions', 'index')) : ?>
                        <li><?= $this->Html->link(__('Funcionalidades'), ['controller' => 'Actions', 'action' => 'index']); ?></li>
                    <?php endif; ?>

                    <?php if ($this->AppView->visible('Controllers', 'index')) : ?>
                        <li><?= $this->Html->link(__('Controladores'), ['controller' => 'Controllers', 'action' => 'index']); ?></li>
                    <?php endif; ?>
                </details>
            <?php endif; ?>


            <?php if ($this->AppView->visible('Schedules', 'index')) : ?>
                <li><?= $this->Html->link(__('Agenda'), ['controller' => 'Schedules', 'action' => 'index'], ['class' => 'menu__item']); ?></li>
            <?php endif; ?>

            <li><?= $this->Html->link(__('Sair'), ['controller' => 'Users', 'action' => 'logout'], ['class' => 'menu__item']); ?></li>
        </ul>
    </section>
</header>
