<section>
    <div class="subtitle__button">
        <h1>Tipos de serviços <small>edição</small></h1>

        <p><?= $this->Html->link(__('Listagem'), ['controller' => 'TypesOfServices', 'action' => 'index']); ?></p>
    </div>

    <?= $this->Flash->render(); ?>
    <?= $this->Form->create($typesOfService, ['class' => 'all__forms']); ?>

    <p><span class="fields__required">*</span> campos obrigatórios</p>

    <div class="more__fields">
        <div class="row right">
            <label>Nome <span class="fields__required">*</span></label>
            <?= $this->Form->control('name', ['label' => false, 'required']); ?>
        </div>
        <div class="row">
            <label>Preço em R$ <span class="fields__required">*</span></label>
            <?= $this->Form->control('price', ['label' => false, 'required']); ?>
        </div>
    </div>

    <div class="row">
        <label>Descrição</label>
        <?= $this->Form->control('description', ['label' => false]); ?>
    </div>

    <?= $this->Form->button(__('Atualizar'), ['class' => 'button__edit']); ?>
    <?= $this->Form->end(); ?>
</section>
