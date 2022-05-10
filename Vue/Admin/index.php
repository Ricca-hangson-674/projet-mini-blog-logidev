<?php $this->titre = "Mon Blog - Articles" ?>

<h2><?= $this->nettoyer($nbArticles) ?> Acticles et et <?= $this->nettoyer($nbCommentaires) ?> commentaire(s)</h2>
<a href="adminArticle" class="btn btn-primary">Ajouter</a>
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Titre</th>
                <th scope="col">Date de creation</th>
                <th scope="col">Auteur</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($articles as $article):?>
            <tr>
                <td><?= $this->nettoyer($article['id']) ?></td>
                <td><?= $this->nettoyer($article['titre']) ?></td>
                <td><?= $this->nettoyer($article['dateCreation']) ?></td>
                <td><?= $this->nettoyer($article['auteur']) ?></td>
                <td>
                    <a href="<?= "adminArticle/editer/" . $this->nettoyer($article['id']) ?>"
                        class="btn btn-secondary">Editer</a>
                    <a href="<?= "adminArticle/supprimer/" . $this->nettoyer($article['id']) ?>"
                        class="btn btn-danger">Supprimer</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>