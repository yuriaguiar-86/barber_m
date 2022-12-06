<?= $this->Form->create(null, ['type' => 'get', 'id' => 'filter__form']); ?>
<?= $this->Form->control('filter', [
    'templates' => [
        'inputContainer' => '<div class="input__filter">{{content}}<input class="submit__filter" type="submit" value="Filtrar" /></div>'
    ],
    'placeholder' => 'Digite o conteúdo da pesquisa...',
    'label' => false,
    'value' => $this->request->getQuery('filter'),
    'class' => 'filter'
]); ?>
<?= $this->Form->end() ?>
