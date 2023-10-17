<div class="main__content-login">
    <div class="login">
        <?php include '../app/test.php' ?>
    </div>

    <?php
    $accounts = [
        ['title' => 'Cuenta 01', 'user' => 'estudiante', 'password' => 'clave1'],
        ['title' => 'Cuenta 02', 'user' => 'docente', 'password' => 'clave2'],
        ['title' => 'Cuenta 03', 'user' => 'rector', 'password' => 'clave3'],
    ];
    ?>

    <div class="test__account">
        <?php foreach ($accounts as $index => $account): ?>
            <div class="test__account-<?php echo $index + 1; ?> test__account-card">
                <p class="test__account-title"><?php echo $account['title']; ?></p>
                <p class="test__account-content">
                    <span>Usuario: </span>
                    <?php echo $account['user']; ?>
                </p>
                <p class="test__account-content">
                    <span>Contraseña: </span>
                    <?php echo $account['password']; ?>
                </p>
            </div>
        <?php endforeach; ?>
    </div>

</div>

