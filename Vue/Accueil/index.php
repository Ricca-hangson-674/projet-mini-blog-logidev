<?php 
$this->titre = "Mon Blog - Accueil"?>
		
		<div class="row mb-2">
		<?php foreach ($articles as $article):?>
		    <div class="col-md-6">
		      <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
		        <div class="col p-4 d-flex flex-column position-static">
		          <strong class="d-inline-block mb-2 text-primary"><?= $this->nettoyer($article['auteur']) ?></strong>
		          <h3 class="mb-0"><?= $this->nettoyer($article['titre']) ?>t</h3>
		          <div class="mb-1 text-muted"><?= $this->nettoyer($article['dateCreation']) ?></div>
		          <p class="card-text mb-auto"><?= $this->nettoyer($article['contenu']) ?></p>
		          <a href="<?= "article/index/" . $this->nettoyer($article['id']) ?>" class="stretched-link">Voir plus</a>
		        </div>
		      </div>
		    </div>
		<?php endforeach; ?>
  		</div>