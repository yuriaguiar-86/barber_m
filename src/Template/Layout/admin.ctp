<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <?= $this->Html->css(['style', 'toolbar', 'welcome', 'view', 'list', 'forms', 'dashboard']); ?>
    <?= $this->Html->script(['jquery.mask']); ?>

    <?= $this->fetch('css') ?>
    <?= $this->fetch('script'); ?>

    <title>Barbearia</title>
</head>
<body>
    <?= $this->element('toolbar'); ?>

    <main class="containner__main">
        <?= $this->Flash->render(); ?>
        <?= $this->fetch('content'); ?>
    </main>
</body>
</html>
