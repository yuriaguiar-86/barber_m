<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?= $this->Html->css(['started']); ?>

    <?= $this->fetch('css') ?>

    <title>Barbearia</title>
</head>
<body>
    <main class="containner__main">
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
    </main>
</body>
</html>
