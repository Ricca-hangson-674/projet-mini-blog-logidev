<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <base href="<?= $racineWeb ?>" >
        <link rel="stylesheet" href="Asset/bootstrap.min.css" />
  	    <link rel="stylesheet" href="Asset/authentification.css" />
        <title><?= $titre ?></title>
    </head>
    <body class="text-center">

        <?php if (isset($msgErreur)): ?>
        <div class="alert alert-danger" role="alert">
            <p><?= $msgErreur ?></p>
        </div>
        <?php endif; ?>
        

        <main class="form-signin">
            <?= $contenu ?>
        </main>
    </body>
</html>