<section>
  <div class="subtitle__button">
    <h1>Meu perfil <small>dados pessoais</small></h1>

    <div class="profile">
      <p><?= $this->Html->link(__('Trocar senha'), ['controller' => 'Users', 'action' => 'updatePassword'], ['class' => 'update']); ?></p>
      <p><?= $this->Html->link(__('Atualizar'), ['controller' => 'Users', 'action' => 'editProfile']); ?></p>
    </div>
  </div>

  <div class="data__person">
    <dl>
      <div class="data__row">
        <h4>#</h4>
        <dd><?= $user['id']; ?></dd>
      </div>

      <div class="data__row">
        <h4>Usuário</h4>
        <dd><?= $user['username']; ?></dd>
      </div>

      <div class="data__row">
        <h4>Nome</h4>
        <dd><?= $user['name']; ?></dd>
      </div>

      <div class="data__row">
        <h4>E-mail</h4>
        <dd><?= $user['email']; ?></dd>
      </div>

      <div class="data__row">
        <h4>Telefone</h4>
        <dd><?= $user['personal_phone']; ?></dd>
      </div>

      <div class="data__row">
        <h4>Outro telefone</h4>
        <dd><?= !empty($user['other_phone']) ? $user['other_phone'] : '-'; ?></dd>
      </div>

      <div class="data__row">
        <h4>Data do cadastro</h4>
        <dd><?= $user['created']->format('d/m/Y H:m:s'); ?></dd>
      </div>

      <div class="data__row">
        <h4>Data de atualização</h4>
        <dd><?= $user['modified']->format('d/m/Y H:m:s'); ?></dd>
      </div>
    </dl>
  </div>
</section>
