<?php $this->titre = "Mon Blog - Inscription" ?>

<form action="authentification/creer" method="post">
    <h1 class="h3 mb-3 fw-normal">Inscription</h1>
    <div class="form-floating">
        <input type="email" class="form-control" name="email" id="email" required placeholder="name@example.com">
        <label for="email">Email</label>
    </div>
    <div class="form-floating">
        <input type="password" class="form-control" name="mot_passe" id="mot_passe" required placeholder="mot de passe">
        <label for="mot_passe">Mot de passe</label>
    </div>
    <div class="form-floating">
        <input type="password" class="form-control" name="confirm_mot_passe" id="confirm_mot_passe" required
            placeholder="confirm_mot_passe">
        <label for="confirm_mot_passe">Confirmer Mot de passe</label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Inscription</button>
    <a href="authentification/connexion" class="w-100 btn btn-lg btn-secondary mt-1">Connexion</a>
</form>