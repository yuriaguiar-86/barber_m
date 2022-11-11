<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <?= $this->Html->css(['started']); ?>
    <?= $this->Html->script(['jquery.mask']); ?>

    <?= $this->fetch('css'); ?>
    <?= $this->fetch('script'); ?>

    <title>Barbearia</title>
</head>
<body>
    <main class="containner__main">
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
    </main>
</body>
</html>
