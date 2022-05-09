<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <base href="<?= $racineWeb ?>" >
        <link rel="stylesheet" href="Asset/bootstrap.min.css" />
        <link rel="stylesheet" href="Asset/front.css" />
        <title><?= $titre ?></title>
    </head>
    <body>

    <div class="container">
		<header class="blog-header py-3">
		    <div class="row flex-nowrap justify-content-between align-items-center">
		      <div class="col-4 pt-1">
		        <a class="link-secondary" href="admin">BackOffice</a>
		      </div>
		      <div class="col-4 text-center">
		        <a class="blog-header-logo text-dark" href="/">Mini Blog</a>
		      </div>
		      <div class="col-4 d-flex justify-content-end align-items-center">
		        <a class="btn btn-sm btn-outline-secondary" href="authentification/deconnecter">Deconnexion</a>
		      </div>
		    </div>
		</header>

        <?= $contenu ?>
        
	</div>
        

    </body>
</html>