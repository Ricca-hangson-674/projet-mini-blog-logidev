<?php $this->titre = "Mon Blog - " . $this->nettoyer($article['titre']); ?>

<div class="row mb-2">
    <div class="col-md-12">
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static">
                <strong class="d-inline-block mb-2 text-primary"><?= $this->nettoyer($article['auteur']) ?></strong>
                <h3 class="mb-0"><?= $this->nettoyer($article['titre']) ?></h3>
                <div class="mb-1 text-muted"><?= $this->nettoyer($article['dateCreation']) ?></div>
                <p class="card-text mb-auto"><?= $this->nettoyer($article['contenu']) ?></p>
            </div>
        </div>
    </div>
</div>

<hr>

<div class="row mt-2">
    <div class="col-md-12">
        <h2>Laisser un commentaire</h2>

        <?php if (isset($success) && $success != ''): ?>
        <div class="alert alert-success" role="alert">
            <p><?= $success ?></p>
        </div>
        <?php endif; ?>

        <form action="article/commenter" method="post">
            <div class="mb-3">
                <textarea required class="form-control" id="contenu" name="contenu" rows="3"></textarea>
            </div>

            <input type="hidden" name="id" value="<?= $article['id'] ?>" />

            <button type="submit" class="btn btn-secondary">Commenter</button>
        </form>
    </div>
</div>

<hr>

<div class="row mt-2">
    <h2>Commentaires</h2>

    <?php foreach ($commentaires as $commentaire): ?>
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?= $this->nettoyer($commentaire['auteur']) ?></h5>
                <p class="card-tes"><?= $this->nettoyer($commentaire['dateCreation']) ?></p>
                <p class="card-text"><?= $this->nettoyer($commentaire['contenu']) ?></p>

                <?php if ($commentaire['idUtilisateur'] == $idUtilisateur): ?>
                <a href="<?= "article/supprimerCommentaire/" . $this->nettoyer($commentaire['id']) ?>"
                    class="btn btn-danger">Supprimer</a>
                <?php endif ?>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>