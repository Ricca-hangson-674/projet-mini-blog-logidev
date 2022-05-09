<h2>Ajout un acticle</h2>

      <form action="adminArticle/ajout" method="post">
        <div class="mb-3">
          <label for="titre" class="form-label">Titre</label>
          <input type="text" class="form-control" id="titre" name="titre" required placeholder="name@example.com">
        </div>
        <div class="mb-3">
          <label for="contenu" class="form-label">Contenu</label>
          <textarea class="form-control" id="contenu" name="contenu" required rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Ajout</button>