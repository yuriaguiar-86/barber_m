<section class="welcome">
    <h2>Seja bem-vindo <?= current(str_word_count($user['name'], 2)); ?> aos Manos barber</h2>
    <small>Um homem precisa de poucas coisas na vida: amor, dinheiro e um bom barbeiro.</small>

    <p><?= $this->Html->link(__('Agendar horário'), ['controller' => 'Schedules', 'action' => 'add']); ?></p>

    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3780.115320396711!2d-48.197684800000005!3d-18.6588204!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94a431ad7cd988e5%3A0xcf5e70a3688c6f1!2sR.%20Natal%20Mujali%2C%20609%20-%20Centro%2C%20Araguari%20-%20MG%2C%2038440-234!5e0!3m2!1spt-BR!2sbr!4v1669839022375!5m2!1spt-BR!2sbr" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="iframe__maps"></iframe>

    <?php if (!empty($employees)) : ?>
        <aside class="containner__employees">

            <?php foreach($employees as $employee) : ?>
                <div class="employee">
                    <p>Profissional: <?= $employee->name; ?></p>
                    <p><i class="fa-solid fa-phone"></i> <?= $employee->personal_phone; ?></p>
                </div>
            <?php endforeach; ?>

        </aside>
    <?php endif; ?>
</section>
