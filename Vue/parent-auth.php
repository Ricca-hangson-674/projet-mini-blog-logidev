<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <base href="<?= $racineWeb ?>">
    <link rel="stylesheet" href="Asset/bootstrap.min.css" />
    <link rel="stylesheet" href="Asset/authentification.css" />
    <title><?= $titre ?></title>
</head>

<body class="text-center">

    <main class="form-signin">

        <?php if (isset($msgErreur) && $msgErreur != ''): ?>
        <div class="alert alert-danger" role="alert">
            <p><?= $msgErreur ?></p>
        </div>
        <?php endif; ?>

        <?php if (isset($success) && $success != ''): ?>
        <div class="alert alert-success" role="alert">
            <p><?= $success ?></p>
        </div>
        <?php endif; ?>

        <?= $contenu ?>
    </main>
</body>

</html>