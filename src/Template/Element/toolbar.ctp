<header>
  <h3><?= $this->Html->link(__('Manos barber'), ['controller' => 'Users', 'action' => 'home'], ['class' => 'header__link']); ?></h3>

  <nav role="navigation" class="primary-navigation">
    <ul>
      <li><?= $this->Html->link(__('Meu perfil'), ['controller' => 'Users', 'action' => 'profile'], ['class' => 'header__link']); ?></li>

      <li><a href="#" class="header__link">Configurações &dtrif;</a>
        <ul class="dropdown">
          <li><?= $this->Html->link(__('Tipos de pagamento'), ['controller' => 'TypesOfPayments', 'action' => 'index'], ['class' => 'header__link']); ?></li>
          <li><?= $this->Html->link(__('Tipos de serviço'), ['controller' => 'TypesOfServices', 'action' => 'index'], ['class' => 'header__link']); ?></li>
          <li><?= $this->Html->link(__('Dashboard'), ['controller' => 'Users', 'action' => 'dashboard'], ['class' => 'header__link']); ?></li>
        </ul>
      </li>

      <li><a href="#" class="header__link">Administrativo &dtrif;</a>
        <ul class="dropdown">
          <li><?= $this->Html->link(__('Usuários'), ['controller' => 'Users', 'action' => 'index'], ['class' => 'header__link']); ?></li>
          <li><?= $this->Html->link(__('Tipos de perfis'), ['controller' => 'Roles', 'action' => 'index'], ['class' => 'header__link']); ?></li>
          <li><?= $this->Html->link(__('Funcionalidades'), ['controller' => 'Actions', 'action' => 'index'], ['class' => 'header__link']); ?></li>
          <li><?= $this->Html->link(__('Controladores'), ['controller' => 'Controllers', 'action' => 'index'], ['class' => 'header__link']); ?></li>
        </ul>
      </li>

      <li><?= $this->Html->link(__('Agenda'), ['controller' => 'Schedules', 'action' => 'index'], ['class' => 'header__link']); ?></li>
      <li><?= $this->Html->link(__('Sair'), ['controller' => 'Users', 'action' => 'logout'], ['class' => 'header__link']); ?></li>
    </ul>
  </nav>
</header>
