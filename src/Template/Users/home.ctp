<section class="welcome">
  <h2>Seja bem-vindo <?= current(str_word_count($user['name'], 2)); ?> aos Manos barber</h2>
  <small>Um homem precisa de poucas coisas na vida: amor, dinheiro e um bom barbeiro.</small>

  <p><?= $this->Html->link(__('Agendar horário'), ['controller' => 'Schedules', 'action' => 'add']); ?></p>
</section>
