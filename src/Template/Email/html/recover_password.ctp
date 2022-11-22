<section style="text-align: center; width: 500px;">
    <h1 style="color: #27AE60;">Redefinição de senha</h1>

    <p>Olá, <?= $name ?>.</p>

    Você solicitou uma alteração de senha <br>
    Seguindo o link abaixo você poderá alterar. <br>
    Para continuar o processo, clique no link ou no botão abaixo.

    <p style="margin: 50px 0;">
        <?= "<a style='color: #fff; text-decoration: none; background: #27AE60; width: 200px; padding: 10px; border-radius: 5px;' href='" . $host_name . "users/alter-password/" . $token . "'>Redefinir senha</a>" ?>
    </p>

    <p>Se você não solicitou uma redefinição de senha, pode ignorar este e-mail com segurança. Apenas uma pessoa com acesso ao seu e-mail pode redefinir a senha da sua conta.</p>
</section>
