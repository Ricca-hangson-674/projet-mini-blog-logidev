<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <base href="<?= $racineWeb ?>" >
        <link rel="stylesheet" href="Asset/bootstrap.min.css" />
        <title><?= $titre ?></title>
    </head>
    <body>
        <h1>BACK OFFICE</h1>

        <div id="contenu">
                <?= $contenu ?>
            </div> <!-- #contenu -->

<?php if (isset($msgErreur)): ?>
    <p><?= $msgErreur ?></p>
<?php endif; ?>
    </body>
</html>