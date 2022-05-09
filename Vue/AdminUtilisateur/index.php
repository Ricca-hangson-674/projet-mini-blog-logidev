<?php $this->titre = "Mon Blog - Utilisateurs" ?>

<h2>Utilisateurs</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Email</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach ($utilisateurs as $utilisateur):?>
            <tr>
              <td><?= $this->nettoyer($utilisateur['idUtilisateur']) ?></td>
              <td><?= $this->nettoyer($utilisateur['email']) ?></td>
              <td>
                <a href="<?= "adminUtilisateur/supprimer/" . $this->nettoyer($utilisateur['idUtilisateur']) ?>" class="btn btn-danger">Supprimer</a>
              </td>
            </tr>
		      <?php endforeach; ?>
          </tbody>
        </table>
      </div>