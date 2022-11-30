<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <?= $this->Html->css(['started', 'footer']); ?>
    <?= $this->Html->script(['jquery.mask', 'terms']); ?>

    <?= $this->fetch('css'); ?>
    <?= $this->fetch('script'); ?>

    <title>Barbearia</title>
</head>
<body>
    <main class="containner__main">
        <?= $this->Html->image('blob__dark.svg', ['alt' => 'Blod dark', 'class' => 'blob__dark']); ?>

        <?= $this->Flash->render(); ?>
        <?= $this->fetch('content'); ?>
    </main>

    <?= $this->element('footer'); ?>
</body>
</html>
